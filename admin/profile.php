<?php include "includes/admin_header.php" ?>




<div id="wrapper">


    <!-- Navigation -->

    <?php include "includes/admin_navigation.php" ?>


    <?php

    if (isset($_SESSION['username'])) {

        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($conection, $query);

        while ($row = mysqli_fetch_array($select_user_profile_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];
        }
    }






    ?>

    <?php

    if (isset($_POST["edit_user"])) {


        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];


        //            $post_image=$_FILES['image']['name'];
        //            $post_image_temp=$_FILES['image']['tmp_name'];
        //            
        //            


        // $user_role=$_POST['user_role'];

        //            $post_date=date('d-m-y');

        //            move_uploaded_file($post_image_temp,"../images/$post_image" );




        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";

        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}', ";
        // $query .="user_role= '{$user_role}' ";

        $query .= "WHERE username = '{$username}' ";
        $update_user = mysqli_query($conection, $query);
        comfirm($update_user);
    }






    ?>








    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small><?php echo $_SESSION['username'] ?></small>


                    </h1>


                    <form action="" method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="title">Firstname</label>
                            <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
                        </div>

                        <div class="form-group">
                            <label for="title">Lastname</label>
                            <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
                        </div>






                        <!--
                                <div class="form-group">
                                    <label for="title">User Image</label>
                                    <input type="file" name="user_image">
                                </div>
                            -->

                        <div class="form-group">
                            <label for="post_tags">Username </label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Email</label>
                            <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Password</label>
                            <input autocomplete="off" type="password" class="form-control" name="user_password">
                        </div>




                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
                        </div>

                    </form>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>




    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php" ?>