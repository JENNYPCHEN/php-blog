<?php session_start(); ?>
<?php $title = 'ChingYi P.C | Personal Blog | Dashboard'; ?>
<?php ob_start(); ?>
<!--Post-->

<body>
    <h2 class="m-3 admin-title">Update Post</h2>
    <form method="post" enctype="multipart/form-data" action="index.php?action=updatePost&amp;id=<?=filter_var($post->getId(), FILTER_SANITIZE_STRING); ?>">
        <div class="m-3 blogtext">
            <label for="post_title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title" value="<?=filter_var($post->getTitle(), FILTER_SANITIZE_STRING);?>">
        </div>
        <div class="m-3 blogtext">
            <label for="post_title" class="form-label">Category</label>
            <input type="text" class="form-control" name="category" placeholder="Category" value="<?=filter_var($post->getCategory(), FILTER_SANITIZE_STRING); ?>">
        </div>
        <div class="m-3 blogtext">
            <label for="headline" class="form-label">Headline</label>
            <textarea type="text" class="form-control" name="chapo" rows="3" placeholder="Headline"><?=filter_var($post->getChapo(), FILTER_SANITIZE_STRING); ?></textarea>
        </div>
        <div class="m-3 blogtext">
            <label for="content" class="form-label">Content</label>
            <textarea id="mytextarea" name="content"><?=$post->getContent() ?></textarea>
        </div>
        <div class="m-3">
            <label for="upload_image" class="form-label">Upload Image</label>
            <input class="form-control" type="file" name="image" id="upload_image">
            <div class="error">
                <?=filter_var($error, FILTER_SANITIZE_STRING) ?>
            </div>
        </div>
        <button type="submit" class="btn button2 m-3">Publish</button>
    </form>
</body>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('src/views/backend/_backendLayout.php'); ?>