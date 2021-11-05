<?php session_start(); ?>
<?php $title = 'ChingYi P.C | Personal Blog'; ?>
<?php ob_start(); ?>
<!--banner-->
<div class="pb-4 "><img class="img-fluid" src="public/img/sea.png" alt="banner" /></div>

<!--blog-->
<section class="pb-5">
    <div class="container pb-4">
        <div class="row">
            <!--blogposts-->
            <div class="col-lg-9 mb-5 mb-lg-0 mx-auto">
                <div class="row mb-5">
                    <div class="col-lg-12 text-center">
                        <ul class="list-inline">
                            <li class="list-inline-item mr-2 category font-weight-normal"> <?= filter_var($post->getCategory(), FILTER_SANITIZE_STRING); ?> </li>
                            <li class="list-inline-item mx-2 text-uppercase meta font-weight-normal"><?= filter_var($post->getUserName(), FILTER_SANITIZE_STRING); ?></li>
                            <li class="list-inline-item mx-2 text-uppercase meta font-weight-normal"><?= filter_var($post->getCreationDate(), FILTER_SANITIZE_STRING); ?></li>
                        </ul>
                    </div>
                    <div class="col-lg-12 text-center">
                        <h2 class="h3 mb-4"> <a class="d-block blogtitle" href=""><?= filter_var($post->getTitle(), FILTER_SANITIZE_STRING); ?></a></h2>
                        <p class="blogtext"><?= filter_var($post->getChapo(), FILTER_SANITIZE_STRING); ?></p>
                    </div>
                    <div class="col-lg-12 text-center"><a class="d-block post-trending mb-4" href=""><img class="img-fluid w-100" src="<?= filter_var($post->getImage(), FILTER_SANITIZE_STRING); ?>" alt="" /></a>
                    </div>
                    <div class="col-lg-12">
                        <p class="blogtext"><?= $post->getContent(); ?></p>
                    </div>
                </div>
                <?php if (!empty($_SESSION['username'])) : ?>
                    <!-- Leave comment-->
                    <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                        <div class="success-message" style="margin-bottom: 15px;font-size: 20px;color: green;"><?= filter_var($_SESSION['success_message'], FILTER_SANITIZE_STRING); ?></div>
                    <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>
                    <form method="post" action="index.php?action=leavecomment&amp;id=<?= filter_var($post->getId(), FILTER_SANITIZE_STRING); ?>">
                        <h3 class="cardtitle">Leave a comment</h3>
                        <div class="row mb-3">
                            <div class="col-lg-12 mb-3">
                                <input class="form-control" type="text" name="author" placeholder="Full Name e.g. Jason Doe" value="<?= filter_var($_SESSION['username'], FILTER_SANITIZE_STRING); ?>" required>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <textarea class="form-control" name="comment" rows="5" placeholder="Leave your comment" value="<?= filter_var($comment, FILTER_SANITIZE_STRING) ?>" required></textarea>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <button class="btn button" type="submit">Submit your comment</button>
                            </div>
                        </div>
                    </form>
                <?php else : ?>
                    <p class="admin-title">Please login to leave a comment</p>
                <?php endif; ?>
                <!-- Post comments-->
                <h3 class="h4 mb-4 cardtitle">Comments</h3>

                <?php foreach ($comments as $comment) { ?>

                    <p class="small mb-0 date"><?= filter_var($comment->getCommentCreateDate(), FILTER_SANITIZE_STRING); ?></p>
                    <h5 class="name"><?= filter_var($comment->getAuthor(), FILTER_SANITIZE_STRING); ?></h5>
                    <p class="blogtext text-small mb-2"><?= filter_var($comment->getComment(), FILTER_SANITIZE_STRING); ?></p>
                <?php } ?>

            </div>
            <?php include_once 'src/views/frontend/_about.php'; ?>
        </div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('src/views/frontend/_frontendLayout.php'); ?>