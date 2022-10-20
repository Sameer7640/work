// FIELD WRAPPER
var inputFileWrap = jQuery('.post-a-story-row .wpcf7 span.wpcf7-form-control-wrap.photo');

// INPUT FIELD
var inputFile = jQuery('.post-a-story-row .wpcf7 span.wpcf7-form-control-wrap.photo input');

// APPENDED BUTTON (AFTER INPUT FIELD BUTTON)
var inputFileBtn = jQuery('.post-a-story-row .wpcf7 span.wpcf7-form-control-wrap.photo .filebtn');

// BUTTON APPENDED HERE
inputFileWrap.append('<span class="filebtn">Upload a Photo</span>');

// ONCHANGE FILE NAME APPENDED
inputFile.change(function() {
	var filename = inputFile.val().split('\\').pop();
	console.log(filename);
	inputFileWrap.append('<span class="filename">' + filename + '<span>');
});