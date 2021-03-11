(function($) {
    $(function() {

        $('.gotoLink').click(function(event) {
            var str = $(this).attr("href");
            $.scrollTo(str, 500, { interrupt:true, queue:false });
            return false
        });
    });
})(jQuery);