<?php

if (isset($_POST["create_post"])) {
    $post_title = $_POST['title'];
    $post_user = $_POST['post_user'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];


    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];




    $post_tag = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    //            $post_comment_count=4;

    move_uploaded_file($post_image_temp, "../images/$post_image");


    $query = "INSERT INTO postes(post_category_id, post_title, post_user,post_date,post_image,post_tags,post_comment_count,post_status) ";
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tag}','{$post_status}')";

    $create_post_query = mysqli_query($conection, $query);

    comfirm($create_post_query);
    $the_post_id = mysqli_insert_id($conection);
    echo "<p class='bg-success'>Post Updated.<a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>Edite more posts</p>  ";
}




?>

<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>


    <div class="form-group">
        <label for="category">Category</label>
        <select name="post_category" id="">
            <?php
            $query = "SELECT * FROM categories  ";
            $select_catagories = mysqli_query($conection, $query);


            while ($row = mysqli_fetch_assoc($select_catagories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='$cat_id'>$cat_title</option>";
            }

            ?>

        </select>
    </div>


    
    <div class="form-group">
        <label for="user">Post Auther</label>
        <select name="post_user" id="">
            <?php
            $users_query = "SELECT * FROM users  ";
            $select_catagories = mysqli_query($conection, $users_query);


            while ($row = mysqli_fetch_assoc($select_catagories)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                echo "<option value='$username'>$username</option>";
            }

            ?>

        </select>
    </div>

    <!-- <div class="form-group">
        <label for="title">Post Auther</label>
        <input type="text" class="form-control" name="author">
    </div> -->


    <div class="form-group">
        <label for="post_status">Post Status</label>
        <div class="form-group">
            <select name="post_status" id="">
                <option value="draft">Post Status</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="body" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>


    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>










</form>