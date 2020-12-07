<div class="container">
    <p>first name: <?php echo $data['admin']['first_name'];?></p>
    <p>last name: <?php echo $data['admin']['last_name'];?></p>
    <p>email: <?php echo $data['admin']['email'];?></p>
    <form action="<?php redirect(['destination'=>'admin/edit_role','args'=>[$data['admin']['id']],'echo'=>true]) ;?>" method="post">
        <select name="role" id="">
            <?php foreach($data['roles_db'] as $role) :?>
                <option value="<?php echo $role['number'];?>" <?php if($data['admin_role']['number'] == $role['number']) echo "selected";?>>
                    <?php echo $role['title'];?>
                </option>
            <?php endforeach;?>
        </select>
        <button type="submit" name="submit">Save</button>
    </form>
</div>