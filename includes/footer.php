<?php

?>

</div><!-- /.blog-main -->

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p><?php echo $site_description;?></p>
    </div>
    <div class="sidebar-module">
        <h4>Categories</h4>
        <?php if($categories):?>
        <ol class="list-unstyled">
            <?php while ($row = $categories->fetch_assoc()):?>
            <li><a href="posts.php?category=<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></a></li>
            <?php endwhile;?>
        </ol>
        <?php else:?>
        <div class="alert alert-info" role="alert">
        <strong>There are no Category Yet!</strong>
        </div>
        <?php endif; ?>
    </div>
</div><!-- /.blog-sidebar -->

</div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">
    <p>PHP Lovers BLog &copy; 2018</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>

