<?php
include "includes/header.php";

$db = new Database();
$id = (int)$_GET['id'];

$query = "SELECT * FROM posts WHERE id=".$id;
//Run Query
$post = $db->select($query)->fetch_assoc();


//Category Query
$query = "SELECT * FROM categories";
$categories = $db->select($query);

?>

<div class="blog-post">
    <h2 class="blog-post-title"><?php echo $post['title'];?></h2>
    <p class="blog-post-meta"><?php echo formatDate($post['title']);?> by <a href="#"><?php echo $post['author'];?></a></p>
    <p><?php echo $post['body'];?></p>
</div><!-- /.blog-post -->


<?php
include "includes/footer.php";
?>
