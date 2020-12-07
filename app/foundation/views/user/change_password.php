

<div class="form_container">
    <h2>Change Password</h2>
    <?php if(isset($data['success']) && $data['success'] == 'all'):?>
            <span class="success">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
    <form action="<?php echo URLROOT;?>/users/change_password" method="POST">
        <input type="password" name="old_password" id="" required>
        <?php if(isset($data['error']) && $data['error'] == 'old_password'):?>
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
        <input type="password" name="password_confirm" id="" required>
        <?php if(isset($data['error']) && $data['error'] == 'password_confirm'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <?php if(isset($data['error']) && $data['error'] == 'all'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <button type="submit"  name="submit">Submit</button>
    </form>
</div>