/**
 * Insert embed media from embed plugin
 *
 * This JavaScript view is extending the view js/embed/embed
 */

elgg.register_hook_handler('embed', 'editor', function(hook, type, params, value) {
	if (window.tinymce) {
		var editor = window.tinymce.get(params.textAreaId);
		if (editor) {
			var content = params.content;
			try {
				editor.execCommand("mceInsertContent", false, content);
				return false;
			} catch (e) {
				// do nothing.
			}
		}
	}
});
