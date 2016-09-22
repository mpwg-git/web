
$(function()
{
	$('image').picEdit();
	
});

$('image').picEdit({
	imageUpdated: function(img){
		alert('Image update!');
	}
});
$('image').picEdit({
	formSubmitted: function(response){
		alert('Form submitted!');
	}
});
