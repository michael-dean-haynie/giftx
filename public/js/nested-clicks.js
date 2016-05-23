$('.nested-click').click(function(event){
    var href = $(this).attr("href");
    window.location.replace(href);

});