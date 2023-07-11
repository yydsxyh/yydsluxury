<?php
namespace glp;  

class Tools
{  
   
    public function __construct(){
        
    }
    
    /** 
     * 获取域名 
     */ 
    public function getHost(){
       $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
       $host = $http_type.$_SERVER['HTTP_HOST'];

       return $host;
    }
    
    //获取当前页面链接
    public function curPageURL(){
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on"){
            $pageURL .= "s";
        }
        $pageURL .= "://";
     
        if ($_SERVER["SERVER_PORT"] != "80"){
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }

        return $pageURL;
    }

    /**
     *  导出csv文件
     * @param $column string 列的字符串使用英文逗号分隔，例如：姓名,年龄,性别
     * @param $data array 要导出的数据的二维数组
     * @param $filename string 导出的文件名
     */
    public function exportCSV($column, $data, $filename){
        set_time_limit(600);
        ini_set('memory_limit', '512M');
        //为fputcsv()函数打开文件句柄
        $output = fopen('php://output', 'w') or die("can't open php://output");
        // 告诉浏览器是csv文件输出
        header("Content-Type: application/csv");
        header("Content-Disposition: attachment; filename=$filename.csv");
        // 写入标题
        fputcsv($output, explode(',', iconv('utf-8', 'gbk', $column)));
        // 遍历数据
        foreach ($data as $datum) {
            foreach ($datum as $value) {
                // 字符转码
                $v = iconv('utf-8', 'gbk', $value);
                // 处理数字，按照正常显示（非科学技术）
                if (is_numeric($v) || strpos($v, ',')) {
                    $v = $v . "\t";
                }
                $row[] = $v;
            }
            // 写入每行数据
            fputcsv($output, $row);
            unset($row);
        }
        // 关闭
        fclose($output);
    }

    //过滤表情
    public function filterEmoji($emojiStr){
        $emojiStr = preg_replace_callback('/./u',function(array $match){
            return strlen($match[0]) >= 4 ? '' : $match[0];
        },$emojiStr);
        return $emojiStr;
    }

    /**
     * 获取已经过了多久
     * PHP时间转换
     * 刚刚、几分钟前、几小时前
     * 今天昨天前天几天前
     * @param  string $targetTime 时间戳
     * @return string
     */
    public function getFormatTime($targetTime)
    {
        // 今天最大时间
        $todayLast   = strtotime(date('Y-m-d 23:59:59'));
        $agoTimeTrue = time() - $targetTime;
        $agoTime     = $todayLast - $targetTime;
        $agoDay      = floor($agoTime / 86400);

        if ($agoTimeTrue < 60) {
            $result = '刚刚';
        } elseif ($agoTimeTrue < 3600) {
            $result = (ceil($agoTimeTrue / 60)) . '分钟前';
        } elseif ($agoTimeTrue < 3600 * 12) {
            $result = (ceil($agoTimeTrue / 3600)) . '小时前';
        } elseif ($agoDay == 0) {
            $result = '今天 ';// . date('H:i', $targetTime);
        } elseif ($agoDay == 1) {
            $result = '昨天 ';// . date('H:i', $targetTime);
        } elseif ($agoDay == 2) {
            $result = '前天 ';// . date('H:i', $targetTime);
        } elseif ($agoDay > 2 && $agoDay < 16) {
            $result = $agoDay . '天前 ';// . date('H:i', $targetTime);
        } else {
            // $format = date('Y') != date('Y', $targetTime) ? "Y-m-d" : "m-d";
            $format = 'Y-m-d';
            $result = date($format, $targetTime);
        }
        return $result;
    }

    /**
     * PHP时间转换去数组中两头空格
     * @param array arr
     * @return array
     */
    public function trimArray($input){
        if (!is_array($input))
            return trim($input);
        return array_map('trimArray', $input);
    }

    /**
     * 身份证号码校验
     * @param string id_card
     * @return bool
     */
    public function validateIdCard($id_card){
        if(strlen($id_card)==18){
            return idcard_checksum18($id_card);
        }elseif((strlen($id_card)==15)){
            $id_card=idcard_15to18($id_card);
            return idcard_checksum18($id_card);
        }else{
            return false;
        }
    }

    // 计算身份证校验码，根据国家标准GB 11643-1999
    private function idcard_verify_number($idcard_base){
        if(strlen($idcard_base)!=17){
            return false;
        }
        //加权因子
        $factor=array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2);
        //校验码对应值
        $verify_number_list=array('1','0','X','9','8','7','6','5','4','3','2');
        $checksum=0;
        for($i=0;$i<strlen($idcard_base);$i++){
            $checksum += substr($idcard_base,$i,1) * $factor[$i];
        }
        $mod=$checksum % 11;
        $verify_number=$verify_number_list[$mod];
        return $verify_number;
    }

    // 将15位身份证升级到18位
     private function idcard_15to18($idcard){
        if(strlen($idcard)!=15){
            return false;
        }else{
            // 如果身份证顺序码是996 997 998 999，这些是为百岁以上老人的特殊编码
            if(array_search(substr($idcard,12,3),array('996','997','998','999')) !== false){
                $idcard=substr($idcard,0,6).'18'.substr($idcard,6,9);
            }else{
                $idcard=substr($idcard,0,6).'19'.substr($idcard,6,9);
            }
        }
        $idcard=$idcard.idcard_verify_number($idcard);
        return $idcard;
    }

    // 18位身份证校验码有效性检查
    private function idcard_checksum18($idcard){
        if(strlen($idcard)!=18){
            return false;
        }
        $idcard_base=substr($idcard,0,17);
        if(idcard_verify_number($idcard_base)!=strtoupper(substr($idcard,17,1))){
            return false;
        }else{
            return true;
        }
    }
}  