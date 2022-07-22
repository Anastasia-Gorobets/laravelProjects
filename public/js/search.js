window.addEventListener('load', function() {

    $('#search').typeahead({
        source:  function (query, process) {
            return $.get('autocomplete', { query: query }, function (data) {
                return process(data);
            });
        },
        updater: function (item) {
            return item;
        }
    });
});


