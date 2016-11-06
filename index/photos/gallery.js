var PASSWORD = "kenilworth";

var range = function(i, j) {
    return Array.apply(null, Array(j-i+1)).map(function (_, k) {return i+k;});
};

var picElement = function(src) {
    return "<a href='" + src + ".jpg'><img src='" + src + ".thumb.jpg' /></a>";
};


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
        $(".gallery").before("<h2>Ceremony</h2>");
        $(".gallery").html(function() {
            return range(1, 52).reduce(function(prev, curr) {
                return prev + picElement("img/ceremony_" + curr);
            }, "");
        });

        setTimeout(function() {
            new Masonry( ".gallery", {
                itemSelector: ".gallery img",
                columnWidth: ".gallery img",
                fitWidth: true
            });
        }, 1000);

        $(".gallery").lightGallery({
            hideControlOnEnd: true,
            loop: false,
            speed: 300,
            hideBarsDelay: 500,
            preload: 10
        });
    }
})
