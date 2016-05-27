<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=">
		
		
      <!--   <link rel="stylesheet" href="/jhms/Public/jquery-easyui-1.3.3/themes/default/easyui.css" />
        <link rel="stylesheet" href="/jhms/Public/jquery-easyui-1.3.3/themes/icon.css" />
        <link rel="stylesheet" href="/jhms/Public/jquery-easyui-1.3.3/themes/icons/icon-all.css" />
         -->
		<link rel="stylesheet" href="/jhms/Public/jquery-easyui-1.4.4/themes/default/easyui.css" />
		<link rel="stylesheet" href="/jhms/Public/jquery-easyui-1.4.4/themes/icon.css" />
        <link rel="stylesheet" href="/jhms/Public/jquery-easyui-1.4.4/themes/icons/icon-all.css" />
		
		<link rel="stylesheet" href="/jhms/Public/Huploadify-master/Huploadify.css" />
        <link rel="stylesheet" href="/jhms/Public/css/mystyle.css" />
        <title>计划描述转车辆信息</title>
    </head>
    <body id="cc" class="easyui-layout">
        <!--  <div data-options="region:'north',title:'工具栏',split:true" style="height:100px;">
        </div> --><!-- <div data-options="region:'west',title:'分析',split:true" style="width:100px;"></div> -->
        <div data-options="region:'center',title:'装配计划'" style="padding:0px;background:#eee;">
            <!-- 工具栏 -->
            <div id="tool" class="myTool">
                <table>
                    <tr>
                        <td>
                        <a href="#" id= "aaa1" class="easyui-linkbutton" onclick='show_add()' data-options="iconCls:'icon-standard-folder-page',plain:true">导入</a>
                       
                        <a href="#" class="easyui-linkbutton" onclick='cal()' data-options="iconCls:'icon-standard-application-edit',plain:true">计算</a>
<!-- 						 <a href="#" class="easyui-linkbutton" onclick='jfl1("A")' data-options="iconCls:'icon-standard-application-edit',plain:true">计算</a>
                        -->
						</td>
						  <td>
                            <div class="datagrid-btn-separator">
                            </div>
							 <a href="#" class="easyui-linkbutton" onclick='clearA()' data-options="iconCls:'icon-standard-page-white-delete',plain:true">清空</a>
                        </td>
						<!--
                        <td>
                            <a href="#" class="easyui-linkbutton" onclick="excel()" data-options="iconCls:'icon-standard-page-white-excel',plain:true">导出</a>
                            <a href="#" class="easyui-linkbutton" onclick="view()" data-options="iconCls:'icon-standard-application-view-gallery',plain:true">查看</a>
                        </td> -->
                        <td>
                            <div class="datagrid-btn-separator">
                            </div>
                        </td>
                        <td>
                            <a href="#" class="easyui-linkbutton" onclick="reload()" data-options="iconCls:'icon-standard-arrow-refresh',plain:true">刷新</a>
                        </td>
                        <td>
                            <div class="datagrid-btn-separator">
                            </div>
                        </td>
                        <td>
                            <div style="float:right;">
                                <input id='searchbox' class="easyui-searchbox" data-options="" style="width:300px;">
                                </input>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <table id="dg">
            </table>
        </div>
        <div data-options="hideCollapsedContent:false,region:'south',title:'技术参数',split:true" style="height:400px;">
            <table id="jscsDg">
            </table>
        </div>
        <div data-options="hideCollapsedContent:false,region:'east',iconCls:'icon-reload',title:'辅助信息',split:true, collapsed:true" style="width:400px;">
        	<div id="tt" class="easyui-tabs" data-options="fit:true,border:false">  
    <div title="装配计划查看" style="padding:0px;">  
	<!-- 数据退职显示 -->
<table id="info"> 
</table>  
    </div>  
    <div title="公告信息" data-options="closable:false" style="overflow:auto;padding:0px;">  
    
          <div>
                
                        <a href="#" id= "aaa1" class="easyui-linkbutton" onclick='updateGG()' data-options="iconCls:'icon-standard-folder-page',plain:true">手动更新</a>
                       
                        
                       
            </div>
    
    
    <span>
        整车：669，二类384，更新日期：2016年5月27日
    </span>   
    </div>  
    <div title="Tab3" data-options="iconCls:'icon-reload',closable:true" style="padding:20px;display:none;">  
        tab3   
    </div>  
</div> 
		</div>
        <!-- 上传窗口 -->
        <div id="add" class="easyui-dialog" style="width: 728px; height: 130px; padding: 0px; overflow: hidden;" title="&nbsp;&nbsp;导入装配计划" data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg-add',closed:true,resizable:false,modal:true,closable:true">
            <div id="url">
            </div>
            <input type="hidden" name="urltext" class="form-control" id='urltext' value=""/>
        </div>
        <div id="dlg-add">
            <div class="tool_tip">
                	选择文件后系统会自动上传！！
            </div>
            <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#add').dialog('close')">取消</a>
        </div>
       <!--  <script src="/jhms/Public/jquery-easyui-1.3.3/jquery.min.js">
        </script>
        <script src="/jhms/Public/jquery-easyui-1.3.3/jquery.easyui.min.js">     
        </script>
        <script src="/jhms/Public/jquery-easyui-1.3.3/locale/easyui-lang-zh_CN.js">
        </script> -->
		  <script src="/jhms/Public/jquery-easyui-1.4.4/jquery.min.js">
        </script>
        <script src="/jhms/Public/jquery-easyui-1.4.4/jquery.easyui.min.js">     
        </script>
        <script src="/jhms/Public/jquery-easyui-1.4.4/locale/easyui-lang-zh_CN.js">
        </script>
		
		
		<!-- jquery-easyui-1.4.4 -->
        <script src="/jhms/Public/Huploadify-master/jquery.Huploadify.js">
        </script>
		<script src="/jhms/Public/app/angular.min.js"></script>
	
      
		 
        <script type="text/javascript" charset="utf-8">
        
        var app = "/jhms/index.php/";

        </script>
         <script src="/jhms/Public/app/zpjs.js"></script>
    </body>
</html>