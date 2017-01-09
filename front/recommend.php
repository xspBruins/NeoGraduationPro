<?php
?>
	<!--work-->
	<div class="welcome work" id="work">
		<div class="container">
			<div class="work-info">
				<div class="col-md-3 work-grids work-grd1 wow slideInLeft animated" data-wow-delay=".5s">
					<h3 class="title">推好友</h3>
					<p>在这里，给你，可能会感兴趣的人</p>
					<ul>
						<li><span class="glyphicon glyphicon-ok-circle"></span> 我们的真实 </li>
						<li><span class="glyphicon glyphicon-ok-circle"></span> 我们的兴致</li>
						<li><span class="glyphicon glyphicon-ok-circle"></span> 我们的心情</li>
						<li><span class="glyphicon glyphicon-ok-circle"></span> 你在哪里</li>
					</ul>
				</div>
				<?php foreach ($peoples as $people):?>
				<div class="col-md-3 work-grids wow zoomIn animated" data-wow-delay=".5s">
					<img src="<?php echo $people['pIMG'];?>" alt=""/>
					<div class="img-caption">
						<div class="img-text">
							<h4><?php echo $people['pName'];?></h4>
							<p>个性签名：Etiam pellentesque felis dolor quis efficitur eros </p>
						</div>
					</div>
					<input type="button" class="recommend" value="加为好友" onclick="addFriend('<?php echo $login_user?>','<?php echo $people['pName'];?>')">
				</div>
				<?php endforeach;?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<script type="text/javascript">
function addFriend(login_user,friend){
	window.location = "doAdd.php?login_user="+login_user+"&friend="+friend;
}
</script>
	<!--//work-->

