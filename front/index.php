<<<<<<< HEAD
<<<<<<< Updated upstream
=======
>>>>>>> cc9a4e4708ccd394c26f5916d4a5d79dd9e25f5d
﻿<?php 
require_once '../include.php';

//判断页面是否刷新

$_SESSION['count'] += 1;

//设置变量，判断是否打开登录
if(($_REQUEST['ORC'] == "")||($_SESSION['count'] > 1)){
    $ORC = "close";
}else{
    $ORC = $_REQUEST['ORC'];
}
echo "<script>var ORC = \"$ORC\"; </script>";  //本页面php对jquery进行传值

//获取登录用户信息
$client = connectionToNeo4j();
$login_user = $_SESSION['user'];
$info = getAllInfoByacc($client, $login_user);

/*$fpeople = $_REQUEST['fpeople'];
if($login_user){
	$peoples = getPerson($client);
	$acResults = queryAciveByName($client, $login_user);
	$facResults = queryActiveRel($client, $login_user);
	if($facResults && $acResults){
		$allResults = array_merge($acResults,$facResults);
	}
	else{
		$allResults = $facResults;
	}
}*/

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="Scrutiny Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free Webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--mobile apps-->
<!--Custom Theme files -->
<link href="css/login.css" type="text/css" rel="stylesheet" />
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- start-smoth-scrolling-->
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smoth-scrolling-->
<!-- start-loginalert -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var k=!0;
	$(".loginmask").css("opacity",0.8);
	
	if($.support <= 6){
		$('#reg_setp,.loginmask').height($(document).height());
	}
	$(".thirdlogin ul li:odd").css({marginRight:0});	

	if(ORC == "open"){
		k&&"0px"!=$("#loginalert").css("top")&& ($("#loginalert").show(),$(".loginmask").fadeIn(500),$("#loginalert").animate({top:0},400,"easeOutQuart"))
		ORC = "close";
	}
	
	$(".openlogin").click(function(){
		
		k&&"0px"!=$("#loginalert").css("top")&& ($("#loginalert").show(),$(".loginmask").fadeIn(500),$("#loginalert").animate({top:0},400,"easeOutQuart"))
		
	});
	
	$(".loginmask,.closealert").click(function(){
		k&&(k=!1,$("#loginalert").animate({top:-600},400,"easeOutQuart",function(){$("#loginalert").hide();k=!0}),$(".loginmask").fadeOut(500))
	});
	
	
	$("#sigup_now,.reg a").click(function(){
		$("#reg_setp,#setp_quicklogin").show();
		$("#reg_setp").animate({left:0},500,"easeOutQuart")
	});																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																								
	
	$(".back_setp").click(function(){
		"block"==$("#setp_quicklogin").css("display")&&$("#reg_setp").animate({left:"100%"},500,"easeOutQuart",function(){$("#reg_setp,#setp_quicklogin").hide()})
	});
}); 

</script>
<!-- //end-loginalert -->
<style type="text/css">
.login-link, .register-link {
	color: #fff;
	font-size: 18px;
	float: left;
	margin-left: 40px;
}

.loginRegister {
	margin-left: 300px;
	list-style: none;
	line-height: 3.42857143;
}



</style>
</head>
<body>
	<!--banner-->
	<div  id="home" class="banner">
		<div class="banner-info">
			<div class="banner-top">
				<div class="container">
					<div class="col-md-6 banner-top-left wow slideInDown animated" data-wow-delay=".5s">
						<ul class="social-icons">
							<li><a href="#"> </a></li>
							<li><a href="#" class="fb"> </a></li>
							<li><a href="#" class="in"> </a></li>
							<li><a href="#" class="dott"> </a></li>
						</ul>
					</div>
					<div class="col-md-6 banner-top-right wow slideInDown animated" data-wow-delay=".5s">
						    <ul class="loginRegister">
						    <?php if($login_user == ""){
						        echo "<li class=\"login-item openlogin\"><a href=\"javascript:void(0);return false;\" class=\"login-link\">登录</a></li>";
						        echo "<li class=\"register-item\"><a href=\"register.php\" class=\"register-link\">注册</a></li>";
						    }else{
						        echo "<li class=\"login-item \"><a href=\"setSelf.php\" onclick=\"window.location.href='setSelf.php'\" class=\"login-link\">{$login_user}</a></li>";
						        echo "<li class=\"register-item\"><a href=\"logout.php\" class=\"register-link\">注销</a></li>";
						    }
						    ?>
							</ul>
					</div>
<!-- loginalert -->
<div class="loginmask"></div>

<div id="loginalert">
	
	<div class="pd20 loginpd">
		<h3><i class="closealert fr"></i><div class="clear"></div></h3>
		<div class="loginwrap">
			<div class="loginh">
				<div class="fl">User登录</div>
				<div class="fr">还没有账号<a id="sigup_now" href="register.php">立即注册</a></div>
			</div>
			<h3><span class="fl">账号/邮箱登录</span><div class="clear"></div></h3>
			<form action="dologin.php" method="post" id="login_form">
				<div class="logininput">
					<input type="text" name="account" class="loginusername" value="" placeholder="用户名" />
					<input type="password" name="pword" class="loginuserpasswordt" value="" placeholder="密码" />
					<input type="text" name="verify" class="loginverify" style="width: 110px" value="" placeholder="验证码" />
					<a class="changeVerify"  href="javascript:void(0);return false;"><img alt="" src="getVerify.php" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;看不清？点我</a>
					<!-- <input type="password" name="password" class="loginuserpasswordp" style="display:none" /> -->
				</div>
				<div class="loginbtn">
					<div class="loginsubmit fl"><input type="submit" value="登录" class="btn" /></div>
					<div class="fl" style="margin:26px 0 0 0;"><input id="bcdl" name="autoflag" type="checkbox" checked="true" />保持登录</div>
					<div class="fr" style="margin:26px 0 0 0;"><a href="findbackPasswordSt1.php">忘记密码?</a></div>
					<div class="clear"></div>
				</div>
			</form>
		</div>
	</div>
	
</div>
<!-- //end loginalert -->
<script type="text/javascript">
$(".changeVerify").click(function(){
	var changeImg = $(this);
	$.ajax({
		type:"POST",
		url:"refreshVerify.php",
		data:"act=refresh",
		cache:false,
		success:function(data){
			changeImg.html(data);
		},
		error:function(){
			alert("出现error...");
		}
	});
});

</script>

					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="banner-text">
				<h1 class="wow slideInLeft animated" data-wow-delay=".5s"><a href="index.php">Linked US</a></h1>
				<p class="wow slideInRight animated" data-wow-delay=".5s">我们在这里，而，你又在哪里</p>
			</div>
			<!--navigation-->
			<div class="top-nav wow">
				<div class="container">
					<div class="navbar-header logo">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							Menu
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="menu">
							<ul class="nav navbar">
								<li class="menu-item menu-item-current"><a href="#home" class="menu-link scroll">览主页</a></li>
								<li class="menu-item"><a href="recommend.php" onclick="window.location.href='recommend.php'" class="menu-link scroll">荐好友</a></li>
								<li class="menu-item"><a href="active.php" onclick="window.location.href='active.php'" class="menu-link scroll">推动态</a></li>
								<li class="menu-item"><a href="writeActive.php" onclick="window.location.href='writeActive.php'" class="menu-link scroll">写动态</a></li>
								<li class="menu-item"><a href="setSelf.php" onclick="window.location.href='setSelf.php'" class="menu-link scroll">关于我</a></li>
								<li class="menu-item"><a href="#contact"   class="menu-link scroll">联系</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
						<script src="js/classie.js"></script>
						<script>
							(function() {
								[].slice.call(document.querySelectorAll('.menu')).forEach(function(menu) {
									var menuItems = menu.querySelectorAll('.menu-link'),
										setCurrent = function(ev) {
											ev.preventDefault();
											var item = ev.target.parentNode; // li
											// return if already current
											if( classie.has(item, 'menu-item-current') ) {
												return false;
											}
											// remove current
											classie.remove(menu.querySelector('.menu-item-current'), 'menu-item-current');
											// set current
											classie.add(item, 'menu-item-current');
										};
									[].slice.call(menuItems).forEach(function(el) {
										el.addEventListener('click', setCurrent);
									});
								});
							})(window);
						</script>
					</div>
					<!-- script-for sticky-nav -->
					<script>
					$(document).ready(function() {
						 var navoffeset=$(".top-nav").offset().top;
						 $(window).scroll(function(){
							var scrollpos=$(window).scrollTop(); 
							if(scrollpos >=navoffeset){
								$(".top-nav").addClass("fixed");
							}else{
								$(".top-nav").removeClass("fixed");
							}
						 });
					});
					</script>
					<!-- /script-for sticky-nav -->
				</div>
			</div>	
			<!--//navigation-->
		</div>
	</div>
	<!--//banner-->
	<!--welcome-->
	<div class="welcome" id="about">
		<div class="container">
			<h2 class="title wow slideInDown animated" data-wow-delay=".5s">Welcome To Linked-US</h2>
			<div class="col-md-4 welcome-left wow slideInLeft animated" data-wow-delay=".5s">
				<img src="images/img1.jpg" alt=""/>
			</div>
			<div class="col-md-8 welcome-right wow slideInRight animated" data-wow-delay=".5s">
				<h5>01</h5>
				<h4>About Us</h4>
				<p>关系型数据库的最大特点就是事务的一致性, 但是，在网页应用中，尤其是SNS应用中，一致性却不是显得那么重要，用户A看到的内容和用户B看到同一用户C内容更新不一致是可以容忍的。<br />
				       关系数据库的另一个特点就是其具有固定的表结构，因此，其扩展性极差，而在SNS中，系统的升级，功能的增加，往往意味着数据结构巨大变动，这一点关系型数据库也难以应付，需要新的结构化数据存储。于是，诞生出非关系型数据库<br />
				</p>
			</div>
			<div class="clearfix"> </div>
			<div class="col-md-7 welcome-bottom-left wow slideInLeft animated" data-wow-delay=".5s">
				<img src="images/img2.jpg" alt=""/>
				<h5>02</h5>
				<h4>Our Mission</h4>
				<p>秉承社交友好性的理念，提升用户社交好感度，LinkedUS寓意一个联通的世界。<br />
				   LinkedUS，专注社交。基于Neo4j图形数据库，PHP开发环境打造，H5的完美结合带给你无与伦比的享受。<br />
				   LinkedUS 功能范围包括：登录后智能推荐好友，注册后发表动态，查看好友动态信息，更改个人信息设置etc.<br />
				</p>
			</div>
			<div class="col-md-5 welcome-bottom-right wow slideInRight animated" data-wow-delay=".5s">
				<div class="welcome-grid-left">
					<img src="images/img3.jpg" alt=""/>
				</div>
				<div class="welcome-grid-right">
					<h5>03</h5>
					<h4>What We do</h4>
					<p>为美好生活加油。<br />
					   Neo4j是一个高性能的,NOSQL图形数据库，它将结构化数据存储在网络上而不是表中。它是一个嵌入式的、基于磁盘的、具备完全的事务特性的Java持久化引擎，但是它将结构化数据存储在网络(从数学角度叫做图)上而不是表中。
					</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//welcome-->
	<!--services-->
	<div class="welcome services" id="services">
		<div class="container">
			<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">Our Services</h3>
			<div class="services-info">
				<div class="col-md-4 services-grids wow zoomIn animated" data-wow-delay=".5s">
					<div class="service">
						<div class="icon-holder">
							<span class="glyphicon glyphicon-book"></span>
						</div>
						<h4 class="heading"><a href="recommend.php" style="color:white; ">荐好友&加好友</a></h4>
						<p class="text">智能推荐你可能感兴趣的好友</p>
					</div>
				</div>
				<div class="col-md-4 services-grids wow zoomIn animated" data-wow-delay=".5s">
					<div class="service">
						<div class="icon-holder">
							<span class="glyphicon glyphicon-education"></span>
						</div>
						<h4 class="heading"><a href="active.php" style="color: white;">推动态&看身边</a></h4>
						<p class="text">推荐你可能感兴趣的动态</p>
					</div>
				</div>
				<div class="col-md-4 services-grids wow zoomIn animated" data-wow-delay=".5s">
					<div class="service">
						<div class="icon-holder">
							<span class="glyphicon glyphicon-thumbs-up"></span>
						</div>
						<h4 class="heading"><a href="writeActive.php" style="color: white;">写动态&关于我</a></h4>
						<p class="text">表达和释放你自己，更改和更新你自己</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//services-->
	<!--contact -->
	<div class="welcome contact" id="contact">
		<div class="container">
			<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">Contact Us</h3>
			<div class="contact-row">
				<div class="col-md-6 contact-right wow slideInRight animated" data-wow-delay=".5s">
					<h4>Address:</h4>
					<div class="address-left">
						<p>中国-辽宁大连-高新园区凌海路1号</p>
					</div>
					<div class="address-right">
						<p>Call US : 182-4113-7622</p>
						<p>E-mail : <a href="mailto:xspbruins@Singfor.com.cn">xspbruins@Singfor.com.cn</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<a id="toContact"></a>
			<div class="contact-form">
				<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">联系US</h3>
				<p>LINKED US user们，有什么反馈请填写好信息告诉我们，你我共同的努力造就更好的明天~</p>
				<form class="wow fadeInUp animated" data-wow-delay=".5s" action="contactUS.php" method="post">
				<?php if($login_user){?>
					<input type="text" name="account" value="<?php echo $info['account'];?>" placeholder="Account" required="required">
					<input class="email" type="text" name="email" value="<?php echo $info['email'];?>" placeholder="Email" required="required">
					<input type="text" name="phone" value="<?php echo $info['phone'];?>" placeholder="Phone" required="required">
					<textarea name="message" placeholder="Message" required="required"></textarea>
					<input class="wow zoomIn animated" data-wow-delay=".5s" type="submit" value="提交" >
				<?php }else {
				    echo '<input type="text" name="account" placeholder="Account" required="required">';
				    echo '<input class="email" type="text" name="email" placeholder="Email" required="required">';
				    echo '<input type="text" name="phone" placeholder="Phone" required="required">';
				    echo '<textarea name="message" placeholder="Message" required="required"></textarea>';
				    echo '<input class="wow zoomIn animated" data-wow-delay=".5s" type="submit" value="提交" >';
				}?>
				</form>
			</div>
		</div>
	</div>
	<!--//contact -->
	<!--footer-->
	<div class="welcome footer">
		<div class="container">
			<div class="clearfix"> </div>
			<div class="footer-copy wow slideInUp animated" data-wow-delay=".5s">
				<p>Copyright &copy; 2016.@Bruin熊工作室 All rights reserved.</p>
			</div>
		</div>
	</div>
	<!--//footer-->
	<!-- Bootstrap core JavaScript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>

</html>
<<<<<<< HEAD
=======
﻿<?php 
require_once '../include.php';

//判断页面是否刷新

$_SESSION['count'] += 1;

//设置变量，判断是否打开登录
if(($_REQUEST['ORC'] == "")||($_SESSION['count'] > 1)){
    $ORC = "close";
}else{
    $ORC = $_REQUEST['ORC'];
}
echo "<script>var ORC = \"$ORC\"; </script>";  //本页面php对jquery进行传值

//获取登录用户信息
$client = connectionToNeo4j();
$login_user = $_SESSION['user'];
$info = getAllInfoByacc($client, $login_user);

/*$fpeople = $_REQUEST['fpeople'];
if($login_user){
	$peoples = getPerson($client);
	$acResults = queryAciveByName($client, $login_user);
	$facResults = queryActiveRel($client, $login_user);
	if($facResults && $acResults){
		$allResults = array_merge($acResults,$facResults);
	}
	else{
		$allResults = $facResults;
	}
}*/

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="Scrutiny Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free Webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--mobile apps-->
<!--Custom Theme files -->
<link href="css/login.css" type="text/css" rel="stylesheet" />
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- start-smoth-scrolling-->
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smoth-scrolling-->
<!-- start-loginalert -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var k=!0;
	$(".loginmask").css("opacity",0.8);
	
	if($.support <= 6){
		$('#reg_setp,.loginmask').height($(document).height());
	}
	$(".thirdlogin ul li:odd").css({marginRight:0});	

	if(ORC == "open"){
		k&&"0px"!=$("#loginalert").css("top")&& ($("#loginalert").show(),$(".loginmask").fadeIn(500),$("#loginalert").animate({top:0},400,"easeOutQuart"))
		ORC = "close";
	}
	
	$(".openlogin").click(function(){
		
		k&&"0px"!=$("#loginalert").css("top")&& ($("#loginalert").show(),$(".loginmask").fadeIn(500),$("#loginalert").animate({top:0},400,"easeOutQuart"))
		
	});
	
	$(".loginmask,.closealert").click(function(){
		k&&(k=!1,$("#loginalert").animate({top:-600},400,"easeOutQuart",function(){$("#loginalert").hide();k=!0}),$(".loginmask").fadeOut(500))
	});
	
	
	$("#sigup_now,.reg a").click(function(){
		$("#reg_setp,#setp_quicklogin").show();
		$("#reg_setp").animate({left:0},500,"easeOutQuart")
	});																												
	$(".back_setp").click(function(){
		"block"==$("#setp_quicklogin").css("display")&&$("#reg_setp").animate({left:"100%"},500,"easeOutQuart",function(){$("#reg_setp,#setp_quicklogin").hide()})
	});
}); 

</script>
<!-- //end-loginalert -->
<style type="text/css">
.login-link, .register-link {
	color: #fff;
	font-size: 18px;
	float: left;
	margin-left: 40px;
}

.loginRegister {
	margin-left: 300px;
	list-style: none;
	line-height: 3.42857143;
}



</style>
</head>
<body>
	<!--banner-->
	<div  id="home" class="banner">
		<div class="banner-info">
			<div class="banner-top">
				<div class="container">
					<div class="col-md-6 banner-top-left wow slideInDown animated" data-wow-delay=".5s">
						<ul class="social-icons">
							<li><a href="#"> </a></li>
							<li><a href="#" class="fb"> </a></li>
							<li><a href="#" class="in"> </a></li>
							<li><a href="#" class="dott"> </a></li>
						</ul>
					</div>
					<div class="col-md-6 banner-top-right wow slideInDown animated" data-wow-delay=".5s">
						    <ul class="loginRegister">
						    <?php if($login_user == ""){
						        echo "<li class=\"login-item openlogin\"><a href=\"javascript:void(0);return false;\" class=\"login-link\">登录</a></li>";
						        echo "<li class=\"register-item\"><a href=\"register.php\" class=\"register-link\">注册</a></li>";
						    }else{
						        echo "<li class=\"login-item \"><a href=\"setSelf.php\" onclick=\"window.location.href='setSelf.php'\" class=\"login-link\">{$login_user}</a></li>";
						        echo "<li class=\"register-item\"><a href=\"logout.php\" class=\"register-link\">注销</a></li>";
						    }
						    ?>
							</ul>
					</div>
<!-- loginalert -->
<div class="loginmask"></div>

<div id="loginalert">
	
	<div class="pd20 loginpd">
		<h3><i class="closealert fr"></i><div class="clear"></div></h3>
		<div class="loginwrap">
			<div class="loginh">
				<div class="fl">User登录</div>
				<div class="fr">还没有账号<a id="sigup_now" href="register.php">立即注册</a></div>
			</div>
			<h3><span class="fl">账号/邮箱登录</span><div class="clear"></div></h3>
			<form action="dologin.php" method="post" id="login_form">
				<div class="logininput">
					<input type="text" name="account" class="loginusername" value="" placeholder="用户名" />
					<input type="password" name="pword" class="loginuserpasswordt" value="" placeholder="密码" />
					<input type="text" name="verify" class="loginverify" style="width: 110px" value="" placeholder="验证码" />
					<a class="changeVerify"  href="javascript:void(0);return false;"><img alt="" src="getVerify.php" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;看不清？点我</a>
					<!-- <input type="password" name="password" class="loginuserpasswordp" style="display:none" /> -->
				</div>
				<div class="loginbtn">
					<div class="loginsubmit fl"><input type="submit" value="登录" class="btn" /></div>
					<div class="fl" style="margin:26px 0 0 0;"><input id="bcdl" name="autoflag" type="checkbox" checked="true" />保持登录</div>
					<div class="fr" style="margin:26px 0 0 0;"><a href="findbackPasswordSt1.php">忘记密码?</a></div>
					<div class="clear"></div>
				</div>
			</form>
		</div>
	</div>
	
</div>
<!-- //end loginalert -->
<script type="text/javascript">
$(".changeVerify").click(function(){
	var changeImg = $(this);
	$.ajax({
		type:"POST",
		url:"refreshVerify.php",
		data:"act=refresh",
		cache:false,
		success:function(data){
			changeImg.html(data);
		},
		error:function(){
			alert("出现error...");
		}
	});
});

</script>

					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="banner-text">
				<h1 class="wow slideInLeft animated" data-wow-delay=".5s"><a href="index.php">Linked US</a></h1>
				<p class="wow slideInRight animated" data-wow-delay=".5s">我们在这里，而，你又在哪里</p>
			</div>
			<!--navigation-->
			<div class="top-nav wow">
				<div class="container">
					<div class="navbar-header logo">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							Menu
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="menu">
							<ul class="nav navbar">
								<li class="menu-item menu-item-current"><a href="#home" class="menu-link scroll">览主页</a></li>
								<li class="menu-item"><a href="recommend.php" onclick="window.location.href='recommend.php'" class="menu-link scroll">荐好友</a></li>
								<li class="menu-item"><a href="active.php" onclick="window.location.href='active.php'" class="menu-link scroll">推动态</a></li>
								<li class="menu-item"><a href="writeActive.php" onclick="window.location.href='writeActive.php'" class="menu-link scroll">写动态</a></li>
								<li class="menu-item"><a href="setSelf.php" onclick="window.location.href='setSelf.php'" class="menu-link scroll">关于我</a></li>
								<li class="menu-item"><a href="#contact"   class="menu-link scroll">联系</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
						<script src="js/classie.js"></script>
						<script>
							(function() {
								[].slice.call(document.querySelectorAll('.menu')).forEach(function(menu) {
									var menuItems = menu.querySelectorAll('.menu-link'),
										setCurrent = function(ev) {
											ev.preventDefault();
											var item = ev.target.parentNode; // li
											// return if already current
											if( classie.has(item, 'menu-item-current') ) {
												return false;
											}
											// remove current
											classie.remove(menu.querySelector('.menu-item-current'), 'menu-item-current');
											// set current
											classie.add(item, 'menu-item-current');
										};
									[].slice.call(menuItems).forEach(function(el) {
										el.addEventListener('click', setCurrent);
									});
								});
							})(window);
						</script>
					</div>
					<!-- script-for sticky-nav -->
					<script>
					$(document).ready(function() {
						 var navoffeset=$(".top-nav").offset().top;
						 $(window).scroll(function(){
							var scrollpos=$(window).scrollTop(); 
							if(scrollpos >=navoffeset){
								$(".top-nav").addClass("fixed");
							}else{
								$(".top-nav").removeClass("fixed");
							}
						 });
					});
					</script>
					<!-- /script-for sticky-nav -->
				</div>
			</div>	
			<!--//navigation-->
		</div>
	</div>
	<!--//banner-->
	<!--welcome-->
	<div class="welcome" id="about">
		<div class="container">
			<h2 class="title wow slideInDown animated" data-wow-delay=".5s">Welcome To Linked-US</h2>
			<div class="col-md-4 welcome-left wow slideInLeft animated" data-wow-delay=".5s">
				<img src="images/img1.jpg" alt=""/>
			</div>
			<div class="col-md-8 welcome-right wow slideInRight animated" data-wow-delay=".5s">
				<h5>01</h5>
				<h4>About Us</h4>
				<p>关系型数据库的最大特点就是事务的一致性, 但是，在网页应用中，尤其是SNS应用中，一致性却不是显得那么重要，用户A看到的内容和用户B看到同一用户C内容更新不一致是可以容忍的。<br />
				       关系数据库的另一个特点就是其具有固定的表结构，因此，其扩展性极差，而在SNS中，系统的升级，功能的增加，往往意味着数据结构巨大变动，这一点关系型数据库也难以应付，需要新的结构化数据存储。于是，诞生出非关系型数据库<br />
				</p>
			</div>
			<div class="clearfix"> </div>
			<div class="col-md-7 welcome-bottom-left wow slideInLeft animated" data-wow-delay=".5s">
				<img src="images/img2.jpg" alt=""/>
				<h5>02</h5>
				<h4>Our Mission</h4>
				<p>秉承社交友好性的理念，提升用户社交好感度，LinkedUS寓意一个联通的世界。<br />
				   LinkedUS，专注社交。基于Neo4j图形数据库，PHP开发环境打造，H5的完美结合带给你无与伦比的享受。<br />
				   LinkedUS 功能范围包括：登录后智能推荐好友，注册后发表动态，查看好友动态信息，更改个人信息设置etc.<br />
				</p>
			</div>
			<div class="col-md-5 welcome-bottom-right wow slideInRight animated" data-wow-delay=".5s">
				<div class="welcome-grid-left">
					<img src="images/img3.jpg" alt=""/>
				</div>
				<div class="welcome-grid-right">
					<h5>03</h5>
					<h4>What We do</h4>
					<p>为美好生活加油。<br />
					   Neo4j是一个高性能的,NOSQL图形数据库，它将结构化数据存储在网络上而不是表中。它是一个嵌入式的、基于磁盘的、具备完全的事务特性的Java持久化引擎，但是它将结构化数据存储在网络(从数学角度叫做图)上而不是表中。
					</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//welcome-->
	<!--services-->
	<div class="welcome services" id="services">
		<div class="container">
			<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">Our Services</h3>
			<div class="services-info">
				<div class="col-md-4 services-grids wow zoomIn animated" data-wow-delay=".5s">
					<div class="service">
						<div class="icon-holder">
							<span class="glyphicon glyphicon-book"></span>
						</div>
						<h4 class="heading"><a href="recommend.php" style="color:white; ">荐好友&加好友</a></h4>
						<p class="text">智能推荐你可能感兴趣的好友</p>
					</div>
				</div>
				<div class="col-md-4 services-grids wow zoomIn animated" data-wow-delay=".5s">
					<div class="service">
						<div class="icon-holder">
							<span class="glyphicon glyphicon-education"></span>
						</div>
						<h4 class="heading"><a href="active.php" style="color: white;">推动态&看身边</a></h4>
						<p class="text">推荐你可能感兴趣的动态</p>
					</div>
				</div>
				<div class="col-md-4 services-grids wow zoomIn animated" data-wow-delay=".5s">
					<div class="service">
						<div class="icon-holder">
							<span class="glyphicon glyphicon-thumbs-up"></span>
						</div>
						<h4 class="heading"><a href="writeActive.php" style="color: white;">写动态&关于我</a></h4>
						<p class="text">表达和释放你自己，更改和更新你自己</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//services-->
	<!--contact -->
	<div class="welcome contact" id="contact">
		<div class="container">
			<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">Contact Us</h3>
			<div class="contact-row">
				<div class="col-md-6 contact-right wow slideInRight animated" data-wow-delay=".5s">
					<h4>Address:</h4>
					<div class="address-left">
						<p>中国-辽宁大连-高新园区凌海路1号</p>
					</div>
					<div class="address-right">
						<p>Call US : 182-4113-7622</p>
						<p>E-mail : <a href="mailto:xspbruins@Singfor.com.cn">xspbruins@Singfor.com.cn</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<a id="toContact"></a>
			<div class="contact-form">
				<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">联系US</h3>
				<p>LINKED US user们，有什么反馈请填写好信息告诉我们，你我共同的努力造就更好的明天~</p>
				<form class="wow fadeInUp animated" data-wow-delay=".5s" action="contactUS.php" method="post">
				<?php if($login_user){?>
					<input type="text" name="account" value="<?php echo $info['account'];?>" placeholder="Account" required="required">
					<input class="email" type="text" name="email" value="<?php echo $info['email'];?>" placeholder="Email" required="required">
					<input type="text" name="phone" value="<?php echo $info['phone'];?>" placeholder="Phone" required="required">
					<textarea name="message" placeholder="Message" required="required"></textarea>
					<input class="wow zoomIn animated" data-wow-delay=".5s" type="submit" value="提交" >
				<?php }else {
				    echo '<input type="text" name="account" placeholder="Account" required="required">';
				    echo '<input class="email" type="text" name="email" placeholder="Email" required="required">';
				    echo '<input type="text" name="phone" placeholder="Phone" required="required">';
				    echo '<textarea name="message" placeholder="Message" required="required"></textarea>';
				    echo '<input class="wow zoomIn animated" data-wow-delay=".5s" type="submit" value="提交" >';
				}?>
				</form>
			</div>
		</div>
	</div>
	<!--//contact -->
	<!--footer-->
	<div class="welcome footer">
		<div class="container">
			<div class="clearfix"> </div>
			<div class="footer-copy wow slideInUp animated" data-wow-delay=".5s">
				<p>Copyright &copy; 2016.@Bruin熊工作室 All rights reserved.</p>
			</div>
		</div>
	</div>
	<!--//footer-->
	<!-- Bootstrap core JavaScript ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>

</html>
>>>>>>> Stashed changes
=======
>>>>>>> cc9a4e4708ccd394c26f5916d4a5d79dd9e25f5d
