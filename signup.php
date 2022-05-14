<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name = "Editor" content = "Haoxiang Wang, Tongxuan Wang">
    <meta name="generator" c ontent="Hugo 0.88.1">
    <title>Sign Up page </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Bootstrap core CSS -->
<link rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/source/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="POST">
    <img class="mb-4" src="/source/img/logo.jpg" alt="" width="180" height="auto">

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating">
            <input type="form-control" class="form-control" id="FirstName" name="FirstName" placeholder="FirstName">
            </div>
        </div>
        <div class="col-md">
            <div class="form-floating">
                <div class="form-floating">
                <input type="form-control" class="form-control" id="LastName" name="LastName" placeholder="LastName">
                </div>
            </div>
        </div>
    </div>
    </br>

    <div class="form-floating">
      <input class="form-control" id="Username" name="UserName" placeholder="User Name">
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="ConfirmedPassword" name="ConfirmedPassword" placeholder="Confirm Password">
    </div>
    </br>
    <div class="form-floating">
      <input type="form-control" class="form-control" id="City" name="City" placeholder="City">
    </div>


    <div class="form-floating">
      <input class="form-control" id="State" name="State" placeholder="State">
    </div>

    <div class="form-floating">
      <input class="form-control" id="ZipCode" name="ZipCode" placeholder="Zip Code">
    </div>

    <div class="form-floating">
      <input type="form-control" class="form-control" id="Country" name="Country" placeholder="Country">
    </div>
    </br>


    <div class="form-floating">
      <input class="form-control" id="Email" name="Email" placeholder="Email">
    </div>

    <div class="form-floating">
      <input class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="Phone">
    </div>
    </br>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Registor</button>

  </form>
</main>    
</body>

<?php

include 'connectDB.php';


if(isset($_POST['FirstName']) && isset($_POST['LastName'])&& isset($_POST['UserName']) && 
   isset($_POST['Password'])&& isset($_POST['ConfirmedPassword'])&& isset($_POST['City'])&& 
   isset($_POST['State'])&& isset($_POST['ZipCode'])&& isset($_POST['Country'])&& isset($_POST['Email'])&& 
   isset($_POST['PhoneNumber'])) {

      $FirstName=$_POST['FirstName'];
      $LastName=$_POST['LastName'];
      $UserName = $_POST['UserName'];
      $Password = $_POST['Password'];
      $ConfirmedPassword = $_POST['ConfirmedPassword'];
      $City = $_POST['City'];
      $State = $_POST['State'];
      $ZipCode = $_POST['ZipCode'];
      $Country = $_POST['Country'];
      $Email = $_POST['Email'];
      $PhoneNumber = $_POST['PhoneNumber'];
      $Level = 'basic';
      if($Password != $ConfirmedPassword){
        echo '<script>alert("The Password is not the same, please enter again")</script>';
        exit();
      }

      $InsertNewUser = "INSERT INTO Users (USERNAME, password, firstname, lastname, level, Email, city, state, country, phone) VALUES ('$UserName','$Password','$FirstName','$LastName','$Level','$Email','$City','$State','$Country','$PhoneNumber')";
      if(mysqli_query($conn,$InsertNewUser)){
        echo "New User Created";
        header("Location: index.php");
      }
      else{
        echo "Error in create new User";
        exit();
      }
  }
  
   
    
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>


