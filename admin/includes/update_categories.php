<form action="" method="post">
                                
                                <div class="form-group">
                                    <label for="cat-title">Edit Category</label>
                                    
                                    <?php
                                    
                                        if(isset($_GET['edit'])){
                                            $cat_id = $_GET['edit'];
                                            $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                                            $select_catagories_id = mysqli_query($conection,$query);


                                            while($row=mysqli_fetch_assoc($select_catagories_id)){
                                            $cat_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                                
                                            
                                     ?> 
                                           
                                        <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" type="text" class="form-control" name="cat_title">
                                       
                                            
                                    <?php
                                            }
                                        }
                                    
                                    
                                    
                                    ?>
                                    
                                    
                                    <?php
                                    
                                    if(isset($_POST['update_category'])){
                                        $the_cat_title = $_POST['cat_title'];
                                        $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
                                        $update_query = mysqli_query($conection,$query);
                                        if(!$update_query){
                                            die('Query faild' . mysqli_error($conection));
                                        }
                                        
                                    } 
                                    
                                  
                                    
                                    
                                    ?>
                                    
                                    
                                    
                                </div>
                                
                                 <div class="form-group">
                                    
                                    <input type="submit" class="btn btn-primary" name="update_category" value="Update Category">
                                </div>
                                
 </form>