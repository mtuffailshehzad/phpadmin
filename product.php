<?php
include('partials/header.php');
$product_query  =   mysqli_query($conn, "SELECT * FROM tblproducts");
?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Product</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Product</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Product List </h5>
                        <div class="ibox-tools">
                            <a class="btn btn-primary" href="product_add.php" role="button">Add Product</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Name </th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(mysqli_num_rows($product_query) > 0)
                            {
                                $count =   1;
                                while($row = mysqli_fetch_assoc($product_query))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['product_image']; ?></td>
                                        <td><?php echo $row['product_price']; ?></td>
                                        <td><?php echo $row['product_description']; ?></td>
                                        <td>
                                            <a href="product_edit.php?id=<?php echo $row['pkproductid']; ?>"><i class="fa fa-edit text-primary"></i></a>
                                            <a href="product_delete.php?id=<?php echo $row['pkproductid']; ?>"><i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $count++;
                                }
                                ?>

                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('partials/footer.php'); ?>