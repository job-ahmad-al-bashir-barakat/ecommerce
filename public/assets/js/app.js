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

    dateTimePicker: {

        init: function () {

            var $this  = $(this);
            var $input = $this.find('input');
            var format = (typeof $input.data('format') !== typeof undefined) ? $input.data('format') : '';

            $input.datetimepicker({
                // debug: true,
                locale: LANG,
                format: format,
                useCurrent: false,
                icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-crosshairs',
                    clear: 'fa fa-trash'
                }
            });
        },

        load: function(selector) {

            var selector = selector ? selector : ".date";

            $(selector).each(APP.dateTimePicker.init);
        },
    },

    bootstrapTooltip: function() {

        $('[data-toggle="tooltip"]').each(function () {

            var $this = $(this);

            $this.tooltip({
                title: $this.html(),
                placement: 'top',
                html: true,
                container: 'body'
            });
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
               });
           });
        }
    }
}

$(function () {
    APP.Quill.init('.editor');
    APP.dateTimePicker.load();
    APP.simpleFileUpload();
    APP.bootstrapTooltip();
});