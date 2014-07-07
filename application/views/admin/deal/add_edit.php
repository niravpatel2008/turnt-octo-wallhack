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
                    <div class="form-group <?=(@$error_msg['dd_features'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dd_features'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=@$error_msg['dd_features']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="dd_features">Features:</label>
                        <textarea type="email" placeholder="Features here (,) separated" id="dd_features" class="form-control" name="dd_features"><?=@$deal[0]->dd_features?></textarea>
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
                            <?php
                                if ($this->user_session['role'] == 'a') {
                            ?>
                                <option value='published' <?=(@$deal[0]->dd_status == 'published')?'selected':''?> >Published</option>
                            <?php
                                }
                            ?>						
							<option value='draft' <?=(@$deal[0]->dd_status == 'draft')?'selected':''?> >Draft</option>
						</select>
                    </div>

					<div class="form-group"> <!-- Uploaded images will be shown here -->
						<input type='hidden' name='newimages' id='newimages'>
						<input type='hidden' name='dd_mainphoto' id='dd_mainphoto' value='<?=(@$deal[0]->dd_mainphoto)?>'>
						<label for="dd_status">Select Main Image:</label>
						<?php if(count(@$dd_images) == 0) {
							echo "<div class='form-group'>Please upload images for deal than you can select main image for deal.</div>";
						}?>
                        <div id='img-container'>
							<?php foreach(@$dd_images as $img) {?>
								<img src='<?=(base_url()."uploads/".$img->dl_url)?>' class='newimg' imgid = '<?=($img->dl_autoid)?>'>
							<?php }?>
						</div>
                    </div>				
                    <div class="form-group">
                        <button class="btn btn-primary btn-flat" type="submit">Submit</button>
                    </div>    
                </form>
            </div>
    	</div>
		<div class='col-md-6'>
			<div class='box box-info'>
				<div class="box-header">
					<h3 class="box-title">Upload Deal Images</h3>
				</div>
				<div class="box-body">
					<form id="my-awesome-dropzone" action="<?=base_url()."admin/deal/fileupload"?>" class="dropzone">
						<input type='hidden' name='dd_id' value='<?=(@$deal[0]->dd_autoid)?>'>
					</form>
				</div>
			</div>
		</div>
    </div>
</section>    	