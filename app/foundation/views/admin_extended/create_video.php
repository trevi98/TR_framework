

<?php $res = $this->open_form(['action'=>'admin_extended/create_video','method'=>'post','file'=>true],
[
    ['type'=>'text','name'=>'title'],
    ['type'=>'file','name'=>'video']
],
$data
);

?>

title:
<?php echo $res['title'];?>
<br>
decision:
<textarea name="decision" id="" cols="30" rows="10"></textarea>
<br>
explenation:
<textarea name="explenation" id="" cols="30" rows="10"></textarea>
<br>
link:
<textarea name="link" id="" cols="30" rows="10"></textarea>
<br>
video file:
<?php echo $res['video'];?>
<br>
<button type="submit" name="submit_form">Save</button>
<?php $this->close_form();?>