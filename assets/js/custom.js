jQuery(document).ready(function($) {
    $('#thumbnail_image').change(function() {
        console.log($(this).closest('form').serialize())
    })
})