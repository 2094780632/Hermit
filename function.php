<?php
    include("config.php");

    session_start();

    function gourl($url){
        echo '<script language="javascript">document.location = "'.$url.'";</script>';
    }
    function encho($word){
        echo "$word<br>";
    }
    function retrieve($url){ 
        preg_match('/\/([^\/]+\.[a-z]+)[^\/]*$/',$url,$match); 
        return $match[1];
    }
    function getExt($url){
        if(strpos($url,'.') ==true){
        $path=parse_url($url); 
        $str=explode('.',$path['path']); 
        return $str[1]; 
        }else return $url;
    }
?>