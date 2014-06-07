<?php
	//pr($result);
?>
<div class="box">
	<div class="box-header">
		<h3 class="box-title">User list</h3>                                    
	</div><!-- /.box-header -->
	<div class="box-body table-responsive">
		<table id="userTable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Role</th>
					<th>Contact</th>
					<th>Email</th>
					<th>Created At</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($result as $r){?>
				<tr>
					<td><?php echo $r->du_uname;?></td>
					<td><?php echo $r->du_role;?></td>
					<td><?php echo $r->du_contact;?></td>
					<td><?php echo $r->du_email;?></td>
					<td><?php echo $r->du_createdate;?></td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Name</th>
					<th>Detail</th>
					<th>Created Date</th>
				</tr>
			</tfoot>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->
<div class="pager" align="right">
	<div align="left" class="pagercount">
	 <?=$pfooterTxt;?>
	</div>
	
	<div style="float:right;" align="right">
		<?php echo $pagination_link; ?>&nbsp;&nbsp;
	</div>
</div>