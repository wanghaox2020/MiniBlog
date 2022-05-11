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

    <!-- <div class="form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
        </select>
    </div> -->

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

echo '<script> console.log("fuck php");</script>';

echo '<script> console.log("' . $_POST['Password'] . $_POST['City'] . '"); </script>';

if(isset($_POST['FirstName']) && isset($_POST['LastName'])&& isset($_POST['UserName']) && 
   isset($_POST['Password'])&& isset($_POST['ConfirmedPassword'])&& isset($_POST['City'])&& 
   isset($_POST['State'])&& isset($_POST['ZipCode'])&& isset($_POST['Country'])&& isset($_POST['Email'])&& 
   isset($_POST['PhoneNumber'])) {

    echo '<script> console.log("fuck  fucking  php");</script>';

    $FirstName=$_POST['FirstName'];
    $LastName=$_POST['LastName'];
    $Password = $_POST['Password'];
    $ConfirmedPassword = $_POST['ConfirmedPassword'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $ZipCode = $_POST['ZipCode'];
    $Country = $_POST['Country'];
    $Email = $_POST['Email'];
    $PhoneNumber = $_POST['PhoneNumber'];

    echo '<script> console.log("'.$FirstName.$LastName.$State.$PhoneNumber.'"); </script>'; 
    //echo '<script> console.log("fuck php");</script>';
   }
      


?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>


