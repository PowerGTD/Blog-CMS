<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

<!-- Navigation -->

<?php include "includes/admin_navigation.php"; ?>

    <!--Page Wrapper -->

    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Your Admin Page
                        <small>Author</small>
                    </h1>
                    <div class="col-xs-6">

                   <!-- Add category query (from admin_functions.php) -->

                   <?php add_category(); ?>

                    <!-- Add category form -->

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add Category</label>
                            <input class="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>
                    </form>

                    <!-- Update category query -->

                    <?php update_category(); ?>

                    <!-- Displaying table headers in HTML -->

                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                        <!-- Find all categories query PLUS TABLE DATA RENDERING (from admin_functions.php) -->

                        <?php find_all_categories(); ?>

                        <!-- Delete category query (from admin_functions.php) -->

                       <?php delete_category(); ?>

                        </tbody>
                    </table>
                </div>

                <!-- /.col-lg-12 -->

                </div>

            <!-- /.row -->

            </div>

        <!-- /.container-fluid -->

        </div>

    <!-- /#page-wrapper -->

    </div>

<!-- /#wrapper -->

</div>

<?php include "includes/admin_footer.php"; ?>
