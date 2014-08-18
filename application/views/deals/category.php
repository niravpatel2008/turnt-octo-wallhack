<div class='stripe-regular items-carousel-wrap row'>
	<div class="box box-site-header">
		<div class="box-header">
			<h3 class="box-title"><?=$categoryName?></h3>
		</div>
	</div>

	<div class='cat_result' id='search_results' data-columns></div>
	<input type='hidden' name='category' id='category' value='<?=$category?>'>
	<input type='hidden' name='limit' id='limit' value='100'>
</div>
<?php $responsivejs=1;?>