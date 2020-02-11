<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors, Nagy Ákos">
    <title>ConfigBoard</title>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="img/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="img/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="img/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="img/manifest.json">
<link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="img/favicon.ico">
<meta name="msapplication-config" content="img/browserconfig.xml">
<meta name="theme-color" content="#563d7c">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="configboard.css" rel="stylesheet">
  </head>

<body>

<?php
include("functions.php")
?>

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?php echo get_xml_data($data, "brand") ?></a>
  <span><?php echo get_xml_data($data, "title") ?></span>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="nav sidebar-sticky">
        <ul class="nav flex-column">

          <?php
          $p_cnt = count($data->navitems->navitem);
          for($i = 0; $i < $p_cnt; $i++) {
            $navitem = $data->navitems->navitem[$i];
            //print_r($navitem);
          ?>
          <li class="nav-item">
            <a class="nav-link" href="#section-<?php echo $navitem->id; ?>">
              <span data-feather="<?php echo $navitem->data_feather; ?>"></span>
              <?php echo $navitem->data; ?>
            </a>
          </li>
          <?php } ?>

          <li class="nav-item">
            <a class="nav-link" href="#section-subbmit">
              <button type="button" class="btn btn-success">Subbmit</button>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <?php
      //create a section for each navitem
      $p_cnt_navi = count($data->navitems->navitem);
      for($i_navi = 0; $i_navi < $p_cnt_navi; $i_navi++) {
        $id_nav = $data->navitems->navitem[$i_navi]->id;
        $data_nav = $data->navitems->navitem[$i_navi]->data;
      ?>
        <div id="section-<?php echo $id_nav ?>" class="tab-content">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><?php echo $data_nav; ?></h1>
          </div>
          <?php
          //print variables for each navitem
          print_xml_navitem_vars($data, $id_nav);
           ?>
        </div>
      <?php } ?>

    </main>

  </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="configboard.js"></script></body>

</html>
