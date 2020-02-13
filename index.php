<?php
include_once "function.php";


login_requried();

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
            <a href="add-contact.php">Add contact</a>
            <a href="login.php">logout</a>
            <h1>My contact</h1>
            <table class="table">

                <tr>

                    <th>#</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Option</th>


                </tr>
                <?php

                $userdata=$_SESSION['auth_user']['id'];
                $query =db_query( "select * from contact where uid = '$userdata' ");


                $data = mysqli_fetch_all($query,MYSQLI_ASSOC);


                 $i=1;
                foreach ($data as $row){
                ?>


                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?=$row['name']?></td>
                        <td><?=$row['number']?></td>

<td>
    <a href="edit-contact.php?id=<?= $row['id'] ?>"><button>Edit</button></a>
    <a  onclick="return confirm('Are you sure delete this contact name ')"  href="delete-contact.php?id=<?= $row['id'] ?>"><button>Delete</button></a>

                        </td>
                        <td>

                    </tr>

                   <?php }?>
            </table>



<button type="submit" class="btn btn-primary">SAVE<button>

        </div>


    </div>


 </body>
</html>


