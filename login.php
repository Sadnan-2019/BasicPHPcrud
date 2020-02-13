<?php



include_once "function.php";



unset( $_SESSION['is_logged']);

if(!empty ($_POST)) {


    $username = htmlentities($_POST['username'], ENT_QUOTES);
    $pass = htmlentities($_POST['pass'], ENT_QUOTES);



    $query = db_query( "select * from user where username = '$username'");
    $data = mysqli_fetch_assoc($query);

    if (empty($data)) {
        $error = "no such user";

    } elseif ($pass == $data['password']) {
        $_SESSION['is_logged'] = md5(100);
        $_SESSION['auth_user']= $data;
        header("location:index.php");

    }else{

        $error = "invalid user" ;

    }


}
?>



<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<div class="container">



    <div class="row">
        <div class="col-md-6">
<h1>Login</h1>
            <?php  if(!empty($error))

                echo $error;
                ?>

            <form method ="post" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control"  name="username"  placeholder="Enter username">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>


    </div>


</div>
</body>
</html>
