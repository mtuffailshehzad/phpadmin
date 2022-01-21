<?php
include('partials/header.php');
    $message    =  array();
    if(isset($_POST['expensetypename'])){ $expensetypename = $_POST['expensetypename']; }else{ $expensetypename = ''; }
    if(isset($_POST['submit'])) {
    if ($expensetypename === '') {
        $message['expensetypename']    =   "Please enter expense Typename.";
    }
    if (count($message) === 0) {
            $query = mysqli_query($conn, "INSERT INTO  tblexpensetype(expensetypename) VALUE('" . $expensetypename . "')");
            echo jsredirecturl('expense_type.php');
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
                    <h2>Add Expense Type</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="expense_type.php">Expense Type</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Add Expense Type</strong>
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
                    <?php if (count($message) > 0){ ?>
                        <ul class="alert alert-danger" role="alert">
                            <?php foreach ($message as $key => $error){ ?>
                                <li><?php echo $error; ?></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    <h5>Expense Type</h5>
                </div>
                <div class="ibox-content">
                    <form class="m-t-md" method="post" action="expensetype_add.php">
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Expense Type Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="expensetypename" id="expensetypename" class="form-control" placeholder="Enter Expense Type Name" value="<?php echo $expensetypename;?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 bg-light text-right">
                                <a href="expense_type.php" class="btn btn-danger btn-lg float-right">Cancel</a>
                                <button class="btn btn-success btn-lg float-right" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('partials/footer.php') ?>