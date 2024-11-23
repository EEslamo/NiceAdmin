<?php
include_once '../../vendor/functions.php';
include_once '../../shared/head.php';
auth();
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
include_once '../../vendor/configDatabase.php';



$Add_Message = null;
$validationerrors = [];


if (isset($_POST['submit'])) {
    $title = FilterValidation($_POST['title']);
    $desc = FilterValidation($_POST['desc']);
    $price = FilterValidation($_POST['price']);
    @$sales =  FilterValidation($_POST['agent']);
    $admin = $_SESSION['admin']['id'];
    @$dev = FilterValidation($_POST['developer']);

    if (StringValidation($title)) {
        $validationerrors[] = "You must enter valid title";
    }
    if (StringValidation($desc)) {
        $validationerrors[] = "You must enter valid description";
    }
    if (StringValidation($price)) {
        $validationerrors[] = "You must enter valid price";
    }
    if (StringValidation($sales)) {
        $validationerrors[] = "You must enter valid sales agent name";
    }
    if (StringValidation($dev)) {
        $validationerrors[] = "You must enter valid devloper name";
    }


    try {
        $imagehouse = url('app/properties/upload/');
        $imagename = rand(0, 255) . rand(0, 255) . $_FILES['propertyimage']['name'];
        $imagePath = $imagehouse . $imagename;
        $tmpname = $_FILES['propertyimage']['tmp_name'];
        $location = "./upload/" . $imagename;
        move_uploaded_file($tmpname, $location);

        $Insert_Statement = "INSERT INTO `properties` VALUES (null , '$title' , '$desc' , '$price' , '$imagename' , '$imagePath', $sales , $admin , $dev)";
        $i = mysqli_query($conn, $Insert_Statement);
        redirect("properties/add.php");
        getSuccessMessage($i, "A New Property has been added");
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

$select_admin = "SELECT * FROM `admins`";
$admins = mysqli_query($conn, $select_admin);

$select_agents = "SELECT * FROM `agents`";
$agents = mysqli_query($conn, $select_agents);

$select_developers = "SELECT * FROM `developers`";
$developers = mysqli_query($conn, $select_developers);






?>



<div class="container col-8 ">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Create New Property</h5>

            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="Added_Message">
                    <?= $_SESSION['success_message']; ?>
                    <form action="<?php url("vendor/functions.php"); ?>" method="POST">
                        <button type="submit" name="ClearSession" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </form>
                </div>
            <?php endif; ?>
            <?php if (!empty($validationerrors)): ?>
                <div class="alert alert-danger" id="validate">
                    <ul>
                        <?php foreach ($validationerrors as $errors): ?>
                            <li> <?= $errors ?> </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            <?php endif; ?>
            <!-- No Labels Form -->
            <form class="row g-3" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="col-md-6">
                    <input type="text" name="desc" class="form-control" placeholder="Description">
                </div>
                <div class="col-md-6">
                    <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
                <div class="col-md-6">
                    <input type="file" name="propertyimage" class="form-control" placeholder="Image">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <select name="agent" class="form-control">
                                    <option selected disabled>-- Sales Agent Name --</option>
                                    <?php foreach ($agents as $item): ?>
                                        <option value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <select name="admin" selected class="form-control">
                                    <option selected disabled>-- Admin Name --</option>
                                    <?php foreach ($admins as $item): ?>
                                        <option value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <select name="developer" class="form-control">
                                    <option selected disabled>-- Developer Name --</option>
                                    <?php foreach ($developers as $item): ?>
                                        <option value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
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
    
    setTimeout(function() {
        document.getElementById("validate").style.display = "none";
    }, 3000);


</script>