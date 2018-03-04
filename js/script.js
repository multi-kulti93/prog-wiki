$(document).ready(function() {

	$('#navbarSearchInput').focus(function() {
		$(this).animate({ width: '400px'});
	});

	$('#navbarSearchInput').blur(function() {
		$(this).animate({ width: '200px'});
	});

	$('#navbarSearch').on('show.bs.collapse', function() {
		$('.container').animate({
			marginTop: '8em'}, 500);
	});

	$('#navbarSearch').on('hide.bs.collapse', function() {
		$('.container').animate({
			marginTop: '5em'}, 500);
	});
});