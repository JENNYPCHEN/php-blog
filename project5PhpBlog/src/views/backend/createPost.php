<?php session_start(); ?>
<?php $title = 'ChingYi P.C | Personal Blog | Dashboard'; ?>
<?php ob_start(); ?>
<!--Post-->
<body>
    <h2 class="m-3 admin-title">New Post</h2>
    <form method="post" enctype="multipart/form-data" action="index.php?action=createPost">
        <div class="m-3 blogtext">
            <label for="post_title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title" required>
        </div>
        <div class="m-3 blogtext">
            <label for="post_title" class="form-label">Category</label>
            <input type="text" class="form-control" name="category" placeholder="Category" required>
        </div>
        <div class="m-3 blogtext">
            <label for="headline" class="form-label">Headline</label>
            <textarea type="text" class="form-control" name="chapo" rows="3" placeholder="Headline" required></textarea>
        </div>
        
        <div class="m-3 blogtext">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" id="mytextarea" rows="10" name="content" required>Hello, World!</textarea>
        </div>
        <div class="m-3">
            <label for="upload_image" class="form-label">Upload Image</label>
            <input class="form-control" type="file" name="image" id="upload_image">
            <div class="error">
                <?=filter_var($error, FILTER_SANITIZE_STRING);?>
            </div>
        </div>
        <button type="submit" class="btn button2 m-3">Publish</button>
    </form>
</body>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('src/views/backend/_backendLayout.php'); ?>