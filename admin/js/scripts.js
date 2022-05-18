function triggerClick(){
    document.querySelector('#file').click();
}
function filePreview(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector('#imagedisplay').setAttribute('src',e.target.result);
        };
        reader.readAsDataURL(e.files[0]);
    }
}