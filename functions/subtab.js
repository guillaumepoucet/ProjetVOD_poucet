  function openSubTab(tabName, elmnt) {
    // Hide all elements with class="subtabcontent" by default */
    var i, subtabcontent, subtablinks;
    subtabcontent = document.getElementsByClassName("subtabcontent");
    for (i = 0; i < subtabcontent.length; i++) {
        subtabcontent[i].style.display = "none";
    }

    // Show the specific tab content
    document.getElementById(tabName).style.display = "block";

}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultSubOpen").click();