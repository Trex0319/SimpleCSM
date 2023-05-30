<?php

    // load the database
    $database = connectToDB();

    // get all the $_POST data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    if(empty($title) || empty($content) || empty($status)){
        $error = "Make sure all the fields are filled.";
    }
    
    // if error found, set error message & redirect back to the manage-users-edit page with id in the url
    if ( isset( $error ) ) {
        $_SESSION['error'] = $error;
        header("Location: /manage-posts-edit?id=$id");
        exit;
    }   
    // if no error found, update the user data based whatever in the $_POST data
    $sql = "UPDATE posts SET title = :title, content = :content, status = :status WHERE id = :id";
    $query = $database->prepare($sql);
    $query->execute([
        'title' => $title,
        'content' => $content,
        'status' => $status,
        'id' => $id
    ]);

    // set success message
    $_SESSION["success"] = "Post has been Updated.";

    // redirect
    header("Location: /manage-posts");
    exit;