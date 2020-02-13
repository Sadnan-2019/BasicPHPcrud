
<?php
include_once "function.php";

login_requried();


if(!empty($_POST)){

    $name = htmlentities ($_POST['name'],ENT_QUOTES);
     $number = htmlentities ($_POST['number'],ENT_QUOTES);
    $userdata = $_SESSION['auth_user'];
    $uid = $userdata['id'];
if(!empty($name)&& !empty($number)){

    db_query("insert into contact(name,number,uid) values('$name','$number','$uid')");
    header("location:index.php");

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
            <h1> Add contact </h1>


            <form method ="post" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control"  name="name"  >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">number</label>
                    <input type="number" class="form-control" name="number" >
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>


        </div>


    </div>


</div>
</body>
</html>