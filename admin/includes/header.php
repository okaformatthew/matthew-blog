<?php
include '../config/config.php';
include '../libraries/Database.php';
include '../helpers/format_helper.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN AREA</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="index.php">Dashboard</a>
            <a class="blog-nav-item" href="add_post.php">Add Posts</a>
            <a class="blog-nav-item text-right" href="add_category.php">Add Category</a>
            <a class="blog-nav-item text-right pull-right" href=http://localhost/phpblog>Visit Blog</a>

        </nav>
    </div>
</div>

<div class="container">
    <div class="blog-header">
        <h2>Admin Area</h2>
    </div>

    <div class="row">

        <div class="col-sm-12 blog-main">
<?php if(isset($_GET['msg'])) :?>
    <div class="alert alert-success alert-dismissable text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
        <?php echo htmlentities($_GET['msg']);?>
    </div>

<?php endif; ?>
