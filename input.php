
<?php



$connection = mysqli_connect("localhost", "root", "","phonebook"); // Establishing Connection with Server..
/*$db = mysql_select_db("phonebook", $connection);*/ // Selecting Database
//Fetching Values from URL
$name2=$_POST['name1'];
$email2=$_POST['email1'];
$password2=$_POST['password1'];
$contact2=$_POST['contact1'];
//Insert query
$query = mysql_query("insert into form_element(name, email, password, contact) values ('$name2', '$email2', '$password2','$contact2')");
echo "Form Submitted Succesfully";
mysql_close($connection); // Connection Closed
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Form Using AJAX and jQuery</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link href="css/refreshform.css" rel="stylesheet">
    <script src="script.js"></script>
</head>
<body>
<div id="mainform">
    <h2>Submit Form Using AJAX and jQuery</h2> <!-- Required div Starts Here -->
    <div id="form">
        <h3>Fill Your Information !</h3>
        <div>
            <label>Name :</label>
            <input id="name" type="text">
            <label>Email :</label>
            <input id="email" type="text">
            <label>Password :</label>
            <input id="password" type="password">
            <label>Contact No :</label>
            <input id="contact" type="text">
            <input id="submit" type="button" value="Submit">
        </div>
    </div>
</div>
</body>
</html>
<script>
$(document).ready(function(){
$("#submit").click(function(){
var name = $("#name").val();
var email = $("#email").val();
var password = $("#password").val();
var contact = $("#contact").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'name1='+ name + '&email1='+ email + '&password1='+ password + '&contact1='+ contact;
if(name==''||email==''||password==''||contact=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "ajaxsubmit.php",
data: dataString,
cache: false,
success: function(result){
alert(result);
}
});
}
return false;
});
});
</script>