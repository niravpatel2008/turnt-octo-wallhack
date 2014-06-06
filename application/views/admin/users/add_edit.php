<section class="content-header">
    <h1>
        Users
         <small>Add User</small>
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
                    <div class="form-group <?=(@$error_msg['user_name'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['user_name'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['user_name']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label>User Name:</label>
                        <input type="text" placeholder="Enter ..." class="form-control" name="user_name" id="user_name">
                    </div>
                    <div class="form-group <?=(@$error_msg['email'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['email'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['email']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label for="email">Email address:</label>
                        <input type="email" placeholder="Enter email" id="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Contact:</label>
                        <input type="text" placeholder="Enter ..." class="form-control" name="contact" id="contact">
                    </div>
                    <div class="form-group <?=(@$error_msg['role'] != '')?'has-error':'' ?>">
                        <?php
                            if(@$error_msg['role'] != ''){
                        ?>
                            <label for="inputError" class="control-label"><i class="fa fa-times-circle-o"></i><?=$error_msg['role']?></label><br/>    
                        <?php        
                            } 
                        ?>
                        <label>Role</label>
                        <select class="form-control" name="role" id="role">
                            <option value="">Select</option>
                            <option value="m">Moderator</option>
                            <option value="u">User</option>
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