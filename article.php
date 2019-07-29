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
<body>
    <div class="main">

    <?php
        include("Parsedown.php");
        $dir =  dirname(__FILE__)."/article";
        $file = scandir($dir);
        if(isset($_GET["article"])&&$_GET["article"]!=" "){
            $basename=$_GET["article"];
            $name=basename($basename,".".getExt($basename));
        }
        if(isset($_GET["article"])){
            if((in_array($_GET["article"],$file))){
                echo in_array($name,$file);
                echo "<h1>".basename($_GET["article"],".".getExt($_GET["article"]))."</h1>";
                include("article/".$basename);
                echo "<a href='article.php'><p><-返回</p></a>";
                echo "发布于 ".$a_time;
                $Parsedown = new Parsedown();
                echo $Parsedown->text($a_md);
            }else{
                echo "<p>没有这篇文章!</p>";
            }
        }else{
            echo "<h1>文章列表</h1>";
            echo "<a href='index.php'><p><-返回</p></a>";
            echo "<ul>";
            for($i=2;$i<=count($file)-1;$i++){
            include("article/".$file[$i]);
            echo "<li class='article'><a href='"."article.php?article=".$file[$i]."'><h3>".basename($file[$i],".".getExt($file[$i]))."</h3></a>        <p>创建于".$a_time."</p></li>";
            }
            echo "</ul>";
        }
    ?>

    </div>
</body>
</html>
