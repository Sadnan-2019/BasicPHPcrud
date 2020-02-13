<?php

include_once "function.php";

login_requried();
$id=htmlentities($_GET['id'],ENT_QUOTES);

$result= db_query("select * from contact where id = $id");
$data=mysqli_fetch_assoc($result);

if($data['uid']!=$_SESSION['auth_user']['id']){

    exit("sorry not allowed this option");
}

db_query("delete  from contact where id=$id");
header("location:index.php");














/**
 * Created by PhpStorm.
 * User: sadnan
 * Date: 11/17/2018
 * Time: 1:09 AM
 */
