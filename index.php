<?php
include 'includes/header.php';

$db = new Database();
$query = "SELECT * FROM posts ORDER BY id DESC ";
//Run Query
$posts = $db->select($query);


//Category Query
$query = "SELECT * FROM categories ORDER BY id DESC ";
$categories = $db->select($query);
?>


<?php if($posts):?>
<div class="blog-post">
    <?php while($row = $posts->fetch_assoc()):?>
    <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
    <p class="blog-post-meta"><?php echo formatDate($row['create_date']);?> by <a href="#"><?php echo $row['author'];?></a></p>
     <p><?php echo shortenText($row['body']);?></p>
    <a href="post.php?id=<?php echo urlencode($row['id']);?>" class="readmore">Read More</a>
<?php endwhile;?>
    </div><!-- /.blog-post -->

<?php else:?>
<p>There are no post yet!</p>
<?php endif;?>
<?php include 'includes/footer.php';?>