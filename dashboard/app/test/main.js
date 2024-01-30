function loadSection(section) {
    // Load the appropriate HTML file based on the section parameter
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("section-content").innerHTML = this.responseText;
      }
    };
    xhr.open("GET", section + ".php", true);
    xhr.send();
  }
// Load the default section (home) when the page loads
window.onload = function() {
    loadSection('home');
  };  

