<!doctype html>
<?php
include( "functions-gallery.php" );
 
$obj =  new Functions();
$nationality = $_GET["nationality"];
$result = $obj->get_artists_by_nationality($nationality); 
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/movies_app/images/favicon-1.ico">

    <title>A Semantic Movie Dataset </title>

    <!-- Bootstrap core CSS -->
    <link href="/movies_app/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/movies_app/css/album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="/gallery.php" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Galleria</strong>
          </a>
        </div>
      </div>
    </header>

  <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading"><?php echo $nationality; ?> Artists</h1>
<p>&nbsp;</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
                <?php
		while( $row = sparql_fetch_array( $result ) )
		{
		?>            
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img src='person.jpg' height="50" data-src="holder.js/100x225" alt='Thumbnail' class="card-img-top"/>
                <div class="card-body">
                    <p class="card-text"><b>Name:</b><?php echo($row["name"]); ?></p>
                    <p class="card-text"><b>Nationality:</b><?php echo($row["nationality"]); ?></p>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>
        </div>
      </div>

    </main>
    
     <footer class="text-muted">
      <div class="container">
        <p class="float-right">
        <!--  <a href="#">Back to top</a> -->
        </p>
        <p></p>
      </div>
    </footer>

  <script src="/movies_app/js/holder.min.js"></script>
  </body>
</html>
