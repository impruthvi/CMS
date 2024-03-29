<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>

<!-- Navigation -->

<?php include "includes/navigation.php"; ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->



        <div class="col-md-8">

            <?php

            if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];
                $the_post_author = $_GET['author'];
            }


            $query = "SELECT * FROM postes WHERE post_user='{$the_post_author}' ";
            $select_all_posts_query = mysqli_query($conection, $query);

            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_user'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];




            ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    All post by <?php echo $post_author ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>


                <hr>




            <?php } ?>


            <!-- Blog Comments -->


            <?php

            if (isset($_POST['create_comment'])) {

                $the_post_id = $_GET['p_id'];

                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";

                    $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}','{$comment_content}', 'unapprove', now())";


                    $create_comment_query = mysqli_query($conection, $query);

                    if (!$create_comment_query) {

                        die("query fail" . mysqli_error($conection));
                    }




                    $query = "UPDATE postes SET post_comment_count = post_comment_count+1 ";

                    $query .= "WHERE post_id = $the_post_id ";


                    $update_comment_count = mysqli_query($conection, $query);


                    if (!$update_comment_count) {

                        die("query faild" . mysqli_error($conection));
                    }
                } else {
                    echo "<script>alert('Field can not be empty')</script>";
                }
            }




            ?>


            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <?php


            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $query .= "AND comment_status = 'approve' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($conection, $query);
            if (!$select_comment_query) {

                die('Query Failed' . mysqli_error($conection));
            }
            while ($row = mysqli_fetch_array($select_comment_query)) {
                $comment_date   = $row['comment_date'];
                $comment_content = $row['comment_content'];
                $comment_author = $row['comment_author'];

            ?>






            <?php } ?>



        </div>


        <!-- Blog Sidebar Widgets Column -->

        <?php include "includes/sidebar.php"; ?>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->

    <?php include "includes/footer.php"; ?>