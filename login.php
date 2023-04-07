<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>


  <div id="login">

    <div id="logindiv"><h2>Login</h2></div>
    
    <table id="logintable">

    <form class="" action="" method="post" autocomplete="off">
      <tr>
        <td><label for="email" aria-placeholder="enter your email">Email : </label></td>
        <td><input type="text" name="email" id = "email" required value=""> <br></td>
      </tr>

      <tr>
        <td><label for="password">Password : </label></td>
        <td><input type="password" name="password" id = "password" required value=""></td>
      </tr>

      <tr>
        <td colspan="2" align="center"><button type="submit" name="submit">Login</button></td>
      </tr>


      <tr>
        <td colspan="2" align="center"><p>New Here? <a href="registration.php"> click here</a> to sign in</p></td> 
      

    </table>

  </div>
    

    <!-- <h2>Login</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="email" aria-placeholder="enter your email">Email : </label>
      <input type="text" name="email" id = "usernameemail" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br> -->
    <!-- <a href="registration.php">Registration</a> -->
  </body>
</html>