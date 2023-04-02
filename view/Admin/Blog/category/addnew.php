<div class="header">
    <h3>New Category</h3>
    <button class="btn-save">Save</button>
</div>
<form action="" method="post">
    <div class="admin__field status">
        <label for="status">Status</label>
        <div class="control">
            <input type="checkbox" id="status" name="status" value="1">
        </div>
    </div>
    <div class="admin__field category-title">
        <label for="category_title">Category Title</label>
        <div class="control">
            <input type="text" id="category_title" name="category_title">
        </div>
    </div>
    <div class="admin__field content">
        <label for="content">Content</label>
        <div class="control">
            <textarea name="content" id="content" cols="30" rows="5"></textarea>
        </div>
    </div>
    <div class="admin__field thumbnail-image">
        <label for="thumbnail_image">Thumbnail Image</label>
        <div class="control">
            <input type="file" id="thumbnail_image" name="thumbnail_image" accept="image/png, image/gif, image/jpeg"/>
            <div class="preview-image"></div>
        </div>
    </div>
    <div class="admin__field url-key">
        <label for="url_key">Url Key</label>
        <div class="control">
            <input type="text" id="url_key" name="url_key">
        </div>
    </div>
</form>