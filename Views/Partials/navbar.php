<?php
use Core\Session;

$isLoggedIn = Session::get('user') !== null; // Check if user is logged in
$user = Session::get('user'); // Get user session data
require '../Views/Partials/header.php'; 
?>
<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg py-0">
            <div class="container-fluid">
                <div class="logo d-flex align-items-center justify-content-between">
                    <a class="navbar-brand py-0 me-0" href="#"><img src="../assets/images/logo.svg" alt=""></a>
                    <button class="navbar-toggler d-block d-lg-none border-0 p-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link  <?= is_URI('/') ? 'bg-gray-900 text-primary' : 'text-gray-300' ?>" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= is_URI('/posts') ? 'bg-gray-900 text-primary' : 'text-gray-300' ?>" href="/posts">Blog</a>
                        </li>
                    </ul>
                    <div class="login d-lg-flex align-items-center">
                        <?php if ($isLoggedIn): ?>
                            <div class="dropdown d-flex align-items-center"  style="cursor:pointer;">
                                
                                <img src="../<?= htmlspecialchars($user['image']) ?>" alt="User Image" class="rounded-circle mx-3" width="50" height="50" data-toggle="dropdown">
                                <p data-toggle="dropdown"  class="mb-0 mr-3 d-none d-lg-block"><?= htmlspecialchars($user['userName']) ?></p>
                                <i class="fas fa-caret-down" data-toggle="dropdown"></i>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item <?= is_URI('/profile') ? 'active' : '' ?>" href="/profile">
                                        <i class="fas fa-user"></i> Profile
                                    </a>
                                    <form method="POST" action="/logout" style="display: inline;">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="dropdown-item" style="border: none; background: none;">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </div>

                            </div>
                        <?php else: ?>
                            <a class="btn btn-primary bg-transparent sign-in <?= is_URI('/login') ? 'bg-gray-900 text-white' : 'text-gray-300' ?>" href="/login">Sign in</a>
                            <a class="btn btn-primary get-started <?= is_URI('/register') ? 'bg-gray-900 text-white' : 'text-gray-300' ?>" href="/register">Get Started</a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </nav>
    </div>
</header>

<section class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header justify-content-between">
        <img src="../assets/images/offcanvas-logo.svg" alt="">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <img src="../assets/images/icons/close-svgrepo-com.svg" alt="">
        </button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav mx-auto mb-4 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link fs-5" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-5" href="#">Exchange</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-5" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fs-5" href="#">FAQ</a>
            </li>
        </ul>
        <div class="login d-lg-flex align-items-center">
            <?php if ($isLoggedIn): ?>
                <img src="../<?= htmlspecialchars($user['image']) ?>" alt="User Image" class="rounded-circle" width="30" height="30" style="cursor:pointer;">

                <a class="btn profile <?= is_URI('/profile') ? 'bg-gray-900 text-primary' : 'text-gray-300' ?>" href="/profile">
                    <i class="fas fa-user"></i> Profile
                </a>
            <?php else: ?>
                <a class="btn btn-primary sign-in fs-5 d-block bg-white text-black mb-3" href="/login">Sign in</a>
                <a class="btn btn-primary get-started fs-5 d-block bg-white text-black" href="/register">Get Started</a>
            <?php endif; ?>
        </div>
    </div>
</section>
