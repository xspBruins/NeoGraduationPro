<?php
?>
	<!--slid-->
		<div class="welcome contact" id="login">
		<div class="container">
			<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">get in Login</h3>
			<div class="contact-form">
				<h3 class="title wow fadeInDown animated" data-wow-delay=".5s">登录</h3>
				<p>Linked US --连接起你我共同的念想</p>
				<form method="post" action="dologin.php" class="wow fadeInUp animated" data-wow-delay=".5s">
					<input type="text" name="name" placeholder="Name" required="">
					<input class="pass" name="password" type="password" placeholder="password" required="">
					<input class="wow zoomIn animated" data-wow-delay=".5s" type="submit" value="登录">
				</form>
			</div>
		</div>
	</div>
	<!--//slid-->
	<!--gallery-->
	<div id="gallery" class="welcome gallery">
		<div class="container">
			<h3 class="title">好友动态</h3>
			<div class="gallery-info">
				<div class="col-md-6 gallery-grids glry-grid1">
					<div class="gallery-grids-top">
					<?php foreach ($allResults as $selfResult):?>
						<a href="#portfolioModal1" class="b-link-stripe b-animate-go wow zoomIn animated" data-wow-delay=".5s" data-toggle="modal">
							<img src="<?php echo $selfResult['acIMG'];?>" class="img-responsive" alt=""/>
							<div class="b-wrapper">
								<span class="b-animate b-from-left">
									<img class="img-responsive" src="images/e.png" alt=""/>
								</span>					
							</div>
						</a>
					<?php endforeach;?>
					</div>

				</div>
<!-- 以上为自己动态 -->
<!-- 以下为好友动态 -->
				<div class="col-md-6 gallery-grids glry-grid1">
					<div class="gallery-grids-top ">
					<?php foreach ($allResults as $fResult):?>
						<a href="#portfolioModal6" class="b-link-stripe b-animate-go wow zoomIn animated" data-wow-delay=".5s" data-toggle="modal">
							<img src="<?php echo $fResult['facIMG'];?>" class="img-responsive" alt=""/>
							<div class="b-wrapper">
								<span class="b-animate b-from-left">
									<img class="img-responsive" src="images/e.png" alt=""/>
								</span>					
							</div>
						</a>
					<?php endforeach;?>
					</div>
				</div>
				<div class="clearfix"></div>
				
<!-- gallery Modals -->

				<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-hidden="true">
					<div class="modal-content">
						<div class="close-modal" data-dismiss="modal">
							<div class="lr">
								<div class="rl"></div>
							</div>
						</div>
						<div class="portfolio-container">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
									<div class="modal-body">
									<?php foreach ($allResults as $acResult):?>
										<h3><?php echo $acResult['acName'];?></h3>
										<hr>
										<img src="<?php echo $acResult['acIMG'];?>" class="img-responsive img-centered" alt="">
										<p><?php echo $acResult['acContext'];?></p>
										<p><?php echo $acResult['acData'];?></p>
									<?php endforeach;?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
<!-- 以上为自己动态 -->
<!-- 以下为好友动态 -->				
				<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" aria-hidden="true">
					<div class="modal-content">
						<div class="close-modal" data-dismiss="modal">
							<div class="lr">
								<div class="rl"></div>
							</div>
						</div>
						<div class="portfolio-container">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
									<div class="modal-body">
									<?php foreach ($allResults as $fResult):?>
										<h3><?php echo $fResult['facName'];?></h3>
										<hr>
										<img src="<?php echo $fResult['facIMG'];?>" class="img-responsive img-centered" alt="">
										<p><?php echo $fResult['facContext'];?></p>
										<p><?php echo $fResult['facData'];?></p>
									<?php endforeach;?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--//gallery Modals -->
			</div>
		</div>
	</div>
	<!--//gallery-->