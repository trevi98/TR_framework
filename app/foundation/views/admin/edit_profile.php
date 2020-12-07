

<div class="form_container">
    <h2>Edit Profile</h2>
    <?php if(isset($data['success']) && $data['success'] == 'all'):?>
            <span class="success">
                <?php echo $data['message'] ;?>
            </span>
    <?php endif;?>
    <form action="<?php echo URLROOT;?>/users/edit_profile" method="POST">
        <input type="text" name="first_name" id="" required value="<?php if(!empty($data['data'])) echo $data['data']['first_name'];?>">
        <input type="text" name="last_name" id="" required value="<?php if(!empty($data['data'])) echo $data['data']['last_name'] ;?>">
        <input type="text" name="email" id="" required value="<?php if(!empty($data['data'])) echo $data['data']['email'] ;?>">
        <?php if(isset($data['error']) && $data['error'] == 'email'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <span>enter password to save changes</span>
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
        <button type="submit"  name="submit">Save</button>
    </form>
</div>