$(document).ready(function () {
    var sfield = $("#s");
    var container = $("#searchByTag");
    var timer;

    function instaSearch() {
        $(sfield).addClass("loading");
        $(container).empty();
        var q = $(sfield).val();

        $.ajax({
            type: 'GET',
            url: 'search/' + q,
            dataType: 'json',
            success: function (data) {
                $(sfield).removeClass("loading");
                $.each(data.photos.photo, function (i, item) {
                    var ncode = '<div class="p"> <img class="activator" src="https://farm' + item.farm + '.staticflickr.com/' + item.server + '/' + item.id + '_' + item.secret + '.jpg"></div>';
                    $(container).append(ncode);
                });
            },
            error: function (xhr, type, exception) {
                $(sfield).removeClass("loading");
                $(container).html("Error: " + type);
            }
        });
    }

    /** 
     * keycode glossary 
     * 32 = SPACE
     * 188 = COMMA
     * 189 = DASH
     * 190 = PERIOD
     * 191 = BACKSLASH
     * 13 = ENTER
     * 219 = LEFT BRACKET
     * 220 = FORWARD SLASH
     * 221 = RIGHT BRACKET
     */
    $(sfield).keydown(function (e) {
        if (e.keyCode == '32' || e.keyCode == '188' || e.keyCode == '189' || e.keyCode == '13' || e.keyCode == '190' || e.keyCode == '219' || e.keyCode == '221' || e.keyCode == '191' || e.keyCode == '220') {
            e.preventDefault();
        } else {
            clearTimeout(timer);

            timer = setTimeout(function () {
                instaSearch();
            }, 900);
        }
    });

});