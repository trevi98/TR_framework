<div class="container">
    <p>first name: <?php echo $data['admin']['first_name'];?></p>
    <p>last name: <?php echo $data['admin']['last_name'];?></p>
    <p>email: <?php echo $data['admin']['email'];?></p>
    <p>role: <?php echo $data['admin_role']['title'];?></p>

    <?php if(authentication::is_admin(['1'])):?>
        <a href="<?php redirect(['destination'=>'admin/edit_role','echo'=>true,'args'=>[$data['admin']['id']]]) ;?>">eidt role</a>
        <a href="<?php redirect(['destination'=>'admin/delete_admin','echo'=>true,'args'=>[$data['admin']['id']]]) ;?>">delete</a>
    <?php endif;?>
</div>