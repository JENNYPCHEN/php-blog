<!--Post-->

<body>
    <h2 class="m-3 admin-title">Update Post</h2>

    <div class="m-3 blogtext">
        <label for="post_title" class="form-label">Title</label>
        <input type="text" class="form-control" id="post_title" placeholder="Title">
    </div>
    <div class="m-3 blogtext">
        <label for="headline" class="form-label">Headline</label>
        <textarea type="text" class="form-control" id="headline" rows="3" placeholder="Headline"></textarea>
    </div>


    <div class="m-3 blogtext">
        <label for="content" class="form-label">Content</label>
        <form method="post">
            <textarea id="mytextarea">Hello, World!</textarea>
        </form>
        <!--<textarea type="text" class="form-control" id="content" rows="10"placeholder="Content"></textarea>
</div>-->
        <div class="m-3">
            <label for="upload_image" class="form-label">Upload Image</label>
            <input class="form-control" type="file" id="upload_image">
        </div>
        <button type="button" class="btn button2 m-3">Publish</button>

</body>
</div>