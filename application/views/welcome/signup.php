<form action="" method="post">
	<table cellpadding="5" cellspacing="5" border="0" align="center">
		<tr>
			<td>Username:</td>
			<td>
				<input type="text" name="username">
				<?=@$error_msg['username']?>
			</td>
		</tr>
		<tr>
			<td>Password:</td>
			<td>
				<input type="password" name="password">
				<?=@$error_msg['password']?>
			</td>
		</tr>
		<tr>
			<td>Confirm password:</td>
			<td>
				<input type="password" name="confirm_password">
				<?=@$error_msg['confirm_password']?>
			</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>
				<input type="email" name="email">
				<?=@$error_msg['email']?>
			</td>
		</tr>
		<tr>
			<td>Contact:</td>
			<td>
				<input type="text" name="contact">
				<?=@$error_msg['contact']?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Submit" class="input button primary"></td>
		</tr>
	</table>
</form>