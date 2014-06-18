<div style="width:800px; padding:15px;">
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

	<form action="" method="post">
		<h3>Edit Profile</h3>
		<div>
			Username: <input type="text" name="username" id="username" value="<?=$this->user_session['uname']?>">
		</div>
		<div>
			Email: <input type="text" name="email" id="email" value="<?=$this->user_session['email']?>">
		</div>
		<div>
			Contact: <input type="text" name="contact" id="contact" value="<?=$this->user_session['contact']?>">
		</div>
		<div>
			<input type="submit" name="submit" id="submit" value="Submit" class="input button primary" />
		</div>
	</form>
</div>