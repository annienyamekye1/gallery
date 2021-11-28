<!doctype html>
<?php
include( "functions.php" );
 
$obj =  new Functions();
$result = $obj->get_genres(); 
$languages = $obj->get_languages();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/movies_app/images/favicon-1.ico">

    <title>Art Gallery System </title>

    <!-- Bootstrap core CSS -->
    <link href="/movies_app/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/movies_app/css/album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="navbar navbar-dark bg-primary">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Galleria</strong>
          </a>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          
          <h3 style="font-family: sans-serif"><b>Search Our Gallery</b></h3>
          <form method="get" action="movies.php">
            
            <p style="padding-top:40px;" class="lead text-muted">
             Select Artist nationality:  <select name="nationality" style="width:300px; height:30px; border-radius:10px;">
                <?php while( $rowl = sparql_fetch_array( $languages ) )
		{?>
                <option value="<?php echo($rowl["name"]); ?>"><?php echo($rowl["name"]); ?></option>
                <?php } ?>

              </select>
            </p>

            <p style="padding-top:40px;" class="lead text-muted">
             Select Artwork medium:  <select name="nationality" style="width:300px; height:30px; border-radius:10px;">
                <?php while( $rowl = sparql_fetch_array( $languages ) )
		{?>
                <option value="<?php echo($rowl["name"]); ?>"><?php echo($rowl["name"]); ?></option>
                <?php } ?>

              </select>
            </p>


            <p>
              <button class="btn btn-primary my-2" type="submit" style="width:150px">Search</button>
            </p>
            </form>
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
                <img src='<?php echo($row["link"]); ?>' data-src="holder.js/100x225" alt='Thumbnail' class="card-img-top"/>
                   <div class="card-body">
                  <p class="card-text"><?php echo($row["name"]); ?></p>
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

  <script src="/movies_appjs/holder.min.js"></script>
  </body>
</html>
