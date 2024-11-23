<?php
include_once 'C:\xampp\htdocs\Back-End\estrada2\admin\vendor\functions.php';

?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="<?= url("index.php")  ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Sources" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Admins</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Sources" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= url('app/admins/add.php')  ?>">
                        <i class="bi bi-circle"></i><span>Add</span>
                    </a>
                </li>
                <li>
                    <a href="<?= url('app/admins/list.php')  ?>">
                        <i class="bi bi-circle"></i><span>List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#category" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Developers</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="category" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= url('app/developers/add.php')  ?>">
                        <i class="bi bi-circle"></i><span>Add </span>
                    </a>
                </li>
                <li>
                    <a href="<?= url('app/developers/list.php')  ?>">
                        <i class="bi bi-circle"></i><span>List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#property" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Properties</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="property" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= url('app/properties/add.php')  ?>">
                        <i class="bi bi-circle"></i><span>Add </span>
                    </a>
                </li>
                <li>
                    <a href="<?= url('app/properties/list.php')  ?>">
                        <i class="bi bi-circle"></i><span>List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#agent" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>ِAgents</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="agent" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= url('app/agents/add.php')  ?>">
                        <i class="bi bi-circle"></i><span>Add </span>
                    </a>
                </li>
                <li>
                    <a href="<?= url('app/agents/list.php')  ?>">
                        <i class="bi bi-circle"></i><span>List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= url('app/orders/add.php')  ?>">
                        <i class="bi bi-circle"></i><span>Add</span>
                    </a>
                </li>
                <li>
                    <a href="<?= url("app/orders/list.php") ?>">
                        <i class="bi bi-circle"></i><span>List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->


        <li class="nav-heading">Properties</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= url("users-profile.php") ?>">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= url("pages-contact.php") ?>">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= url("pages-register.php") ?>">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= url("pages-login.php") ?>">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= url("pages-error-404.php") ?>">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li><!-- End Error 404 Page Nav -->


    </ul>

</aside><!-- End Sidebar-->