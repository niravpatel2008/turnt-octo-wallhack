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
					<tr><th>Offer Title</th><th>Deal</th><th>Status</th><th>Print</th></tr>
					<?php foreach($deals as $deal){
						#pr($deal);
						?>
								<tr>
									<td><?=$deal['do_offertitle']?></td>
									<td><?=$deal['dd_name']?></td>
									<td><?=$deal['db_dealstatus']?></td>
									<td><?php if($deal['db_dealstatus'] == 'active'){?><button class="btn btn-success btn-sm print-offer" data-dealbuyoutid="<?=base64_encode($deal['db_autoid']) ?>"  ><i class="fa fa-print"></i></button><?php }?></td>
								</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
