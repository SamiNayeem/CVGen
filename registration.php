<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO users VALUES('$first_name','$last_name','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div id="registration">
      <div id="regdiv"><h2 id="registrationheader">Registration</h2></div>
    
    <table id="logintable">

      

<form class="" action="" method="post" autocomplete="off">
  <tr>
    <td><label for="first_name">First Name : </label></td>
    <td><input type="text" name="first_name" id = "first_name" required value="">  <br></td>
  </tr>

  <tr>
    <td><label for="last_name">Last Name : </label></td>
    <td><input type="text" name="last_name" id = "last_name" required value=""> </td>
  </tr>

  

  <tr>
    <td><label for="email">Email : </label></td>
    <td><input type="email" name="email" id = "email" required value=""> </td>
  </tr>

  <tr>
    <td><label for="password">Password : </label></td>
    <td><input type="password" name="password" id = "password" required value=""></td>
  </tr>

  <tr>
    <td><label for="confirmpassword">Confirm Password : </label></td>
    <td><input type="password" name="confirmpassword" id = "confirmpassword" required value=""></td>
  </tr>


  <tr>
    <td colspan="2" align="center"><button type="submit" name="submit">Sign Up</button></td>
  </tr>


  <tr>
    <td colspan="2" align="center"><p><a href="login.php"> click here</a> to go back to login page</p></td> 
  

</table>
    </div>





    <!-- <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="first_name">First Name : </label>
      <input type="text" name="first_name" id = "first_name" required value=""> <br>
      <label for="last_name">Last Name : </label>
      <input type="text" name="last_name" id = "last_name" required value=""> <br>
      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <label for="confirmpassword">Confirm Password : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
      <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a> -->
  </body>
</html>