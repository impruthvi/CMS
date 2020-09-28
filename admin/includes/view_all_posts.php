 <?php

    if(isset($_POST['checkBoxArray'])){
       foreach($_POST['checkBoxArray'] as $postValueId){
           $bulk_options = $_POST['bulk_options'];
            switch($bulk_options) {
                    
                case 'published':
                    $query = "UPDATE postes SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";
                    $update_to_published_status = mysqli_query($conection,$query);       
                    comfirm($update_to_published_status);            
                    break;
                    
                case 'draft':
        
                    $query = "UPDATE postes SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";
                    $update_to_draft_status = mysqli_query($conection,$query);
                    comfirm($update_to_draft_status);
                    break;
            
                        
                    case 'delete':

                        $query = "DELETE FROM postes WHERE post_id = {$postValueId}  ";
                        $update_to_delete_status = mysqli_query($conection,$query);
                        comfirm($update_to_delete_status);
                        break;
                    
                     case 'clone':


                        $query = "SELECT * FROM postes WHERE post_id = '{$postValueId}' ";
                        $select_post_query = mysqli_query($conection, $query);



                        while ($row = mysqli_fetch_array($select_post_query)) {
                            $post_title         = $row['post_title'];
                            $post_category_id   = $row['post_category_id'];
                            $post_date          = $row['post_date']; 
                            $post_author        = $row['post_author'];
                            $post_status        = $row['post_status'];
                            $post_image         = $row['post_image'] ; 
                            $post_tags          = $row['post_tags']; 
                            $post_content       = $row['post_content'];

                        }

                 
                      $query = "INSERT INTO postes(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";

                      $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') "; 

                        $copy_query = mysqli_query($conection, $query);   

                       if(!$copy_query ) {

                        die("QUERY FAILED" . mysqli_error($conection));
                           
                       }   

                        break;
            
            

  
        
        }
       }
    }


?>
                          
                          
            <form action="" method="post">
                           
                           <table class="table table-bordered table-hover">
                            <div id="bulkOptionContainer" class="col-xs-4">

                            <select class="form-control" name="bulk_options" id="">
                                <option value="">Select Options</option>
                                <option value="published">Publish</option>
                                <option value="draft">Draft</option>
                                <option value="delete">Delete</option>
                                 <option value="clone">Clone</option>
                            </select>

                            </div> 
                            
                            <div class="col-xs-4">

                                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                                <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>

                             </div>
                            <thead>
                                <tr>
                                    <th><input id="selectAllBoxes" type="checkbox"></th>
                                    <th>Id</th>
                                    <th>Auther</th>
                                    <th>Cetegory</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Data</th>
                                    <th>View All Posts</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            
                            
                            
                            <tbody>
                               
                               <?php
                                 $query = "SELECT * FROM postes";
                                $select_posts = mysqli_query($conection,$query);


                                while($row=mysqli_fetch_assoc($select_posts)){
                                        $post_id=$row['post_id'];
                                        $post_category_id=$row['post_category_id'];
                                        $post_title=$row['post_title'];
                                        $post_author=$row['post_author'];
                                        $post_image=$row['post_image'];
                                        $post_comments_count=$row['post_comment_count'];
                                        $post_status=$row['post_status'];
                                        $post_tag=$row['post_tags'];
                                        $post_date=$row['post_date'];
                                        
                                

                                   echo "<tr>";
                                    ?>
                                    
                                        <th><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $post_id;?>"></th>
                                    
                                      
                                <?php  
                                       echo "<td> $post_id</td>";
                                       echo "<td>$post_author </td>";
                                    
                                    
                                        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
                                            $select_catagories_id = mysqli_query($conection,$query);


                                            while($row=mysqli_fetch_assoc($select_catagories_id)){
                                            $cat_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                    
                                    
                                                echo "<td>{$cat_title}</td>";
                                            }
                                    
                        
                                    
                                    
                                    
                                    
                                    
                                       echo "<td>$post_status </td>";
                                       echo "<td><img width = 150 src = '../images/$post_image'' alt ='image' </td>";
                                       echo "<td> $post_tag</td>";
                                       echo "<td>$post_comments_count </td>";
                                       echo "<td> $post_date</td>";
                                       echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
                                       echo "<td> <a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                                       echo "<td> <a onClick=\" javascript: return confirm('Are you sure you want to delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
                                   
                                   
                                   echo "</tr>";
                                    
                                    }   
                            
                            
                            
                            
                            ?>
                                
                            </tbody>
                        </table>
                        </form>
<?php

    if(isset($_GET['delete'])){
        $the_post_id = $_GET['delete'];
        
        $query = "DELETE FROM postes WHERE post_id = {$the_post_id} ";
        $delete_query = mysqli_query($conection,$query);
        header("Location: posts.php");
    }









?>                   
                      
                     
                    
                   
    