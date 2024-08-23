let container_perfil = document.querySelector('#container-perfil');
var container_links = document.querySelector('#container-links');
var show_links = document.querySelector('#show-links');

var image = document.getElementById('image_perfil').addEventListener('change', function (e) {
    let tgt = e.target || window.event.srcElement;
    let files = tgt.files;
    let fr = new FileReader();

    fr.addEventListener("load", function () {
        document.getElementById('image_preview').src = fr.result;
    });

    fr.readAsDataURL(files[0]);
});

if (show_links) {
    if (show_links.checked) {
        container_links.style.display = 'block';
        container_perfil.style.height = "110%";
        show_links.addEventListener('click', function () {
            if (container_links.style.display == 'block') {
                container_links.style.display = 'none';
                container_perfil.style.height = "65%";
            } else {
                container_links.style.display = 'block';
                container_perfil.style.height = "110%";
            }
        });
    } else {
        container_links.style.display = 'none';
        show_links.addEventListener('click', function () {
            if (container_links.style.display == 'block') {
                container_links.style.display = 'none';
                container_perfil.style.height = "65%";
            } else {
                container_links.style.display = 'block';
                container_perfil.style.height = "110%";
            }
        });
    }
}
