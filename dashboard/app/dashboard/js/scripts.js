// function loadSection(section) {
//   // Load the appropriate HTML file based on the section parameter
//   var xhr = new XMLHttpRequest();
//   xhr.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       // Set the HTML content and show the section
//       document.getElementById("section-content").innerHTML = this.responseText;
//       document.getElementById("section-content").style.opacity = 1;
//     }
//   };
//   xhr.open("GET", section + ".php", true);
//   xhr.send();
// }

// function loadSection(section) {
//   // Load the appropriate HTML file based on the section parameter
//   var xhr = new XMLHttpRequest();
//   xhr.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       var sectionContent = document.getElementById("section-content");
//       sectionContent.innerHTML = this.responseText;
//       sectionContent.classList.add("show");
//     }
//   };
//   xhr.open("GET", section + ".php", true);
//   xhr.send();
// }

function loadSection(section) {
  // Load the appropriate HTML file based on the section parameter
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Add the "animate__animated" and "animate__fadeIn" classes to the section-content element
      document.getElementById("section-content").classList.add("animate__animated", "animate__fadeInUp");
      // Set a timeout to remove the animation classes after the animation has finished
      setTimeout(function() {
        document.getElementById("section-content").classList.remove("animate__animated", "animate__fadeInUp");
      }, 1000);
      // Replace the content of the section-content element with the loaded HTML
      document.getElementById("section-content").innerHTML = this.responseText;
    }
  };
  xhr.open("GET", section + ".php", true);
  xhr.send();
}

  // Load the default section (home) when the page loads
  window.onload = function() {
    loadSection('map');
  };  
  
 