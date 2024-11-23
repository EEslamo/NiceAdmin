<?php
include_once '../../vendor/functions.php';
include_once '../../shared/head.php';
auth();
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
include_once '../../vendor/configDatabase.php';



$Add_Message = null;

if (isset($_POST['submit'])) {
    $name = FilterValidation($_POST['devname']);
    $addresse = $_POST['devaddresse'];
    try {
        $Insert_Statement = "INSERT INTO `developers` VALUES (null , '$name' , '$addresse')";
        $i = mysqli_query($conn, $Insert_Statement);
        redirect("developers/add.php");
        getSuccessMessage($i, "A new developer has been added");
    } catch (Exception $e) {
        $e->getMessage();
    }
}


// session_unset();

// if (isset($_SESSION['success_message'])) {
//     $Add_Message = $_SESSION['success_message'];
//     unset($_SESSION['success_message']); // Clear the session variable
// }

// print_r($_POST);


?>



<div class="container col-8 ">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Create New Developer</h5>

            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="Added_Message">
                    <?= $_SESSION['success_message']; ?>
                    <form action="<?php url("vendor/functions.php"); ?>" method="POST">
                        <button type="submit" name="ClearSession" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </form>
                </div>
            <?php endif; ?>
            <!-- No Labels Form -->
            <form class="row g-3" method="POST">
                <div class="col-md-12">
                    <input type="text" name="devname" class="form-control" placeholder="Developer Name">
                </div>
                <div class="col-md-6">
                    <input type="text" name="devaddresse" class="form-control" placeholder="Developer Addresse">
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- End No Labels Form -->

        </div>
    </div>

</div>


<?php
include_once "../../shared/footer.php";
include_once '../../shared/script.php';


?>



<script>
    setTimeout(function() {
        document.getElementById("Added_Message").style.display = "none";
    }, 3000);
</script>