/*!
 *
 * Admin Script
 *
 * Version: 1.0
 * Author: ahmad al bashir barakat
 *
 */

var APP = {

    simpleFileUpload: function () {

        $('.input-simple-file-upload').on('change', function () {

            var $this = $(this);
            var fileReader = new FileReader();
            fileReader.onload = function () {
                var data = fileReader.result;  // data <-- in this var you have the file data in Base64 format
                console.log(data);
                $($this).parent().find('.simple-file-upload-placeolder').attr('src', data);
            };
            fileReader.readAsDataURL($('.input-simple-file-upload').prop('files')[0]);
        });
    },

    Quill: {

        init: function (selector) {

           $(selector).each(function () {

               var editor = this;
               // init Quill instance
               var quill = new Quill(editor, {
                   theme: 'snow',
                   placeholder: 'Type Something...',
                   modules: {
                       toolbar: [
                           [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                           [{ 'size': ['small', false, 'large', 'huge'] }],
                           ['bold', 'italic', 'underline'],
                           ['blockquote'],
                           [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                           [{ 'indent': '-1'}, { 'indent': '+1' }],
                       ]
                   }
               });

               // get html content
               quill.getHTML = () => {
                   return $(editor).find('[class$=editor]').html();
               };

               quill.on('text-change', () => {
                   $(editor).parent().find('.editor-value').val(quill.getHTML());
                   console.log('get html',quill.getHTML());
               });
           });
        }
    }
}

$(function () {
    APP.Quill.init('.editor');
    APP.simpleFileUpload();
});