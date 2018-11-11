<?php
include 'config/config.php';
include 'libraries/Database.php';
include 'helpers/format_helper.php';

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
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="index.php">Home</a>
            <a class="blog-nav-item" href="posts.php">All Posts</a>
            <a class="blog-nav-item text-right" href="#">Admin Panel</a>
        </nav>
    </div>
</div>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title"> PHP LOVERS BLOG ADMIN AREA</h1>
        <p class="lead blog-description">PHP News, Tutorials, Video And More.</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">
