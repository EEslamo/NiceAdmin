<?php
include_once '../../vendor/functions.php';
include_once '../../shared/head.php';
auth();
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
include_once '../../vendor/configDatabase.php';



$Add_Message = null;

if (isset($_POST['submit'])) {
    $name = $_POST['agentname'];
    $phone = $_POST['agentphone'];
    try {
        $imagename = time() . rand(0, 255) . rand(0, 255) . $_FILES['agentimage']['name'];
        $tmpname = $_FILES['agentimage']['tmp_name'];
        $location = "./upload/$imagename";
        move_uploaded_file($tmpname, $location);
        $Insert_Statement = "INSERT INTO `agents` VALUES (null , '$name' , '$imagename' , '$phone')";
        $i = mysqli_query($conn, $Insert_Statement);
        redirect("agents/add.php");
        getSuccessMessage($i, "A new agent has been added");
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
            <h5 class="card-title">Create New Agent</h5>

            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="Added_Message">
                    <?= $_SESSION['success_message']; ?>
                    <form action="<?php url("vendor/functions.php"); ?>" method="POST">
                        <button type="submit" name="ClearSession" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </form>
                </div>
            <?php endif; ?>
            <!-- No Labels Form -->
            <form class="row g-3" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                    <input type="text" name="agentname" class="form-control" placeholder="Agent Name">
                </div>
                <div class="col-md-6">
                    <input type="file" name="agentimage" class="form-control" placeholder="Agent image">
                </div>
                <div class="col-md-6">
                    <input type="text" name="agentphone" class="form-control" placeholder="Agent Phone">
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