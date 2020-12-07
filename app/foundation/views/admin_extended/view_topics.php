<?php foreach($data as $topic):?>
    <div>
        <?php echo $topic['title'];?>
        <a href="<?php redirect(['destination'=>'admin_extended/delete_topic/'.$topic['id']],true) ;?>">
            delete    
        </a>
    </div>
<?php endforeach;?>