<div style="width:800px; margin: 0 auto;">
<h2>Forgot password</h2>

<form action="" method="post">
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

    <label>Email address:</label>
    <input type="text" name="email" class="" />
    <?=@$error_msg['email']?>
    <button type="submit" class="input button primary">Submit</button>
</form>
</div>
