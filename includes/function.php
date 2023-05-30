<?php

    function connectToDB() {
        $database = new PDO(
            'mysql:host=devkinsta_db;dbname=simple_cms', 
            'root', 
            'r9wz9RSYYaTbjS7v'
        );
        return $database;
    }

    // function to check if the user is an admin
    function isAdmin() {
        if ( isset( $_SESSION['user']['role'] ) && $_SESSION['user']['role'] === 'admin' ) {
            return true;
        } else {
            return false;
        }
    }

    function isEditor() {
        if ( isset( $_SESSION['user']['role'] ) && $_SESSION['user']['role'] === 'editor' ) {
            return true;
        } else {
            return false;
        }
    }

    function isAdminOrEditor(){
        return isAdmin() || isEditor() ? true : false;
    }