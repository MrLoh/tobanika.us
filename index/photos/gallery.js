var PWD_HASH = "fce159582eea4b3fdb928cc0a9e312c4";

var range = function(i, j) {
    return Array.apply(null, Array(j-i+1)).map(function (_, k) {return i+k;});
};

var picElement = function(src) {
    return "<a href='" + src + ".jpg'><img src='" + src + ".thumb.jpg' /></a>";
};

var addGallery = function(target, name, n, shorthand) {
    target.append("<h2 id='" + shorthand + "'>" + name + "</h2>");
    target.append(function() {
        return range(1, n).reduce(function(prev, curr) {
            return prev + picElement("img/" + shorthand + "_" + curr);
        }, "<div class='gallery'>") + "</div>";
    });
}


$(function() {
    var lang = $(".lang-link a").text().trim().toLowerCase() === "de" ? "en" : "de";

    window.location.href.split("?")[1].split("#")[0].split("&").map(function(e) {
        if (e.split("=")[0] == "pw" && md5(e.split("=")[1]) === PWD_HASH) {
            $("#getpics").parent().remove();
            loadImages();
        }
    });

    $("#getpics").click(function(e) {
        e.preventDefault();
        if (md5($("#password").val()) === PWD_HASH) {
            $(this).parent().remove();
            loadImages();
        } else {
            alert("worng password");
        }
    });

    function loadImages() {
        var galleryArea = $("#galleries");
        addGallery(galleryArea, "Ceremony", 61, "ceremony");
        addGallery(galleryArea, "Group Pictures", 53, "group_pictures");
        addGallery(galleryArea, "Reception", 79, "reception");
        addGallery(galleryArea, "Saturday", 31, "saturday");
        addGallery(galleryArea, "Sunday", 30, "sunday");
        addGallery(galleryArea, "Monday", 34, "monday");
        addGallery(galleryArea, "Honeymoon", 44, "honeymoon");

        var masonry = $('.gallery').masonry({
            itemSelector: ".gallery img",
            columnWidth: ".gallery img",
            fitWidth: true
        });

        masonry.imagesLoaded().progress( function() {
            masonry.masonry('layout');
        });

        $(".gallery").lightGallery({
            hideControlOnEnd: true,
            loop: false,
            speed: 300,
            hideBarsDelay: 500,
            preload: 10
        });
    }
})
