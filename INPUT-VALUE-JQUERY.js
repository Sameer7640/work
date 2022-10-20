var value = jQuery('.provider-row .contact-col .wpcf7 input');
value.change(function() {
    let calcValue = jQuery(this).val().split('\\').pop();
    jQuery('.provider-row .contact-col .wpcf7 .file-wrap label span.file-btn').text(calcValue)
});


// WORKING CODE IS HERE
// WORKING CODE IS HERE
// WORKING CODE IS HERE
var value = jQuery('.provider-row .contact-col .wpcf7 input');
value.change(function() {
    let calcValue = jQuery(this).val().split('\\').pop();
    jQuery(this).parent().siblings('span.file-btn').text(calcValue)
});
// WORKING CODE IS HERE
// WORKING CODE IS HERE
// WORKING CODE IS HERE



let imageUpload = document.querySelectorAll('.provider-row .contact-col .wpcf7 input');
let uploadMsg = document.querySelectorAll('.provider-row .contact-col .wpcf7 label span.file-btn');
// display file name if file has been selected
imageUpload.onchange = function() {
  let input = this.files[0];
  let text;
  if (input) {
    //process input
    text = imageUpload.value.replace("C: \\fakepath\\", "");
  } else {
    text = "Please select a file";
  }
  uploadMsg.innerHTML = text;
  console.log(text)
};



var input = document.getElementById( 'file-upload' );
var infoArea = document.getElementById( 'file-upload-filename' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  // the change event gives us the input it occurred in 
  var input = event.srcElement;
  
  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
  var fileName = input.files[0].name;
  
  // use fileName however fits your app best, i.e. add it into a div
  infoArea.textContent = 'File name: ' + fileName;
}