<?php
//
//解析
//
function filterTxt($reg,$content){
	$result = preg_match_all($reg,$content,$match_result);
	if($result){
		return $match_result[0];
	}
}


function getInfo($id){
	$url = "http://www.chinacar.com.cn/ggcx_new/search_param.asp?id=".$id;
	$ch = curl_init();
	$cookie_file="ASPSESSIONIDCCTCBDRR=KACPGODDCFKJIGNPGJLDJADL; ASPSESSIONIDAQAAADSS=NAGIBMDDKJNOKDAANBHLEPPD; ASPSESSIONIDQSCBCBRR=NDBMGPEDDFHAOAAPAMINOLBP; AJSTAT_ok_pages=3; AJSTAT_ok_times=3; a0402_pages=3; a0402_times=3; Hm_lvt_6c1a81e7deb77ce536977738372f872a=1463465650,1463714342; Hm_lpvt_6c1a81e7deb77ce536977738372f872a=1463722339; clcp%5Flist=494065%7C500817%7C506458%7C198214%7C481174%7C";
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//1不直接打印，0直接打印

	curl_setopt($ch, CURLOPT_HTTPHEADER,array("application/x-www-form-urlencoded;
     			charset=utf-8","Content-length: ".strlen($post_fields)));
	
	curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie_file);
	$data=curl_exec($ch);//执行
	
	curl_close($ch);
	return $data;	
}

//
//获得整车公告列表数据
//
function allZc(){
	set_time_limit(0);
// 	$zclist = M("zclist");
	$page=1;
	$start=0;
	$limit=400;
	$post_fields="s0=&s1=%25u9655%25u6C7D%25u724C&s2=&s3=&s4=&s5=&s6=&s7=&s8=&s9=&s10=&s11=&s12=&s13=&s14=&s15=&s16=&s17=&s18=&s20=0&s28=0&s29=0&s_1=&ss_1=1&s_2=&ss_2=1&s_3=&ss_3=1&s_4=&ss_4=1&s_5=&ss_5=1&s_6=&ss_6=1&s_7=&ss_7=1&s_8=&ss_8=1&s_9=&ss_9=1&page=1&start=0&limit=400";
	 
	$url = "http://www.chinacar.com.cn/ggcx_new/search_json.asp?_dc=".time();
	 
	 
	
	 
	$ch = curl_init();
	 
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//1不直接打印，0直接打印
	curl_setopt($ch, CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$post_fields);
	curl_setopt($ch, CURLOPT_HTTPHEADER,array("application/x-www-form-urlencoded;
     			charset=utf-8","Content-length: ".strlen($post_fields)));
	$data1=curl_exec($ch);//执行
	
	curl_close($ch);
	 
	
	
	
	
	$total=filterTxt('/\d+/', $data1);
	$total=$total[0];
	
	// echo $total;
	if($total>400){
	
		for($i=1;$i<$total/$limit;$i++){
			//echo  $total/$limit;
			$page=$page+1;
			$start=$start+400;
			$outTxt="";
	
	
			$post_fields="s0=&s1=%25u9655%25u6C7D%25u724C&s2=&s3=&s4=&s5=&s6=&s7=&s8=&s9=&s10=&s11=&s12=&s13=&s14=&s15=&s16=&s17=&s18=&s20=0&s28=0&s29=0&s_1=&ss_1=1&s_2=&ss_2=1&s_3=&ss_3=1&s_4=&ss_4=1&s_5=&ss_5=1&s_6=&ss_6=1&s_7=&ss_7=1&s_8=&ss_8=1&s_9=&ss_9=1&page=".$page."&start=".$start."&limit=400";
	
			// 		$post_fields="&s18=&s20=0&s28=0&s29=0&s_1=&ss_1=1&s_2=&ss_2=1&s_3=&ss_3=1&s_4=&ss_4=1&s_5=&ss_5=1&s_6=&ss_6=1&s_7=&ss_7=1&s_8=&ss_8=1&s_9=&ss_9=1&page=2&start=400&limit=400";
				
			$url = "http://www.chinacar.com.cn/ggcx_new/search_json.asp?_dc=".time();
				
				
	
				
			$ch = curl_init();
				
			curl_setopt($ch, CURLOPT_HEADER,0);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//1不直接打印，0直接打印
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$post_fields);
			curl_setopt($ch, CURLOPT_HTTPHEADER,array("application/x-www-form-urlencoded;
     			charset=utf-8","Content-length: ".strlen($post_fields)));
			$outTxt=$outTxt.curl_exec($ch);//执行
	
			curl_close($ch);
		}
	}
	$data1=$data1.$outTxt;
	$data1=preg_replace("/[<>]/","",$data1);
	//]}{"success":true,"totalCount":"669","topics":[
	$preg="/]}{\"success\":true,\"totalCount\":\"669\",\"topics\":\[/";
	$data1=preg_replace($preg,",",$data1);
	$data1=preg_replace("/,]}/","]}",$data1);
	
	
	
	
	
	// 数据格式化
	
	
	$data1=str_replace("img src='", "", $data1);
	$data1=str_replace("' width='82px' height='62px' onMouseOver=toolTip('http://img.chinacar.com.cn/clcppic/", '', $data1);
	
	$data1=preg_replace("/[\w\d]+.jpg'\)\sonMouseOut=\'toolTip\(\)\'\//","jpg",$data1);
	
	
	
	
	$data1=iconv('gbk', 'utf-8', $data1);
	$data1=json_decode($data1,true);
	
// 	var_dump($data1);
	
// 	$data=$data1['topics'];
// 	if($data=$zclist->select()){
// 		echo "一样";
// 	}else{
// 		echo "不一样";
// 	}
// 	$zclist->addAll($data);
return $data1['topics'];
}

//相当于 array_column()
function i_array_column($input, $columnKey, $indexKey=null){
	if(!function_exists('array_column')){
		$columnKeyIsNumber  = (is_numeric($columnKey))?true:false;
		$indexKeyIsNull            = (is_null($indexKey))?true :false;
		$indexKeyIsNumber     = (is_numeric($indexKey))?true:false;
		$result                         = array();
		foreach((array)$input as $key=>$row){
			if($columnKeyIsNumber){
				$tmp= array_slice($row, $columnKey, 1);
				$tmp= (is_array($tmp) && !empty($tmp))?current($tmp):null;
			}else{
				$tmp= isset($row[$columnKey])?$row[$columnKey]:null;
			}
			if(!$indexKeyIsNull){
				if($indexKeyIsNumber){
					$key = array_slice($row, $indexKey, 1);
					$key = (is_array($key) && !empty($key))?current($key):null;
					$key = is_null($key)?0:$key;
				}else{
					$key = isset($row[$indexKey])?$row[$indexKey]:0;
				}
			}
			$result[$key] = $tmp;
		}
		return $result;
	}else{
		return array_column($input, $columnKey, $indexKey);
	}
}

function myfunction($a,$b)
{
	if ($a===$b)
	{
		return 0;
	}
	return ($a>$b)?1:-1;
}

function getPar($id){

	$id="NTAwMzMx";
	$cookie="ASPSESSIONIDCAQDCBTR=OFDHBOFDPNNBHHFKJNELEJHK; ASPSESSIONIDSQABCDTQ=JNLOLGGDPFJPCEDELHGIKKAD; AJSTAT_ok_pages=32; AJSTAT_ok_times=3; a0402_pages=32; a0402_times=3; Hm_lvt_6c1a81e7deb77ce536977738372f872a=1463465650,1463714342,1463726689,1463735392; Hm_lpvt_6c1a81e7deb77ce536977738372f872a=1463735415; clcp%5Flist=500331%7C500483%7C500328%7C460033%7C494065%7C500817%7C506458%7C198214%7C481174%7C";
	 
	 
	$headers['Accept'] = 'text/html';
	$headers['Accept-Encoding'] = 'gzip, deflate, sdch';
	$headers['Accept-Language'] = 'zh-CN,zh;q=0.8';
	$headers['Connection'] = 'keep-alive';
	$headers['Host'] = 'www.chinacar.com.cn';
	$headers['Referer'] = 'http://www.chinacar.com.cn/ggcx_new/search_view.asp?id='.$id;
	$headers['User-Agent'] = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36';
	$headers['X-Requested-With'] = 'XMLHttpRequest';
	$headers['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
	
	$headerArr = array();
	foreach( $headers as $n => $v ) {
		$headerArr[] = $n .':' . $v;
	}
	$ch = curl_init();
	$url = "http://www.chinacar.com.cn/ggcx_new/search_param.asp?id=".$id;
	curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie);
	curl_setopt ($ch, CURLOPT_HTTPHEADER , $headerArr );  //构造IP
	curl_setopt($ch, CURLOPT_HTTPHEADER,1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//1不直接打印，0直接打印
	
	 
	$data=curl_exec($ch);//执行
	$data=iconv('gbk', 'utf-8', $data);
	curl_close($ch);
	 
	return $data;
	
}
