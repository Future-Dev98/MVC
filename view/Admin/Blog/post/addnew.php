<div class="header">
    <h3>New Post</h3>
    <button class="btn-save">Save</button>
</div>
<form action="<?= ROOT_URL.'/admin/post/save' ?>" method="post" id="post-data" enctype="multipart/form-data">
    <div class="admin__field status">
        <label for="status">Status</label>
        <div class="control">
            <input type="checkbox" id="status" name="status" value="1">
        </div>
    </div>
    <div class="admin__field post-title">
        <label for="post_title">Post Title</label>
        <div class="control">
            <input type="text" id="post_title" name="post_title">
        </div>
    </div>
    <div class="admin__field categories">
        <label for="post_title">Categories</label>
        <div class="control">
            <select name="category_id" id="category" class="multiselect" multiple>
                <option value="0">1</option>
                <option value="0">2</option>
                <option value="0">2</option>
                <option value="0">2</option>
                <option value="0">2</option>
                <option value="0">2</option>
                <option value="0">2</option>
                <option value="0">2</option>
            </select>
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
<script>
    jQuery(document).ready(function($) {
        var form = $('#post-data');
        form.submit(function(e){
            e.preventDefault();
        })
        $('.btn-save').click(function(){
            var formdata = $('#post-data').serialize(),
                url = form.attr('action');
                $.ajax({
                       url: url,
                       type: 'post',
                       dataType: 'html',
                       data: formdata,
                       success: function(response){
                
                       }
                })
        })

        //Upload thumnbail image
        $('#thumbnail_image').change(function() {
            var formData = new FormData($('#post-data')[0]);
                $.ajax({
                       url: '<?= ROOT_URL ?>/admin/UploadFile',
                       type: 'post',
                       dataType: 'json',
                       data: formData,
                       processData: false,
                       contentType: false,
                       success: function(result){
                        console.log(result);
                       },
                       error: function(result) {
                        console.log(result);
                       }
                })
        })
    })
</script>
