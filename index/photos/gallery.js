var PASSWORD = "kenilworth"

var range = function(i=0, j) {
    return Array.apply(null, Array(j-i+1)).map(function (_, k) {return i+k;});
};

var colSortRange = function(n, ncol) {
    var array = [];
    for (var i=1; i<=ncol; i++) {
        var k = i;
        while (k <= n) {
            array.push(k);
            k += ncol;
        }
    }
    return array;
};

var picElement = function(src) {
    return "<img class='gallery-pic' src='" + src + "' />"
};

var loader = "<img src='../assets/lib/photoswipe-default-skin/preloader.gif' alt='loading images' style='width:15px; margin-left: 2em'>"

$(function() {
    var lang = $(".lang-link a").text().trim().toLowerCase() === "de" ? "en" : "de"

    window.location.href.split("?")[1].split("&").map(function(e) {
        if (e.split("=")[0] == "pw" && e.split("=")[1] == PASSWORD) {
            $("#getpics").parent().remove()
            loadImages();
        }
    })

    $("#getpics").click(function(e) {
        e.preventDefault();
        if ($("#password").val() == PASSWORD) {
            $(this).parent().remove();
            loadImages();
        } else {
            alert("worng password");
        }
    })

    function loadImages() {
        $(".gallery").before("<h2>Ceremony</h2>");
        $(".gallery").html(function() {
            return range(1, 52).reduce(function(prev, curr) {
                return prev + picElement("img/ceremony_" + curr + ".small.jpg")
            }, "");
        })

        setTimeout(function() {
            console.log("masonry");
            var msnry = new Masonry( ".gallery", {
                itemSelector: ".gallery-pic",
                columnWidth: ".gallery-pic",
                fitWidth: true
            });
        }, 1000);

        var pswpElement = document.querySelectorAll('.pswp')[0];
        $(".gallery-pic").click(function(e) {
            var items = [];
            $(this).parent().find(".gallery-pic").each(function() {
                var img = new Image();
                img.src = $(this).attr('src').split(".")[0] + ".jpg";
                var item = {
                    src: img.src,
                    w: img.naturalWidth,
                    h: img.naturalHeight
                }
                items.push(item)
            })

            var index = $(this).index();
            console.log(index)
            var options = {
                index: index,
                bgOpacity: 0.85,
                showHideOpacity: true,
                closeOnScroll: false
            };
            var lightBox = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
            lightBox.init();
        })
    }
})
