<?php
//echo "<pre>";
//print_r($dealsDetail);
$detail = $dealsDetail['detail'][0];
$features = array_map('trim',array_filter(explode(",",$detail['dd_features'])));
$validities = array_map('trim',array_filter(explode(",",$detail['dd_conditions'])));
//$includes = array_map('trim',array_filter(explode(",",$detail['dd_includes'])));
$includes = $detail['dd_includes'];
$policies = array_map('trim',array_filter(explode(",",$detail['dd_policy'])));
$url = base_url()."deals/detail/".$detail['dd_autoid']."/".$detail['dd_name'];
$photo = "";
foreach ($dealsDetail['links'] as $key=>$val)
{
	if($val['dl_autoid'] == $detail['dd_mainphoto'])
		$photo = base_url()."uploads/".$val['dl_url'];
}
$commanAttr = " st_url='".$url."' st_title='".$detail['dd_name']."' st_image='".$photo."' st_summary='".$detail['dd_description']."' ";
$fav_class = ($dealsDetail['is_fav'] != "" && $dealsDetail['is_fav'] > 0)?"unfavme":"favme";
$category = $dealsDetail['category'];
$offers = $dealsDetail['offers'];
$tags = array();
foreach ($dealsDetail['tags'] as $key=>$val)
{
	$tags[]=$val['dt_tag'];
}
$tags = implode(",",$tags);

$validitydate = "";
if ($detail['dd_validtilldate'] != "")
$validitydate = "<li>Valid until: ". format_date($detail['dd_validtilldate'])."</li>";

?>
<div id='buyofferpopup' class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">		
				<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
				<h3 class="modal-title"><i class="fa fa-shopping-cart"></i> Select Offer :</h3>
			</div>
			<div class="modal-body" style='padding:0px;'>
				<div class="table-responsive">
					<table class='table table-striped'>
						<tr><th>Offer Title</th><th>NOW</th><th>WAS</th><th>SAVE</th><th>Get</th></tr>
			<?php 
				$page = 0;
				foreach($offers as $k=>$offer){ if ($k%5 == 0) { $page++; }?>
						<tr class='offer-page page-<?=$page?>'>
							<td><b>Offer <?=$k+1?>: </b><?=$offer->do_offertitle?></td>
							<td><small class="label label-danger"><i class="fa fa-rupee"></i><?=$offer->do_listprice?></small></td>
							<td><small class="label label-info"><i class="fa fa-rupee"></i><?=$offer->do_originalprice?></small></td>
							<td><small class="label label-success"><i class="fa fa-rupee"></i><?=$offer->do_discount?></small></td>
							<td><button class="btn btn-danger btn-sm btn-buy" data-dealid="<?=$offer->do_ddid?>" data-offerid="<?=$offer->do_autoid?>"><i class="fa fa-shopping-cart"></i></button></td>
						</tr>
			<?php } ?>
					</table>
					<?php if($page > 1) { ?>
					<div> 
						<ul class="offer-pager pager" data-totalpage="<?=$page?>" data-currentpage="1">
						  <li class="previous"><a href="#">&larr; Older</a></li>
						  <li class="next"><a href="#">Newer &rarr;</a></li>
						</ul>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id='buyoffermessage' class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">		
				<button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
				<h3 class="modal-title"><i class="fa fa-shopping-cart"></i>Deal processed successfully.</h3>
			</div>
			<div class="modal-body">
				<div>
					Thank you for purchasing offer.
				</div>
			</div>
		</div>
	</div>
</div>

<div class='stripe-regular items-carousel-wrap row'>
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title"><span class="<?=$fav_class?>" did='<?=$detail['dd_autoid']?>'></span>  &nbsp;<?=$detail['dd_name']?></h3>
		</div>
	</div>



	<div class='row'>
		<section class='col-lg-6'>
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-ticket"></i> Buy this deal</h3>
					<div class='pull-right box-tools'>
						<span class='st_facebook' <?=$commanAttr?>></span>
						<span class='st_twitter' <?=$commanAttr?>></span>
						<span class='st_linkedin' <?=$commanAttr?>></span>
						<span class='st_pinterest' <?=$commanAttr?>></span>
						<span class='st_email' <?=$commanAttr?>></span>
						<span class='st_sharethis' <?=$commanAttr?>></span>
					</div>
				</div>
				<div class="box-body">
					<div id='buy'>
						<ul class='list-unstyled'>
							<li><b>Features :</b>
								<ul style="list-style: none outside none;">
									<?php foreach ($features as $feature){
										echo "<li><i class='fa fa-fw fa-check green'></i> $feature</li>";
									}?>
								</ul>
							</li>
						</ul>
						<div class='row'>
							<div class='col-lg-4'>
								<div class="small-box bg-red">
									<a class="small-box-footer" href="#">
										Now
									</a>
									<div class="inner">
										<center><h3 class='box-title'><i class="fa fa-rupee"></i><?=$detail['dd_listprice'];?></h3></center>
									</div>
								</div>
							</div>
							<div class='col-lg-4'>
								<div class="small-box bg-aqua">
									<a class="small-box-footer" href="#">
										Was
									</a>
									<div class="inner">
										<center><h3 class='box-title'><i class="fa fa-rupee"></i><?=$detail['dd_originalprice'];?></h3></center>
									</div>
								</div>
							</div>
							<div class='col-lg-4'>
								<div class="small-box bg-green">
									<a class="small-box-footer" href="#">
										Save
									</a>
									<div class="inner">
										<center><h3 class='box-title'><i class="fa fa-rupee"></i><?=$detail['dd_discount'];?></h3></center>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<center><button class='btn btn-social bg-orange margin' style='position:relative;' data-target="#buyofferpopup" data-toggle="modal"><i class=' fa fa-shopping-cart'></i>GET THIS DEAL<span style='margin-left:10px;padding-left:10px;border-left:1px solid rgba(0, 0, 0, 0.2)'><?=$dealsDetail['buycount']?></span></button></center>
				</div>
			</div>
		</section>


		<section class='col-lg-6'>
			<div class="box box-success">
				<div class="box-body">
					<div id="slider-wrapper" class="carousel slide" data-ride="carousel" data-interval="false">
						<ol class="carousel-indicators">
						<?php foreach($dealsDetail['links'] as $key=>$val){?>
							<li data-target="#slider-wrapper" data-slide-to="<?=$key?>" class="<?=($key == 0)?"active":""?>"></li>
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
						<img height="50" width="72" style='height:50px;width:72px;' src="<?=base_url()."uploads/".$val['dl_url']?>">
					</a>
				<?php }?>
				</div>
			</div>
		</section>
	</div>

	<div class='row'>
		<section class='col-lg-6'>
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right">
					<li class="active"><a data-toggle="tab" href="#tab_1-1">Detail</a></li>
					<li ><a data-toggle="tab" href="#tab_1-2">Validity</a></li>
					<li class="pull-left header">
						<i class="fa fa-paperclip"></i>
						Offer
					</li>
				</ul>
				<div class="tab-content">
					<div id='tab_1-1' class='tab-pane active'>
						<div id='description'>
							<ul class='list-unstyled'>
							<?php foreach($offers as $k=>$offer){?>
								<li><i class="fa fa-fw fa-bell-o"></i><b>Offer <?=$k+1?>: </b><?=$offer->do_offertitle?></li>
							<?php } ?>
							</ul>
						</div>
					</div>	
					<div id='tab_1-2' class='tab-pane'>
						<ul class='list-unstyled'>
							<li>
								<ul>
									<?=$validitydate?>
									<?php foreach ($validities as $validity){
										echo "<li>$validity</li>";
									}?>
								</ul>
							</li>
						</ul>
					</div>	
				</div>
			<div>
		</section>

		<section class='col-lg-6'>
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right">
					<li class="active"><a data-toggle="tab" href="#tab_2-1">Includes</a></li>
					<li ><a data-toggle="tab" href="#tab_2-2">Description</a></li>
					<li ><a data-toggle="tab" href="#tab_2-3">Policy</a></li>
					<li class="pull-left header">
						<i class="fa fa-th"></i>
						Offer
					</li>
				</ul>
				<div class="tab-content">
					<div id='tab_2-1' class='tab-pane active'>
						<?=$includes?>
					</div>	
					<div id='tab_2-2' class='tab-pane'>
						<div id='description'><?=$detail['dd_description'];?></div>
					</div>
					<div id='tab_2-3' class='tab-pane'>
						<ul class='list-unstyled'>
							<?php foreach ($policies as $policy){
								echo "<li><i class='fa fa-fw fa-check green'></i> $policy</li>";
							}?>
						</ul>
					</div>
				</div>
			<div>
		</section>
	</div>

<?php /*?>
	<div class='row'>
		<section class='col-lg-4'>
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-paperclip"></i> Offer Validity</h3>
				</div>
				<div class="box-body">
					<ul class='list-unstyled'>
						<li>
							<ul>
								<?php foreach ($validities as $validity){
									echo "<li>$validity</li>";
								}?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</section>

		<section class='col-lg-4'>
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-clipboard"></i> Offer Detail</h3>
				</div>
				<div class="box-body">
					<div id='description'>
					<ul class='list-unstyled'>
					<?php foreach($offers as $offer){?>
						<li><i class="fa fa-fw fa-bell-o"></i><?=$offer->do_offertitle?></li>
					<?php } ?>
					</ul>
					</div>
				</div>
			</div>
		</section>

		<section class='col-lg-4'>
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-pencil"></i> Description</h3>
				</div>
				<div class="box-body">
					<div id='description'><?=$detail['dd_description'];?></div>
				</div>
			</div>
		</section>
	</div>
<?php */?>


	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-location-arrow"></i> Location</h3>
		</div>
		<div class="box-body clearfix">
			<div class='col-lg-4'>
				<input type='hidden' id='lat' value='<?=$detail['de_lat'];?>'>
				<input type='hidden' id='long' value='<?=$detail['de_long'];?>'>
				<h3><?=$detail['de_name'];?></h3>
				<dl class="dl-horizontal">
					<dt>Address:</dt>
					<dd><?=$detail['de_address'].", ".$detail['de_city'].", ".$detail['de_state'].", ".$detail['de_zip'];?></dd>
					<dt>Contact:</dt>
					<dd><?=$detail['de_contact'];?></dd>
					<dt>Email:</dt>
					<dd><a href="mailto:<?=$detail['de_email'];?>"><?=$detail['de_email'];?></a></dd>
					<dt>Site:</dt>
					<dd><a href="<?=$detail['de_url'];?>" target="_blank"><?=$detail['de_url'];?></a></dd>
				</dl>
			</div>
			<div id='map' class='col-lg-8'>
			</div>
		</div>
	</div>

	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">You also may like this</h3>
		</div>
	</div>

	<div id='search_results' data-columns></div>
</div>
<input type='hidden' id='tags' value="<?=$tags?>">
<input type='hidden' id='category' value="<?=$category->dc_catid?>">