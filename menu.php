<?php
    session_start();
    if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin'] != "loggedin"){
            echo "<script>window.location.href = 'index.php'</script>";
        }
    }
    else{
        echo "<script>window.location.href = 'index.php'</script>";
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
        #options{
            background-color:#0d6efd00;
            margin:10%;
            width:20%;
            text-align:center;
        }
        #container{
            display:flex;
            justify-content:center;
            align-items:center;
            margin-top:5%;
        }
        #left{
            width:40%;
            display:none;
        }

        .btn-light{
            width:50%;
        }
        #logout{
            position:absolute;
            top:10px;
            right:10px;
            display: <?php echo $thanks ?>;
        }

        @media (max-width:600px){
            #left{
                display:none;
            }
            #container{
                margin-top:30%;
            }
            #options{
                width:80%;
            }
            .btn-light{
            width:90%;
        }
        }
        a{
            color:black;
        }
    </style>

  </head>
  <body>
    <h1 class="m-5" align='center' style="color:white">Online Voting System</h1>   
    <button id="logout" class="btn btn-dark p-3" onclick="window.location.href='logout.php'">Logout</button> 
    <div id="container">
        <div id="left">

        </div>
        <div id="options" class="m-2 p-4">

            <div class="btn btn-light p-3 m-3" onclick="window.location.href = 'voterdetails.php'">
                <h5>Voter Details</h5>
            </div>

            <div class="btn btn-light p-3 m-3" onclick="window.location.href = 'candidatedetails.php'">
                <h5>Candidate Details</h5>
            </div>

            <div class="btn btn-light p-3 m-3" onclick="window.location.href = 'vote.php'">
                <h5>V O T E</h5>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>