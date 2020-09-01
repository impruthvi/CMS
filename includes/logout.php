  
<?php session_start(); ;?>   


<?php 


        $_SESSION['username'] = null;
        $_SESSION['firtname'] = null;
        $_SESSION['lastname'] = null;
        $_SESSION['user_role'] = null;

        header("location: ../index.php");

     




?>   