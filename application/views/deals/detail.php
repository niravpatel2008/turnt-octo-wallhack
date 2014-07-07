<?php
//echo "<pre>";
//print_r($dealsDetail);
$detail = $dealsDetail['detail'][0];
?>
<div class='stripe-regular items-carousel-wrap row'>

		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-comments-o"></i> <?=$detail['dd_name']?></h3>
			</div>
		</div>



	<div class='row'>
		<section class='col-lg-6'>
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-comments-o"></i>Buy this deal</h3>
				</div>
				<div class="box-body">
					<div id='buy'>
					</div>
				</div>		
				<div class="box-footer">
					<center><button class='btn bg-orange margin'>GET THIS DEAL</button></center>
				</div>
			</div>	
		</section>


		<section class='col-lg-6'>
			<div class="box box-success">
				<div class="box-body">
					<div id="slider-wrapper" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						<?php foreach($dealsDetail['links'] as $key=>$val){?>
							<li data-target="#carousel-example-generic" data-slide-to="<?=$key?>" class="<?=($key == 0)?"active":""?>"></li>
						<?php }?>
						</ol>
						<div class="carousel-inner">
						<?php foreach($dealsDetail['links'] as $key=>$val){?>
							<div class="item <?=($key == 0)?"active":""?>">
								<img src="<?=base_url()."uploads/".$val['dl_url']?>" alt="First slide">
							</div>
						<?php }?>
						</div>
						<a class="left carousel-control" href="#slider-wrapper" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#slider-wrapper" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>
				</div>		
				<div class="box-footer clearfix">
				<?php foreach($dealsDetail['links'] as $key=>$val){?>
					<a href='javascript:void(0);' class='left margin' onclick="$('#slider-wrapper').carousel(<?=$key?>);">
						<img height="72" width="72" src="<?=base_url()."uploads/".$val['dl_url']?>">
					</a>
				<?php }?>
				</div>
			</div>	
		</section>
	</div>

	
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-comments-o"></i> Description</h3>
		</div>
		<div class="box-body">
			<div id='description'><?=$detail['dd_description'];?></div>
		</div>
	</div>



	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-comments-o"></i> Location</h3>
		</div>
		<div class="box-body clearfix">
			<div class='col-lg-4'>
				<input type='hidden' id='lat' value='<?=$detail['de_lat'];?>'>
				<input type='hidden' id='long' value='<?=$detail['de_lat'];?>'>
				<h3><?=$detail['de_name'];?></h3>
				<dl class="dl-horizontal">
					<dt>Address:</dt>
					<dd><?=$detail['de_address'].", ".$detail['de_city'].", ".$detail['de_state'].", ".$detail['de_zip'];?></dd>
					<dt>Contact:</dt>
					<dd><?=$detail['de_contact'];?></dd>
					<dt>Email:</dt>
					<dd><?=$detail['de_email'];?></dd>
					<dt>Site:</dt>
					<dd><?=$detail['de_url'];?></dd>
				</dl>
			</div>	
			<div id='map' class='col-lg-8'>
				<iframe
				  frameborder="0" style="border:0"
				  src="https://www.google.com/maps/embed?center=<?=$detail['de_lat'];?>,<?=$detail['de_lat'];?>&zoom=18&maptype=satellite">
				</iframe>
			</div>		
		</div>
	</div>

</div>


<!--
 [de_name] => Dx Hotel 
 [de_address] => viashvambhar appartment 
 [de_city] => Ahmedabad 
 [de_state] => Gujarat 
 [de_zip] => 380024 
 [de_contact] => 1231231230 
 [de_email] => dxhotel@gmail.com 
 [de_url] => http://dxhotel.com/ - 

-->