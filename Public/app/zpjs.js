var clumnDg=[[{
        field: 'id',
        checkbox: true
    }, {
        field: 'zpjh',
        title: '本级计划号',
        width: 90
    }, {
        field: 'xh',
        title: '序号',
        width: 44
    }, {
        field: 'sjjhh',
        title: '上级计划号',
        width: 72
    }, {
        field: 'wlbm',
        title: '物料编码',
        width: 100,
        align: 'left'
    }, {
        field: 'sl',
        title: '数量',
        width: 50,
        align: 'left'
    }, {
        field: 'lshqj',
        title: '流水号区间',
        width: 66,
        align: 'left'
    }, {
        field: 'xxh',
        title: '线序号',
        width: 50
    }, {
        field: 'ddh',
        title: '订单号',
        width: 100
    }, {
        field: 'csh',
        title: '车身号',
        width: 100
    }, {
        field: 'cjh',
        title: '车架号',
        width: 90
    }, {
        field: 'jhms',
        title: '车型及配置',
        width: 500
    }, {
        field: 'zpdd',
        title: '装配地点',
        width: 50
    }, {
        field: 'nsdd',
        title: '内饰装配地点',
        width: 50
    }, {
        field: 'zprq',
        title: '装配日期',
        width: 80
    }, {
        field: 'rkrq',
        title: '入库日期',
        width: 80
    }, {
        field: 'rwh',
        title: '任务号',
        width: 100
    }, {
        field: 'htxh',
        title: '合同小号',
        width: 80
    }, {
        field: 'cl',
        title: '车类',
        width: 70
    }, {
        field: 'ys',
        title: '颜色',
        width: 100
    }, {
        field: 'tsc',
        title: '特殊车',
        width: 50
    }, {
        field: 'zdjj',
        title: '重点计划',
        width: 50
    }, {
        field: 'bjbbh',
        title: '本级版本号',
        width: 50
    }, {
        field: 'sjbbh',
        title: '上级版本号',
        width: 50
    }, {
        field: 'fjzt',
        title: '附件状态',
        width: 50
    }, {
        field: 'cjrq',
        title: '创建日期',
        width: 80
    }, {
        field: 'fbrq',
        title: '发布日期',
        width: 80
    }, {
        field: 'fbr',
        title: '发布人',
        width: 80
    }, {
        field: 'tznr',
        title: '调整内容',
        width: 200
    }, {
        field: 'sjbz',
        title: '上级备注',
        width: 100
    }, {
        field: 'bz',
        title: '备注',
        width: 100
    }, {
        field: 'xdxyzt',
        title: '修订协议控制状态',
        width: 100
    }]];

$('#dg').datagrid({
    url: 'Home/Index/read',
    toolbar: '#tool',
    pagination: true,
    fit: true,
    width: function(){
        return document.body.clientWidth * 0.9
    },
    nowrap: true,
    collapsible: true,
    fitColumns: false,
    autoRowHeight: false,
    striped: true,//交替行
    singleSelect: true,//只允许选择一行
    rownumbers: true,
    border: false,
    sortName: 'id',
    sortOrder: 'asc',//倒序排列
    remoteSort: false,
    pageSize: 50,
    method: "post",
    pageList: [10, 15, 20, 40, 50, 100, 200],
    columns: clumnDg
});
$('#info').datagrid({
    url: '',
    pagination: false,
    fit: true,
    width: function(){
        return document.body.clientWidth * 1
    },
    nowrap: false,
		autoRowHeight: true,
		striped: true,
		collapsible: true,
		fitColumns: true,
    singleSelect: true,//只允许选择一行
    rownumbers: true,
    border: false,

    remoteSort: false,
    pageSize: 50,
    method: "post",
    pageList: [10, 15, 20, 40, 50, 100, 200],
    columns: [[ {
        field: 'name',
        title: '名称',
        width: 130
    }, {
        field: 'value',
        title: '值',
		width: 330
    }]]
});
var clumnjscsDg=[[{
        field: 'id',
        checkbox: true
    }, {
        field: 'cx',
        title: '车型型号',
        width: 150
    }, {
        field: 'zzl',
        title: '总质量',
        width: 100
    }, {
        field: 'edzzl',
        title: '额定载质量',
        width: 100
    }, {
        field: 'zbzl',
        title: '整备质量',
        width: 100,
        align: 'left'
    }, {
        field: 'ztgzl',
        title: '准拖挂质量',
        width: 100,
        align: 'left'
    }, {
        field: 'bgzl',
        title: '半挂车鞍座最大允许质量',
        width: 100,
        align: 'left'
    }, {
        field: 'fdjxh',
        title: '发动机型号',
        width: 100
    }, {
        field: 'fdjgl',
        title: '发动机功率',
        width: 100
    }, {
        field: 'fdjpl',
        title: '发动机排量',
        width: 100
    }, {
        field: 'qdxs',
        title: '驱动形式',
        width: 80
    }, {
        field: 'lsh',
        title: '流水号',
        width: 150
    }, {
        field: 'ts',
        title: '特殊提示',
        width: 150
    }]];

$('#jscsDg').datagrid({
    url: '',
    toolbar: '#tooljscs',
    pagination: true,
    fit: true,
    width: function(){
        return document.body.clientWidth * 0.9
    },
    nowrap: false,
    collapsible: true,
    fitColumns: true,
    autoRowHeight: true,
    striped: true,//交替行
    singleSelect: true,//只允许选择一行
    rownumbers: true,
    border: false,
    sortName: 'lsh',
    sortOrder: 'asc',//倒序排列
    remoteSort: false,
    pageSize: 50,
    method: "post",
    pageList: [10, 15, 20, 40, 50, 100, 200],
    columns: clumnjscsDg



});
//			导入窗口
function show_add(){
    $('#add').window('open');
}

//上传

$('#url').Huploadify({
    auto: true,//是否开启自动上传
    fileTypeExts: '*.xls',
    multi: false,//是否允许选择多个文件
    //formData:{key:123456,key2:'vvvv'},
    fileSizeLimit: 21024,//允许上传的文件大小，单位KB
    showUploadedPercent: true,//是否实时显示上传的百分比，如20%
    showUploadedSize: true,//是否实时显示已上传的文件大小，如1M/2M
    removeTimeout: 1000,//上传完成后进度条的消失时间，单位毫秒
    uploader: 'Home/Index/import',//文件提交的地址
    buttonText: '上传装配计划',//上传按钮上的文字
    onUploadStart: function(file){
        console.log(file.name + '开始上传');
    },
    onInit: function(obj){
        console.log('初始化');
        console.log(obj);
    },
    onUploadComplete: function(fileObj){
        fileN = fileObj.name;
        fileSize = fileObj.size;
        fileType = fileObj.type;
        document.getElementById("urltext").value = fileN;
        //          document.getElementById("name").value = fileN;
        //          $("#name")[0].focus();
        console.log(fileObj.name + '上传完成');
        reload();
        $('#add').window('close');
    }
    
});

//清空数据
function clearA(){
    $.messager.confirm('确认', '您确定要清空数据吗?', function(r){
        if (r) {
            $.post('Home/Index/clear', function(data){
                $("#dg").datagrid("reload");
                $('#jscsDg').datagrid('loadData', []);//清空结果datagrid
            }, 'text');
        }
    });
    
};
//刷新数据
function reload(){
    $('#dg').datagrid('reload', {
        id: ''
    });
};
//计算
function cal(){
	
    var data = $('#dg').datagrid("getData");

    var xxData = {
        total: data.total,
        rows: []
    };
    var cxReg = new RegExp('SX[0-9A-Z]{4,18}', 'g');//	  车型正则
    var fdjReg = new RegExp('W[PD][0-9]{1,3}.[0-9A-Z]{2,8}', 'g');//发动机型号正则
    var zbzlReg = new RegExp('整备质量[^/]*');//整备质量正则
    var zbzlReg2 = new RegExp('[1-9][0-9]{3,4}');
    var ztReg = new RegExp('准牵引质量[^/]*');//准牵引质量正则
    var ztReg2 = new RegExp('[1-9][0-9]{4,5}');
    var bgReg = new RegExp('半挂[^/]*|最大[^/]*|承载[^/]*');//半挂车鞍座最大允许承载质量
    var bgReg2 = new RegExp('[1-9][0-9]{4,5}');
    var zcReg = new RegExp('准乘人数[^/]*');//准乘人数
    var zcReg2 = new RegExp('[1-3]{1}');
    
    var tsReg = new RegExp('出具[^/]*合格证');//整车二类
    var tsReg2 = new RegExp('二类|整车');
	

//var qdReg=new RegExp('[0-9]{3,4}','g');
//	var qdReg1=new RegExp('[0-9]{3,4}','g');
    //质量正则函数
    function zlReg(e, reg1, reg2){
        var fStr = reg1.exec(e.jhms);
        var lStr = (fStr != null) ? reg2.exec(fStr.pop()) : null;
        return (lStr != null) ? lStr.pop() : '';
        
    }
    
    //整车二类
    function zcel(e){
        if (e.sjjhh.search('军') > 0) {
            return (jfl(e.wlbm.substr(11, 1)))
        }
        else {
            return zlReg(e, tsReg, tsReg2)
        }
        
    }

    data.rows.forEach(function(e){
        var fdjxh = e.jhms.match(fdjReg);
var qd="";

qd=e.wlbm.substr(5,e.wlbm.length-12).match('[0-9]{2,3}[A-Z]*');
		if(qd!=null){
			qd=driver(qd.pop().substr(2,1));
		}else{
			qd='';
		}
		var fl=(zcel(e)=='二类') ? '二类':'';
        var a = {
            cx: e.jhms.match(cxReg).pop() +  fl,
            zbzl: zlReg(e, zbzlReg, zbzlReg2),
            ztgzl: zlReg(e, ztReg, ztReg2),
            bgzl: zlReg(e, bgReg, bgReg2),
            lsh: e.lshqj,
            wlbm: e.wlbm,
            zcrs: zlReg(e, zcReg, zcReg2),
            fdjxh: (fdjxh != null) ? fdjxh.pop() : '',
			qdxs: qd,
            //			ts: zlReg(e, tsReg, tsReg2),
            ts: zcel(e)
        };
        
        
        xxData.rows.push(a);
    })
   console.log(xxData);
    $('#jscsDg').datagrid('loadData', xxData);
    
    
}

$("#jscsDg").datagrid({
    onClickRow: function(index, row){ //easyui封装好的时间（被单机行的索引，被单击行的值）
        $('#dg').datagrid('selectRow', index);
    }
});
$("#dg").datagrid({
    onClickRow: function(index, row){ //easyui封装好的时间（被单机行的索引，被单击行的值）
        $('#jscsDg').datagrid('selectRow', index);
//		在右侧垂直显示数据
		var row =$("#dg").datagrid('getSelected');
		var arr = [];
		var arr1 = [];
		
		 var infoData = {
        total: arr.length-1,
        rows: []
    };
for(i in row){
arr.push(row[i]);
}

console.log(clumnDg[0]);
for(q in clumnDg[0]){
	arr1.push(clumnDg[0][q].title);
}

for(var e=1;e<=arr.length;e++){
	var obj={name:arr1[e],value:arr[e]};
infoData.rows.push(obj);

}

$('#info').datagrid('loadData', infoData);
$('#cc').layout('expand','east');
    }
});
$("#dg").datagrid({
    onDblClickCell: function(index, field, value){
        if (field == "jhms") {
            $.messager.alert('计划描述', value);                      
        }
    }   
});
//军车整车二类判断
function jfl(str){
    var flCode = [{
        zm: '1',
        fl: '整车'
    }, {
        zm: '2',
        fl: '二类'
    }, {
        zm: 'A',
        fl: '整车'
    }, {
        zm: 'B',
        fl: '二类'
    }, {
        zm: 'C',
        fl: '整车'
    }, {
        zm: 'D',
        fl: '二类'
    }, {
        zm: 'E',
        fl: '整车'
    }, {
        zm: 'F',
        fl: '二类'
    }, {
        zm: 'G',
        fl: '整车'
    }, {
        zm: 'H',
        fl: '二类'
    }, ];
    var arr = $.grep(flCode, function(n, i){
        return n.zm == str
    });
return arr[0].fl;
};

//驱动形式
function driver(str){
    var driverCode = [{
        c: '1',
        d: '4×2'
    },
	{
        c: '2',
        d: '4×4'
    },
	{
        c: '3',
        d: '6×2'
    },
	{
        c: '4',
        d: '6×4'
    },
	{
        c: '5',
        d: '6×6'
    },
	{
        c: '6',
        d: '8×4'
    },
	{
        c: '7',
        d: '8×8'
    },
	{
        c: '8',
        d: '10×10'
    },
	{
        c: '9',
        d: '6×2'
    },
	{
        c: 'A',
        d: '8×6'
    },
	{
        c: 'B',
        d: '8×2'
    },
	{
        c: 'C',
        d: '10×4'
    },
	{
        c: 'D',
        d: '10×6'
    },
	{
        c: 'E',
        d: '10×8'
    },
	{
        c: 'F',
        d: '12×12'
    },
	{
        c: 'G',
        d: '12×4'
    },
	{
        c: 'H',
        d: '12×6'
    },
	{
        c: 'J',
        d: '12×8'
    },
	{
        c: 'K',
        d: '12×10'
    }];
    var arr = $.grep(driverCode, function(n, i){
        return n.c == str
    });
return arr[0].d;
};


