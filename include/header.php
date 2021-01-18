<html>

<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="/css/styles.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-info bg-info">
    <h5 class="text-white">Hospital Management System</h5>
    <div class="mr-auto">

    </div>
    <ul class="navbar-nav">
      <?php

      if (isset($_SESSION['admin'])) {

        $user = $_SESSION['admin'];

        echo '

       
        <li class="nav-item"><a href="#" class="nav-link text-white">' . $user . '</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>
          
             ';
      } else if (isset($_SESSION['doctor'])) {

        $user = $_SESSION['doctor'];

        echo '

       
        <li class="nav-item"><a href="#" class="nav-link text-white">' . $user . '</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>
          
             ';
      } else if (isset($_SESSION['patient'])) {

        $user = $_SESSION['patient'];

        echo '

       
        <li class="nav-item"><a href="#" class="nav-link text-white">' . $user . '</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>
          
             ';
      } else {

        echo '
            <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
            <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
            <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
            <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>
          ';
      }

      ?>

    </ul>

  </nav>

</body>

</html>