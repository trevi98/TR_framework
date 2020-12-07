

<?php $res = $this->open_form(['action'=>'admin_extended/edit_video/'.$data['data']['id'],'method'=>'post','file'=>true],
[
    ['type'=>'text','name'=>'title'],
    ['type'=>'file','name'=>'video'],
    ['type'=>'textarea','name'=>'decision'],
    ['type'=>'textarea','name'=>'explenation'],
    ['type'=>'textarea','name'=>'link']
],
$data
);

?>

title:
<?php echo $res['title'];?>
<br>
decision:
<?php echo $res['decision'];?>
<br>
explenation:
<?php echo $res['explenation'];?>
<br>
link:
<?php echo $res['link'];?>
<br>
video file:
<?php echo $res['video'];?>
<br>
<button type="submit" name="submit_form">Update</button>
<?php $this->close_form();?>