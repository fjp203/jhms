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