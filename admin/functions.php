<?php



function insert_categories(){
    global $conection;

    if(isset($_POST['submit'])){
    
        $cat_title = $_POST['cat_title'];

        if($cat_title=="" || empty($cat_title)){
            echo "This field should not be empty";
        }else{
        
            $query = "INSERT INTO categories(cat_title) ";        
            $query .= "VALUE('$cat_title') ";

            $create_categories_query = mysqli_query($conection,$query);
            if(!$create_categories_query){    
                die('Query faild' . mysqli_error($conection));
        
            }
        
        }

        
    }
 }
    
    
function findAllCategories(){
     global $conection;
    
    $query = "SELECT * FROM categories";
                                    $select_catagories = mysqli_query($conection,$query);


                                    while($row=mysqli_fetch_assoc($select_catagories)){
                                     $cat_id=$row['cat_id'];
                                     $cat_title=$row['cat_title'];

                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                    echo "</tr>";

                            }



}



function deleteCategories(){
 global $conection;
    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($conection,$query);
        header("Location: categories.php");
                                        
    }    
}
    










?>