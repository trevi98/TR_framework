

<div class="form_container">
    <h2>Login</h2>
    <form action="<?php echo URLROOT;?>/users/login" method="POST">
        <input type="text" name="email" id="" required value="<?php if(!empty($data['data'])) echo $data['data']['email'] ;?>">
        <?php if(isset($data['error']) && $data['error'] == 'email'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <input type="password" name="password" id="" required>
        <?php if(isset($data['error']) && $data['error'] == 'password'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <?php if(isset($data['error']) && $data['error'] == 'all'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>

            <input type="text" name="url_redirect" id="" value="<?php if(!empty($data['data'])) echo $data['data']['url'] ;?>"style="display:none;">

        <button type="submit"  name="submit">Login</button>
        <a href="<?php echo URLROOT;?>/users/reset_password">Forgat password?</a>
    </form>
</div>