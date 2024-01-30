<!-- About Page -->
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
<!DOCTYPE html>
<html>
  <head>
    <title>My Website - About</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
   
    <div class="container">
      <h1>About Us</h1>
      <p>We are a small team of web developers who are passionate about building great websites.</p>
    </div>
  </body>
</html>
