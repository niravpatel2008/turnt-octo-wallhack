<form action="" method="post">
	<table cellpadding="5" cellspacing="5" border="0" align="center">
		<tr>
			<td>Username:</td>
			<td>
				<input type="text" name="username" value="<?=@$_POST['username']?>" >
				<?=@$error_msg['username']?>
			</td>
		</tr>
		<tr>
			<td>Password:</td>
			<td>
				<input type="password" name="password" value="" >
				<?=@$error_msg['password']?>
			</td>
		</tr>
		<tr>
			<td>Confirm password:</td>
			<td>
				<input type="password" name="confirm_password" value="" >
				<?=@$error_msg['confirm_password']?>
			</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>
				<input type="email" name="email" value="<?=@$_POST['email']?>" >
				<?=@$error_msg['email']?>
			</td>
		</tr>
		<tr>
			<td>Contact:</td>
			<td>
				<input type="text" name="contact" value="<?=@$_POST['contact']?>" >
				<?=@$error_msg['contact']?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Submit" class="input button primary sumitbtn"></td>
		</tr>
	</table>
</form>
