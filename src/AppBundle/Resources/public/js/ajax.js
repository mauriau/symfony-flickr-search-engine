$(document).ready(function () {
    var sfield = $("#s");
    var container = $(".row");
    var timer;
    function FlickrSearch() {
        $(sfield).addClass("loading");
        $(container).empty();
        var q = $(sfield).val();
        var url = Routing.generate('flickr_search', {tag: q});
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {
                $(sfield).removeClass("loading");
                $.each(data.photos.photo, function (i, item) {
                    var title = item.title ? jQuery.trim(item.title).substring(0, 17).split(" ").slice(0, -1).join(" ") + "..." : 'Photo sans titre';
                    var node = '<div class="col l3 m6 s12">';
                    node += '<div id="cardPicture" class="card"><div id="FlickrSearch" class="card-image waves-effect waves-block waves-light">';
                    node += '<img class="activator" height="300" src="https://farm' + item.farm + '.staticflickr.com/' + item.server + '/' + item.id + '_' + item.secret + '.jpg"/>';
                    node += '</div>';
                    node += '<div class="card-content" style="height: 150px;">';
                    node += '<span class="card-title activator grey-text text-darken-4" style="word-wrap: break-word;font-size: 20px;">' + title;
                    node += '</span>';
                    node += '<a class="modal-trigger" href="#modal1" >';
                    node += '<i class="small material-icons right" alt="Favoris" style="color:#ffd740"> star_rate </i>';
                    node += '</a>';
                    node += '</div>';
                    node += '<div class="card-reveal">';
                    node += '<span class="card-title grey-text text-darken-4" ><i class="material-icons right"> close </i></span >';
                    node += ' information';
                    node += '</div></div></div>';
                    $(container).append(node);
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
                FlickrSearch();
            }, 900);
        }
    });
});