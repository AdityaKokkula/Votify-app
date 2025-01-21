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
            color:white;
            background-color:#0d6efd00;
        }
        h1{
            margin-top:2%;
        }
        h2{
            margin-top:10%;
            display: <?php echo $thanks ?>;
        }   
        #logout{
            position:absolute;
            top:10px;
            right:10px;
            display: <?php echo $thanks ?>;
        }
        table{
            background-color:white;
            margin-top:5%;
            border: solid 4px black;
            display: <?php echo $display ?>;
        }
        #container{
            width:80%;
            margin:auto;
        }
        td,th{
            font-weight:bold;
            font-size:larger;
            text-align:center;
            border: solid 4px #dee2e6;
            vertical-align:middle;
        }

        @
    </style>

  </head>
  <body>
    <button id="logout" class="btn btn-dark p-3" onclick="window.location.href='logout.php'">Logout</button>
    <br><br>
    <h1 align="center">Candidate Details</h1>
    <div id="container">
        <table class="table">
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>ID</th>
                <th>Age</th>
                <th>Phone Number</th>
            </tr>
            <?php
                $serialnumber = 1;
                $con = mysqli_connect("localhost","root","","onlinevoting");
                $result = mysqli_query($con,"SELECT * FROM candidates");
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>$serialnumber</td><td>".$row['name']."</td>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['age']."</td>";
                    echo "<td>".$row['phonenumber']."</td>";
                    $serialnumber += 1;
                }
            ?>
        </table>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>