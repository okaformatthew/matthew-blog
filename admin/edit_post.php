<?php
include 'includes/header.php';

$db = new Database();
$id = (int)$_GET['id'];

$query = "SELECT * FROM posts WHERE id=".$id;
//Run Query
$post = $db->select($query)->fetch_assoc();


//Category Query
$query = "SELECT * FROM categories";
$categories = $db->select($query);

/*****
 * Edit Post
 */
if(isset($_POST['edit_post'])){
    $title = mysqli_real_escape_string($db->link,$_POST['title']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

    //Validate Post Input
    if($title == '' || $body == '' || $category == '' || $author == '' || $tags == ''){
        $error = 'Please Fill out all required field';
    }else{
        $query = "UPDATE posts SET
                 title    =    '$title',
                 body     =    '$body',
                 category =    '$category',
                 author   =    '$author',
                 tags     =    '$tags' WHERE id = ".$id;
        $db->update($query);
    }
}

if(isset($_POST['delete'])){
    $query = "DELETE FROM posts WHERE id = ".$id;
    //Call Delete Method
    $db->delete($query);
}
?>

<form method="post" action="edit_post.php?id=<?php echo $id;?>">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="<?php echo $post['title'];?>">
    </div>
    <div class="form-group">
        <label for="body">Post Body</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Enter Post Body">
        <?php echo $post['body'];?>
        </textarea>
    </div>
    <div class="form-group">
        <label for="category">Post Category</label>
        <select name="category" id="category" class="form-control">
            <?php while($category = $categories->fetch_assoc()): ?>
            <?php
                if($category['id'] == $post['category']){
                    $selected = 'Selected';
                }else{
                    $selected = '';
                }
                ?>
            <option <?php echo $selected;?> value="<?php echo $category['id'];?>"><?php echo $category['categoryName'];?></option>
            <?php endwhile;?>
        </select>
        <div class="form-group">
            <label for="author">Post Author</label>
            <input type="text" class="form-control" name="author" id="author" placeholder="Enter Author Name" value="<?php echo $post['author'];?>">
        </div>
        <div class="form-group">
            <label for="tas">Post Tags</label>
            <input type="text" class="form-control" name="tags" id="tag" placeholder="Enter Tags" value="<?php echo $post['tags'];?>">
        </div>
    </div>
    <div id="btn-group">
        <input type="submit" name="edit_post" value="Edit Post" class="btn btn-primary">
        <input type="submit" name="delete" value="Delete Post" class="btn btn-danger">
        <a href="index.php" class="btn btn-warning">Cancel</a>
    </div>
</form>

<?php include 'includes/footer.php';?>
