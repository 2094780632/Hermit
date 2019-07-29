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
                        <form name="login" onsubmit="return validatelogin()" action="account.php?type=logincheck" method="post">
                        <label for="username"><h4>用户名</h4></label>
                        <input type="text" id="username" name="username" value="用户名">
                        <label for="password"><h4>密码</h4></label>
                        <input type="password" id="password" name="password" >
                        <br><br>
                        <input type="submit" value="登录">
                        </form>
                        <form action="account.php?type=reg" method="post">
                        <input type="submit" value="注册">
                        </form>
                        ';
                        break;

                    case "logincheck":
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
                            gourl();
                        }
                        break;

                    case "reg":
                        if((isset($_GET["err"]))&&($_GET["err"]==1)){
                            echo '<h5>用户名已存在</h5>';
                        }
                        echo '
                        <h1>注册</h1>
                        <form name="reg" onsubmit="return validatereg()" action="account.php?type=regcheck" method="post">
                        <label for="username"><h4>用户名</h4></label>
                        <input type="text" id="username" name="username" value="用户名">
                        <label for="password"><h4>密码</h4></label>
                        <input type="password" id="password" name="password" >
                        <label for="apassword"><h4>重复密码</h4></label>
                        <input type="password" id="apassword" name="apassword" >
                        <br><br>
                        <input type="submit" value="注册">
                        ';
                        break;

                    case "regcheck":
                        $c_username=$_POST["username"];
                        $c_password=$_POST["password"];
                        $dir =  dirname(__FILE__)."/users";
                        $file = scandir($dir);
                        for($i=2;$i<=count($file)-1;$i++){
                            include("users/".$file[$i]);
                            $u_username=basename($file[$i],".".getExt($file[$i]));
                            if($c_username!=$u_username){
                                $flag="true";
                                break;
                            }else{
                                $flag=1;
                                }
                            }
                        if($flag=="true"){
                            $account=fopen("users/".$c_username.".php","w")or die();
                            $id=count($file)-1;
                            $txt='<?php
                                $u_id='.$id.';
                                $u_name="'.$c_username.'";
                                $u_password="'.$c_password.'";
                                $u_level=6;
                                $u_introduction="本人还没有简介";
                                ?>
                            ';
                            fwrite($account, $txt);
                            fclose($account);
                            gourl("index.php");
                        }elseif($flag=-1){
                            gourl("account.php?type=reg&err=1");
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