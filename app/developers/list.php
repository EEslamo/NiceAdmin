<?php
include_once '../../vendor/functions.php';
auth();
include_once '../../shared/head.php';
include_once '../../shared/header.php';
include_once '../../shared/aside.php';
include_once '../../vendor/configDatabase.php';

$counter = 0;
$select_statement = "SELECT * FROM `developers`";
$data = mysqli_query($conn, $select_statement);

?>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Developers List</h5>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>addresse</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                                <tr>
                                    <td><?= ++$counter ?></td>
                                    <td><?= $item['name']; ?></td>
                                    <td><?= $item['addresse']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

<?php
include_once "../../shared/footer.php";
include_once '../../shared/script.php';


?>