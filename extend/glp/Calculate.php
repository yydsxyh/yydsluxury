<?php
namespace glp;

class Calculate
{  
   
    public function __construct(){
        
    }

    // 阶乘
	public function factorial($n) {
		return array_product(range(1, $n));
	}
	 
	// 排列数
	public function A($n, $m) {
		return factorial($n)/factorial($n-$m);
	}
	 
	// 组合数
	public function C($n, $m) {
		return A($n, $m)/factorial($m);
	}
	 
	// 排列
	public function arrangement($a, $m) {
		$r = array();
	 
		$n = count($a);
		if ($m <= 0 || $m > $n) {
			return $r;
		}
	 
		for ($i=0; $i<$n; $i++) {
			$b = $a;
			$t = array_splice($b, $i, 1);
			if ($m == 1) {
				$r[] = $t;
			} else {
				$c = arrangement($b, $m-1);
				foreach ($c as $v) {
					$r[] = array_merge($t, $v);
				}
			}
		}
	 
		return $r;
	}
	 
	// 组合
	public function combination($a, $m) {
		$r = array();
	 
		$n = count($a);
		if ($m <= 0 || $m > $n) {
			return $r;
		}
	 
		for ($i=0; $i<$n; $i++) {
			$t = array($a[$i]);
			if ($m == 1) {
				$r[] = $t;
			} else {
				$b = array_slice($a, $i+1);
				$c = combination($b, $m-1);
				foreach ($c as $v) {
					$r[] = array_merge($t, $v);
				}
			}
		}
	 
		return $r;
	}

	/**
	 * 获取多个数组的组合
	 * @list  二维数组$list [] = array (1,2,3); 
	 * return  array
	 */
	public function arrayCombination($list=[]){
		$list = array_values($list);
		$this->GetForeach($list);
	}

 	/** 
	  *  拦截器
	  * @param $name 成员属性名称
	  * @return 成员属性
 	*/ 
 	public function __get($name){

		if(!empty($this->$name)){
			return $this->$name;
		}
	}

	/**
	 * 调用getSulie完成组合
	 * @param type $list
	 */
	private function GetForeach($list){
		foreach($list[0] as $v){
			$this->getSulie($list,$v,1); 
		} 
	}
	/**
	 * 实现组合
	 * @param type $list
	 * @param type $content
	 * @param type $deep
	 * @return type
	 */
	private function getSulie($list,$content,$deep){
		$i=0;
		if($deep>count($list)){
			return;
		}
		foreach($list as $k=>$v){
			if($i==$deep){
				foreach($list[$k] as $vv){
					$vv = $content.$vv;
					if($deep==count($list)-1){
						$this->Combination[]=$vv;
					}else {
						$this->getSulie($list,$vv,$deep+1);
					}
				}
				break;
			}
			$i++;
		}
		return $this->Combination;
	}

	/*
	 * 字符分隔
	 * @param $str
	 * @param $split_length
	 * @param $charset
	 * @return array
	 */
	public function mb_str_split($str,$split_length=1,$charset="UTF-8"){
	  	if(func_num_args()==1){
	    	return preg_split('/(?<!^)(?!$)/u', $str);
	  	}
	  	if($split_length<1)return false;
	  	$len = mb_strlen($str, $charset);
	  	$arr = array();
	  	for($i=0;$i<$len;$i+=$split_length){
	    	$s = mb_substr($str, $i, $split_length, $charset);
	    	$arr[] = $s;
	  	}
	  	return $arr;
	}

	/**
	 * 浏览器友好的变量输出
	 * @param mixed $var 变量
	 * @param boolean $echo 是否输出 默认为True 如果为false 则返回输出字符串
	 * @param string $label 标签 默认为空
	 * @param boolean $strict 是否严谨 默认为true
	 * @return void|string
	 */
	public function dump($var, $echo=true, $label=null, $strict=true) {
	    $label = ($label === null) ? '' : rtrim($label) . ' ';
	    if (!$strict) {
	        if (ini_get('html_errors')) {
	            $output = print_r($var, true);
	            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
	        } else {
	            $output = $label . print_r($var, true);
	        }
	    } else {
	        ob_start();
	        var_dump($var);
	        $output = ob_get_clean();
	        if (!extension_loaded('xdebug')) {
	            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
	            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
	        }
	    }
	    if ($echo) {
	        echo($output);
	        return null;
	    }else
	        return $output;
	}
}