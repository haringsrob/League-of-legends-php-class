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
    <title>LOL class preview | Summoner data</title>

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
      <li><a href="index.php">Intro</a></li>
      <li class="active"><a href="demo.php">Summoner</a></li>
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
    <h1>Summoner Data</h1>
    <p>Documentation about the summoner data calls. This allows you to get summoner name, summoner masteries, and summoner runes.</p>
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
    'KEY',
    'euw',
    'en_US'
  );

  ?>

  <div class="container" id="content">

    <h1>Summoner Data</h1>

    <h2> Get summoner by name </h2>
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#summonerbyname" aria-controls="summonerbyname" role="tab" data-toggle="tab">Base</a></li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="summonerbyname">
          
          <?php 
            $summoner = 'dufji';
            $summonerdata = $leagueclass->getsummoner($summoner);
          ?>

<pre>
Call:

$summoner = 'dufji';
$summonerdata = $leagueclass->getsummoner($summoner);

Result data:

<?=print_r($summonerdata, true)?>
</pre>

        </div>
      </div>
    </div>

    <h2> Get summoner by ID (using the above data) </h2>
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#summonerbyid" aria-controls="summonerbyid" role="tab" data-toggle="tab">Base</a></li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="summonerbyid">
          
          <?php 
          $summonerdatabyid = $leagueclass->getsummonerbyid($summonerdata->$summoner->id);
          ?>

<pre>
Call: 
// $summoner references to the summoner used above.
// This call accepts multiple id's
$summonerdatabyid = $leagueclass->getsummonerbyid($summonerdata->$summoner->id);

Result data:

<?=print_r($summonerdatabyid, true)?>
</pre>

        </div>
      </div>
    </div>

    <h2> Get extended summoner data </h2>
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist" data-tabs="tabs">
        <li role="presentation" class="active">
          <a href="#name" role="tab" data-toggle="tab">Name</a>
        </li>
        <li role="presentation">
          <a href="#masteries" role="tab" data-toggle="tab">Masteries</a>
        </li>
        <li role="presentation">
          <a href="#runes" role="tab" data-toggle="tab">Runes</a>
        </li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="masteries">
          
          <?php
          $data_masteries = $leagueclass->getsummonerdata($summonerdata->$summoner->id, 'masteries');
          ?>

<pre>
Call: 
// $summoner references to the summoner used above.
// This call accepts multiple id's
// Possible options are: Masteries, Name, Runes
$data_masteries = $leagueclass->getsummonerdata($summonerdata->$summoner->id, 'masteries');

Result data:

<?=print_r($data_masteries, true)?>
</pre>

        </div>

        <div role="tabpanel" class="tab-pane active" id="name">
          
          <?php
          $data_name = $leagueclass->getsummonerdata($summonerdata->$summoner->id, 'name');
          ?>

<pre>
Call: 
// $summoner references to the summoner used above.
// This call accepts multiple id's
// Possible options are: Masteries, Name, Runes
$data_name = $leagueclass->getsummonerdata($summonerdata->$summoner->id, 'name');

Result data:

<?=print_r($data_name, true)?>
</pre>

        </div>

        <div role="tabpanel" class="tab-pane" id="runes">
          
          <?php
          $data_runes = $leagueclass->getsummonerdata($summonerdata->$summoner->id, 'runes');
          ?>

<pre>
Call: 
// $summoner references to the summoner used above.
// This call accepts multiple id's
// Possible options are: Masteries, Name, Runes
$data_runes = $leagueclass->getsummonerdata($summonerdata->$summoner->id, 'runes');

Result data:

<?=print_r($data_runes, true)?>
</pre>

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
