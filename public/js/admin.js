(function() {
	
	$('.ui-component-tooltip').tooltip();

	$('.ui-action-delete').on('click', function() {
		return confirm('Delete this record?');
	});

})(jQuery);

$(function() {
  $('li a[href="' + window.location.href  + '"]').parent().addClass('active');
});