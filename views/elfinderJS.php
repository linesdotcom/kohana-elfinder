<script type="text/javascript" charset="utf-8">
    $().ready(function() {
        var f = $('#<?php echo $elementID; ?>').elfinder({
            url : '<?php echo URL::site(Route::get('elfinder')->uri(), TRUE); ?>',
            <?php if ($finderLang != 'en'): ?>
            lang : '<?php echo $finderLang ?>',
            <?php endif; ?>
            docked : true

            // dialog : {
            // 	title : 'File manager',
            // 	height : 500
            // }

            // Callback example
            //editorCallback : function(url) {
            //	if (window.console && window.console.log) {
            //		window.console.log(url);
            //	} else {
            //		alert(url);
            //	}
            //},
            //closeOnEditorCallback : true
        })
        // window.console.log(f)
        $('#close,#open,#dock,#undock').click(function() {
            $('#finder').elfinder($(this).attr('id'));
        })
			
    })
</script>
<script src="<?php echo URL::site(Route::get('elfinder_media')->uri(array('file' => 'js/elfinder.min.js')), TRUE); ?>" type="text/javascript" charset="utf-8"></script>
<?php if ($finderLang != 'en'): ?>
<script src="<?php echo URL::site(Route::get('elfinder_media')->uri(array('file' => 'js/i18n/elfinder.'.$finderLang.'.js')), TRUE); ?>" type="text/javascript"></script>
<?php endif; ?>
