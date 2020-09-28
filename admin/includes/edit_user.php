
   
   
   
   <?php



        if(isset($_GET['edit_user'])){
            $the_user_id=$_GET['edit_user'];
            
            $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
            $select_user = mysqli_query($conection,$query);
            
             while($row=mysqli_fetch_assoc($select_user)){
                
                $username=$row['username'];
                $user_password=$row['user_password'];
                $user_firstname=$row['user_firstname'];
                $user_lastname=$row['user_lastname'];
                $user_email=$row['user_email'];
                $user_role=$row['user_role'];
                $user_image=$row['user_image'];
                 
                 
             }
        }




    
    
        if(isset($_POST["edit_user"])){
            
            
             $user_firstname= $_POST['user_firstname'];
            $user_lastname=$_POST['user_lastname'];
            $username=$_POST['username'];
            $user_email=$_POST['user_email'];
            $user_password=$_POST['user_password'];
            
            
//            $post_image=$_FILES['image']['name'];
//            $post_image_temp=$_FILES['image']['tmp_name'];
//            
//            
            
           
            $user_role=$_POST['user_role'];
            
//            $post_date=date('d-m-y');
            
//            move_uploaded_file($post_image_temp,"../images/$post_image" );
            
               $query = "SELECT randSalt FROM users";
                $select_randSalt_query = mysqli_query($conection,$query);

                if(!$select_randSalt_query){
                    die("Query Failed" . mysqli_error($conection));
                }

                $row=mysqli_fetch_array($select_randSalt_query);
                $salt = $row['randSalt'];
                $hashed_password=crypt($user_password,$salt);
            
            
            $query = "UPDATE users SET ";
                        $query .="user_firstname = '{$user_firstname}', ";
                        $query .="user_lastname = '{$user_lastname}', ";
//                        $query .="post_date = now(), ";
                        $query .="username = '{$username}', ";
                        $query .="user_email = '{$user_email}', ";
                        $query .="user_password = '{$hashed_password}', ";
                        $query .="user_role= '{$user_role}' ";
//                        $query .="post_image  = '{$post_image}' ";
                        $query .= "WHERE user_id = {$the_user_id} ";
                        $update_user = mysqli_query($conection,$query);
                        comfirm($update_user);
            
            
            
            
            
        }
        
        
        
    
    ?>
    
    <form action="" method="post" enctype="multipart/form-data">
    
    
    <div class="form-group">
        <label for="title">Firstname</label>
        <input  type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>
    
     <div class="form-group">
        <label for="title">Lastname</label>
        <input type="text" class="form-control" name="user_lastname"  value="<?php echo $user_lastname; ?>">
    </div>
    
    
    
    <div class="form-group">
                    <select name="user_role" id="">
                    
                    
                     <option value="<?php echo $user_role; ?>"><?php echo $user_role ?></option>
                    <?php
    
                    if($user_role == 'admin'){
                        
                     echo '<option value="Subscriber">Subscriber</option>';
                    }else{
                        
                     echo '<option value="Admin">Admin</option>';
                    }
                        
                        
                        
                        
                    ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    </select>
                </div>
    

    
<!--
    <div class="form-group">
        <label for="title">User Image</label>
        <input type="file" name="user_image">
    </div>
-->
    
    <div class="form-group">
        <label for="post_tags">Username </label>
        <input type="text" class="form-control" name="username"  value="<?php echo $username; ?>">
    </div>
    
    <div class="form-group">
        <label for="post_content">Email</label>
       <input type="email" class="form-control" name="user_email"  value="<?php echo $user_email; ?>">
    </div>
    
      <div class="form-group">
        <label for="post_content">Password</label>
       <input type="password" class="form-control" name="user_password"  value="<?php echo $user_password; ?>">
    </div>
    
    
    
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
    </div>
    
    
    
    
    
    
    
    
    
    
</form>