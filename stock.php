<?php
include('partials/header.php');
$stockquery  =   mysqli_query($conn, "SELECT st.*, c.category_name, p.product_name FROM tblstock AS st 
        INNER JOIN tblcategory AS c 
            ON c.pkcategoryid = st.fkcategoryid
        INNER JOIN tblproducts AS p
            ON p.pkproductid = st.fkproductid");
?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Stock</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Stock</strong>
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
                        <h5>Stock List </h5>
                        <div class="ibox-tools">
                            <a class="btn btn-primary" href="stock_add.php" role="button">Add Stock</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Total Stock</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(mysqli_num_rows($stockquery) > 0)
                            {
                                $count =   1;
                                while($row = mysqli_fetch_assoc($stockquery))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row['category_name']; ?></td>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['stock_total']; ?></td>
                                        <td>
                                            <a href="stock_edit.php?id=<?php echo $row['pkstockid']; ?>"><i class="fa fa-edit text-primary"></i></a>
                                            <a href="stock_delete.php?id=<?php echo $row['pkstockid']; ?>"><i class="fa fa-trash text-danger"></i></a>
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