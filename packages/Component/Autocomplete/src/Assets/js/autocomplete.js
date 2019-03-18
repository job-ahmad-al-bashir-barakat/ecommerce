var SELECT2 = {

    autocomplete: {

        init: function (Data) {

            return function () {
                var $this          = $(this);
                var url            = $this.data('remote');
                var required       = $this.data('required')       || null;
                var placeholder    = $this.data('placeholder')    || '';
                var target         = $($this.data('target'))      || '';
                var letters        = typeof $this.data('letter') != typeof undefined ? $this.data('letter') : 3;
                var multiple       = $this.attr('multiple')       ? true : false;
                var linkWith       = $this.data('param')          || '';
                var data           = Data                         || [];

                $this.find('option:selected').each(function (i) {
                    var $this = $(this);
                    data[i] = {id: $this.val(), name: $this.text()};
                });

                if (linkWith.charAt(0) == '#') {
                    $(linkWith).change(function () {
                        $this.val('').change();
                    });
                }

                $this.select2({
                    ajax: {
                        url: url,
                        dataType: 'json',
                        delay: 400,
                        method: "GET",
                        global: false,
                        data: function (params) {

                            var param       = $this.data('param') || null;
                            var remoteParam = $this.attr('data-remote-param') || null;

                            if (param && param.charAt(0) === '#') {
                                var name = $(param).attr('name') || $(param).attr('id');
                                var val = $(param).val() ? $(param).val() : 0;
                                param = JSON.parse('{"' + name + '":"' + val + '"}');
                            }
                            var $data = {q: params.term, page: params.page};
                            if (param) {
                                $data = $.extend($data, param);
                            }

                            if (remoteParam)
                                $((remoteParam).split(',')).each(function (i, v) {
                                    $data = $.extend($data, JSON.parse('{"' + (v).split('=')[0] + '" : "' + (v).split('=')[1] + '"}'));
                                });

                            return $data;
                        },
                        processResults: function (data, params) {

                            params.page = params.page || 1;

                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    escapeMarkup: function (markup) {
                        return markup;
                    },
                    dir: DIR,
                    language: LANG,
                    minimumInputLength: letters,
                    placeholder: placeholder,
                    allowClear: true,
                    templateResult: SELECT2.autocomplete.formatRepo,
                    templateSelection: SELECT2.autocomplete.formatRepoSelection,
                    dropdownParent: target,
                    theme: "bootstrap",
                    multiple: multiple,
                    data: data
                });
            }
        },

        formatRepo: function (repo) {

            // var $this = $(this),
            //     url   = $this.data('remote');

            var result = repo.name || repo.text;

            if(repo.id == null || !(repo.tags && repo.approvied))
                return result;

            var $option = $("<spam></span>");
            var $preview = $(result);

            /*
             * Select2 will remove the dropdown on `mouseup`, which will prevent any `click` events from being triggered
             * So we need to block the propagation of the `mouseup` event
             */
            $preview.find('.autocompelte-create').on('mouseup', function(evt) {
                evt.stopPropagation();
            });

            /*
             * click event on menu for delete or approvied menu item
             */
            $preview.find('.autocompelte-create').on('click', function (evt) {
                // $.post(url,{ text: evt.params.data.text })
            });

            // $option.text(result);
            $option.append($preview);

            return $option;
        },

        formatRepoSelection: function (repo) {

            var repoText = repo.text || repo.name;
            var $option = $(repo.element);
            for(var key in repo){
                if(key.startsWith('data-')) {
                    $option.attr(key, repo[key]);
                }
            }
            return repoText;
        },

        reloadAutocomplete: function (selector) {

            var $selector = $(selector);

            $selector.each(SELECT2.autocomplete.init(null));
        },

        selectedAutocomplete: function (selector, data) {

            $(selector).each(SELECT2.autocomplete.init(data));
        },

        resetAutocomplete: function (selector) {

            $(selector).empty().trigger('change');
        },

        initAutocomplete: function (selector, $cont) {
            var $obj, $cont = $cont || false;
            if(typeof selector == 'object'){
                $obj = selector;
            } else {
                selector = selector || '.autocomplete';

                if($cont){
                    $obj = $cont.find(selector);
                } else {
                    $obj = $(selector);
                }
            }
            $obj.each(SELECT2.autocomplete.init(null));
        },

        destroyAutocomplete: function (selector, $cont) {
            var $obj, $cont = $cont || false;
            if(typeof selector == 'object'){
                $obj = selector;
            } else {
                selector = selector || '.autocomplete';
                if($cont){
                    $obj = $cont.find(selector);
                } else {
                    $obj = $(selector);
                }
            }
            $obj.select2('destroy');
        },
    },

    select: {

        init: function (data) {

            return function () {

                var $this = $(this);
                var placeholder = (typeof $this.data('placeholder') !== typeof undefined) ? $this.data('placeholder') : '';

                $this.select2({
                    dir: DIR,
                    language: LANG,
                    placeholder: placeholder,
                    allowClear: true,
                    theme: "bootstrap",
                    data: data
                });
            }
        },

        reloadSelect: function (selector) {

            $(selector).each(SELECT2.select.initSelect);
        },

        selectedSelect: function (selector, data) {

            $(selector).each(SELECT2.select.initSelect(data));
        },

        resetSelect: function (selector) {

            $(selector).val('').trigger("change");
        },

        initSelect: function (selector, $cont) {
            var $obj, $cont = $cont || false;
            if(typeof selector == 'object'){
                $obj = selector;
            } else {
                selector = selector || '.select';
                if($cont){
                    $obj = $cont.find(selector);
                } else {
                    $obj = $(selector);
                }
            }

            $obj.each(SELECT2.select.init());
        },

        destroySelect: function (selector, $cont) {
            var $obj, $cont = $cont || false;
            if(typeof selector == 'object'){
                $obj = selector;
            } else {
                selector = selector || '.select';
                if($cont){
                    $obj = $cont.find(selector);
                } else {
                    $obj = $(selector);
                }
            }
            $obj.select2('destroy');
        }
    },
};

/**
 * init App
 */

$(function () {
    SELECT2.select.initSelect();
    SELECT2.autocomplete.initAutocomplete();
});
