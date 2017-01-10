<?php
require_once '../include.php';

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Linked-US注册</title>
<link rel="stylesheet" media="screen" href="css/zzsc.css" />
</head>

<body>
<form id="msform" method="post" action="doRegister.php">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Account Setup</li>
		<li>Social Profiles</li>
		<li>Personal Details</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Create your account</h2>
		<h3 class="fs-subtitle">This is step one</h3>
		账号：<input type="text" id="account" name="account" placeholder="Account (必填)" />
		密码：<input type="password" id="pass" name="pass" placeholder="Password (必填)" />
		确认：<input type="password" id="cpass" name="cpass" placeholder="Confirm Password (必填)" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Social Profiles</h2>
		<h3 class="fs-subtitle">Your presence on the social network</h3>
		QQ：<input type="text" id="qq" name="qq" placeholder="QQ" />
		邮箱：<input type="text" id="email" name="email" placeholder="Email(必填)" />
		手机：<input type="text" id="phone" name="phone" placeholder="Phone" />
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Personal Details</h2>
		<h3 class="fs-subtitle">We will never sell it</h3>
		<input type="text" name="uname" placeholder="Name" />
		<textarea name="tag" placeholder="Label"></textarea>
		<textarea name="address" placeholder="Address(如:辽宁省大连市)"></textarea>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="submit" name="submit" class="submit action-button" value="Submit" />
	</fieldset>
</form>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/jquery.easing.min.js" type="text/javascript"></script>
<script src="js/zzsc.js" type="text/javascript" charset="gb2312"></script>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<div style="text-align:center;clear:both">
<p>Copyright &copy; 2016.@Bruin熊工作室 All rights reserved.</p>
</div>
</body>
</html>