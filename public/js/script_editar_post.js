var image = document.getElementById('image-post').addEventListener('change', function (e) {
    let tgt = e.target || window.event.srcElement;
    let files = tgt.files;
    let fr = new FileReader();

    fr.addEventListener("load", function () {
        document.getElementById('image_preview').style.display = 'block';
        document.getElementById('image_preview').src = fr.result;
    });

    fr.readAsDataURL(files[0]);
});