<?php

    $database = connectToDB();

    $sql = "SELECT * FROM users";
    $query = $database->prepare($sql);
    $query->execute();

    $users = $query->fetchAll();

        require 'parts/header.php';
    ?>
    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage Users</h1>
        <div class="text-end">
          <a href="/manage-users-add" class="btn btn-primary btn-sm"
            >Add New User</a
          >
        </div>
      </div>
      <div class="card mb-2 p-4">
        <?php require "parts/message_success.php"; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user) : ?>
            <tr class="<?php
                if ( 
                  isset( $_SESSION['new_user_email'] ) && 
                  $_SESSION['new_user_email'] == $user['email'] ) {
                    echo "table-success";
                    unset( $_SESSION['new_user_email'] );
                }
              ?>">
              <th scope="row"><?= $user['id']; ?></th>
              <td><?= $user['name']; ?></td>
              <td><?= $user['email']; ?></td>
              <td>              
                <?php
                  switch( $user['role'] ) {
                    case 'admin':
                      echo '<span class="badge bg-primary">' . $user['role'] .'</span>';
                      break;
                    case 'editor':
                      echo '<span class="badge bg-info">' . $user['role'] .'</span>';
                      break;
                    case 'user':
                      echo '<span class="badge bg-success">' . $user['role'] .'</span>';
                      break;
                  }
                ?></td>
              <td class="text-end">
                <div class="buttons">
                  <a
                    href="/manage-users-edit"
                    class="btn btn-success btn-sm me-2"
                    ><i class="bi bi-pencil"></i
                  ></a>
                  <a
                    href="/manage-users-changepwd"
                    class="btn btn-warning btn-sm me-2"
                    ><i class="bi bi-key"></i
                  ></a>
                  <a href="#" class="btn btn-danger btn-sm"
                    ><i class="bi bi-trash"></i
                  ></a>
                </div>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="text-center">
        <a href="/dashboard" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Dashboard</a
        >
      </div>
    </div>

    <?php

require 'parts/footer.php';
