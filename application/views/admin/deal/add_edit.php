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
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group <?=(@$error_msg['dd_dealerid'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_dealerid'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_dealerid']?></label><br/>    
                        <?php        
                            } 
                        ?>
						<label>Select Dealer</label>
						<select class="form-control" id="dd_dealerid" name="dd_dealerid">
                            <option value="">Select</option>
							<?php foreach ($dealers as $dealer) { ?>
								<option value='<?=$dealer->de_autoid; ?>' <?=(@$deal[0]->dd_dealerid == $dealer->de_autoid)?'selected':''?>  ><?=$dealer->de_name." (".$dealer->de_email.")"; ?></option>
							<?php } ?>
						</select>
                    </div>
					
                    <div class="form-group <?=(@$error_msg['dd_catid'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_catid'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_catid']?></label><br/>    
                        <?php        
                            } 
                        ?>
						<label>Select Category</label>
						<select class="form-control" id="dd_catid" name="dd_catid">
                            <option value="">Select</option>
							<?php foreach ($categories as $category) { ?>
								<option value='<?=$category->dc_catid; ?>'  <?=(@$deal[0]->dd_catid == $category->dc_catid)?'selected':''?>  ><?=$category->dc_catname; ?></option>
							<?php } ?>
						</select>
                    </div>
                    
                    <div class="form-group <?=(@$error_msg['dd_name'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_name'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_name']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="dd_name">Deal Name:</label>
                        <input placeholder="Enter Dealer Name" id="dd_name" class="form-control" name="dd_name" value="<?=@$deal[0]->dd_name?>" >
                    </div>
					
                    <div class="form-group <?=(@$error_msg['dd_description'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_description'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_description']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="dd_description">Description:</label>
                        <textarea type="email" placeholder="Description here" id="dd_description" class="form-control" name="dd_description"><?=@$deal[0]->dd_description?></textarea>
                    </div>
					<div class="row">
						<div class="col-xs-4 form-group <?=(@$error_msg['dd_originalprice'] != '')?'has-error':'' ?>">
							<?php
								if(@$error_msg['dd_originalprice'] != ''){
							?>
								<label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_originalprice']?></label><br/>    
							<?php        
								} 
							?>
							<label>Original Price:</label>
							<input type="text" placeholder="Enter ..." class="form-control" name="dd_originalprice" id="dd_originalprice"  value="<?=@$deal[0]->dd_originalprice?>" >
						</div>
						
						<div class="col-xs-4 form-group <?=(@$error_msg['dd_discount'] != '')?'has-error':'' ?>">
							<?php
								if(@$error_msg['dd_discount'] != ''){
							?>
								<label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_discount']?></label><br/>    
							<?php        
								} 
							?>
							<label>Discount:</label>
							<input type="text" placeholder="Enter ..." class="form-control" name="dd_discount" id="dd_discount" value="<?=@$deal[0]->dd_discount?>" >
						</div>
						
						<div class="col-xs-4 form-group <?=(@$error_msg['dd_listprice'] != '')?'has-error':'' ?>">
							<?php
								if(@$error_msg['dd_listprice'] != ''){
							?>
								<label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_listprice']?></label><br/>    
							<?php        
								} 
							?>
							<label>List Price:</label>
							<input type="text" placeholder="Enter List Price" class="form-control" name="dd_listprice" id="dd_listprice" value="<?=@$deal[0]->dd_listprice?>" >
						</div>
					</div>
                    <div class="form-group <?=(@$error_msg['dd_mainphoto'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_mainphoto'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_mainphoto']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="dd_mainphoto">Main Photo:</label>
                        <input type="file" id="dd_mainphoto" name="dd_mainphoto">
                        <?php
                            if (file_exists(DOC_ROOT."uploads/".@$deal[0]->dd_mainphoto) && @$deal[0]->dd_mainphoto != "") {
                        ?>
                            <br/>
                            <input type="hidden" name="old_filename" value="<?=$deal[0]->dd_mainphoto?>">
                            <img src="<?=base_url()."uploads/".$deal[0]->dd_mainphoto?>" style="height:200px; width:200px;">
                        <?php
                            }
                        ?>
                    </div>
					<div class="form-group <?=(@$error_msg['dd_timeperiod'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_timeperiod'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_timeperiod']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="dd_timeperiod">Start & End Time:</label>
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
	                        <input placeholder="Enter Address" id="dd_timeperiod" class="form-control" name="dd_timeperiod" value="<?=date('m/d/Y g:i A',strtotime(@$deal[0]->dd_startdate)). " - " .date('m/d/Y g:i A',strtotime(@$deal[0]->dd_expiredate))?>">
						</div>
                    </div>
					<div class="form-group <?=(@$error_msg['dd_tags'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_tags'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_tags']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="dd_tags">Tags:</label>
						<?php if(count(@$dd_tags) > 0) {
								foreach ($dd_tags as $tag){
									echo "<input placeholder=\"Enter Tags\" class=\"form-control dd_tags\" value=\"".$tag['dt_tag']."\" name=\"dd_tags[".$tag['dt_autoid']."-a]\">";
								}
						}else{?>
									<input placeholder="Enter Tags" class="form-control dd_tags" value="" name="dd_tags[]">
						<?php }?>
                    </div>
                    <div class="form-group <?=(@$error_msg['dd_status'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_status'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_status']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="dd_status">Status:</label>
                        <select class="form-control" id="dd_status" name="dd_status">
                            <option value="">Select</option>
							<option value='published' <?=(@$deal[0]->dd_status == 'published')?'selected':''?> >Published</option>
							<option value='draft' <?=(@$deal[0]->dd_status == 'draft')?'selected':''?> >Draft</option>
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