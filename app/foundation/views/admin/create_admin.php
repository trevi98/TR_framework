
<div class="form_container">
    <h2>Register</h2>
    <form action="<?php echo URLROOT;?>/admin/create_admin" method="POST">
        <input type="text" name="first_name" id="" required value="<?php if(!empty($data['data'])) echo $data['data']['first_name'];?>">
        <input type="text" name="last_name" id="" required value="<?php if(!empty($data['data'])) echo $data['data']['last_name'] ;?>">
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
        <input type="password" name="password_confirm" id="" required>
        <?php if(isset($data['error']) && $data['error'] == 'password_confirm'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <select name="roles" id="">
            <?php foreach($data['roles_db'] as $role):?>
                <option value="<?php echo $role['number'];?>">
                    <?php echo $role['title'];?>
                </option>
            <?php endforeach;?>

        </select>

        <?php if(isset($data['error']) && $data['error'] == 'all'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <button type="submit"  name="submit">Submit</button>
    </form>
</div>