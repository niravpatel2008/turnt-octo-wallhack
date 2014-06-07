<section class="content-header">
    <h1>
        Deals
         <small>Add Deal</small>
    </h1>
    <?php
		$this->load->view(ADMIN."/template/bread_crumb");
	?>
</section>
<section class="content">
	<div class="row">
    	<div class="col-md-6">
    		<div class="box-body">
                <?php
                    if (@$flash_msg != "") {
                ?>
                    <div id="flash_msg"><?=$flash_msg?></div>
                <?php        
                    }
                ?>
                <form role="form" action="" method="post">
                    <div class="form-group <?=(@$error_msg['dd_dealerid'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_dealerid'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['dd_dealerid']?></label><br/>    
                        <?php        
                            } 
                        ?>
						<label>Select Dealer</label>
						<select class="form-control" id="dd_dealerid" name="dd_dealerid">
							<?php foreach ($dealers as $dealer) { ?>
								<option value='<?php echo $dealer->de_autoid; ?>'><?php echo $dealer->de_name." (".$dealer->de_email.")"; ?></option>
							<?php } ?>
						</select>
                    </div>
					<div class="form-group <?=(@$error_msg['dd_catid'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_catid'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['dd_catid']?></label><br/>    
                        <?php        
                            } 
                        ?>
						<label>Select Category</label>
						<select class="form-control" id="dd_catid" name="dd_catid">
							<?php foreach ($categories as $category) { ?>
								<option value='<?php echo $category->dc_catid; ?>'><?php echo $category->dc_catname; ?></option>
							<?php } ?>
						</select>
                    </div>
                    <div class="form-group <?=(@$error_msg['dd_name'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_name'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['dd_name']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="dd_name">Deal Name:</label>
                        <input placeholder="Enter Dealer Name" id="dd_name" class="form-control" name="dd_name">
                    </div>
					<div class="form-group <?=(@$error_msg['dd_description'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_description'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['dd_description']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="dd_description">Description:</label>
                        <textarea type="email" placeholder="Description here" id="dd_description" class="form-control" name="dd_description"></textarea>
                    </div>
					<div class="form-group" <?=(@$error_msg['dd_originalprice'] != '')?'has-error':'' ?>">
						<?php
                            if(@$error_msg['dd_originalprice'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['dd_originalprice']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label>Original Price:</label>
                        <input type="text" placeholder="Enter ..." class="form-control" name="dd_originalprice" id="dd_originalprice">
                    </div>
					<div class="form-group" <?=(@$error_msg['dd_discount'] != '')?'has-error':'' ?>">
						<?php
                            if(@$error_msg['dd_discount'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['dd_discount']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label>Discount:</label>
                        <input type="text" placeholder="Enter ..." class="form-control" name="dd_discount" id="dd_discount">
                    </div>
					<div class="form-group" <?=(@$error_msg['dd_listprice'] != '')?'has-error':'' ?>">
						<?php
                            if(@$error_msg['dd_listprice'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['dd_listprice']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label>List Price:</label>
                        <input type="text" placeholder="Enter List Price" class="form-control" name="dd_listprice" id="dd_listprice">
                    </div>
					<div class="form-group <?=(@$error_msg['dd_mainphoto'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_mainphoto'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['dd_mainphoto']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="dd_mainphoto">Main Photo:</label>
                        <input placeholder="Enter Address" id="dd_mainphoto" class="form-control" name="dd_mainphoto">
                    </div>
                    <div class="form-group <?=(@$error_msg['dd_status'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_status'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['dd_status']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="dd_status">Status:</label>
                        <select class="form-control" id="dd_status" name="dd_status">
							<option value='published'>Published</option>
							<option value='draft'>Draft</option>
						</select>
                    </div>
					
                    <div class="form-group">
                        <button class="btn btn-primary btn-flat" type="submit">Submit</button>
                    </div>    
                </form>
            </div>
    	</div>
    </div>
</section>    	