//<script>
elgg.provide('elgg.blogvideocover');

elgg.blogvideocover.init = function() {
	var form = $('form#blog-post-edit');
	form.find('a#blog_video_cover_save').live('click', elgg.blogvideocover.save);
	form.find('a#blog_video_cover_delete').live('click', elgg.blogvideocover.delete);
};

elgg.blogvideocover.save = function(e) {
	var form = $('form#blog-post-edit');
	elgg.system_message('Saving...')
	elgg.action('blogvideocover/save', {
		data: {
			guid: form.find('input[name=guid]').val(),
			url: form.find('input[name=blog_video_cover]').val()
		},
		success: function() {
			elgg.system_message('Blog cover updated.');
			form.find('a#blog_video_cover_delete').toggle();
		}
	});
	e.preventDefault();
};

elgg.blogvideocover.delete = function(e) {
	var form = $('form#blog-post-edit');
	elgg.action('blogvideocover/delete', {
		data: {
			guid: form.find('input[name=guid]').val()
		},
		success: function() {
			elgg.system_message('Blog cover deleted.');
			form.find('input[name=blog_video_cover]').val('');
			form.find('a#blog_video_cover_delete').toggle();
		}
	});
	e.preventDefault();
};

elgg.register_hook_handler('init', 'system', elgg.blogvideocover.init);
