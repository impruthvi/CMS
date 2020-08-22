      <div class="col-md-4">

               
               
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

               
               
               
               
                <!-- Blog Categories Well -->
                <div class="well">
                  
                         <?php
                        
                            $query = "SELECT * FROM categories";
                            $select_catagories_sidebar = mysqli_query($conection,$query);

                            
                    
                    
                    
                    ?>          
                   
                   
                   
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                               
                            <?php
                                while($row=mysqli_fetch_assoc($select_catagories_sidebar)){
                                 $cat_title=$row['cat_title'];

                                echo "<a href='#'><li>{$cat_title}</a></li>";

                            }
                                
                                ?>

                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                   
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php";?>

            </div>