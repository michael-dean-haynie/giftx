function flipGlyph(){
    //console.log($(this).attr('data-glyph-target'));
    var id = $(this).attr('data-glyph-target');
    var target = $('#'+id);
    if (target.hasClass('glyphicon-chevron-down')){
        target.removeClass('glyphicon-chevron-down');
        target.addClass('glyphicon-chevron-up');
    } else if(target.hasClass('glyphicon-chevron-up')) {
        target.removeClass('glyphicon-chevron-up');
        target.addClass('glyphicon-chevron-down');
    }
}
$('.glyph-flip-click').click(flipGlyph);
