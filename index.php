<?php

    // enable session in /
    session_start();

    require "includes/function.php";

    // parse_url will remove all the query string starting from the ?
    $path = parse_url( $_SERVER["REQUEST_URI"], PHP_URL_PATH );
    // remove / using trim()
    $path = trim( $path, '/' );

    switch ($path) {
        case 'auth/login':
            require 'includes/auth/login.php';
            break;
        case 'auth/signup':
            require 'includes/auth/signup.php';
            break;
        case 'manage-posts':
            require "pages/posts/manage-posts.php";
            break;
        case 'manage-posts-add':
            require "pages/posts/manage-posts-add.php";
            break;
        case 'manage-posts-edit':
            require "pages/posts/manage-posts-edit.php";
            break;
        case 'manage-users':
            require "pages/users/manage-users.php";
            break;
        case 'manage-users-add':
            require "pages/users/manage-users-add.php";
            break;
        case 'manage-users-edit':
            require "pages/users/manage-users-edit.php";
            break;
        case 'manage-users-changepwd':
            require "pages/users/manage-users-changepwd.php";
            break;
        case 'login':
            require "pages/login.php";
            break;
        case 'signup':
            require "pages/signup.php";
            break;
        case 'logout':
            require "pages/logout.php";
            break;
        case 'post':
            require "pages/post.php";
            break;
        case 'dashboard':
            require "pages/dashboard.php";
            break;
        default:
            require "pages/home.php";
            break;
    }