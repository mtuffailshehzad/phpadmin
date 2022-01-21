<?php
include('partials/header.php');
    $errors    =   array();
    if(isset($_POST['category_name'])){ $category_name = $_POST['category_name']; }else{ $category_name = ''; }
    if(isset($_POST['submit']))
    {
        if ($category_name === '')
        {
            $errors['category_name']    =   'Please enter category name.';
        }
        if (count($errors) === 0)
        {
            $query  =   mysqli_query($conn, "INSERT INTO  tblcategory(category_name) VALUE('".$category_name."')");
            echo jsredirecturl('categories.php');
            exit;
        }
    }
    else
    {
        echo "Post data is empty!";
    }
?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Manage Categories</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="categories.php">Manage Categoeies</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Add Categories</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-12">
        <div class="ibox ">
                <div class="ibox-title">
                    <h5>Manage Categories</h5>
                </div>
                <div class="ibox-content">
                    <?php if (count($errors) > 0){ ?>
                    <ul class="alert alert-danger" role="alert">
                        <?php foreach ($errors as $key => $error){ ?>
                            <li><?php echo $error; ?></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                <form class="m-t" role="form"method="post" action="category_add.php">
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Category Name <span style="color: #8b0000">*</span></label>
                            <div class="col-sm-10">
                            <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Enter The Category Name" value="<?php echo $category_name; ?>" />
                            <?php if(isset($errors['category_name'])){?>
                                <p style="color: #8b0000;"><?php echo $errors['category_name']; ?></p>
                            <?php }?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <a href="categories.php" class="btn btn-danger btn-lg float-right">Cancel</a>
                                <button class="btn btn-success btn-lg float-right" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('partials/footer.php') ?>