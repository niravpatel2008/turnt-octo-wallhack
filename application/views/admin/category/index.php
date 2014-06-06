<section class="content-header">
    <h1>
        Category
        <!-- <small>Control panel</small> -->
    </h1>
    <?php
		$this->load->view(ADMIN."/template/bread_crumb");
	?>
</section>
<section class="content">
	<div class="row">
    	<div class="col-md-12">
    		<a class="btn btn-default pull-right" href="<?=admin_path()."category/add"?>">
            <i class="fa fa-plus"></i>&nbsp;Add Category</a>
            <div id="list">
			</div>
    	</div>
    </div>
</section>