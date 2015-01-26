<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">



<!--基础样式-->
<link rel="stylesheet" type="text/css" href="/Public/Teacher/css/base.css">

<!--自定义样式-->




<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>



</head>
<body>

	<div class="wrap">
		


	<!-- 头部 -->
	<!-- 导航条
================================================== -->


<nav class="navbar navbar-inverse mynav" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">万工课堂教师后台</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(CONTROLLER_NAME == 'Index'): ?>class="active"<?php endif; ?> ><a href="<?php echo u('Teacher/Index/index');?>">首页</a></li>
        <li <?php if(CONTROLLER_NAME == 'Course'): ?>class="active"<?php endif; ?>><a href="<?php echo u('Teacher/Course/index');?>">课程</a></li>

         <li <?php if(CONTROLLER_NAME == 'Daily'): ?>class="active"<?php endif; ?>><a href="<?php echo u('Teacher/Daily/index');?>">日记</a></li>



        
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo get_username();?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
           <!--  <li><a href="<?php echo u('User/updateNickName');?>">帐号管理</a></li>
            <li><a href="#">个人资料</a></li>
            <li><a href="#">消息中心</a></li>
            <li class="divider"></li> -->
            <li><a href="<?php echo u('Student/MyClass/index');?>">退出教师后台</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


	<!-- /头部 -->
	
	<!-- 主体 -->
	
	<div class="container-fluid">
		<div class="row">
			<!--主体部分 左右分栏-->
			<div class="col-md-3 sideBar">
				<ul class="list-group">
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/index');?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							返回列表
						</a>
					</li>
				</ul>
				<ul class="list-group">
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/editor',array('id'=> $courseData['id']));?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							基本信息
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/setPicture',array('id'=> $courseData['id']));?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							课程图片
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/videos',array('id'=> $courseData['id']));?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							视频列表
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?php echo u('Teacher/Course/lessons',array('id'=> $courseData['id']));?>">
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							课时列表
						</a>
					</li>
					
				</ul>
			</div>
			<!-- 右侧 -->
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="btn-group pull-right">
							<!-- 
							<a class="btn btn-default" href="<?php echo u('Teacher/Course/addVideo',array('id'=>$courseData['id']));?>">上传视频</a>
						-->
						<!-- 上传使用弹窗形式 -->
						<button type="button" class="btn btn-default" id="upBtn01" >添加课时</button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<!--表格区域-->
					<table class="table table-hover">
						<tr>
							<th>
								<input type="checkbox" name="id[]"/>
							</th>
							<th>课时标题</th>

							<th>创建时间</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
						<?php if(is_array($lessonList)): $i = 0; $__LIST__ = $lessonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td>
									<input type="checkbox" name="id[]" value="<?php echo ($vo['id']); ?>" />
								</td>
								<td><?php echo ($vo['title']); ?></td>

								<td><?php echo (date("Y-h-d h:i:s",$vo['create_time'])); ?></td>
								<td><?php echo getDataStatus($vo['status']);?></td>
								<td>
									<a href="javascript:void(0)" va="<?php echo ($vo['id']); ?>" class="editorBtn01">编辑</a>
									<a href="javascript:void(0)" class="refuseBtn01" va="<?php echo ($vo['id']); ?>" >
										<?php if($vo['status'] == 0): ?>启用
											<?php else: ?>
											禁用<?php endif; ?>
									</a>
									<a href="javascript:void(0)" va="<?php echo ($vo['id']); ?>" class="deleteBtn01">删除</a>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
					<!--分页-->
					<nav class="mypage">
						<ul class="pagination pagination-sm pull-right"><?php echo ($page); ?></ul>
					</nav>
				</div>
				<div class="panel-footer text-center">
					提示：课时被禁用后学员无法操作，取消禁用即可 <b style="color:red">课时被删除后将再无法还原</b>
					。
				</div>
			</div>
		</div>
		<!-- 右侧结束 -->
	</div>
</div>
<!-- 模态 -->
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">操作确认：</h4>
			</div>
			<div class="modal-body">
				<p>你确定删除课程？</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" id="okBtn">确定</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.mo
	<!-- 模态结束 -->
<!-- 添加课时的模态 -->
<div class="modal fade" id="myModal01">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">添加课时</h4>
			</div>
			<div class="modal-body">
				<!-- 上传的信息提示区域 -->
				<div class="alert alert-warning alert-dismissible" role="alert" id="errorMsg" style="display:none" >
					<button type="button" class="close" >
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button> <strong>提示：</strong> <b></b>
				</div>
				<!-- 上传的信息提示区域 -->
				<!-- 上传的表单。标题与视频文件 -->
				<form id="lessonForm"  action="<?php echo u('Teacher/Course/addLesson');?>" method="post">
					<div class="form-group">
						<label for="video-title">标题</label>
						<input type="text" class="form-control" id="video-title" name="title" placeholder="输入课时标题" datatype="s5-16" errormsg="标题至少5个字符,最多16个字符!" nullmsg="你没有输入标题！" >
						<p class="help-block">课时的标题可以设置5到16个字符.</p>
					</div>
					<div class="form-group">
						<label for="video-description">介绍</label>
						<textarea name="description" class="form-control" id="video-description" cols="30" rows="5" placeholder="输入课时描叙"></textarea>
						<p class="help-block">课时的描叙最多1000个汉字.</p>
					</div>
					<div class="form-group">
						<label for="video-file">视频文件</label>
						<table class="table table-hover table-bordered" id="videoTab">
							<tr id="videoTitle">
								<th>
									<input type="radio" name='videoId' value="0" ></th>
								<th>视频名称</th>
								<th>视频的状态</th>
								<th>视频的时长</th>
								<th>上传时间</th>
							</tr>
						</table>
						<nav class="mypage">
							<ul class="pagination pagination-sm pull-right" id="videoPage"></ul>
							<div class="clearfix"></div>
						</nav>

						<p class="help-block">
							选择课时的视频文件.如果不存在，请先
							<a href="#" class="btn btn-success">上传视频</a>
						</p>
					</div>

					<input type="hidden" name="cid" value="<?php echo ($courseData['id']); ?>">

					<input type="submit" id="subbtn" class="btn btn-success"  value="提交"></form>
				<!-- 表单结束 -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- 课时的模态结束 -->


<!-- 编辑课时 -->
<!-- 添加课时的模态 -->
<div class="modal fade" id="myModal02">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">编辑课时</h4>
			</div>
			<div class="modal-body">
				<!-- 上传的信息提示区域 -->
				<div class="alert alert-warning alert-dismissible" role="alert" id="errorMsg02" style="display:none" >
					<button type="button" class="close" >
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button> <strong>提示：</strong> <b></b>
				</div>
				<!-- 上传的信息提示区域 -->
				<!-- 上传的表单。标题与视频文件 -->
				<form id="lessonEditorForm"  action="<?php echo u('Teacher/Course/editorLesson');?>" method="post">
					<div class="form-group">
						<label for="video-title02">标题</label>
						<input type="text" class="form-control" id="video-title02" name="title" placeholder="输入课时标题" datatype="s5-16" errormsg="标题至少5个字符,最多16个字符!" nullmsg="你没有输入标题！" >
						<p class="help-block">课时的标题可以设置5到16个字符.</p>
					</div>
					<div class="form-group">
						<label for="video-description02">介绍</label>
						<textarea name="description" class="form-control" id="video-description02" cols="30" rows="5" placeholder="输入课时描叙"></textarea>
						<p class="help-block">课时的描叙最多1000个汉字.</p>
					</div>
					<div class="form-group">
						<label for="video-file">视频文件</label>
						<table class="table table-hover table-bordered" id="videoTab02">
							<tr id="videoTitle02">
								<th>
									<input type="radio" name='videoId' value="0" ></th>
								<th>视频名称</th>
								<th>视频的状态</th>
								<th>视频的时长</th>
								<th>上传时间</th>
							</tr>
						</table>

						<p id="currentVideo"></p>
						<nav class="mypage">
							<ul class="pagination pagination-sm pull-right" id="videoPage02"></ul>
							<div class="clearfix"></div>
						</nav>

						<p class="help-block">
							选择课时的视频文件.如果不存在，请先
							<a href="#" class="btn btn-success">上传视频</a>
						</p>
					</div>

					<input type="hidden" name="id">

					<input type="submit" id="subbtn" class="btn btn-success"  value="提交"></form>
				<!-- 表单结束 -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- 课时的模态结束 -->
<!-- 编辑课时 -->

	<!-- /主体 -->

	</div>
	<!-- 底部 -->
	    <!-- 底部
    ================================================== -->
   <footer>
  <div class="container footer">
      <p class="muted credit tr mr10">2005-2014 万工网络课堂 <a href="#">school.ahnieh.com</a> 版权所有皖ICP证070427号</p>
      <ul>
      <li><a href="#" target="_blank">关于我们</a>|</li>
          <li><a href="#" target="_blank">在线反馈</a>|</li>
          <li><a href="#" target="_blank">使用协议</a>|</li>
          <li><a href="#" target="_blank">帮助中心</a></li>
        </ul>
  </div>
</footer>



<script type="text/javascript">
	//模态窗口关闭后刷新页面
	$('#myModal').on('hidden.bs.modal', function (e) {
		window.location.reload();
})

	//关闭后刷新页面
	$('#myModal02').on('hidden.bs.modal', function (e) {
		window.location.reload();
})
	
	//通用的事件
	function commonEvent(obj,info,url) {
		// body...
		//获得要删除的信息.这里获取标题
		var msg = obj.parent().parent().children()[1].innerHTML;
		//var id = obj.parent().parent().children().get(0).firstChild.value;
		var id=obj.attr('va');
		//初始化模态中的信息
		$("#myModal .modal-title").html(info+"操作确定：");
		$("#myModal .modal-body p").html("你确定"+info+msg+"课程?");
		$('#myModal').modal('show');
		//给确定按钮绑定删除的事件
		$("#okBtn").bind('click',function(){
			
			$("#myModal .modal-body p").html("正在执行"+info+"操作。。。");
			$.post(url,{id:id},function(result){
				//删除的反馈
				$("#myModal .modal-body p").html("操作结果:<strong style='color:red;'>"+result.msg+"</strong>,2秒后窗口自动关闭!");
				//2秒后关闭模态 todo
				setTimeout("$('#myModal').modal('hide')",2000);
				//关闭后刷新页面
				//window.location.reload();
				
			});
			
		});
		
	}
	//删除绑定事件
	$(".deleteBtn01").bind('click',function(){
		var url01 = "<?php echo u('Teacher/Course/deleteLesson');?>";
		commonEvent($(this),'删除',url01);
	});
	//禁用和启用事件
	$(".refuseBtn01").bind('click',function(){
		//获得当前的状态
		var status = $(this).parent().parent().children()[3].innerHTML;
		if (status == '正常') {
		var url02 = "<?php echo u('Teacher/Course/refuseLesson');?>";
		commonEvent($(this),'禁用',url02);
		} else{
			var url02 = "<?php echo u('Teacher/Course/startLesson');?>";
		commonEvent($(this),'启用',url02);
			
		};
	});
	
	</script>
<script type="text/javascript" src="/Public/static/Validform_v5.3.2/validform_v5.3.2.js" ></script>
<SCRIPT TYPE="text/javascript">
	//修改警告的按钮关闭事件
	$(".close").bind('click',function(){
		//隐藏而非删除警告框
		$("#errorMsg").hide();
	});
	//关闭后刷新页面
	$('#myModal01').on('hidden.bs.modal', function (e) {
		window.location.reload();
})
	// 课时的模态js
	// 2014年12月17日 08:49:16 这里要注意2个模态之间影响。要利用模态的id来分隔。
	$("#upBtn01").bind('click',function(){
		//显示添加课时的窗口
		$("#myModal01").modal('show');
		//初始化视频文件的选择表
		var cid = "<?php echo ($courseData['id']); ?>";
		$.get("<?php echo u('Teacher/Course/getVideos');?>",{cid:cid},function(msg){
			for (var i = 0; i < msg.length; i++) {
				var jsonObj =msg[i];
				//填充表格
				var videoTr = document.createElement("tr");
				//填充第一个单元格
				var videoTd = document.createElement("td");
				videoTd.innerHTML ="<input type='radio' value="+jsonObj.id+"  name='videoId' >";
				videoTr.appendChild(videoTd);
					
				for(var x in jsonObj){
					if (x=='author' ||x=='course'||x=='id') {
						continue;
					};
					videoTd = document.createElement("td");
					videoTd.innerHTML = jsonObj[x];
					videoTr.appendChild(videoTd);
				}
				//将新的tr插入到表格中
				$("#videoTitle").after(videoTr);
				//将分页插入
				
				
				
				
				
			};
		});
		$.get("<?php echo u('Teacher/Course/getPage');?>",{cid:cid},function(msg){
			//填充到弹窗的分页中
			$("#videoPage").html(msg.page);
			//给分页添加事件。阻止链接跳转。更新模态中的数据。
			$(".num,.next,.prev").bind('click',function(){
				
				getData($(this));
				
				return false;
			});
			
			
			
		});
	});

//编辑之前的视频id 全局变量。
		var oldVideoId ;

	//编辑课时的事件
	$(".editorBtn01").bind('click',function(){
		
		//获得id
		var lessonId = $(this).attr('va');

		

		//初始化课时的信息
		$.post("<?php echo u('Teacher/Course/getLessonDetail');?>",{id:lessonId},function(msg){

			oldVideoId =  msg.vid;
			//填充标题
			//填充id
			$("input[type='hidden'][name='id']").val(msg.id);

			$("#video-title02").val(msg.title);
			//填充描叙
			$("#video-description02").html(msg.description);
			
		});
		
		

		//初始化视频文件的选择表
		//这里需要将旧的视频Id选中
		
		var cid = "<?php echo ($courseData['id']); ?>";
		$.get("<?php echo u('Teacher/Course/getVideos');?>",{cid:cid},function(msg){

			
			
			for (var i = 0; i < msg.length; i++) {
				var jsonObj =msg[i];

				
				//填充表格
				var videoTr = document.createElement("tr");
				//填充第一个单元格
				var videoTd = document.createElement("td");
				if(oldVideoId == jsonObj.id){
					
					videoTd.innerHTML ="<input type='radio' checked='checked' value="+jsonObj.id+"  name='videoId' >";
				}else{

				videoTd.innerHTML ="<input type='radio' value="+jsonObj.id+"  name='videoId' >";
				}
				videoTr.appendChild(videoTd);
					
				for(var x in jsonObj){
					if (x=='author' ||x=='course'||x=='id') {
						continue;
					};
					videoTd = document.createElement("td");
					videoTd.innerHTML = jsonObj[x];
					videoTr.appendChild(videoTd);
				}
				//将新的tr插入到表格中
				$("#videoTitle02").after(videoTr);
				
				
				
				
				
			};
		});
		$.get("<?php echo u('Teacher/Course/getPage');?>",{cid:cid},function(msg){
			//填充到弹窗的分页中
			$("#videoPage02").html(msg.page);
			//给分页添加事件。阻止链接跳转。更新模态中的数据。
			$(".num,.next,.prev").bind('click',function(){
				
				getData02($(this));
				
				return false;
			});
			
			
			
		});

		//显示添加课时的窗口
		$("#myModal02").modal('show');
	});
	
	
	//获得视频表格与分页的ajax
	
	function getData(obj){
		var cid = "<?php echo ($courseData['id']); ?>";
		var p = obj.html(); //获得分页
		
		//下一页
		if(p=='&gt;&gt;'){
			p=parseInt($("#videoPage div .current").html())+1;
		}
		//上一页
		if(p =='$lt;$lt;'){
			p=parseInt($("#videoPage div .current").html())-1;
		}
		
		
		$.get("<?php echo u('Teacher/Course/getVideos');?>",{cid:cid,p:p},function(msg){
		//清理之前的表格内容
			var videoTitle = $("#videoTitle");
			$("#videoTab").empty();
			$("#videoTab").append(videoTitle);
			for (var i = 0; i < msg.length; i++) {
				var jsonObj =msg[i];
				//填充表格
				var videoTr = document.createElement("tr");
				//填充第一个单元格
				var videoTd = document.createElement("td");
				videoTd.innerHTML ="<input type='radio' value="+jsonObj.id+"  name='videoId' >";
				videoTr.appendChild(videoTd);
					
				for(var x in jsonObj){
					if (x=='author' ||x=='course'||x=='id') {
						continue;
					};
					videoTd = document.createElement("td");
					videoTd.innerHTML = jsonObj[x];
					videoTr.appendChild(videoTd);
				}
				//将新的tr插入到表格中
				$("#videoTitle").after(videoTr);
				
				
				
				
				
			};
		});
				//将分页插入
		$.get("<?php echo u('Teacher/Course/getPage');?>",{cid:cid,p:p},function(msg){
			//填充到弹窗的分页中
			$("#videoPage").html(msg.page);
			//给分页添加事件。阻止链接跳转。更新模态中的数据。
			$(".num,.next,.prev").bind('click',function(){
				
				getData($(this));//调用自身
				
				return false;
			});
			
			
		});
	}

	//获得视频表格与分页的ajax 编辑中使用
	
	function getData02(obj){
		var cid = "<?php echo ($courseData['id']); ?>";
		var p = obj.html(); //获得分页
		
		//下一页
		if(p=='&gt;&gt;'){
			p=parseInt($("#videoPage02 div .current").html())+1;
		}
		//上一页
		if(p =='$lt;$lt;'){
			p=parseInt($("#videoPage02 div .current").html())-1;
		}
		
		
		$.get("<?php echo u('Teacher/Course/getVideos');?>",{cid:cid,p:p},function(msg){
		//清理之前的表格内容
			var videoTitle = $("#videoTitle02");
			$("#videoTab02").empty();
			$("#videoTab02").append(videoTitle);
			for (var i = 0; i < msg.length; i++) {
				var jsonObj =msg[i];
				//填充表格
				var videoTr = document.createElement("tr");
				//填充第一个单元格
				var videoTd = document.createElement("td");

				if(oldVideoId == jsonObj.id){
					//保存并跳过
					oldVideo = jsonObj;
					videoTd.innerHTML ="<input type='radio' checked='checked' value="+jsonObj.id+"  name='videoId' >";
				}else{

				videoTd.innerHTML ="<input type='radio' value="+jsonObj.id+"  name='videoId' >";
				}

				// videoTd.innerHTML ="<input type='radio' value="+jsonObj.id+"  name='videoId' >";
				videoTr.appendChild(videoTd);
					
				for(var x in jsonObj){
					if (x=='author' ||x=='course'||x=='id') {
						continue;
					};
					videoTd = document.createElement("td");
					videoTd.innerHTML = jsonObj[x];
					videoTr.appendChild(videoTd);
				}
				//将新的tr插入到表格中
				$("#videoTitle02").after(videoTr);
				
				
				
				
				
			};
		});
				//将分页插入
		$.get("<?php echo u('Teacher/Course/getPage');?>",{cid:cid,p:p},function(msg){
			//填充到弹窗的分页中
			$("#videoPage02").html(msg.page);
			//给分页添加事件。阻止链接跳转。更新模态中的数据。
			$(".num,.next,.prev").bind('click',function(){
				
				getData02($(this));//调用自身
				
				return false;
			});
			
			
		});
	}



	
	// 表单处理
	$("#lessonForm").Validform(
		{
		tiptype:function(msg,o,cssctl){
		var objtip =$("#errorMsg");
		objtip.children('b').html(msg);
		objtip.show();
		},
		beforeSubmit:function(curform){
		//在验证成功后，表单提交前执行的函数，curform参数是当前表单对象。
		//这里明确return false的话表单将不会提交;
		//2014年12月17日 20:25:45 检查选中了视频。
		
		var videoId = $(":checked").val();
		if(videoId>0){
			return true;
		}
		$("#errorMsg").children('b').html("没有选择视频文件");
		
		return false;	
	},
		ajaxPost:true, //异步提交表单
		callback:function(data){ //ajax提交后的回调函数
			$("#errorMsg").children('b').html(data.info+"2秒后窗口自动关闭");
			setTimeout("$('#myModal01').modal('hide')",2000);
		}
		}
		);


	$("#lessonEditorForm").Validform(
		{
		tiptype:function(msg,o,cssctl){
		var objtip =$("#errorMsg02");
		objtip.children('b').html(msg);
		objtip.show();
		},
		beforeSubmit:function(curform){
		//在验证成功后，表单提交前执行的函数，curform参数是当前表单对象。
		//这里明确return false的话表单将不会提交;
		//2014年12月17日 20:25:45 检查选中了视频。
		
		var videoId = $(":checked").val();
		if(videoId>0){
			return true;
		}
		$("#errorMsg02").children('b').html("没有选择视频文件");
		
		return false;	
	},
		ajaxPost:true, //异步提交表单
		callback:function(data){ //ajax提交后的回调函数
			$("#errorMsg02").children('b').html(data.info+"2秒后窗口自动关闭");
			setTimeout("$('#myModal02').modal('hide')",2000);
		}
		}
		);
	
	
	
	
	</SCRIPT>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
  
</div>

	<!-- /底部 -->
		



</body>
</html>