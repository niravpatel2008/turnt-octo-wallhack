<section class="content-header">
    <h1>
        Dealer
        <small> <?=($this->router->fetch_method() == 'add')?'Add Dealer':'Edit Dealer'?></small>
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
                    <div class="form-group <?=(@$error_msg['de_userid'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['de_userid'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['de_userid']?></label><br/>    
                        <?php        
                            } 
                        ?>
						<label>Select User</label>
						<select class="form-control" id="de_userid" name="de_userid">
                            <option value="">Select</option>
							<?php foreach ($users as $user) { ?>
								<option value='<?=$user->du_autoid; ?>' <?=(@$dealer[0]->de_userid == $user->du_autoid)?'selected':''?> ><?=$user->du_uname." (".$user->du_email.")"; ?></option>
							<?php } ?>
						</select>
                    </div>
                    <div class="form-group <?=(@$error_msg['de_name'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['de_name'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['de_name']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="de_name">Dealer Name:</label>
                        <input placeholder="Enter Dealer Name" id="de_name" class="form-control" name="de_name" value="<?=@$dealer[0]->de_name?>" >
                    </div>
					<div class="form-group <?=(@$error_msg['de_email'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['de_email'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['de_email']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="de_email">Email address:</label>
                        <input type="email" placeholder="Enter email" id="de_email" class="form-control" name="de_email" value="<?=@$dealer[0]->de_email?>" >
                    </div>
					<div class="form-group <?=(@$error_msg['de_contact'] != '')?'has-error':'' ?>">
						<?php
                            if(@$error_msg['de_contact'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['de_contact']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label>Contact:</label>
                        <input type="text" placeholder="Enter ..." class="form-control" name="de_contact" id="de_contact" value="<?=@$dealer[0]->de_contact?>" >
                    </div>
					<div class="form-group <?=(@$error_msg['de_address'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['de_address'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['de_address']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="de_address">Address:</label>
                        <input placeholder="Enter Address" id="de_address" class="form-control" name="de_address" value="<?=@$dealer[0]->de_address?>" >
                    </div>
                    <div class="form-group <?=(@$error_msg['de_city'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['de_city'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['de_city']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="de_city">City:</label>
                        <input placeholder="Enter City" id="de_city" class="form-control" name="de_city" value="<?=@$dealer[0]->de_city?>" >
                    </div>
					<div class="form-group <?=(@$error_msg['de_state'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['de_state'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['de_state']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="de_state">State:</label>
                        <input placeholder="Enter State" id="de_state" class="form-control" name="de_state" value="<?=@$dealer[0]->de_state?>" >
                    </div>
					<div class="form-group <?=(@$error_msg['de_zip'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['de_zip'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['de_zip']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="de_zip">Zip:</label>
                        <input placeholder="Enter Zip" id="de_zip" class="form-control" name="de_zip" value="<?=@$dealer[0]->de_zip?>" >
                    </div>
					<div class="form-group <?=(@$error_msg['de_lat'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['de_lat'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['de_lat']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="de_lat">Latitude:</label>
                        <input placeholder="Enter Latitude" id="de_lat" class="form-control" name="de_lat" value="<?=@$dealer[0]->de_lat?>" >
                    </div>
					<div class="form-group <?=(@$error_msg['de_long'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['de_long'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['de_long']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="de_long">Longitude:</label>
                        <input placeholder="Enter Longitude" id="de_long" class="form-control" name="de_long" value="<?=@$dealer[0]->de_long?>" >
                    </div>
                    <div class="form-group <?=(@$error_msg['de_url'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['de_url'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['de_url']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label>URL</label>
                        <input placeholder="Enter URL" id="de_url" class="form-control" name="de_url" value="<?=@$dealer[0]->de_url?>" >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-flat" type="submit">Submit</button>
                    </div>    
                </form>
            </div>
    	</div>
    </div>
</section>    	