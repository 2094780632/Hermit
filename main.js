function validatelogin(){
    var username=document.forms["login"]["username"].value;
    var password=document.forms["login"]["password"].value;
    if (password==null || password==""){
        alert("密码必须填写");
        return false;
    }
    if (username==null || username==""){
        alert("用户名必须填写");
        return false;
    }
    if (password.length<6){
        alert("密码必须超过六位");
        return false;
    }
}

function validatereg(){
    var username=document.forms["reg"]["username"].value;
    var password=document.forms["reg"]["password"].value;
    var apassword=document.forms["reg"]["apassword"].value;
    if (username==null || username==""){
        alert("用户名必须填写");
        return false;
    }
    if (password==null || password==""){
        alert("密码必须填写");
        return false;
    }
    if (password.length<6){
        alert("密码必须超过六位");
        return false;
    }
    if (password!=apassword){
        alert("两次密码不一样");
        return false;
    }
}