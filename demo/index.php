<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  if (!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOL class preview | Documentation index</title>

      <!-- Bootstrap -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="http://bootswatch.com/united/bootstrap.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">LOL PHP CLASS</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right ">
      <li class="active"><a href="index.php">Intro</a></li>
      <li><a href="demo.php">Summoner</a></li>
      <li><a href="stats.php">Stats</a></li>
      <li><a href="status.php">Server Status</a></li>
      <li><a href="champions.php">Champions</a></li>
      <li><a href="gamedata.php">Game data</a></li>
      </ul>
    </div><!--/.navbar-collapse -->
  </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <h1>League of legends php class</h1>
    <p>Documentation for the league of legends php class, this class makes it easy to use the system.</p>
    <p><a class="btn btn-primary btn-lg" href="#content" role="button">Learn more &raquo;</a></p>
  </div>
</div>


  <?php
  // Load the file
  include_once('LOL/Base.php');

  // Use the file
  use LOL\base;

  // Start the class
  $leagueclass = new base\LOL();

  $leagueclass->setconfig(
    '89de2268-297a-4007-bcb7-875e077b10bf',
    'euw',
    'en_US'
  );

  ?>

  <div class="container" id="content">

    <h1>Documentation</h1>

    <h2> Requirements </h2>
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#summonerbyname" aria-controls="summonerbyname" role="tab" data-toggle="tab">Base</a></li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="summonerbyname">
          
          You need to create your api key on the following url: <a href="https://developer.riotgames.com" target="_blank">Riot developer site</a>

        </div>
      </div>
    </div>

    <h2> Installation </h2>
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#install" role="tab" data-toggle="tab">Base</a></li>
        <li role="presentation"><a href="#regions" role="tab" data-toggle="tab">Regions</a></li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="install">
          
          To install the script simply move the LOL folder to your server.

          The script is conform the PSR regulations so it can be autoloaded.

          If you are using the script in a standalone site you can include it like this:

          <pre>
// Load the file
include_once('LOL/Base.php');

// Use the file
use LOL\base;

// Start the class
$leagueclass = new base\LOL();

$leagueclass->setconfig(
  'API_KEY',
  'REGION', //(see regions tab)
  'en_US'
);
        </pre>

        </div>

        <div class="tab-pane" id="regions">
          <table class="table table-bordered table-striped" style="width:450px;">
              <thead>
              <tr>
                  <th style="width:100px;">Region</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <td>br</td>
              </tr>
              <tr>
                  <td>eune</td>
              </tr>
              <tr>
                  <td>euw</td>
              </tr>
              <tr>
                  <td>kr</td>
              </tr>
              <tr>
                  <td>las</td>
              </tr>
              <tr>
                  <td>lan</td>
              </tr>
              <tr>
                  <td>na</td>
              </tr>
              <tr>
                  <td>oce</td>
              </tr>
              <tr>
                  <td>tr</td>
              </tr>
              <tr>
                  <td>ru</td>
              </tr>
              </tbody>
          </table>
        </div>
      </div>
    </div>

    <h2> Usage </h2>
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#summonerbyname" aria-controls="summonerbyname" role="tab" data-toggle="tab">Base</a></li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="summonerbyname">
          
          Please see the other menu items for usage instructions:
          <ul>
          <li><a href="demo.php">Summoner</a></li>
          <li><a href="stats.php">Stats</a></li>
          <li><a href="status.php">Server Status</a></li>
          <li><a href="champions.php">Champions</a></li>
          <li><a href="gamedata.php">Game data</a></li>
          </ul>

        </div>
      </div>
    </div>


  </div>


<script>
jQuery(document).ready(function ($) {
        $('.nav-tabs').tab();
    });
</script>

</body>
</html>