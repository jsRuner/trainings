<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo C('WEB_SITE_TITLE');?></title>


<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

<link href="/Public/static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/Public/Student/css/general.css" rel="stylesheet">







  <link rel="stylesheet" type="text/css" href="/Public/Student/css/student.css">



<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>



<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>
	<!-- 头部 -->
	<div class="container-fluid whole-div">

  <div class="row wwf-row-nav">
    <div class="col-md-10 col-md-offset-1">

      <nav class="navbar  wwf-nav" role="navigation">
        <div class="container-fluid wwf-nav-container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo u('Home/Index/index');?>">万工教育</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li >
                <a href="<?php echo u('Home/Course/index');?>">学习课程</a>
              </li>
              <li>
                <a href="<?php echo u('Home/Teacher/index');?>">名师风采</a>
              </li>
              <li>
                <a href="<?php echo u('Home/Wenti/index');?>">常见问题</a>
              </li>
              <li>
                <a href="<?php echo u('Student/MyClass/index');?>">我的课堂</a>
              </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
              <?php if(is_login()): ?><li class="dropdown">

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-left:0;padding-right:0">
                    <?php echo get_username();?> <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
                    <li><p style="color:#999;font-size:12px" class="text-center">正在使用万工帐号登录</p></li>
                    <li role="presentation" class="divider"></li>
                    <li>
                      <a href="<?php echo U('Teacher/Course/index');?>">教师</a>
                    </li>
                    
                    <li>
                      <a href="<?php echo U('Student/setting/setInfo');?>">设置</a>
                    </li>
                    
                  </li>
                  <li role="presentation" class="divider"></li>
                  <li>
                    <a href="<?php echo U('Home/User/logout');?>">退出</a>
                  </li>
                </ul>
              </li>

              <?php else: ?>
              <li>
                <a href="<?php echo u('Home/user/login');?>">登录</a>
              </li>
              <li>
                <a href="<?php echo u('Home/user/register');?>">注册</a>
              </li>

            </ul><?php endif; ?>

        </div>
        <!-- /.navbar-collapse --> </div>
      <!-- /.container-fluid --> </nav>

  </div>

</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	

  <div class="row my-ban">
    <div class="col-md-8 col-md-offset-1">
      <!-- <img src="#">
      -->
      <div >

        <span class="content1-picture pull-left"> 
<img class="image" src="<?php echo get_userphoto();?>" /> 
</span> 
        <h1>
          <?php echo get_username();?>
          <small><?php echo get_time_in_day();?></small>
        </h1>
      </div>

      <p>人类被赋予了一种工作，那就是精神的成长。</p>

    </div>

  </div>



       
        

	<div class="container-fluid">
		<div class="row">

			<!--主体部分 左右分栏-->
			<div class="col-md-3 col-md-offset-1">
				<div class="panel panel-default">
     

        <div class="panel-heading">
          <h3 class="panel-title">设置</h3>
        </div>
        <div class="panel-body">
          <ul class="list-group">
            <li class="list-group-item">
              <a href="<?php echo u('Setting/setInfo');?>">资料设置</a>
            </li>
            <li class="list-group-item">
              <a href="<?php echo u('Setting/setPhoto');?>">修改头像</a>
            </li>
             <li class="list-group-item">
              <a href="<?php echo u('User/updateNickName');?>">修改昵称</a>
            </li>
            <li class="list-group-item">
              <a href="<?php echo u('User/updatePassword');?>">修改密码</a>
            </li>

          </ul>
        </div>
      </div>

			</div>
			<!-- 右侧 -->
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span>设置头像</span>
					</div>
					<div class="panel-body">

						<!--编辑头像-->

         <script type="text/javascript">
   function uploadevent(status){
  
        status += '';

     switch(status){
     case '1':

     window.location.href = "<?php echo u('Student/Setting/setPhoto',array('id'=>$memberData['uid']));?>";
 
    
  break;
 

     
     case '-1':
   // window.location.reload();
     break;
     default:
    // window.location.reload();
    } 
   }
  </script>

         <div id="altContent">

<input  id="username" type="hidden" value="20130101232565" />

<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"
WIDTH="650" HEIGHT="450" id="myMovieName">
<PARAM NAME=movie VALUE="/Public/static/flash/avatar.swf">
<PARAM NAME=quality VALUE=high>
<PARAM NAME=bgcolor VALUE=#FFFFFF>

<?php if(empty($memberData['photo'])): ?><param name="flashvars" value="imgUrl=/Public/static/flash/default.jpg&uploadUrl=/index.php?s=/Student/Setting/flashUpFile&uploadSrc=true&showCame=true&pCut=163|162&pSize=163|162|48|48|20|20&pData=163|162|48|48|20|20&showBe=true&showCa=true&id=<?php echo ($memberData['id']); ?>" />
<EMBED src="/Public/static/flash/avatar.swf" quality=high bgcolor=#FFFFFF WIDTH="650" HEIGHT="450" wmode="transparent" flashVars="imgUrl=/Public/static/flash/default.jpg&uploadUrl=/index.php?s=/Student/Setting/flashUpFile&uploadSrc=true&showCame=true&pCut=163|162&pSize=163|162|48|48|20|20&pData=163|162|48|48|20|20&showBe=true&showCa=true&id=<?php echo ($memberData['id']); ?>"
NAME="myMovieName" ALIGN="" TYPE="application/x-shockwave-flash" allowScriptAccess="always"
PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer">
</EMBED>

<?php else: ?>

<param name="flashvars" value="imgUrl=<?php echo ($memberData['photo']); ?>&uploadUrl=/index.php?s=/Student/Setting/flashUpFile&uploadSrc=true&showCame=true&pCut=163|162&pSize=163|162|48|48|20|20&pData=163|162|48|48|20|20&showBe=true&showCa=true&id=<?php echo ($memberData['id']); ?>" />
<EMBED src="/Public/static/flash/avatar.swf" quality=high bgcolor=#FFFFFF WIDTH="650" HEIGHT="450" wmode="transparent" flashVars="imgUrl=<?php echo ($memberData['photo']); ?>&uploadUrl=/index.php?s=/Student/Setting/flashUpFile&uploadSrc=true&showCame=true&pCut=163|162&pSize=163|162|48|48|20|20&pData=163|162|48|48|20|20&showBe=true&showCa=true&id=<?php echo ($memberData['id']); ?>"
NAME="myMovieName" ALIGN="" TYPE="application/x-shockwave-flash" allowScriptAccess="always"
PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer">
</EMBED><?php endif; ?>

</OBJECT>
 

  </div>

  <div id="avatar_priview"></div>
         <!--编辑头像-->
						
				</div>
			</div>
		</div>
			<!-- 右侧结束 -->
		</div>
	</div>

	



<script type="text/javascript">
   
</script>
	<!-- /主体 -->

	<!-- 底部 -->
	<div class="row footer">

  <div class="col-md-8 col-md-offset-2 col-sm-12">

    <div class="row">

      <div class="col-md-3">
        <h4>万工教育</h1>
        <ul>
          <li>
            <a href="<?php echo u('index/about');?>">关于我们</a>
          </li>
          <li>
            <a href="<?php echo u('index/lianxi');?>">联系我们</a>
          </li>
          <li>
            <a href="<?php echo u('index/zhaopin');?>">加入我们</a>
          </li>

        </ul>

      </div>
      <div class="col-md-3">
        <h4>请你关注</h1>
        <ul>
          <li>
            <a href="http://ahnieh.com/">安徽NIEH</a>
          </li>
          <li>
            <a href="<?php echo u('Index/xieyi');?>">用前必读</a>
          </li>
          <li>
            <a href="<?php echo u('Index/yinsi');?>">隐私协议</a>
          </li>

        </ul>
      </div>
      <div class="col-md-3">
       <!--  <h4>万工教育</h1>
        <ul>
          <li>
            <a href="#">关于我们</a>
          </li>
          <li>
            <a href="#">联系我们</a>
          </li>
          <li>
            <a href="#">加入我们</a>
          </li>

        </ul> -->
      </div>
      <div class="col-md-3">
       
      
      <ul style="margin-top:30px">
        
        
        <li>©合肥万工网络科技有限公司</li>
        <li>皖ICP备 14048711号</li>
        <li>皖公网安备11010802016612号</li>
      </ul>
      </div>

    </div>

  </div>

</div>

</div>

<script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>

<script type="text/javascript" src="/Public/static/Validform_v5.3.2/Validform_v5.3.2.js"></script>

<script type="text/javascript" src="/Public/static/jisuanke/js/unslider.js"></script>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "/index.php?s=", //当前项目地址
		"PUBLIC" : "/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

	<script type="text/javascript">
	


	</script>

<!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->

<div class="hidden">
<!-- 用于加载统计代码等隐藏元素 -->

</div>
	<!-- /底部 -->
</body>
</html>