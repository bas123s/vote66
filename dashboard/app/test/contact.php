<!-- Contact Page -->
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
    <title>My Website - Contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>

    <div class="container">
      <h1>Contact Us</h1>
      <p>Feel free to send us a message using the form below:</p>
      <form>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your email address">
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea class="form-control" id="message" placeholder="Enter your message"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </body>
</html>
