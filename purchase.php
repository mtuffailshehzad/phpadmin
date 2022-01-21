<?php
include('partials/header.php');
$purchase_query  =   mysqli_query($conn, "SELECT pr.*, c.category_name, p.product_name, s.supplier_name FROM tblpurchase AS pr 
        INNER JOIN tblcategory AS c 
            ON c.pkcategoryid = pr.categoryid
        INNER JOIN tblproducts AS p
            ON p.pkproductid = pr.productid
        INNER JOIN tblsupplier AS s
            ON s.pksupplierid = pr.supplierid");
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Purchase</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Purchase</strong>
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
                    <h5>Purchase List </h5>
                    <div class="ibox-tools">
                        <a class="btn btn-primary" href="purchase_add.php" role="button">Add Purchase</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(mysqli_num_rows($purchase_query) > 0)
                        {
                            $count =   1;
                            while($row = mysqli_fetch_assoc($purchase_query))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $row['category_name']; ?></td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['supplier_name']; ?></td>
                                    <td><?php echo $row['descriptions']; ?></td>
                                    <td>
                                        <a href="purchase_edit.php?id=<?php echo $row['pkpurchaseid']; ?>"><i class="fa fa-edit text-primary"></i></a>
                                        <a href="purchase_delete.php?id=<?php echo $row['pkpurchaseid']; ?>"><i class="fa fa-trash text-danger"></i></a>
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