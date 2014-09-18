<?php $page = 0; ?>
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
					<tr><th>Offer Title</th><th>Purchased on</th><th>Status</th><th>Print</th></tr>
					<?php foreach($deals as $k=>$deal){ if ($k%10 == 0) { $page++; }
						#pr($deal);
						?>
								<tr class='deal-page page-<?=$page?>'>
									<td><?=$deal['do_offertitle']?></td>
									<td><?=format_date($deal['db_date'])?></td>
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
		<div class='box-footer'>
			<?php if($page > 1) { ?>
			<div  class="modal-footer" style='padding-bottom: 0;padding-top: 0;'>
				<ul class="deal-pager pager" data-totalpage="<?=$page?>" data-currentpage="1">
				  <li class="previous"><a href="#">&larr; Previous</a></li>
				  <li class="next"><a href="#">Next &rarr;</a></li>
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
