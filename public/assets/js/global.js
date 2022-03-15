var global = (function () {
    var hlp_select2 = function (clas, option) {
        if (option.route_to == undefined) {
            $(clas).select2({
                placeholder: option.placeholder == undefined ?
                    "Select Option" : option.placeholder,
                allowClear: option.allowClear == undefined ? false : option.allowClear
            });
        } else {
            $(clas).select2({
                placeholder: option.placeholder == undefined ?
                    "Select Option" : option.placeholder,
                allowClear: option.allowClear == undefined ? false : option.allowClear,
                ajax: {
                    url: option.route_to,
                    dataType: "json",
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: data.items,
                            pagination: {
                                more: params.page * 30 < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                tags: option.tag == undefined || option.tag == false ?
                    false : option.tag,
                tokeSparator: [","],
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: option.MininputLength == undefined ?
                    false : option.MininputLength,
                templateResult: formatResult, // omitted for brevity, see the source of this page
                templateSelection: formatResult // omitted for brevity, see the source of this page
            });

            function formatResult(result) {
                return result.text;
            }
        }
    };

    return {
        init_select2: function (clas, option) {
            hlp_select2(clas, option);
        }
    };
})();