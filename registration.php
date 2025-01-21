<?php
    $reg_status = 1;
    if(isset($_POST['reg'])){
        $con = mysqli_connect("localhost","root","","onlinevoting");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $phno = $_POST['phno'];
        $password = $_POST['password'];

        $result = mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '$email' OR `id` = '$id'");
        if(mysqli_num_rows($result) == 0){
            mysqli_query($con,"INSERT INTO `users`(`name`, `id`, `phonenumber`, `email`,  `password`) VALUES ('$name','$id','$phno','$email','$password')");
            $reg_status = 1;
            echo "<script>window.location.href='index.php'</script>";
        }
        else{
            $reg_status = 0;
        }
    }
    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Voting System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        html{
            min-height: 100%;
            background:  linear-gradient(
                rgba(0, 0, 0, 0.7), 
                rgba(0, 0, 0, 0.7)
            ), url(vbg.jpg);
            
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            backdrop-filter: brightness(0%);
        }
        body{
            background-color:#0d6efd00;
        }
        #loginform{
            width:20%;
        }
        #container{
            display:flex;
            justify-content:center;
            align-items:center;
            margin-top:5%;
        }
        #left{
            width:40%;
        }

        @media (max-width:600px){
            #left{
                display:none;
            }
            #container{
                margin-top:20%;
            }
            #loginform{
                width:80%;
            }
        }
        a{
            color:black;
        }
    </style>

  </head>
  <body>
    <h1 class="m-5" align='center' style="color:white">Online Voting System</h1>    

    <div id="container">
        <div id="left"></div>
        <div id="loginform" class="m-2 p-4 card shadow-lg">
            <h4 align='center'>Registration</h4>
            <form method = "POST">  
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><b>Name</b></label>
                <input type="text" class="form-control shadow" placeholder="Name" name="name" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><b>Email</b></label>
                <input type="text" class="form-control shadow" placeholder="Email ID" name="email" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><b>ID</b></label>
                <input type="text" class="form-control shadow" placeholder="College Id" name="id" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"><b>Phone Number</b></label>
                <input type="text" class="form-control shadow" placeholder="Phone Number" name="phno" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
                <input type="password" class="form-control shadow" id="exampleInputPassword1" placeholder = "Password" name = "password">
            </div>
            <button type="submit" class="btn btn-dark" name="reg">Register</button><br><br>
            Already Have An Account?<br>
            <a href="index.php">Login Here</a>
            </form>
            <?php
                if($reg_status == 0){
                    echo "<h6 align='center' style='color:red'>Registration Failed</h6>";
                }
                
            ?>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>