<head>
    <link rel="stylesheet" href="<?php echo asset('css/style.css');?>">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../../css/style.css"> -->
</head>

<div class="form_container">
    <h2>Login</h2>
        <?php 
            $res = $this->open_form(['action'=>'/test/test','method'=>'post','file'=>true],
            [
                ['type'=>'text','name'=>'name','class'=>'yo'],
                ['type'=>'password','name'=>'email','class'=>'yo'],
                ['type'=>'number','name'=>'number','class'=>'yo'],
                ['type'=>'file','name'=>'img','class'=>'cc'],
                ['type'=>'file','name'=>'img2','class'=>'cc'],
                ['type'=>'file','name'=>'imgs[]','class'=>'cc','extra'=>'multiple']
            ],
            
            $data
            );
        ?>

        

        <?php echo $res['name'];?>
        <?php echo $res['email'];?>
        <?php echo $res['number'];?>
        <?php echo $res['img'];?>
        <?php echo $res['img2'];?>
        <?php echo $res['imgs[]'];?>


        <button type="submit"  name="submit_form">Login</button>
    </form>
</div>