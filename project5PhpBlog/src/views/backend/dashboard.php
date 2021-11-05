<?php session_start(); 
use App\Models\Session;?>
<?php ob_start(); ?>

<?php if (!empty(Session::get('success_message'))) { ?>
    <div class="success-message" style="margin-bottom: 15px;font-size: 20px;color: green;"><?= filter_var(Session::get('success_message'), FILTER_SANITIZE_STRING) ?></div>
<?php
    Session::del('success_message');
}
?>
<!--statistic-->
<div class=" d-flex justify-content-between card-group border-light mb-3">
    <div class="card">
        <h5 class="card-body card-title fs-6"><i class="fas fa-mail-bulk"></i> <?= filter_var($postManager->counter($keyword), FILTER_SANITIZE_STRING); ?> Publications</h5>
    </div>
    <div class="card">
        <h5 class="card-body card-title fs-6"><i class="far fa-user"></i> <?= filter_var($userManager->counter(), FILTER_SANITIZE_STRING); ?> Users</h5>
    </div>
    <div class="card">
        <h5 class="card-body card-title fs-6"><i class="far fa-comments"></i> <?= filter_var($commentManager->counter(), FILTER_SANITIZE_STRING); ?> Comments</h5>
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
                    <th scope="row"><?=filter_var($post->getId(), FILTER_SANITIZE_STRING); ?></th>
                    <td class="tabled"><?=filter_var($post->getTitle(), FILTER_SANITIZE_STRING); ?></td>
                    <td class="tabled"><?=substr($post->getContent(), 0, 50) ?></td>
                    <td class="tabled"><?=filter_var($post->getCategory(), FILTER_SANITIZE_STRING)  ?></td>
                    <td class="tabled"><?=filter_var($post->getCreationDate(), FILTER_SANITIZE_STRING) ?></td>
                    <td>
                        <a href="index.php?action=post&id=<?=filter_var($post->getId(), FILTER_SANITIZE_STRING); ?>" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-sm button2 m-1">View</button></a>
                        <a href="index.php?action=editPage&id=<?=filter_var($post->getId(), FILTER_SANITIZE_STRING); ?>"><button type="button" class="btn btn-sm button2 m-1">Edit</button></a>
                        <form method="post" action="index.php?action=deletePost&id=<?=filter_var($post->getId(), FILTER_SANITIZE_STRING); ?>" style="display:inline-block" onclick="return confirm('Are you sure to delete?')"><input name="id" type="hidden" value="<?=filter_var($post->getId(), FILTER_SANITIZE_STRING); ?>"><button type="submit" class="btn  btn-sm btn-danger m-1">Delete</button></form>
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
            <li class="page-item"><a class="page-link" name="page" href="index.php?action=dashboard&amp;page=<?=filter_var($page, FILTER_SANITIZE_STRING)?>"><?=filter_var($page, FILTER_SANITIZE_STRING)?></a></li>
        <?php } ?>
    </ul>
</nav>

<!--comments-->
<h2 class="mb-3 m-1  admin-title" id="comments">Comments</h2>
<?php foreach ($comments as $comment) { ?>
    <div class="card m-1 mb-3">
        <p class="card-text m-1"><?=filter_var($comment->getComment(), FILTER_SANITIZE_STRING) ?></p>
        <div class="card-footer d-flex justify-content-between">
            <span class="fs-6 m-1"><i class="fas fa-user"> </i><?=filter_var($comment->getAuthor(), FILTER_SANITIZE_STRING) ?> (User ID:<?=filter_var($comment->getUserId(), FILTER_SANITIZE_STRING) ?>)</span>
            <span class="fs-6 m-1"><?=filter_var($comment->getCommentCreateDate(), FILTER_SANITIZE_STRING) ?></span>
            <span class="fs-6 m-1"><?php if (empty($comment->getValid())) : ?>pending<?php elseif (!empty($comment->getValid())) : ?>validated<?php endif; ?></span>
            <span class="fs-6 m-1 ">
                <a method="post" href="index.php?action=post&id=<?=filter_var($comment->getPostId(), FILTER_SANITIZE_STRING); ?>" style="display:inline-block" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-sm button2">View</button></a>
                <form method="post" action="index.php?action=validComment&id=<?= filter_var($comment->getId(), FILTER_SANITIZE_STRING); ?>" style="display:inline-block"><button type="submit" class="btn btn-sm button2">Valid</button></form>
                <form method="post" action="index.php?action=deleteComment&id=<?= filter_var($comment->getId(), FILTER_SANITIZE_STRING); ?>" style="display:inline-block" onclick="return confirm('Are you sure to delete?')"><button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </span></form>
        </div>
    </div>
<?php } ?>
<!--pagination-->
<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php for ($commentPage = 1; $commentPage <= $number_comment_pages; $commentPage++) { ?>
            <li class="page-item"><a class="page-link" name="commentPage" href="index.php?action=dashboard&amp;commentPage=<?=filter_var($commentPage, FILTER_SANITIZE_STRING) ?>#comments"><?=filter_var($commentPage, FILTER_SANITIZE_STRING) ?></a></li>
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
                    <th scope="row"><?= filter_var($user->getId(), FILTER_SANITIZE_STRING) ?></th>
                    <td><?php if ($user->getUserTypeId() == 1) {
                            print_r ("administrator");
                        } else {
                            print_r ("normal user");
                        } ?></td>
                    <td><?= filter_var($user->getUserName(), FILTER_SANITIZE_STRING) ?></td>
                    <td><?= filter_var($user->getEmail(), FILTER_SANITIZE_STRING); ?></td>
                    <td><?= filter_var($user->getDateCreate(), FILTER_SANITIZE_STRING); ?></td>
                    <td>
                        <form method="post" action="index.php?action=editUserRole&id=<?= filter_var($user->getId(), FILTER_SANITIZE_STRING) ?>" style="display:inline-block"><button type="submit" class="btn btn-sm button2 m-1">Edit role</button></form>
                        <form method="post" action="index.php?action=deleteUser&id=<?= filter_var($user->getId(), FILTER_SANITIZE_STRING) ?>" style="display:inline-block" onclick="return confirm('Are you sure to delete?')"><button type="submit" class="btn btn-sm btn-danger m-1">Delete</button></form>
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
            <li class="page-item"><a class="page-link" name="userPage" href="index.php?action=dashboard&amp;userPage=<?=filter_var($userPage, FILTER_SANITIZE_STRING)?>#users"><?=filter_var($userPage, FILTER_SANITIZE_STRING)?></a></li>
        <?php } ?>
    </ul>
</nav>

<?php $content = ob_get_clean(); ?>

<?php require('src/views/backend/_backendLayout.php'); ?>