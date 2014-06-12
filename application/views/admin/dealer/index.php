<section class="content-header">
    <h1>
        Dealers
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
    		<a class="btn btn-default pull-right" href="<?=admin_path()."dealer/add"?>">
            <i class="fa fa-plus"></i>&nbsp;Add Dealer</a>
            <div id="list">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Dealer list</h3>                                    
					</div><!-- /.box-header -->
					<div class="box-body table-responsive">
						<table id="dealerTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>User</th>
									<th>Dealer</th>
									<th>Contact</th>
									<th>Email</th>
									<th>Address</th>
									<th>City</th>
									<th>State</th>
									<th>Zip</th>
									<th>Lat</th>
									<th>Long</th>
									<th>Url</th>
									<th>Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>User</th>
									<th>Dealer</th>
									<th>Contact</th>
									<th>Email</th>
									<th>Address</th>
									<th>City</th>
									<th>State</th>
									<th>Zip</th>
									<th>Lat</th>
									<th>Long</th>
									<th>Url</th>
									<th>Date</th>
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