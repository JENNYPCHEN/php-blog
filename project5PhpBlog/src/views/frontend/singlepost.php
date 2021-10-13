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
                            <li class="list-inline-item mr-2 category font-weight-normal"> <?php echo $post['category'] ?> </li>
                            <li class="list-inline-item mx-2 text-uppercase meta font-weight-normal"><?php echo $post['user_name'] ?></li>
                            <li class="list-inline-item mx-2 text-uppercase meta font-weight-normal"><?php echo $post['creation_date'] ?></li>
                        </ul>
                    </div>
                    <div class="col-lg-12 text-center">
                        <h2 class="h3 mb-4"> <a class="d-block blogtitle" href=""><?php echo $post['title'] ?></a></h2>
                        <p class="blogtext"><?php echo $post['chapo'] ?></p>
                    </div>
                    <div class="col-lg-12 text-center"><a class="d-block post-trending mb-4" href=""><img class="img-fluid w-100" src="public/img/blogimagesample.jpg" alt="" /></a>
                    </div>
                    <div class="col-lg-12">
                        <p class="blogtext"><?php echo $post['content'] ?></p>
                    </div>
                </div>
                <!-- Leave comment-->
                <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                    <div class="success-message" style="margin-bottom: 20px;font-size: 15px;color: green;"><?php echo $_SESSION['success_message']; ?></div>
                <?php unset($_SESSION['success_message']);
                } ?>

        
                <form method="post" action="index.php?action=leavecomment&amp;id=<?= $post['id'] ?>">
                    <h3 class="cardtitle">Leave a comment</h3>
                    <div class="row mb-3">
                        <div class="col-lg-12 mb-3">
                            <input class="form-control" type="text" name="author" placeholder="Full Name e.g. Jason Doe" value="<?= $author ?>" required>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <textarea class="form-control" name="comment" rows="5" placeholder="Leave your comment" value="<?= $comment ?>" required></textarea>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <button class="btn button" type="submit">Submit your comment</button>
                        </div>
                    </div>
                </form>
                <!-- Post comments-->
                <h3 class="h4 mb-4 cardtitle">Comments</h3>

                <?php foreach ($comments as $i => $comment) { ?>

                    <p class="small mb-0 date"><?= $comment['comment_creation_date'] ?></p>
                    <h5 class="name"><?= htmlspecialchars($comment['author']) ?></h5>
                    <p class="blogtext text-small mb-2"><?= htmlspecialchars($comment['comment']) ?></p>
                    <div class="reply fs-6"><a href="#"><i class="fas fa-share mr-2"></i><strong>Reply</strong></a></div>
                <?php } ?>

            </div>
            <?php include_once 'src/views/frontend/_about.php'; ?>
        </div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('src/views/frontend/_frontendLayout.php'); ?>