<?php
  $host = "localhost";
  $usuariobd = "jdelavega";
  $password = "j.r.delavega17@gmail.com";
  $database = "inas_estudiantes";
  $coneccion = mysql_connect($host, $usuariobd, $password);
  $tableName = "Usuario";
  //check if you are connected.
  if(!$coneccion){
    echo "Connection failed.\n";
  }
  $use_DB = mysql_select_db($database);
  $username = $_GET['user'];
?>
<html>
  <head>
    <title>IINAS Research</title>
    <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.css">
  </head>

  <body>
<!-- fixed top nav bar -->

      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=<?php echo "home2.php?user=".$username ?> >Home</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href=<?php echo "search-bar.php?user=".$username ?> >Search</a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href=<?php echo "deleteaccount.php?user=".$username ?> >Delete an account</a>
              </li>
              <li>
                <a href=<?php echo "createaccount.php?user=".$username ?> >Create an account</a>
              </li>
              <li>
                <a href = "login.html" onclick="">Sign out</a>
              </li>
            </ul>
            
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    <!-- Input for search and button -->

    <form name = "forma" method = "post" action = "search-result.php" >
      <div class="input-group" style="padding-left: 200px; padding-right: 200px">
            <span class="input-group-addon">Search by</span>
            <select id="lrd-universityName" class="form-control" name="searchby">
              <option value="faculty" title="faculty">Faculty</option>
              <option value="dept" title="dept">Department</option>
              <option value="name" title="name">Name</option>
              <option value="email" title="email">Email</option>
              <option value="sex" title="sex">Sex</option>
              <option value="research" title="research">Research</option>
              <option value="year" title="year">Research Year</option>
            </select>
      </div>
      <br />
      <div class="container" style="padding-left: 200px; padding-right: 200px">
        <div class="row">
          <div class="col-lg-4 col-lg-offset-4" id="rlc-search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="type here" name="this">
              <span class="input-group-btn">
                <input type = "hidden" name = "user" value ="<?php echo $username; ?>" >
                <button class="btn btn-default" type="submit" >Search</button>
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div>
    <form />

    <hr id="rlc-searchline">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.1.1-dist/js/bootstrap.js"></script>
  </body>
</html>
