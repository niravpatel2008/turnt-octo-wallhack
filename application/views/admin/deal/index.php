<section class="content-header">
    <h1>
        Deals
        <!-- <small>Control panel</small> -->
    </h1>
    <?php
		$this->load->view(ADMIN."/template/bread_crumb");
	?>
</section>
<section class="content">
	<div class="row">
    	<div class="col-md-12">
    		<div id="flash_msg">
	    		<?php
					if ($this->session->flashdata('flash_type') == "success") {
						echo success_msg_box($this->session->flashdata('flash_msg'));
					}

					if ($this->session->flashdata('flash_type') == "error") {
						echo error_msg_box($this->session->flashdata('flash_msg'));
					}
				?>
			</div>
    		<a class="btn btn-default pull-right" href="<?=admin_path()."deal/add"?>">
            <i class="fa fa-plus"></i>&nbsp;Add Deal</a>
            <div id="list">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Deal list</h3>                                    
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="dealTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>O. Price</th>
									<th>Discount</th>
									<th>L. Price</th>
									<th>Date</th>
									<th>Exp. Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>O. Price</th>
									<th>Discount</th>
									<th>L. Price</th>
									<th>Date</th>
									<th>Exp. Date</th>
									<th>Status</th>
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