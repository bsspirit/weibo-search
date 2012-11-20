<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
	
	<!-- 
	<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
	-->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/weiyu.jpg" width=100/>
		<?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<ul id="nav">
			
		<?php if(Yii::app()->user->isGuest){?>
		<li><a href="/site/login">登录</a></li>
		<?php }?>
	
		<?php if(!Yii::app()->user->isGuest){?>
		<li><a href="/setup/leaders">专家列表</a></li>
		<li><a href="/setup/areaUsers">已选出用户</a></li>
		<!-- <li><a href="/setup/fans">粉丝列表</a></li>
		<li><a href="/setup/follows">关注列表</a></li>
		<li><a href="/setup/tweets">微博列表</a></li> -->
		
		<li><a href="/weibo">微博管理</a></li>
		<li><a href="/task">任务管理</a></li>
		<?php }?>
		
		<li><a href="/site/about"><span class="akey">关</span>于本站</a></li>
		
		<?php if(!Yii::app()->user->isGuest){?>
		<li><a href="/site/logout"><span class="akey">退</span>出登陆</a></li>
		<?php }?>
	</ul>
	<div class="c"></div>
	</div>

	<?php echo $content; ?>

	<div id="footer">
	<p>Copyright © bsspirit@gmail.com |
	   由 <a target="_blank" href="http://dataguru.cn">Dataguru</a>开发及运营
	</p>
	</div>
</div><!-- page -->

</body>
</html>