<?php session_start();
include_once "db-config.php";
/**
 * Created by PhpStorm.
 * User: sadnan
 * Date: 10/26/2018
 * Time: 1:07 AM
 */
function login_requried(){


    if(empty($_SESSION['is_logged']) || $_SESSION['is_logged'] != md5(100) ){

        header("location: login.php");


    }

}
function db_query($query){



    $link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
    $result = mysqli_query($link,$query);
    return $result;





}
