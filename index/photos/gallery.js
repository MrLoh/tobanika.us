var PASSWORD = "kenilworth"

var range = function(i=0, j) {
    return Array.apply(null, Array(j-i+1)).map(function (_, k) {return i+k;});
};

var picElement = function(src) {
    return "<img class='pic' src='" + src + "' />"
};

var loader = "<img src='../assets/lib/photoswipe-default-skin/preloader.gif' alt='loading images' style='width:15px; margin-left: 2em'>"

$(function() {
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
        $(".gallery").html(function() {
            return range(1, 5).reduce(function(prev, curr) {
                return prev + picElement("group_photos/tobanika_" + curr + ".jpg")
            }, "");
        })

        var pswpElement = document.querySelectorAll('.pswp')[0];
        $(".pic").click(function(e) {
            var items = [];
            $(this).parent().find(".pic").each(function() {
                var img = new Image()
                img.src = $(this).attr('src')
                var item = {
                    src: $(this).attr("src"),
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
