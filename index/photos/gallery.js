var range = function(i=0, j) {
    return Array.apply(null, Array(j-i+1)).map(function (_, k) {return i+k;});
};

var picElement = function(src) {
    return "<img class='pic' src='" + src + "' />"
};

$(function() {


    $(".gallery").html(function() {
        // console.log(range(1,5)).map(function(i) {return "group_photos/tobanika_" + i + ".jpg"})
        return picElement("group_photos/tobanika_1.jpg") + picElement("group_photos/tobanika_2.jpg")
    })

    var pswpElement = document.querySelectorAll('.pswp')[0];
    $(".pic").click(function(e) {
        var items = [];
        $(this).parent().find(".pic").each(function() {
            var item = {
                src: $(this).attr("src"),
                w: 640,
                h: 426
            }
            items.push(item)
        })

        var index = $(this).index($(this).parent());
        var options = {
            index: index,
            bgOpacity: 0.85,
            showHideOpacity: true,
            closeOnScroll: false
        };
        var lightBox = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        lightBox.init();
    })
})
