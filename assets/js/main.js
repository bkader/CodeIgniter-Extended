(function() {
    'use strict';

    // Development
    /*$(document).on('click', 'a.clang', function(e) {
        e.preventDefault();
        var code = $(this).attr('data-lang');
        if (!code) return;
        $.ajax({
            type: "POST",
            url: config.ajax_url+'/change_language',
            data: {code: code},
            success: function(t) {
                t = $.parseJSON(t);
                if (typeof t === 'object' && t.status === true) {
                    window.location.reload();
                }
            }
        });
    });*/

    // minified
    $(document).on("click","a.clang",function(a){a.preventDefault();var t=$(this).attr("data-lang");t&&$.ajax({type:"POST",url:config.ajax_url+'/change_language',data:{code:t},success:function(a){a=$.parseJSON(a),"object"==typeof a&&a.status===!0&&window.location.reload()}})});
}());