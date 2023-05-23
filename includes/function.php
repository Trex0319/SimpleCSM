<?php

    function connectToDB() {
        $database = new PDO(
            'mysql:host=devkinsta_db;dbname=simple_cms', 
            'root', 
            'r9wz9RSYYaTbjS7v'
        );
        return $database;
    }