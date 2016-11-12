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
    console.log(lang);

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
        galleryArea.append( lang==="de" ?
           "<p>Alle Photos von der Hochzeit können in voller Auflösung auf der <a href='https://nkadu.smugmug.com/event/Tobias-Marries-Anika/LHM8GX'>Website unseres Photographen</a> heruntergeladen werden. Das Passwort lautet <span class='password'>090916tobianika</span> und das Passwort zum downloaden lautet <span class='password'>090916Temperance</span>.</p><p>Weitere Photos vom Wochenende könnt ihr <a href='https://www.icloud.com/sharedalbum/#B0i5n8hH4DecEI'>hier</a> finden.</p>" :
            "<p>You can find full resolution and even more photos on <a href='https://nkadu.smugmug.com/event/Tobias-Marries-Anika/LHM8GX'>our photographer's website</a>. The password is <span class='password'>090916tobianika</span> and the download password is <span class='password'>090916Temperance</span>. You can also order high quality prints from the site.</p><p>More photos from the weekend, can be found <a href='https://www.icloud.com/sharedalbum/#B0i5n8hH4DecEI'>here</a>.</p>" );
        addGallery(galleryArea, lang==="de" ? "Trauung" : "Ceremony", 61, "ceremony");
        addGallery(galleryArea, lang==="de" ? "Gruppenphotos" : "Group Pictures", 53, "group_pictures");
        addGallery(galleryArea, lang==="de" ? "Feier" : "Reception", 79, "reception");
        addGallery(galleryArea, lang==="de" ? "Samstag" : "Saturday", 31, "saturday");
        addGallery(galleryArea, lang==="de" ? "Sonntag" : "Sunday", 30, "sunday");
        addGallery(galleryArea, lang==="de" ? "Montag" : "Monday", 34, "monday");
        addGallery(galleryArea, lang==="de" ? "Hochzeitsreise" : "Honeymoon", 44, "honeymoon");

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
