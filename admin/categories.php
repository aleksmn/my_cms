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
                            Welcome to admin page
                            <small>Subheading</small>
                        </h1>
                        
                        <div class="col-xs-6">
                           
                    
                           
                           
                            <form action="" method="post">  <!-- Add Category Form -->
                                <div class="form-group">
                                  <label for="cat-title">Add Category</label>
                                  <input class="form-control" type="text" name="cat_title">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>

                            </form>

                            <form action="" method="post"> <!-- Edit Category Form -->
                                <div class="form-group">
                                   <label for="cat-title">Edit Category</label>
                                   
                                   <?php // EDIT CATEGORY QUERY
                                        if(isset($_GET['edit'])) {

                                            $cat_id = $_GET['edit'];            

                                            $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                                            $select_categories_id = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_assoc($select_categories_id)) {
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                    
                                    ?>
                                            
                                            <input value = "<?php if(isset($cat_title)) echo $cat_title; ?>" class="form-control" type="text" name="cat_title">
                  
                                    <?php 
                                            } 
                                        } 
                                    ?>
                                    
                                    


                                    
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Update Category">
                                </div>

                            </form>




                        </div>
                        
                        
                        <div class="col-xs-6">
                            
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                   
                                

<?php // Adding Category

if(isset($_POST['submit'])) {

    $cat_title = $_POST['cat_title'];

    if($cat_title == "" || empty($cat_title)) {
    
      echo "This field should not be empty!";
        
    } else {
     
        $query = "INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
        
        $create_category_query = mysqli_query($connection, $query);
        
        if(!$create_category_query) {
        
          die('QUERY FAILED' . mysqli_error($connection));
        
        }
    
    }

}

?>





<?php // FIND ALL CATEGORIES QUERY

$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_categories)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
echo "<tr>";
echo "<td>{$cat_id}</td>";
echo "<td>{$cat_title}</td>";
echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
echo "</tr>";
}

?> 
                                                          
                              
<?php // DELETE CATEGORY QUERY

if(isset($_GET['delete'])) {
    $get_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: categories.php");
}

?>


                           
                           
                         
                               </tbody>
                                
                                
                            </table>
                            
                        </div>
                        
                        
                        
                        
<!--
                        <ol class="breadcrumb">

                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>

                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
-->                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php" ?>