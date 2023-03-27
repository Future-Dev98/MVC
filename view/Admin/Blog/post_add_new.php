<h1>New Post</h1>
<form action="" method="post">
    <div class="admin__field">
        <label for="status">Status</label>
        <input type="chekbox" id="status" name="status">
    </div>
    <div class="admin__field">
        <label for="post_title">Post Title</label>
        <input type="text" id="post_title" name="post_title">
    </div>
    <div class="admin__field">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="5"></textarea>
    </div>
    <div class="admin__field">
        <label for="thumbnail_image">Thumbnail Image</label>
        <input type="file" id="thumbnail_image" name="thumbnail_image" accept="image/png, image/gif, image/jpeg"/>
        <div class="preview-image"></div>
    </div>
    <div class="admin__field">
        <label for="url_key">Url Key</label>
        <input type="text" id="url_key" name="url_key">
    </div>
</form>