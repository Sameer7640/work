<label class="file-btn">
    [file* upload-resume limit:1mb filetypes:png|jpg|pdf class:resume-file]
    <img src="https://eseospace.dev/websites/synergyrecruiting/wp-content/uploads/2022/03/file-attachment-image01239.svg">
        <span>Upload File</span>
</label>

jQuery(document).ready(function () {
    jQuery('label.file-btn input').on("change", function () {
        var filename = jQuery('input[type=file]').val().split('\\').pop();
        if (filename) {
            if (filename.length > 20)
                jQuery('label.file-btn .file-btn-text').text(filename.substr(0, 20) + "...");
        }
        else {
            jQuery('label.file-btn .file-btn-text').text("Upload");
        }
    });
});