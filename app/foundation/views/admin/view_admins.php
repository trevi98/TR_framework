
<div class="container">
    <?php if(!empty($data['admins'])):?>
    <ul>
        <?php foreach($data['admins'] as $admin):?>
            <li>
                <a href="<?php redirect(['destination'=>'admin/view_admin','args'=>[$admin['id']],'echo'=>true]);?>">
                    <?php echo $admin['first_name']." ".$admin['last_name'];?>
                </a>
            </li>
    </ul>
        <?php endforeach;?>
    <?php else:?>
        <h3> no admins yet !</h3>
        <p>create admin from <a href="">here!</a></p>
    <?php endif;?>
</div>

