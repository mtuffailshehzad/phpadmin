<?php
include('partials/header.php');
if(isset($_REQUEST['id'])) { $id = $_REQUEST['id']; }else{ $id = ''; }
$category_name =   '';
if(isset($_POST['submit']))
{
    if(isset($_POST['category_name'])){$category_name=$_POST['category_name'];}else{$category_name='';}
    
    if($category_name === '')
    {
        $messages='please enter the Category name';
    }
    else {
        $query  =   mysqli_query($conn, "UPDATE tblcategory SET category_name='".$category_name."' WHERE pkcategoryid=".$id);
        echo jsredirecturl('categories.php');
        exit;
    }
}else
    {
        if($id != '')
        {
            $query  =   mysqli_query($conn, "SELECT * FROM tblcategory WHERE pkcategoryid=".$id);
            if(mysqli_num_rows($query) > 0)
            {
                $tblcategory   =   mysqli_fetch_assoc($query);
                $category_name =   $tblcategory['category_name'];
            }
        }
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
                            <strong>Edit Categories</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
<form class="m-t" role="form"method="post" action="">
                <div class="form-group">
                    <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category Name" value="<?php echo $category_name; ?>">
                </div>
                <div>
                     <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Edit</button>
                </div>

<?php include('partials/footer.php') ?>