function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    document.getElementById("svg-user").classList.toggle("svg-show");
    document.getElementById("span-user").classList.toggle("span-show");
}
  
// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
                document.getElementById("svg-user").classList.remove("svg-show");
                document.getElementById("span-user").classList.remove("span-show");    
            }
        }
    }
}