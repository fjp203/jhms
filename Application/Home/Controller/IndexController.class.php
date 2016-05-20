<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type:text/html;charset=utf-8");
class IndexController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $this->display();
    }
    
//     读取数据
    public function read(){
    	$zpjh = M("zpjh");
    	$data = $zpjh->select();
    	
    	
    	$total=$zpjh->count();
    	if ($total==0){
    		$json='{"total":'.$total.',"rows":[]}';
    		echo $json;
    	}else{
    		$json='{"total":'.$total.',"rows":'.json_encode($data).'}';//重要，easyui的标准数据格式，数据总数和数据内容在同一个json中
    		echo $json;
    	}
    	
    	
    }
    
//清空数据
    public function clear(){
    	$zpjh = M("zpjh");
    	$zpjh->where('1')->delete();
    }
    
    //导入数据
    public function  import(){
    	$targetFolder = '/jhms/Public/uploadtemp'; //上传的目标路径


   
    	if (!empty($_FILES)) {
    		$tempFile = $_FILES['file']['tmp_name'];
    		$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
    	
    		$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['file']['name'];
    		// Validate the file type
    		$fileTypes = array('xls'); // File extensions
    		$fileParts = pathinfo($_FILES['file']['name']);
    	
    		//查看文件的名字符串的编码方式
    		$encode = mb_detect_encoding($targetFile, array("UTF-8","GBK","ASCII","GB2312"));
    	
    		echo $tempFile.'<br>';
    		echo $targetFile.'<br>';
    		echo $encode.'<br>';
    	
    		if ($encode == "UTF-8"){
    			$targetFile = iconv("UTF-8","GBK",$targetFile);
    		}
    	
    	
    		if (in_array($fileParts['extension'],$fileTypes)) {
    			move_uploaded_file($tempFile,$targetFile);
    			echo md5($_FILES['file']['name']);
    			//导入
    			//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
    			import("Org.Util.PHPExcel");
    			import("Org.Util.PHPExcel.Writer.Excel5");
    			import("Org.Util.PHPExcel.IOFactory.php");
    			import("Org.Util.PHPExcel.Reader.Excel5");
    			
    			// 创建一个处理对象实例
    			$PHPExcel = new \PHPExcel();
    			
    			$PHPReader=new \PHPExcel_Reader_Excel5();
    			
    			//载入文件
    			
    			$PHPExcel=$PHPReader->load($targetFile);
    			
    			//获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
    			
    			$currentSheet=$PHPExcel->getSheet(0);
    			
    			//获取总列数
    			
    			$allColumn=$currentSheet->getHighestColumn();
    			
    			//获取总行数
    			
    			$allRow=$currentSheet->getHighestRow();
//     			$clu=array('A','B','C','D','E','F','G','L','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
    			//循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
    			$ColumnN= \PHPExcel_Cell::columnIndexFromString($allColumn)-2;
    			
    			$zpjh = M("zpjh");
    			$zpjh->where('1')->delete();
    			for($currentRow=5;$currentRow<=$allRow-6;$currentRow++){

    		
    				
    				for($currentColumn=0;$currentColumn<=$ColumnN;$currentColumn++){
    				
    					//数据坐标
    					$colum = \PHPExcel_Cell::stringFromColumnIndex($currentColumn);
    					
    					$address=$colum.$currentRow;
    					 
    					//读取到的数据，保存到数组$arr中
    					 
    					$arr[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
    					 
    				}
    			
    			}
    			
    			for($i=5;$i<count($arr)+5;$i++){
    			
    					$data['zpjh'] = $arr[$i][0];
$data['xh'] = $arr[$i][1];
$data['sjjhh'] = $arr[$i][2];
$data['wlbm'] = $arr[$i][3];
$data['sl'] = $arr[$i][4];
$data['lshqj'] = $arr[$i][5];
$data['xxh'] = $arr[$i][6];
$data['ddh'] = $arr[$i][7];
$data['csh'] = $arr[$i][8];
$data['cjh'] = $arr[$i][9];
$data['jhms'] = $arr[$i][10];
$data['zpdd'] = $arr[$i][11];
$data['nsdd'] = $arr[$i][12];
$data['zprq'] = $arr[$i][13];
$data['rkrq'] = $arr[$i][14];
$data['rwh'] = $arr[$i][15];
$data['htxh'] = $arr[$i][16];
$data['cl'] = $arr[$i][17];
$data['ys'] = $arr[$i][18];
$data['tsc'] = $arr[$i][19];
$data['zdjj'] = $arr[$i][20];
$data['bjbbh'] = $arr[$i][21];
$data['sjbbh'] = $arr[$i][22];
$data['fjzt'] = $arr[$i][23];
$data['cjrq'] = $arr[$i][24];
$data['fbrq'] = $arr[$i][25];
$data['fbr'] = $arr[$i][26];
$data['tznr'] = $arr[$i][27];
$data['sjbz'] = $arr[$i][28];
$data['bz'] = $arr[$i][29];
$data['xdxyzt'] = $arr[$i][30];

    		$zpjh->add($data);
    					
    			}
    		 // 实例化User对象
    			
    			
//     			dump($arr);
    			
//     			dump($allColumn);
//     			echo($ColumnN);
//     			echo(count($arr));
    	
    		} else {
    			echo '您好，文件类型不允许！';
    		}
    	}
    }
    //公告更新
    public function ggUpdate(){
    	$zclist = M("zclist");
     	$num=count($zclist->select());
    
     	//判断是否有数据，有则检查更新，没有直接写入
     	if($num>0){

     		$will=allZc();
$taridData=i_array_column($zclist->select(), 'tarid');
$taridWill=i_array_column($will, 'tarid');
    	
$result=array_udiff($taridData,$taridWill,"myfunction"); //多出的  	
$result1=array_udiff($taridWill,$taridData,"myfunction");//要添加的



    		if($taridWill==$taridData){
    			echo "一样";
    		}else{
    			echo "不一样";
    			if($result){
    				//删除多余
    				foreach ($result as $val){
    					$map['tarid'] = $val;
    					$re=$zclist->where($map)->delete();
//     					if($re){
//     						echo "删除".$val;
//     					}
    				}
    			}
    			
    			if($result1){
    				foreach ($result1 as $key => $val){
    					
    					$data=$will[$key];
//     					var_dump($data);
    					$re=$zclist->data($data)->add();
//     					if($re){
//     						echo "添加".$val;
//     					}
    				}
    			}
    		}
    	}else{
    		
     		$zclist->addAll($will);
     	}
    	//var_dump(allZc());
    	
    }
    public function gginfo(){
    	
    	
    	$ch = curl_init();
    	
    	$post_fields="password=6988753&loginname=sq0107&returnurl=www.autoinfo.org.cn%2Fapp%2Fxcpgg%2Fxcp_index.jsp&chkRememberMe=on&hostid=00-19-DB-FD-BF-17%2C&flg_login=Y&jhostid=00-19-DB-FD-BF-17%2C";
    	
//     	$cookie_file="ASPSESSIONIDQSCBCBRR=PJGAHPEDLJEKNPOOCPICNDEM; ASPSESSIONIDAQDCABTT=IOLFPAFDNPMMLNDJEDHBEPKE; clcp%5Flist=500328%7C460033%7C494065%7C500817%7C506458%7C198214%7C481174%7C; AJSTAT_ok_pages=18; AJSTAT_ok_times=3; a0402_pages=18; a0402_times=3; Hm_lvt_6c1a81e7deb77ce536977738372f872a=1463465650,1463714342,1463726689; Hm_lpvt_6c1a81e7deb77ce536977738372f872a=1463726726";
     	$url = "http://www.chinacar.com.cn/ggcx_new/search_param.asp";
     	curl_setopt($ch, CURLOPT_POST,1);
    	curl_setopt($ch, CURLOPT_HEADER,0);
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//1不直接打印，0直接打印
    	
    	curl_setopt($ch, CURLOPT_HTTPHEADER,array("application/x-www-form-urlencoded;
     			charset=utf-8","Content-length: ".strlen($post_fields)));
//     	curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie_file);
    	$data=curl_exec($ch);//执行
    	
    	curl_close($ch);
    	
    	var_dump($data);
    }
}