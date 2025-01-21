<?php
    session_start();
    $_SESSION['loggedin'] = "loggedout";
    session_unset();
    echo "<script>window.location.href = 'index.php'</script>";
?>