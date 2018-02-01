<?php

if(isset($_GET['p_id'])) {
  
  $the_post_id = $_GET['p_id'];

}



$query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
$select_posts_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts_by_id)) {

  $post_id = $row['post_id'];
  $post_author = $row['post_author'];
  $post_title = $row['post_title'];                
  $post_category_id = $row['post_category_id'];
  $post_status = $row['post_status']; 
  $post_image = $row['post_image'];
  $post_content = $row['post_content']; 
  $post_tags = $row['post_tags'];                  
  $post_comment_count = $row['post_comment_count'];
  $post_date = $row['post_date'];

}

?>

<form action = '' method='post' enctype="multipart/form-data">

<div class="form-group">
  <label for="title">Title</label>
  <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
</div>

<div class="form-group">
  <label for="post-category-id">Post Category Id</label>
  <input value="<?php echo $post_category_id; ?>" type="text" class="form-control" name="post-category-id">
</div>

<div class="form-group">
  <label for="post-author">Post Author</label>
  <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post-author">
</div>

<div class="form-group">
  <label for="post-status">Post Status</label>
  <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post-status">
</div>

<div class="form-group">
  <label for="post-image">Post Image</label>
  <input type="file" class="form-control" name="image">
</div>

<div class="form-group">
  <label for="post-tags">Post Tags</label>
  <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post-tags">
</div>

<div class="form-group">
  <label for="post-content">Post Content</label>
  <textarea class="form-control" name="post-content" id="" cols="30" rows="10">
    <?php echo $post_content; ?>
  </textarea>
</div>

<div class="form-group">
  <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
</div>

</form>