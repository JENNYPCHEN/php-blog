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
          <?php
          while ($post = $posts->fetch()) {
          ?>
            <div class="col-lg-6"><a class="d-block post-trending mb-4" href=""><img class="img-fluid w-100" src="<?php echo ($post['image']) ?>" alt="" /></a>
            </div>
            <div class="col-lg-6">
              <ul class="list-inline">
                <li class="list-inline-item mr-2 category font-weight-normal"><?php echo ($post['category']) ?></li>
                <li class="list-inline-item mx-2 text-uppercase meta font-weight-normal"><?php echo ($post['user_name']) ?></li>
                <li class="list-inline-item mx-2 text-uppercase meta font-weight-normal"><?php echo ($post['creation_date']) ?></li>
              </ul>
              <h2 class="h3 mb-4"> <a class="d-block blogtitle" href="post.html"><?php echo ($post['title']) ?></a></h2>
              <p class="blogtext"><?php echo ($post['content']) ?></p>
              <a class="p-0 read-more-btn" href="index.php?action=post&amp;id=<?= $post['id'] ?>"><span>Read more</span><i class="fas fa-long-arrow-alt-right"></i></a>
            </div>

          <?php
          }
          ?>



        </div>

        <!--pagination-->
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
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
          <form>
            <h3 class="cardtitle text-center"> Contact </h3>
            <div class="row needs-validation">
              <div class="col">
                <label for="first-name" class="form-label">First name</label>
                <input class="form-control" type="text" id="first-name" required />
                <div class="invalid-feedback">
                  Please enter your first name.
                </div>
              </div>
              <div class="col">
                <label for="last-name" class="form-label">Last name</label>
                <input class="form-control" type="text" id="last-name" required />
                <div class="invalid-feedback">
                  Please enter your last name.
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" id="email" required />
                <div class="invalid-feedback">
                  Please enter your Email.
                </div>
              </div>
              <div class="col">
                <label for="subject" class="form-label">Subject</label>
                <input class="form-control" type="text" id="subject" required />
                <div class="invalid-feedback">
                  Please enter a subject.
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" rows="4" id="message" required></textarea>
                <div class="invalid-feedback">
                  Please enter a message.
                </div>
                <div id="message-help" class="form-text">Max. 500 characters</div>
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