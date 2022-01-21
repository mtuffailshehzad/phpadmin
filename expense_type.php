<?php
include('partials/header.php');
$query  =   mysqli_query($conn, "SELECT * FROM tblexpensetype");
?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Add Expense Type</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Expense Type</strong>
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
                            <h5>Expense Type List </h5>
                            <div class="ibox-tools">
                            <a class="btn btn-primary" href="expensetype_add.php" role="button">Add Expense Type</a>
                            </div>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th>Sr</th>
                                        <th>Name </th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php
                                        if(mysqli_num_rows($query) > 0)
                                        {
                                            $count =   1;
                                            while($row = mysqli_fetch_assoc($query))
                                            {
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row['expensetypename']; ?></td>
                                        <td>
                                            <a href="expensetype_edit.php?id=<?php echo $row['pkexpensetypeid']; ?>"><i class="fa fa-edit text-primary"></i></a>
                                            <a href="expensetype_delete.php?id=<?php echo $row['pkexpensetypeid']; ?>"><i class="fa fa-trash text-danger"></i></a>
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