<?php
  // Check if the section parameter is set
  if(isset($_GET['section'])) {
    $section = $_GET['section'];
  } else {
    // Default to the home section
    $section = 'home';
  }

  // Include the appropriate HTML file based on the section parameter
  switch($section) {
    case 'about':
      include('about.html');
      break;
    case 'contact':
      include('contact.html');
      break;
    default:
      include('home.html');
      break;
  }
?>