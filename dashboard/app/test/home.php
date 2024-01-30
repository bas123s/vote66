<!-- Navigation Bar -->
<!DOCTYPE html>
<html>
  <head>
    <title>My Website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">My Website</a>
        </div>
        <ul class="nav navbar-nav">

          <li><a href="#" onclick="loadSection('about')">About</a></li>
          <li><a href="#" onclick="loadSection('contact')">Contact</a></li>
        </ul>
      </div>
    </nav>

    <!-- Section Content will be loaded here -->
    <div id="section-content"></div>

    <script src="main.js"></script>
  </body>
</html>
