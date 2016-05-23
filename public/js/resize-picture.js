function resizePicture(){
    var width = document.getElementById('resize-img-container').offsetWidth;
    console.log(width);
    $('#resize-img-container').find('img').height(width+"px");
}
$( window ).resize(function(){
    resizePicture();
});
$( document ).ready(function(){
    resizePicture();
});

