

<div class="form_container">
    <h2>Forgat Password ?</h2>
    <?php if(isset($data['success']) && $data['success'] == 'all'):?>
            <span class="success">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
    <form action="<?php echo URLROOT;?>/admin/reset_password" method="POST">
        <input type="text" name="email" id="" required>
        <?php if(isset($data['error']) && $data['error'] == 'email'):?>
            <span class="error">
                <?php echo $data['message'] ;?>
            </span>
        <?php endif;?>
        <button type="submit"  name="submit_email">Submit</button>
    </form>
</div>