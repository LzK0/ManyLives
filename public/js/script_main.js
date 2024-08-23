// Efeito da sidebar
var sidebar = document.getElementById("sidebar");
var name_show = document.getElementById("user-name"); 
var btn_toggle = document.getElementById("sidebar-toggle").addEventListener("click", function () {
    sidebar.classList.toggle('sidebar-move');
    this.classList.toggle('toggle-move');
    name_show.classList.toggle('show-name');
});