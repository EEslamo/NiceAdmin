<?php
include_once '../../vendor/functions.php';
auth();
include_once '../../shared/head.php';
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
include_once '../../vendor/configDatabase.php';



$Add_Message = null;

if (isset($_POST['submit'])) {
    $name = $_POST['adminname'];
    $email = $_POST['adminemail'];
    $password = $_POST['adminpassword'];
    $hash_password = sha1($password);
    try {
        $imagename = time() . rand(0, 255) . rand(0, 255) . $_FILES['adminimage']['name'];
        $tmpname = $_FILES['adminimage']['tmp_name'];
        $location = "./upload/" . $imagename;
        move_uploaded_file($tmpname, $location);
        $Insert_Statement = "INSERT INTO `admins` VALUES (null , '$name' , '$email' , '$hash_password' , '$imagename' , DEFAULT)";
        $i = mysqli_query($conn, $Insert_Statement);
        redirect("admins/add.php");
        getSuccessMessage($i, "Admin has been added");
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
            <h5 class="card-title">Create New Admin</h5>

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
                    <input type="text" name="adminname" class="form-control" id="InputValidation" placeholder="Admin Name" Required>
                    <span style="color:red; margin-left:5px; display:none;" id="SpanValidation">This Field Is Required</span>
                </div>
                <div class="col-md-6">
                    <input type="email" name="adminemail" class="form-control" id="InputValidation" placeholder="Admin Email" Required>
                    <span style="color:red; margin-left:5px; display:none;" id="SpanValidation">This Field Is Required</span>

                </div>
                <div class="col-md-6">
                    <input type="password" name="adminpassword" class="form-control" id="InputValidation" placeholder="Password" Required>
                    <span style="color:red; margin-left:5px; display:none;" id="SpanValidation">This Field Is Required</span>

                </div>
                <div class="col-md-6">
                    <input type="file" name="adminimage" class="form-control" id="InputValidation" placeholder="Agent image" Required>
                    <span style="color:red; margin-left:5px; display:none;" id="SpanValidation">This Field Is Required</span>

                </div>
                <div class="text-center">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
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

    let inputs = document.querySelectorAll("#InputValidation");
    let spans = document.querySelectorAll("#SpanValidation");
    let submit=document.querySelector("#submit");

    inputs.forEach((input, index) => {
        input.addEventListener("keyup", function() {
            if (input.value === "") {
                spans[index].style.display = "block";
            } else {
                spans[index].style.display = "none";
            }
        });
    });


</script>