<?php session_start(); ?>
<?php ob_start(); ?>

<?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
    <div class="success-message" style="margin-bottom: 15px;font-size: 20px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
<?php
    unset($_SESSION['success_message']);
}
?>
<!--statistic-->
<div class=" d-flex justify-content-between card-group border-light mb-3">
    <div class="card">
        <h5 class="card-body card-title fs-6"><i class="fas fa-mail-bulk"></i> <?= $postManager->counter($keyword); ?> Publications</h5>
    </div>
    <div class="card">
        <h5 class="card-body card-title fs-6"><i class="far fa-user"></i> <?= $userManager->counter(); ?> Users</h5>
    </div>
    <div class="card">
        <h5 class="card-body card-title fs-6"><i class="far fa-comments"></i> <?= $commentManager->counter(); ?> Comments</h5>
    </div>
</div>
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
                    <td class="tabled"><?php echo substr($post->getContent(), 0, 50) ?></td>
                    <td class="tabled"><?= $post->getCategory() ?></td>
                    <td class="tabled"><?php echo $post->getCreationDate() ?></td>
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
<!--pagination-->
<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php for ($page = 1; $page <= $number_of_pages; $page++) { ?>
            <li class="page-item"><a class="page-link" name="page" href="index.php?action=dashboard&amp;page=<?= $page ?>"><?= $page ?></a></li>
        <?php } ?>
    </ul>
</nav>

<!--comments-->
<h2 class="mb-3 m-1  admin-title" id="comments">Comments</h2>
<?php foreach ($comments as $comment) { ?>
    <div class="card m-1 mb-3">
        <p class="card-text m-1"><?= htmlspecialchars($comment->getComment()) ?></p>
        <div class="card-footer d-flex justify-content-between">
            <span class="fs-6 m-1"><i class="fas fa-user"> </i><?= htmlspecialchars($comment->getAuthor()) ?> (User ID:<?= $comment->getUserId() ?>)</span>
            <span class="fs-6 m-1"><?= $comment->getCommentCreateDate() ?></span>
            <span class="fs-6 m-1"><?php if (empty($comment->getValid())) : ?>pending<?php elseif (!empty($comment->getValid())) : ?>validated<?php endif; ?></span>
            <span class="fs-6 m-1 ">
                <a method="post" href="index.php?action=post&id=<?= $comment->getPostId(); ?>" style="display:inline-block" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-sm button2">View</button></a>
                <form method="post" action="index.php?action=validComment&id=<?= $comment->getId(); ?>" style="display:inline-block"><button type="submit" class="btn btn-sm button2">Valid</button></form>
                <form method="post" action="index.php?action=deleteComment&id=<?= $comment->getId(); ?>" style="display:inline-block" onclick="return confirm('Are you sure to delete?')"><button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </span></form>
        </div>
    </div>
<?php } ?>
<!--pagination-->
<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php for ($commentPage = 1; $commentPage <= $number_comment_pages; $commentPage++) { ?>
            <li class="page-item"><a class="page-link" name="commentPage" href="index.php?action=dashboard&amp;commentPage=<?= $commentPage ?>#comments"><?= $commentPage ?></a></li>
        <?php } ?>
    </ul>
</nav>
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
        <?php foreach ($users as $user) { ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $user->getId() ?></th>
                    <td><?php if ($user->getUserTypeId() == 1) {
                            echo "administrator";
                        } else {
                            echo "normal user";
                        } ?></td>
                    <td><?= $user->getUserName() ?></td>
                    <td><?= $user->getEmail(); ?></td>
                    <td><?= $user->getDateCreate(); ?></td>
                    <td>
                        <form method="post" action="index.php?action=editUserRole&id=<?= $user->getId(); ?>" style="display:inline-block"><button type="submit" class="btn btn-sm button2 m-1">Edit role</button></form>
                        <form method="post" action="index.php?action=deleteUser&id=<?= $user->getId(); ?>" style="display:inline-block" onclick="return confirm('Are you sure to delete?')"><button type="submit" class="btn btn-sm btn-danger m-1">Delete</button></form>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>
<!--pagination-->
<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php for ($userPage=1; $userPage <= $number_user_pages; $userPage++) { ?>
            <li class="page-item"><a class="page-link" name="userPage" href="index.php?action=dashboard&amp;userPage=<?= $userPage ?>#users"><?= $userPage ?></a></li>
        <?php } ?>
    </ul>
</nav>

<?php $content = ob_get_clean(); ?>

<?php require('src/views/backend/_backendLayout.php'); ?>