<?php include("function.php");?>
<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="main.js"></script>

    <script src="https://cdn.staticfile.org/vue/2.2.2/vue.min.js"></script>

    <link rel="shortcut icon" href="favicon.ico" />

    <link rel="bookmark"href="favicon.ico" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8"> 
    
    <title><?php echo $title;?></title>
</head>
<body id="wrapper">
    <div class="main">
        
        <img class="icon" border="0" src="icon.png">

        <h1><?php encho($blogname); ?></h1>

        <h2><?php encho($subtitle); ?></h2>

        <h6><a href="article.php">查看所有文章</a></h6>

        <ul>
            <?php
                $dir =  dirname(__FILE__)."/article";
                $file = scandir($dir);
                for($i=2;$i<=count($file)-1;$i++){
                include("article/".$file[$i]);
                echo "<li class='article'><a href='"."article.php?article=".$file[$i]."'><h3>".basename($file[$i],".".getExt($file[$i]))."</h3></a>        <p>创建于".$a_time."</p></li>";
                }
            ?>
        </ul>
    
    </div>
    <?php include("footer.php");?>
</body>
</html>