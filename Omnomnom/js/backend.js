$('document').ready(function() {


$('#tabone').click(function(){
	$('#content').load('backend.html');
});

$('#tabtwo').click(function(){
	$('#content').load('prev.html');
});

$('#tabthree').click(function(){
	$('#content').load('booked.html');
});

});