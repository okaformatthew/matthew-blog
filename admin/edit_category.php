<?php
include 'includes/header.php';

$db = new Database();
$id = (int)$_GET['id'];

$query = "SELECT * FROM categories WHERE id=".$id;
//Run Query
$category = $db->select($query)->fetch_assoc();


//Category Query
$query = "SELECT * FROM categories";
$categories = $db->select($query);

if(isset($_POST['edit_category'])){
    $category = mysqli_real_escape_string($db->link,$_POST['edit']);
    if($category == ''){
        $error = 'Please Fill out the required field';
    }else{
        $query = "UPDATE categories SET
                  categoryName = '$category' WHERE id = ".$id;
        $db->update($query);
    }
}
if(isset($_POST['delete_category'])){
    $delete = "DELETE FROM categories WHERE id = ".$id;

    //Call Delete Method
    $db->delete($delete);
}
?>

<form action="edit_category.php?id=<?php echo $id;?>" method="post" role="form">
    <div class="form-group">
        <label for="">Category Name</label>
        <input type="text" name="edit" class="form-control" placeholder="Edit Post Category" value="<?php echo $category['categoryName'];?>">
    </div>
    <div id="btn-group">
        <input type="submit" name="edit_category" class="btn btn-success" value="Edit Category">
        <input type="submit" name="delete_category" class="btn btn-danger" value="Delete Category">
        <a href="index.php" class="btn btn-warning">Cancel</a>
    </div>
</form>




<?php include "includes/footer.php";?>

