document.addEventListener('DOMContentLoaded', function() {
    var imageUploadButtons = document.querySelectorAll('.zone_img .img_upload');

    imageUploadButtons.forEach(function(button) {

        button.addEventListener('click', function(e) {

            e.preventDefault();
            var imageField = button.previousElementSibling;
            var imageFrameId = 'image-frame-' + imageField.id;
            var imgId = button.getAttribute('img-id')
            var img =document.querySelector('#form_img_' + imgId);

            var imageFrame = wp.media.frames[imageFrameId];

            console.log(imageFrameId)
            console.log(imgId)
            if (!imageFrame) {

                imageFrame = wp.media.frames[imageFrameId] = wp.media({
                    title: 'Sélectionner une image',
                    button: {
                        text: 'Utiliser cette image'
                    },
                    multiple: false
                });

                imageFrame.on('select', function() {
                    var attachment = imageFrame.state().get('selection').first().toJSON();
                    imageField.value = attachment.url;
                    img.setAttribute("src", attachment.url)
                });
            }

            imageFrame.open();
        });
    });
});
            

        