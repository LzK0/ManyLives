var show_password = document.querySelector('#show-password');
var image = document.getElementById('image_perfil').addEventListener('change', function (e) {
    let tgt = e.target || window.event.srcElement;
    let files = tgt.files;
    let fr = new FileReader();

    fr.addEventListener("load", function () {
        document.getElementById('image_preview').src = fr.result;
    });

    fr.readAsDataURL(files[0]);
});
show_password.addEventListener('click', function () {
    let password = document.querySelector('#password');
    if (password.type === 'password') {
        password.type = 'text';
    } else {
        password.type = 'password';
    }
});