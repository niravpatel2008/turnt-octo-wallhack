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
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Category list</h3>                                    
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="categoryTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Detail</th>
									<th>Created At</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Name</th>
									<th>Detail</th>
									<th>Created At</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
    	</div>
    </div>
</section>