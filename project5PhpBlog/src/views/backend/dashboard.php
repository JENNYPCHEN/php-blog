<?php session_start(); ?>
<?php ob_start(); ?>
<?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
    <div class="success-message" style="margin-bottom: 15px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
<?php
    unset($_SESSION['success_message']);
}
?>

<!--Post-->
<h2 class="mb-3 m-1 admin-title" id="posts">Posts <a href="index.php?action=newPostPage"><button type="submit" class="btn btn-sm button2">New Post</button></a></h2>

<div class="table-responsive table-bordered m-1 mb-3">
    <table class="table table-hover blogtext  " id="posts"">
    <thead>
      <tr>
        <th scope=" col">#ID</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Category</th>
        <th scope="col">Created Date</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post) { ?>
                <tr>
                    <th scope="row"><?php echo $post->getId(); ?></th>
                    <td class="tabled"><?php echo $post->getTitle(); ?></td>
                    <td class="tabled"><?php echo $post->getContent() ?></td>
                    <td class="tabled"><?= $post->getCategory() ?></td>
                    <td class="tabled"><?php echo $post->getCreation_date() ?></td>
                    <td>
                        <a href="index.php?action=post&id=<?= $post->getId(); ?>" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-sm button2 m-1">View</button></a>
                        <a href="index.php?action=editPage&id=<?= $post->getId(); ?>"><button type="button" class="btn btn-sm button2 m-1">Edit</button></a>
                        <form method="post" action="index.php?action=deletePost&id=<?= $post->getId(); ?>" style="display:inline-block" onclick="return confirm('Are you sure to delete?')"><input name="id" type="hidden" value="<?= $post->getId(); ?>"><button type="submit" class="btn  btn-sm btn-danger m-1">Delete</button></form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!--comments-->
<h2 class="mb-3 m-1  admin-title" id="comments">Comments</h2>
<?php foreach ($comments as $comment) { ?>
    <div class="card m-1 mb-3">
        <p class="card-text m-1"><?= htmlspecialchars($comment->getComment()) ?></p>
        <div class="card-footer d-flex justify-content-between">
            <span class="fs-6 m-1"><i class="fas fa-user"> </i><?= htmlspecialchars($comment->getAuthor()) ?></span>
            <span class="fs-6 m-1"><?= $comment->getComment_create_date() ?></span>
            <span class="fs-6 m-1"><?php if ($comment->getValid = '') : ?>pending<?php else : ?>valided<?php endif; ?></span>
            <span class="fs-6 m-1 ">
                <button type="button" class="btn btn-sm button2">Valid</button>
                <button type="button" class="btn btn-sm btn-danger">Delete</button></span>

        </div>
    </div>
<?php } ?>
<!--users-->
<h2 class="mb-3 m-1 admin-title" id="users">Users</h2>
<div class="table-responsive table-bordered m-1 mb-3">
    <table class="table table-hover blogtext  " id="posts"">
    <tread>
      <tr>
        <th scope=" col">#ID</th>
        <th scope="col">Role</th>
        <th scope="col">Username</th>
        <th scope="col">Email address</th>
        <th scope="col">Created Date</th>
        <th scope="col">Action</th>
        </tr>
        </tread>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Madffddffdrk</td>
                <td>Madffddffdrk</td>
                <td>Otfdfdfdfdfdfdfdfdfdfdfdfdfdfddfto</td>
                <td>01/01/2121</td>
                <td>
                    <button type="button" class="btn btn-sm button2 m-1" href="readpost.php">View</button>
                    <button type="button" class="btn btn-sm button2 m-1" href="updatepost.php">Edit</button>
                    <button type="button" class="btn btn-sm btn-danger m-1">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>


</div>

<?php $content = ob_get_clean(); ?>

<?php require('src/views/backend/_backendLayout.php'); ?>