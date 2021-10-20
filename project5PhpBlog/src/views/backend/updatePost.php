<?php session_start(); ?>
<?php $title = 'ChingYi P.C | Personal Blog | Dashboard'; ?>
<?php ob_start(); ?>
<!--Post-->

<body>
    <h2 class="m-3 admin-title">Update Post</h2>
    <form method="post" enctype="multipart/form_data" action="index.php?action=updatePost&amp;id=<?= $post['id'] ?>">
        <div class="m-3 blogtext">
            <label for="post_title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $post['title'] ?>">
        </div>
        <div class="m-3 blogtext">
            <label for="post_title" class="form-label">Category</label>
            <input type="text" class="form-control" name="category" placeholder="Category" value="<?php echo $post['category'] ?>">
        </div>
        <div class="m-3 blogtext">
            <label for="headline" class="form-label">Headline</label>
            <textarea type="text" class="form-control" name="chapo" rows="3" placeholder="Headline"><?php echo $post['chapo'] ?></textarea>
        </div>
        <div class="m-3 blogtext">
            <label for="content" class="form-label">Content</label>
            <textarea id="mytextarea" name="content"><?php echo $post['content'] ?></textarea>
        </div>
        <div class="m-3">
            <label for="upload_image" class="form-label">Upload Image</label>
            <input class="form-control" type="file" id="upload_image" name="image">
        </div>
        <button type="submit" class="btn button2 m-3">Publish</button>
    </form>
</body>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('src/views/backend/_backendLayout.php'); ?>