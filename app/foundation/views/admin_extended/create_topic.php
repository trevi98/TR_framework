


<?php 
    
    $res = $this->open_form(['action'=>'admin_extended/create_topic','method'=>'post'],
        [
            ['type' => 'text','name' => 'title']
        ],
        $data
    );
    
?>


<?php echo $res['title'];?>
<button type="submit" name="submit_form">Save</button>