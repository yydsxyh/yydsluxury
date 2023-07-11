<?php
namespace glp;  

use think\Request;
class Wx
{  
    private $appid;                 //微信公众号APPID  
    private $appsecret;             //密匙  
    private $url;       //微信回调地址  
    

    public function __construct($appid, $appsecret){
        $this->appid = $appid;
        $this->appsecret = $appsecret;
    }
    
    /** 
     * 授权登陆请求
     * @param $url 
     *  
     */ 
    public function auth($url){
        $this->url = $url;

        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $this->appid . '&redirect_uri=' . urlencode($this->url) . '&response_type=code&scope=snsapi_userinfo&state=state#wechat_redirect';  
  
        header('location:' . $url);
        exit();
    }
  
    /** 
     * 获取授权token 
     * @param $code 
     * @return bool|string 
     */  
    public function getUserAccessToken($code)  
    {  
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->appid}&secret={$this->appsecret}&code={$code}&grant_type=authorization_code";  
    
        // $res = file_get_contents($url);
        $res = $this->__requestPost($url);
        return json_decode($res,true);  
    }  
  
    /** 
     * 获取用户信息 
     * @param $accessToken 
     * @return mixed 
     */  
    public function getUserInfo($accessToken)  
    {  
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$accessToken['access_token']."&openid=".$accessToken['openid']."&lang=zh_CN";
        // $UserInfo = file_get_contents($url); 
        $UserInfo = $this->__requestPost($url); 
        return json_decode($UserInfo, true);  
    }  

    /** 
     * 获取用户详细信息 
     * @param $openid 
     * @return mixed 
     */  
    public function getUserDetails($openid)  
    {  
        $accessToken = $this->getAccessToken();
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$accessToken."&openid=".$openid."&lang=zh_CN";
        // $UserInfo = file_get_contents($url); 
        $UserInfo = $this->__requestPost($url); 
        return json_decode($UserInfo, true);  
    }  
  
    /** 
     * 此AccessToken   与 getUserAccessToken不一样 
     * 获得AccessToken 
     * @return mixed 
     */  
    public function getAccessToken()  
    {  
        // 获取缓存  
        $access = cache('access_token');  
        // 缓存不存在-重新创建  
        if (empty($access)) {  
            // 获取 access token  
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this -> appid}&secret={$this->appsecret}";  
            // $accessToken = file_get_contents($url);
            $accessToken = $this->__requestGet($url); 
  
            $accessToken = json_decode($accessToken);  
            // 保存至缓存  
            $access = $accessToken->access_token;  
            cache('access_token', $access, 7000);  
        }  
        return $access;  
    } 
    
    /** 
     * 发送模板消息 
     * @param $toUser 接收人openid
     * @param $template_id 模板id 
     * @param $data 组装内容，根据模板情况而定
     *   array(
     *       "first" => array(
     *          "value"=>xxxxx,
     *           "color"=>"#173177"
     *       ),
     *       "keyword1"=>array(
     *           "value"=>xxxx,
     *           "color"=>"#173177"
     *       ),
     *       "keyword2"=>array(
     *           "value"=>xxxxx,
     *           "color"=>"#173177"
     *       ),
     *       "keyword3"=> array(
     *           "value"=>xxxx,
     *           "color"=>"#173177"
     *       ),
     *       "keyword4"=> array(
     *          "value"=>xxxx,
     *          "color"=>"#173177"
     *       ),
     *       "remark"=> array(
     *           "value"=>xxxx,
     *           "color"=>"#173177"
     *       ),
     *   )
     * @param $topcolor   顶部标题颜色
     * @return mixed 
     */  
    public function sendTmpSms($toUser, $templateId, $data, $topColor='#FF0000'){
        $access_token = $this->getAccessToken();

        $template_msg = array('touser' => $toUser,'template_id' => $templateId, 'topcolor' => $topColor,'data' => $data);
        $post_data = json_encode($template_msg);
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $access_token; //模板信息请求地址

        //配置curl请求
        $ch = curl_init();  //创建curl请求
        curl_setopt($ch, CURLOPT_URL,$url); //设置发送数据的网址
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //设置有返回值，0，直接显示
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0); //禁用证书验证
        curl_setopt($ch, CURLOPT_POST, 1);//post方法请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);//post请求发送的数据包
        //接收执行返回的数据
        $data = curl_exec($ch);
        //关闭句柄
        curl_close($ch);
        $data = json_decode($data,true); //将json数据转成数组
        return $data;
    }

    private function __requestGet($url){
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        // curl_setopt($curl, CURLOPT_HEADER, 1);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);
        //显示获得的数据
        return $data;
    }

    private function __requestPost($url='',$post_data='',$header=[]){
        $ch = curl_init();  //创建curl请求
        curl_setopt($ch, CURLOPT_URL,$url); //设置发送数据的网址
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //设置有返回值，0，直接显示
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0); //禁用证书验证
        curl_setopt($ch, CURLOPT_POST, 1);//post方法请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);//post请求发送的数据包
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        //接收执行返回的数据
        $data = curl_exec($ch);
        //关闭句柄
        curl_close($ch);

        return $data;
    }
  
    /** 
     * 获取JS证明 
     * @param $accessToken 
     * @return mixed 
     */  
    public function _getJsapiTicket($accessToken)  
    {  
  
        // 获取缓存  
        $ticket = cache('jsapi_ticket');  
        // 缓存不存在-重新创建  
        if (empty($ticket)) {  
            // 获取js_ticket  
            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=" . $accessToken . "&type=jsapi";  
            // $jsTicket = file_get_contents($url);  
            $jsTicket = $this->__requestPost($url);
            $jsTicket = json_decode($jsTicket);  
            // 保存至缓存  
            $ticket = $jsTicket->ticket;  
            cache('jsapi_ticket', $ticket, 7000);  
        }  
        return $ticket;  
    }  
  
    /** 
     * 获取JS-SDK调用权限 
     */  
    public function shareAPi($url=''/*Request $request*/)  
    {  
        header("Access-Control-Allow-Origin:*");  
        // 获取accesstoken  
        $accessToken = $this->getAccessToken();  
        // 获取jsapi_ticket  
        $jsapiTicket = $this->_getJsapiTicket($accessToken);  
  
        // -------- 生成签名 --------  
        $wxConf = [  
            'jsapi_ticket' => $jsapiTicket,  
            'noncestr' => md5(time() . '!@#$%^&*()_+'),  
            'timestamp' => time(),  
            //'url' => $request->post('url'),  //这个就是你要自定义分享页面的Url啦
            'url' => $url
        ];
        // dump($jsapiTicket);die;
        $string1 = sprintf('jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s', $wxConf['jsapi_ticket'], $wxConf['noncestr'], $wxConf['timestamp'], $wxConf['url']);  
        // 计算签名
        $wxConf['signature'] = sha1($string1);  
        $wxConf['appid'] = $this->appid;

        return $wxConf;
        // return json($wxConf); 
    } 

    //小程序登陆
    public function wxLogin($code){
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=". $this->appid ."&secret=".$this->appsecret."&js_code=".$code."&grant_type=authorization_code";
            
        $weixin = $this->__requestPost($url);

        $weixin = json_decode($weixin, true);
        $loginFail = array_key_exists('errcode', $weixin);

        if ($loginFail || empty($weixin)) {
            $result = false;
        } else {
            $result = $weixin;
        }

        return $result;
    }

    //小程序二维码
    public function getwxAcodeunlimit($scene='', $page='', $width = '', $auto_color = '', $line_color = '', $is_hyaline = ''){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->appid}&secret={$this->appsecret}";  
        // $accessToken = file_get_contents($url);
        $accessToken = $this->__requestGet($url); 
        $accessToken = json_decode($accessToken,true);

        $access = $accessToken['access_token'];

        $qrcodeUrl = "https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token={$access}";

        $data = [
            'scene' => $scene,
            // 'page' => $page,
            // 'width' => $width,
            // 'auto_color' => $auto_color,
            // 'line_color' => $line_color,
            'is_hyaline' => true
        ];
        $data = json_encode($data);

        // $headers = array("Content-type: application/json;charset=UTF-8","Accept: application/json","Cache-Control: no-cache", "Pragma: no-cache");
        $qrcode = $this->api_notice_increment($qrcodeUrl,$data); 

        return $qrcode;
    }

    public function api_notice_increment($url, $data){
        $ch = curl_init();
        $header = ["Content-Type:application/json", "Accept-Charset: utf-8"];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        //     var_dump($tmpInfo);
        //    exit;
        if (curl_errno($ch)) {
          return false;
        } else {
          // var_dump($tmpInfo);
          return $tmpInfo;
        }
    }

    /** 
     * demo登录 
     */  
    public function login()
    {  
        $code = $_GET['code'];
    
        $access_token = $this->getUserAccessToken($code);

        if ($access_token['errcode']) {
            $result['err_code'] = 100;
            $result['msg'] = $access_token['errmsg'];

            $this->_response($result);
        }
        $userInfo = $this->getUserInfo($access_token);
        if ($userInfo['errcode']) {
            $result['err_code'] = 100;
            $result['msg'] = $userInfo['errmsg'];

            $this->_response($result);
        }
        
        $user = db('users')->where(['openid' => $userInfo['openid']])->find();
        
        if (!$user) {
            $insert_data['reg_time'] = time();
            $insert_data['sex'] = $userInfo['sex'];
            $insert_data['openid'] = $userInfo['openid'];
            $insert_data['avatar'] = $userInfo['headimgurl'];
            $insert_data['username'] = $userInfo['nickname'];
            
            $add = db('users')->insert($insert_data);
        }
        
        session_start();
        $info['userInfo'] = $userInfo;
        $info['sessionId'] = session_id();
        $authKey = user_md5($userInfo['openid'].$info['sessionId']);
        $info['authKey'] = $authKey;
        cache('Auth_'.$authKey, null);
        cache('Auth_'.$authKey, $info, 3600);
        // 返回信息
        $data['authKey']        = $authKey;
        $data['sessionId']      = $info['sessionId'];
        $data['userInfo']       = $userInfo;
        
        $result = array('err_code' => 0,'msg'=>'登录成功','data' => $data);
        $this->_response($result); 
    }  

    protected function _response($data) {
        exit(json_encode($data));
    }
}  