<?php
include 'includes/header.php';

/********
 * Get Database Object
 */
$db = new Database();

//Create Query
$query = 'SELECT posts.*, categories.categoryName FROM posts
          INNER JOIN categories ON posts.category = categories.id
          ORDER BY title DESC ';
$posts = $db->select($query);

/****
 * Get The Category
 */
$query = 'SELECT * FROM categories ORDER BY categoryName DESC ';
//Run Query
$categories = $db->select($query);
?>

    <table class="table table-striped">
     <thead>
     <tr>
         <th>Post ID#</th>
         <th>Post Title</th>
         <th>Category</th>
         <th>Author</th>
         <th>Date</th>
     </tr>
     </thead>
        <tbody>
        <?php while ($row = $posts->fetch_assoc()):?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><a href="edit_post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></td>
            <td><?php echo $row['categoryName'];?></td>
            <td><?php echo $row['author'];?></td>
            <td><?php echo formatDate($row['create_date']);?></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Category ID#</th>
            <th>Category Name</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $categories->fetch_assoc()):?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['categoryName']; ?></a></td>
        </tr>
         <?php endwhile;?>
        </tbody>
    </table>
<!--CONTENT HERE-->


<?php include 'includes/footer.php'?>