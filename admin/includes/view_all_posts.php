 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Auther</th>
                                    <th>Cetegory</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Data</th>
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
                                       echo "<td> <a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                                       echo "<td> <a href='posts.php?delete={$post_id}'>Delete</a></td>";
                                   
                                   
                                   echo "</tr>";
                                    
                                    }   
                            
                            
                            
                            
                            ?>
                                
                            </tbody>
                        </table>
                        
<?php

    if(isset($_GET['delete'])){
        $the_post_id = $_GET['delete'];
        
        $query = "DELETE FROM postes WHERE post_id = {$the_post_id} ";
        $delete_query = mysqli_query($conection,$query);
    }









?>                   
                      
                     
                    
                   
    