<?php $title = 'ChingYi P.C | Personal Blog'; ?>
<?php ob_start(); ?>

<!--banner-->
<div class="pb-4 "><img class="img-fluid" src="public/img/sea.png" alt="banner" /></div>
<!--blog-->
<section class="pb-5">
  <div class="container pb-4">
    <div class="row">
      <!--blogposts-->
      <div class="col-lg-9 mb-5 mb-lg-0" id="blogposts">
        <div class="row align-items-center mb-5">
          <?php foreach ($posts as $post) { ?>
            <div class="col-lg-6"><a class="d-block post-trending mb-4" href=""><img class="img-fluid w-100" src="<?= $post->getImage() ?>" alt="" /></a>
            </div>
            <div class="col-lg-6">
              <ul class="list-inline">
                <li class="list-inline-item mr-2 category font-weight-normal"><?= htmlspecialchars($post->getCategory()) ?></li>
                <li class="list-inline-item mx-2 text-uppercase meta font-weight-normal"><?=htmlspecialchars($post->getUserName()) ?></li>
                <li class="list-inline-item mx-2 text-uppercase meta font-weight-normal"><?=htmlspecialchars($post->getCreationDate()) ?></li>
              </ul>
              <h2 class="h3 mb-4"> <a class="d-block blogtitle" href="post.html"><?=htmlspecialchars($post->getTitle()); ?></a></h2>
              <p class="blogtext "><?=substr($post->getContent(), 0, 220)?></p>
              <a class="p-0 read-more-btn " href="index.php?action=post&amp;id=<?= htmlspecialchars($post->getId()); ?>"><span>Read more</span><i class="fas fa-long-arrow-alt-right"></i></a>
            
            </div>

          <?php } ?>



        </div>

        <!--pagination-->
        <nav aria-label="Page navigation">
          <ul class="pagination">
         <?php for ($page=1;$page<=$number_of_pages;$page++) { ?>
            <li class="page-item"><a class="page-link" name="page" href="index.php?search=<?=htmlspecialchars($keyword)?>&amp;page=<?=$page?>"><?=$page?></a></li>
         <?php } ?>
          </ul>
        </nav>

      </div>

      <?php include_once 'src/views/frontend/_about.php'; ?>


      <!--quote-->
      <blockquote class="blockquote text-white p-4 p-lg-5 text-center">
        <p class="h4 mb-4">Coding is today’s language of creativity. All our children deserve a chance to become creators instead of consumers of computer science</p>
        <cite class="text-white fs-6" title="Source Title">-Maria Klawe</cite>
      </blockquote>
    </div>

    <!--contact form-->

    <body>
      <div class="container" id="contact">
        <div class="p-4">
          <form action="index.php?action=contact" method="post">
            <h3 class="cardtitle text-center"> Contact </h3>
            <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>
              <div class="error"><?=htmlspecialchars($_SESSION['error']); ?></div>
            <?php unset($_SESSION['error']);
            } ?>
            <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
              <div class="success-message" style="margin-bottom: 15px;font-size: 20px;color: green;"><?=htmlspecialchars($_SESSION['success_message']); ?></div>
            <?php unset($_SESSION['success_message']);
            } ?>
            <div class="row needs-validation">
              <div class="col">
                <label for="first-name" class="form-label">First name</label>
                <input class="form-control" type="text" id="first-name" name="firstName" value="<?= $mail['firstName'] ?>" required />
              </div>
              <div class="col">
                <label for="last-name" class="form-label">Last name</label>
                <input class="form-control" type="text" id="last-name" name="lastName" value="<?= $mail['lastName'] ?>" required />
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" id="email" name="email" value="<?= $mail['email'] ?>" required />
              </div>
              <div class="col">
                <label for="subject" class="form-label">Subject</label>
                <input class="form-control" type="text" id="subject" name="subject" value="<?= $mail['subject'] ?>" required />
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" rows="4" id="message" name="message" value="<?= $mail['message'] ?>" required></textarea>
                <div id="message-help" class="form-text" value="">Max. 500 characters</div>
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn button">Submit</button>
            </div>
          </form>
        </div>
      </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('src/views/frontend/_frontendLayout.php'); ?>