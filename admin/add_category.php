<?php
include 'includes/header.php';
$db = new Database();

if(isset($_POST['edit_category'])){
    $category = mysqli_real_escape_string($db->link, $_POST['add_category']);

    if($category == ''){
        $error = 'Please Fill out the required field';
    }else{
       $query = "INSERT INTO categories(categoryName) VALUES ('$category')";
       $db->insert($query);
    }
}


?>

<form action="add_category.php" method="post" role="form">
    <div class="form-group">
        <label for="">Category Name</label>
        <input type="text" name="add_category" class="form-control" placeholder="Add Post Category">
    </div>
    <div id="btn-group">
        <input type="submit" name="edit_category" class="btn btn-success" value="Add Category">
    </div>
</form>




<?php include "includes/footer.php";?>

