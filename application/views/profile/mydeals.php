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
					<tr><th>Offer Title</th><th>Buy</th><th>Status</th><th>Print</th></tr>
					<?php foreach($deals as $deal){
						#pr($deal);
						?>
								<tr>
									<td><?=$deal['do_offertitle']?></td>
									<td><?=format_date($deal_detail[0]->db_date)?></td>
									<td><?=$deal['db_dealstatus']?></td>
									<td>
									<?php if($deal['db_dealstatus'] == 'active'){?>
									<button class="btn btn-success btn-sm print-offer" data-uid="<?=$deal['db_uid']?>" data-dealuniqueid="<?=$deal['db_uniqueid']?>"  ><i class="fa fa-print"></i></button>
									<?php }?>
									</td>
								</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
