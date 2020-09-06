<?php include "includes/admin_header.php"?>

   
   
   
    <div id="wrapper">
        

        <!-- Navigation -->
       
    <?php include "includes/admin_navigation.php"?>
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            
                            
                            <small><?php echo $_SESSION['username']?></small>
                        </h1>
                     
                    </div>
                </div>
                <!-- /.row -->
                
                
                
                       
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    
                                    <?php 
                                        
                                        $query = "SELECT * FROM postes";
                                        $select_all_posts = mysqli_query($conection,$query);
                                        $posts_count=mysqli_num_rows($select_all_posts);
                                        
                                        
                                        echo "<div class='huge'>{$posts_count}</div>";
                                    ?>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                     <?php 
                                        
                                        $query = "SELECT * FROM comments";
                                        $select_all_comments = mysqli_query($conection,$query);
                                        $comments_count=mysqli_num_rows($select_all_comments);
                                        
                                        
                                        echo "<div class='huge'>{$comments_count}</div>";
                                    ?>
                                    
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                     <?php 
                                        
                                        $query = "SELECT * FROM users";
                                        $select_all_users = mysqli_query($conection,$query);
                                        $users_count=mysqli_num_rows($select_all_users);
                                        
                                        
                                        echo "<div class='huge'>{$users_count}</div>";
                                    ?>
                                    
                                    
                               
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       
                                       
                                     <?php 
                                        
                                        $query = "SELECT * FROM categories";
                                        $select_all_categories = mysqli_query($conection,$query);
                                        $categories_count=mysqli_num_rows($select_all_categories);
                                        
                                        
                                        echo "<div class='huge'>{$categories_count}</div>";
                                    ?>
                                    
                                       
                                       
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                                <!-- /.row -->
                                
                                
                                
                                
                                               
    <?php 

 $query = "SELECT * FROM postes WHERE post_status = 'published' ";
$select_all_published_posts = mysqli_query($conection,$query);
$post_published_count = mysqli_num_rows($select_all_published_posts);
                                     

                                      
$query = "SELECT * FROM postes WHERE post_status = 'draft' ";
$select_all_draft_posts = mysqli_query($conection,$query);
$post_draft_count = mysqli_num_rows($select_all_draft_posts);


$query = "SELECT * FROM comments WHERE comment_status = 'unapprove' ";
$unapproved_comments_query = mysqli_query($conection,$query);
$unapproved_comment_count = mysqli_num_rows($unapproved_comments_query);


$query = "SELECT * FROM users WHERE user_role = 'subscriber'";
$select_all_subscribers = mysqli_query($conection,$query);
$subscriber_count = mysqli_num_rows($select_all_subscribers);



    ?>
                
                                
                                
                        <div class="row">
                            
                            

                                   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                    <script type="text/javascript">
                                      google.charts.load('current', {'packages':['bar']});
                                      google.charts.setOnLoadCallback(drawChart);

                                      function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Data','Count'],
                                            
                                            <?php
                                           $element_text = ['All Posts','Active Posts','Draft Posts','Categories','Users','Subscriber','Comments','Pending Comments'];    
                                           $element_count = [$posts_count,$post_published_count,$post_draft_count,$categories_count,$users_count,$subscriber_count,$comments_count,$unapproved_comment_count];
                                            
                                             for($i =0;$i < 8; $i++) {
    
                                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                             }
                                          ?>
                                            
                                            
                                        ]);

                                        var options = {
                                          chart: {
                                            title: '',
                                            subtitle: '',
                                          }
                                        };

                                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                        chart.draw(data, google.charts.Bar.convertOptions(options));
                                      }
                                    </script>

                         <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                       
                       
                        </div>        
                                
                                
                                
                                
                                
                                
                                
                                
                

            </div>
            <!-- /.container-fluid -->

        </div>
        
        
        
        
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"?>