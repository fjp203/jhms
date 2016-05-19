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
     	$arr=array();
     	if($num>0){
    		//对比更新
//     		var_dump($zclist->field('tarid')->select());
$a=allZc();
$b=$zclist->field('tarid')->select();
    		for($i=0;$i<count($a);$i++){
    			$arr[$i]['tarid']=$b[$i]['tarid'];
    		}
    		var_dump($arr);
    		echo "\n";
    	
    		if($a==$b){
    			echo "一样";
    		}else{
    			echo "一样1";
    		}
    	}else{
    		
     		$zclist->addAll(allZc());
     	}
    	//var_dump(allZc());
    	
    }
 
}