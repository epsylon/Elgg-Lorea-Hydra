/**
 * Enables desired notification methods with multiple XHR requests
 *
 * This add a UI that can be used to force desired notification methods
 * for all users.
 */
define(function(require) {
	var methods = '';
	var offset = 0;

	/**
	 * Process a batch of users
	 *
	 * @param {Int} offset
	 * @param {String} operation
	 */
	processBatch = function(operation) {
		var options = {
			data: {
				offset: offset,
				methods: methods
			},
			dataType: 'json'
		};

		options.data = elgg.security.addToken(options.data);
		options.success = function(json) {
			if (json.output.count) {
				offset += json.output.count;

				processBatch(operation);
			} else {
				newValue = 100;

				$('.elgg-button-submit').prop("disabled", false);
			}

			$('#progressbar-' + operation).progressbar({value: offset});

			if (json.status === -1) {
				$('.elgg-button-submit').prop("disabled", false);
			}
		};

		var action = 'action/notification_tools/enable_' + operation;
		elgg.action(action, options);
	};

	/**
	 * Trigger one of the bulk operations
	 *
	 * @param {Object} e
	 */
	enable = function(e) {
		e.preventDefault();

		$('.elgg-button-submit').prop("disabled", true);

		data = $(this).serialize();

		methods = $(this).find("input[type=checkbox]:checked").parent().text();

		processBatch(this.dataset.operation);
	};

	$(document).on('submit', 'form', enable);

	$('.elgg-progressbar').each(function (key, value) {
		$(this).progressbar({
			value: 0,
			max: this.dataset.total
		});
	});
});
