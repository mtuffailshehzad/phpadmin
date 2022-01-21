<?php
include('partials/header.php');
if(isset($_REQUEST['id'])) { $id = $_REQUEST['id']; }else{ $id = ''; }
$expensetypename =   '';
if(isset($_POST['submit']))
{
    if(isset($_POST['expensetypename'])){$expensetypename = $_POST['expensetypename'];}else{$expensetypename='';}
    if($expensetypename == '')
    {
        $messages='please enter the Expense name';
    }
    else {
        $query  =   mysqli_query($conn, "UPDATE tblexpensetype SET expensetypename='".$expensetypename."' WHERE pkexpensetypeid=".$id);
        echo jsredirecturl('enpense_type.php');
        exit;
    }
}else
{
    if($id != '')
    {
        $getquery  =   mysqli_query($conn, "SELECT * FROM tblexpensetype WHERE pkexpensetypeid=".$id);
        if(mysqli_num_rows($getquery) > 0)
        {
            $tblexpensetype   =   mysqli_fetch_assoc($getquery);
            $expensetypename =   $tblexpensetype['expensetypename'];
        }
    }
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Edit Expense Type</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="expense_type.php">Expense Type</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Edit Expense Type</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
<form class="m-t" role="form" method="post" action="">
                <div class="form-group">
                    <input type="text" name="expensetypename" id="expensetypename" class="form-control" placeholder="Expense Type Name" value="<?php echo $expensetypename; ?>" required>
                </div>
                <div>
                     <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Edit</button>
                </div>

<?php include('partials/footer.php') ?>