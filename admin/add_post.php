<?php
include 'includes/header.php';

$db = new Database();


//Category Query
$query = "SELECT * FROM categories";
$categories = $db->select($query);


/********
 * Submit Form Query
 */
if(isset($_POST['submit'])){
   $title = mysqli_real_escape_string($db->link,$_POST['title']);
   $body = mysqli_real_escape_string($db->link, $_POST['body']);
   $category = mysqli_real_escape_string($db->link, $_POST['category']);
   $author = mysqli_real_escape_string($db->link, $_POST['author']);
   $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

   //Validate Post Input
    if($title == '' || $body == '' || $category == '' || $author == '' || $tags == ''){
        $error = 'Please Fill out all required field';
    }else{
        $query = "INSERT INTO posts (title, body, category, author, tags)
                  VALUES ('$title', '$body', '$category', '$author', '$tags')";
         $db->insert($query);
    }
}
?>


<form method="post" action="add_post.php">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="body">Post Body</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Enter Post Body">

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
            <input type="text" class="form-control" name="author" id="author" placeholder="Enter Author Name">
        </div>
        <div class="form-group">
            <label for="tags">Post Tags</label>
            <input type="text" class="form-control" name="tags" id="tags" placeholder="Enter Tags">
        </div>
    </div>
    <div id="btn-group">
    <input type="submit" name="submit" value="Add Post" class="btn btn-primary">
    <a href="index.php" class="btn btn-warning">Cancel</a>
    </div>
</form>

<?php include 'includes/footer.php';?>
