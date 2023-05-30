<?php

    // load database
    $database = connectToDB();

    // get all the POST data
    $title = $_POST["title"];
    $content = $_POST["content"];

    if ( empty( $title ) || empty($content)) {
        $error = 'All fields are required';
    }

    if( isset ($error)){
        $_SESSION['error'] = $error;
        header("Location: /manage-posts-add");    
    } else {
        // if no error found, process to account creation
        $sql = "INSERT INTO posts (`title`, `content`, `user` )
        VALUES(:title, :content, :user)";
        $query = $database->prepare( $sql );
        $query->execute([
            'title' => $title,
            'content' => $content,
            'user' => $_SESSION["user"]["id"]

        ]);

        // redirect the user back to manage-users page
        $_SESSION["success"] = "New post has been created.";
        header("Location: /manage-posts");
        exit;

    }