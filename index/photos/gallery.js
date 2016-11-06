var PASSWORD = "kenilworth";

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
        if (e.split("=")[0] == "pw" && e.split("=")[1] == PASSWORD) {
            $("#getpics").parent().remove();
            loadImages();
        }
    });

    $("#getpics").click(function(e) {
        e.preventDefault();
        if ($("#password").val() == PASSWORD) {
            $(this).parent().remove();
            loadImages();
        } else {
            alert("worng password");
        }
    });

    function loadImages() {
        var galleryArea = $("#galleries");
        addGallery(galleryArea, "Ceremony", 60, "ceremony");
        addGallery(galleryArea, "Group Pictures", 53, "group_pictures");
        addGallery(galleryArea, "Reception", 77, "reception");
        // addGallery(galleryArea, "Saturday", , "saturday");
        // addGallery(galleryArea, "Sunday", , "sunday");
        // addGallery(galleryArea, "Monday", , "monday");
        // addGallery(galleryArea, "Honeymoon", 44, "honeymoon");

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
