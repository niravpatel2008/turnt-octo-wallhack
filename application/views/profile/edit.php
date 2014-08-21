<div class='stripe-regular items-carousel-wrap row'>
	<div class="box box-site-header">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-credit-card"></i> Edit Profile</h3>
		</div>
	</div>

	<div id="flash_msg">
		<?php
			if (@$flash_msg['flash_type'] == "success") {
				echo $flash_msg['flash_msg'];
			}

			if (@$flash_msg['flash_type'] == "error") {
				echo $flash_msg['flash_msg'];
			}
		?>
	</div>

	<div class="box">
		<form action="" method="post" enctype="multipart/form-data">
		<div class="box-body">
				<div class='form-group'>
					<label for="username">Name: </label>
					<input class='form-control' type="text" name="username" id="username" value="<?=$this->front_session['uname']?>">
				</div>
				<div class='form-group'>
					<label for="username">Email: </label>
					<input class='form-control' type="text" name="email" id="email" value="<?=$this->front_session['email']?>">
				</div>
				<div class='form-group'>
					<label for="username">Contact: </label>
					<input class='form-control' type="text" name="contact" id="contact" value="<?=$this->front_session['contact']?>">
				</div>
				<?php
				/*
				?>
				<div class='form-group'>
					<label for="username">Profile Picture: </label>
					<input type="file" name="profile_image">
				</div>
				<div class='form-group'>
					<?=@$error_msg['profile_image']?>
					<?php
						if (file_exists(DOC_ROOT_PROFILE_IMG.$this->front_session['profile_picture']) && $this->front_session['profile_picture'] != "") {
					?>
						<img src="<?=profile_img_path().$this->front_session['profile_picture']?>" style="height:150px; width:150px;">
					<?php
						}
					?>
				</div>
				<?php
				*/
				?>
		</div>
		<div class='box-footer'>
			<input type="submit" name="submit" id="submit" value="Submit" class="input button primary" style="width:150px;" />
		</div>
		</form>
	</div>
</div>
