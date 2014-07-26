<div class='stripe-regular items-carousel-wrap row'>
	<div class="box box-site-header">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-shopping-cart"></i> My Deals</h3>
		</div>
	</div>
	
	<div class="box">
		<div class="box-body">
			<div class="table-responsive">
				<table class='table table-striped'>
					<tr><th>Offer Title</th><th>Deal Title</th><th>WAS</th><th>SAVE</th><th>Get</th></tr>
					<?php foreach($offers as $offer){?>
								<tr>
									<td><?=$offer->do_offertitle?></td>
									<td><?=$offer->do_listprice?></small></td>
									<td><?=$offer->do_originalprice?></small></td>
									<td><?=$offer->do_discount?></small></td>
									<td><button class="btn btn-danger btn-sm btn-buy" data-dealid="<?=$offer->do_ddid?>" data-offerid="<?=$offer->do_autoid?>"><i class="fa fa-shopping-cart"></i></button></td>
								</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>