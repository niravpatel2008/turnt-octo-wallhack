<section class="content-header">
    <h1>
        Category
        <small> <?=($this->router->fetch_method() == 'add')?'Add Category':'Edit Category'?></small>
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
                    <div class="form-group <?=(@$error_msg['dc_catname'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dc_catname'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['dc_catname']?></label><br/>
                        <?php
                            }
                        ?>
                        <label>Category Name:</label>
                        <input type="text" placeholder="Enter ..." class="form-control" name="dc_catname" id="dc_catname" value="<?=@$category[0]->dc_catname?>" >
                    </div>
					<div class="form-group <?=(@$error_msg['dc_catdetails'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['dc_catdetails'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['dc_catdetails']?></label><br/>
                        <?php
                            }
                        ?>
                        <label>Category Detail:</label>
                        <textarea type="text" placeholder="Category detail here" class="form-control" name="dc_catdetails" id="dc_catdetails"><?=@$category[0]->dc_catdetails?></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-flat" type="submit" id="submit">Submit</button>
                    </div>
                </form>
            </div>
    	</div>
    </div>
</section>
