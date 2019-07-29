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
            if(isset($_GET["type"])){
                $type=$_GET["type"];
                switch($type){
                    case "login":
                        echo '
                        <h1>登录</h1>
                        <form action="account.php?type=logincheck" method="post">
                        <label for="username"><h4>用户名</h4></label>
                        <input type="text" id="username" name="username" value="用户名">
                        <label for="password"><h4>密码</h4></label>
                        <input type="password" id="password" name="password" >
                        <br><br>
                        <input type="submit" value="登录">
                        </form>';
                        break;

                    case "logincheck":
                        if((isset($_POST["username"]))&&(isset($_POST["password"]))){
                            $c_username=$_POST["username"];
                            $c_password=$_POST["password"];
                            $flag=false;
                            $dir =  dirname(__FILE__)."/users";
                            $file = scandir($dir);
                            for($i=2;$i<=count($file)-1;$i++){
                                include("users/".$file[$i]);
                                $u_username=basename($file[$i],".".getExt($file[$i]));
                                if(($c_username==$u_username)&&($c_password==$u_password)){
                                    $flag=true;
                                    break;
                                    }
                                }
                            if($flag){
                                $_SESSION['username']=$c_username;
                                echo "S";
                            }
                        }
                        break;

                    default:
                        break;
                }
            }else{
                
            }
        ?>
    
    </div>
</body>
</html>