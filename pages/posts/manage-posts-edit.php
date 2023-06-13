<?php

  // make sure the user is logged in
  if ( !Auth::isUserLoggedIn() ) {
    header("Location: /");
    exit;
  }

  $post = Post::getPostByID();
   
  require "parts/header.php";

?>
    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Edit Post</h1>
      </div>
      <div class="card mb-2 p-4">
        <?php require "parts/error_box.php";?>
        <form method="POST" action="posts/edit">
          <div class="mb-3">
            <label for="post-title" class="form-label">Title</label>
            <input
              type="text"
              class="form-control"
              id="post-title"
              value="<?= $post['title'];?>"
              name="title"
            />
          </div>
          <div class="mb-3">
            <label for="post-content" class="form-label">Content</label>
            <textarea class="form-control" id="post-content" rows="10" name="content"><?=$post['content'];?></textarea>
          </div>
          <div class="mb-3">
            <label for="post-content" class="form-label">Status</label>
            <select class="form-control" id="post-status" name="status">
              <option value="pending" <?= $post['status'] === 'pending' ? 'selected' : ''?>>Pending</option>
              <option value="publish" <?= $post['status'] === 'publish' ? 'selected' : ''?>>Publish</option>
            </select>
          </div>
          <div class="mb-3">
            Last modified by: 
              <?php 

                echo $post["title"];
              ?> 
          </div>
          <div class="text-end">
          <input type="hidden" name="id" value="<?= $post['id']; ?>" />
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/manage-posts" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Posts</a
        >
      </div>
    </div>
<?php

require "parts/footer.php";