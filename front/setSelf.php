<<<<<<< HEAD
<<<<<<< Updated upstream
=======
>>>>>>> cc9a4e4708ccd394c26f5916d4a5d79dd9e25f5d
<?php 
require_once '../include.php';

$client = connectionToNeo4j();
$loginuser = $_SESSION['user'];
$Inforows = getAllInfoByacc($client, $loginuser);
//var_dump($Inforows);

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>关于我</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/style_setSelf.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header">
			    <form action="" method="post" enctype="multipart/form-data" target="">
				<a href="javascript:void(0);return false;" class="image avatar" onclick="changeAvatarImg('<?php echo $loginuser; ?>')" >
				<img src="images/avatar/<?php 
				if(($Inforows['avatarImg'] =="")||($Inforows['avatarImg'] == "default.jpg"))
				    echo "default.jpg"; 
				else 
				    echo $Inforows['avatarImg'];
				?>" alt="" />
				<input type="file" id="uploadAvatar" style="display: none">
				</a>
				</form>
				<h1 class="infoAccount"><strong><?php if($Inforows['account']){
				    echo $Inforows['account'];
				}else {
				    if($Inforows['name']){
				        echo $Inforows['name'];
				    }else{
				        $_SESSION['count'] = 0;
				        echo "<a style=\"text-decoration:none;\" href=\"index.php?ORC=open\">请先登录</a>";
				    }
				}
				
				?></strong><br /></h1>
				<h5 class="infoTag"><?php echo $Inforows['tag'];?></h5>
				<h5 class="infoAddress"><?php echo $Inforows['address'];?></h5>
				<h5 class="infoPhone"><?php echo $Inforows['phone'];?></h5>
			</header>
<script type="text/javascript">
function changeAvatarImg(loginuser){
	var avatarImg = $(".avatar");
	$.ajax({
		type:"POST",
		url:"setAvatarImg.php",
		data:{account:loginuser},
		cache:false,
		//dataType:"json",
		success:function(data){
			//alert(data);
		},
		error:function(){
			alert("出现error...");
		}
	});
}
</script>
		<!-- Main -->
			<div id="main">
		
				<!-- One -->
					<section id="one">
						<header class="major">
							<h2>LINKED US -- 个人信息页<br />
							FOR USER'S INFORMATION</h2>
						</header>
						<p>Written in the preface: from here, is Linked US for users to create personal space, can see your personal information, as already have friends etc.. For personal information such as additions or changes can also be edited. </p>
						<ul class="actions">
							<li><a href="#" class="button">Owner动态 </a></li>
						</ul>
					</section>
				
				<!-- Two -->
					<section id="two">
						<h2>我的好友</h2>
						<div class="row">
							<article class="6u 12u$(3) work-item">
								<a href="images/fulls/01.jpg" class="image fit thumb"><img src="images/thumbs/01.jpg" alt="" /></a>
								<h3>Magna sed consequat tempus</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
							<article class="6u$ 12u$(3) work-item">
								<a href="images/thumbs/02.jpg" class="image fit thumb"><img src="images/thumbs/02.jpg" alt="" /></a>
								<h3>Ultricies lacinia interdum</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
							<article class="6u 12u$(3) work-item">
								<a href="images/thumbs/03.jpg" class="image fit thumb"><img src="images/thumbs/03.jpg" alt="" /></a>
								<h3>Tortor metus commodo</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
							<article class="6u$ 12u$(3) work-item">
								<a href="images/thumbs/04.jpg" class="image fit thumb"><img src="images/thumbs/04.jpg" alt="" /></a>
								<h3>Quam neque phasellus</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
							<article class="6u 12u$(3) work-item">
								<a href="images/thumbs/05.jpg" class="image fit thumb"><img src="images/thumbs/05.jpg" alt="" /></a>
								<h3>Nunc enim commodo aliquet</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
							<article class="6u$ 12u$(3) work-item">
								<a href="images/thumbs/06.jpg" class="image fit thumb"><img src="images/thumbs/06.jpg" alt="" /></a>
								<h3>Risus ornare lacinia</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
						</div>
						<ul class="actions">
							<li><a href="#" class="button">Full Portfolio</a></li>
						</ul>
					</section>
					
				<!-- Three -->
					<section id="three" >
						<h2><a href="javascript:void(0);return false;" onclick="<?php if($_SESSION['user']) echo 'showDialog()';else echo 'alertLogin()'; ?>">编辑信息</a></h2>
						<h6>所需更改信息一项或多项均可，填写完点击确认</h6>
						<div class="row edit" style="display: none;">
							<div class="8u 12u$(2)">
								<form method="post" action="setSelf.php">
									<div class="row uniform 50%">
										<div class="6u 12u$(3)"><input type="text" name="name"  placeholder="名字" /></div>
										<div class="6u$ 12u$(3)"><input type="text" name="email"  placeholder="邮箱" /></div>
										<div class="6u 12u$(3)"><input type="text" name="address"  placeholder="地区" /></div>
										<div class="6u$ 12u$(3)"><input type="text" name="phone"  placeholder="手机" /></div>
										<div class="12u$"><textarea name="tag"  placeholder="个性签名" rows="4"></textarea></div>
									</div>
								</form>
								<ul class="actions">
									<li><input type="submit" value="确认提交" /></li>
								</ul>
							</div>
							
						</div>
					</section>

<script type="text/javascript">
function showDialog(){
	if($(".edit").css("display") == 'none'){
		$(".edit").css("display","block");
	}else{
		$(".edit").css("display","none");
	}
}
function alertLogin(){
	alert('请先登录哦~');
}

$(".actions").click(function(){
	//得到需局部刷新class
	var infoAccount = $(".infoAccount");
	var infoTag = $(".infoTag");
	var infoAddress = $(".infoAddress");
	var infoPhone = $(".infoPhone");

	//得到填入的value
	var name = $("input[name=name]").val();
	var email = $("input[name=email]").val();
	var address = $("input[name=address]").val();
	var phone = $("input[name=phone]").val();
	var tag = $("textarea[name=tag]").val();
	
	var arr = new Array();
	$.ajax({
		type:"POST",
		url:"editUserInfo.php",
		data:{name:name,email:email,address:address,phone:phone,tag:tag},
		cache:false,
		dataType:"json",
		success:function(data){
			//arr = data.split(divisionChar);  //分离字符串变成数组,而考虑后期所填信息匹配问题，返回key数组更方便处理
			for(var key in data){
				/*alert(key);
				alert(data[key]);*/
				if(key == "name"){
					infoAccount.html(data[key]);
				}
				if(key == "address"){
					infoAddress.html(data[key]);
				}
				if(key == "phone"){
					infoPhone.html(data[key]);
				}
				if(key == "tag"){
					infoTag.html(data[key]);
				}
			}
		},
		error:function(){
			alert("出现error...");
		}
	});
});
</script>
			</div>
			
	</body>
<<<<<<< HEAD
=======
<?php
require_once '../include.php';

$client = connectionToNeo4j();
$loginuser = $_SESSION['user'];
$Inforows = getAllInfoByacc($client, $loginuser);
//var_dump($Inforows);

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>关于我</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/style_setSelf.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header">
			    <form id="avatarImgUploadform" action="doUploadAvatar.php" method="post" enctype="multipart/form-data" target="avatarImgUpload">
				<a href="javascript:void(0);return false;" class="image avatar" >
				<img class="avatarImg" src="images/avatar/<?php 
				if(($Inforows['avatarImg'] =="")||($Inforows['avatarImg'] == "default.jpg"))
				    echo "default.jpg"; 
				else 
				    echo $Inforows['avatarImg'];
				?>" alt="" />
				<input type="file" name="avatarPath" title="支持jpg、jpeg、gif、png格式，文件小于2M" size="1"
			           style="position: absolute; left: 46px; top: 50px; width:38px; 
				              border-radius:100%; cursor: pointer; -moz-transform: scale(3.65);
				              opacity: 0; filter: alpha(opacity=0);"
				       class="avatar_path" name="avatar_path"
			           onchange="inputUploadChangeAvatar('<?php echo $loginuser;?>');">
			    <input type="hidden" name="act" value="neoChange">
				</a>
				</form>
				<iframe name="avatarImgUpload" style="display: none;"></iframe>
				<h1 class="infoAccount"><strong><?php if($Inforows['account']){
				    echo $Inforows['account'];
				}else {
				    if($Inforows['name']){
				        echo $Inforows['name'];
				    }else{
				        $_SESSION['count'] = 0;
				        echo "<a style=\"text-decoration:none;\" href=\"index.php?ORC=open\">请先登录</a>";
				    }
				}
				
				?></strong><br /></h1>
				<h5 class="infoTag"><?php echo $Inforows['tag'];?></h5>
				<h5 class="infoAddress"><?php echo $Inforows['address'];?></h5>
				<h5 class="infoPhone"><?php echo $Inforows['phone'];?></h5>
			</header>
<script type="text/javascript">
function inputUploadChangeAvatar(loginuser){
	$("#avatarImgUploadform").submit();

	var avatarImg = $(".avatarImg");
	//var avatar_path = $(".avatar_path").val();
	$.ajax({
		type:"POST",
		url:"setAvatarImg.php",
		data:{act:"frontChange",account:loginuser},
		cache:false,
		//dataType:"json",
		success:function(data){
			//alert(data);
			$(".avatarImg").attr("src","images/avatar/"+data);
		},
		error:function(){
			alert("出现error...");
		}
	});
}
</script>
		<!-- Main -->
			<div id="main">
		
				<!-- One -->
					<section id="one">
						<header class="major">
							<h2>LINKED US -- 个人信息页<br />
							FOR USER'S INFORMATION</h2>
						</header>
						<p>Written in the preface: from here, is Linked US for users to create personal space, can see your personal information, as already have friends etc.. For personal information such as additions or changes can also be edited. </p>
						<ul class="actions">
							<li><a href="#" class="button">Owner动态 </a></li>
						</ul>
					</section>
				
				<!-- Two -->
					<section id="two">
						<h2>我的好友</h2>
						<div class="row">
							<article class="6u 12u$(3) work-item">
								<a href="images/fulls/01.jpg" class="image fit thumb"><img src="images/thumbs/01.jpg" alt="" /></a>
								<h3>Magna sed consequat tempus</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
							<article class="6u$ 12u$(3) work-item">
								<a href="images/thumbs/02.jpg" class="image fit thumb"><img src="images/thumbs/02.jpg" alt="" /></a>
								<h3>Ultricies lacinia interdum</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
							<article class="6u 12u$(3) work-item">
								<a href="images/thumbs/03.jpg" class="image fit thumb"><img src="images/thumbs/03.jpg" alt="" /></a>
								<h3>Tortor metus commodo</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
							<article class="6u$ 12u$(3) work-item">
								<a href="images/thumbs/04.jpg" class="image fit thumb"><img src="images/thumbs/04.jpg" alt="" /></a>
								<h3>Quam neque phasellus</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
							<article class="6u 12u$(3) work-item">
								<a href="images/thumbs/05.jpg" class="image fit thumb"><img src="images/thumbs/05.jpg" alt="" /></a>
								<h3>Nunc enim commodo aliquet</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
							<article class="6u$ 12u$(3) work-item">
								<a href="images/thumbs/06.jpg" class="image fit thumb"><img src="images/thumbs/06.jpg" alt="" /></a>
								<h3>Risus ornare lacinia</h3>
								<p>Lorem ipsum dolor sit amet nisl sed nullam feugiat.</p>
							</article>
						</div>
						<ul class="actions">
							<li><a href="#" class="button">Full Portfolio</a></li>
						</ul>
					</section>
					
				<!-- Three -->
					<section id="three" >
						<h2><a href="javascript:void(0);return false;" onclick="<?php if($_SESSION['user']) echo 'showDialog()';else echo 'alertLogin()'; ?>">编辑信息</a></h2>
						<h6>所需更改信息一项或多项均可</h6>
						<div class="row edit" style="display: none;">
							<div class="8u 12u$(2)">
								<form method="post" action="setSelf.php">
									<div class="row uniform 50%">
										<div class="6u 12u$(3)"><input type="text" name="name"  placeholder="名字" onchange="refreshInfo();" /></div>
										<div class="6u$ 12u$(3)"><input type="text" name="email"  placeholder="邮箱" onchange="refreshInfo();" /></div>
										<div class="6u 12u$(3)"><input type="text" name="address"  placeholder="地区" onchange="refreshInfo();" /></div>
										<div class="6u$ 12u$(3)"><input type="text" name="phone"  placeholder="手机" onchange="refreshInfo();" /></div>
										<div class="12u$"><textarea name="tag"  placeholder="个性签名" rows="4" onchange="refreshInfo();" ></textarea></div>
									</div>
								</form>
								<!--  
								<ul class="actions">
									<li><input type="submit" value="确认提交" /></li>
								</ul>
								-->
							</div>
							
						</div>
					</section>

<script type="text/javascript">
function showDialog(){
	if($(".edit").css("display") == 'none'){
		$(".edit").css("display","block");
	}else{
		$(".edit").css("display","none");
	}
}
function alertLogin(){
	alert('请先登录哦~');
}
function refreshInfo(){
	//得到需局部刷新class
	var infoAccount = $(".infoAccount");
	var infoTag = $(".infoTag");
	var infoAddress = $(".infoAddress");
	var infoPhone = $(".infoPhone");

	//得到填入的value
	var name = $("input[name=name]").val();
	var email = $("input[name=email]").val();
	var address = $("input[name=address]").val();
	var phone = $("input[name=phone]").val();
	var tag = $("textarea[name=tag]").val();
	
	var arr = new Array();
	$.ajax({
		type:"POST",
		url:"editUserInfo.php",
		data:{name:name,email:email,address:address,phone:phone,tag:tag},
		cache:false,
		dataType:"json",
		success:function(data){
			//arr = data.split(divisionChar);  //分离字符串变成数组,而考虑后期所填信息匹配问题，返回key数组更方便处理
			for(var key in data){
				/*alert(key);
				alert(data[key]);*/
				if(key == "name"){
					infoAccount.html(data[key]);
				}
				if(key == "address"){
					infoAddress.html(data[key]);
				}
				if(key == "phone"){
					infoPhone.html(data[key]);
				}
				if(key == "tag"){
					infoTag.html(data[key]);
				}
			}
		},
		error:function(){
			alert("出现error...");
		}
	});

}

</script>
			</div>
			
	</body>
>>>>>>> Stashed changes
=======
>>>>>>> cc9a4e4708ccd394c26f5916d4a5d79dd9e25f5d
</html>