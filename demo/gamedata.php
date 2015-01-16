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
    <title>LOL class preview | Game Data</title>

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
      <li><a href="demo.php">Summoner</a></li>
      <li><a href="stats.php">Stats</a></li>
      <li><a href="status.php">Server Status</a></li>
      <li><a href="champions.php">Champions</a></li>
      <li class="active"><a href="gamedata.php">Game data</a></li>
      </ul>
    </div><!--/.navbar-collapse -->
  </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <h1>Game data</h1>
    <p>Get localized information about items and champions using the id's of other pages</p>
    <p>
    <a class="btn btn-primary btn-lg" href="#champions" role="button">Champion &raquo;</a>
    <a class="btn btn-primary btn-lg" href="#items" role="button">Item &raquo;</a>
    <a class="btn btn-primary btn-lg" href="#mastery" role="button">mastery &raquo;</a>
    <a class="btn btn-primary btn-lg" href="#runes" role="button">runes &raquo;</a>
    <a class="btn btn-primary btn-lg" href="#spells" role="button">spells &raquo;</a>
    </p>
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

    <h1>Game Data</h1>

    <h2 id="champions"> Champion </h2>
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="#summonerbyname" aria-controls="summonerbyname" role="tab" data-toggle="tab">Champion List</a></li>
        <li role="presentation" class="active"><a href="#ftp" role="tab" data-toggle="tab">Champion Detail</a></li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="summonerbyname">
          
          <?php 
            $champion_list = $leagueclass->get_game_data('champion');
          ?>

<pre>
Call:
// 2 arguments:
// 1. REQUIRED: type to get all options are listed on this page
// 2. OPTIONAL: $id : ID of a specific node
// 3. OPTIONAL: datadetailtype: all,allytips,altimages,blurb,enemytips,image,info,lore,partype,passive,recommended,skins,spells,stats,tags
// Tip: Only use ARG 3 in combination with 2 to avoid slow loading
$champion_list = $leagueclass->get_game_data('champion');

Result data:

<?=print_r($champion_list, true)?>
</pre>

        </div>

        <div role="tabpanel" class="tab-pane active" id="ftp">
          
          <?php 
            $champion_detail = $leagueclass->get_game_data('champion', 412, 'lore,allytips');
          ?>

<pre>
Call:
// 2 arguments:
// 1. REQUIRED: type to get all options are listed on this page
// 2. OPTIONAL: $id : ID of a specific node
// 3. OPTIONAL: datadetailtype: all,allytips,altimages,blurb,enemytips,image,info,lore,partype,passive,recommended,skins,spells,stats,tags
// Tip: Only use ARG 3 in combination with 2 to avoid slow loading
$champion_detail = $leagueclass->get_game_data('champion', 412, 'lore,allytips');

Result data:

<?=print_r($champion_detail, true)?>
</pre>

        </div>

      </div>

    <?php $group = 'items'; ?>
    <h2 id="<?=$group?>"> <?=$group?> </h2>
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">
          <a href="#<?=$group?>list" role="tab" data-toggle="tab"><?=$group?> List</a>
        </li>
        <li role="presentation" class="active">
          <a href="#<?=$group?>detail" role="tab" data-toggle="tab"><?=$group?> Detail</a>
        </li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="<?=$group?>list">
          
          <?php 
            $item = $leagueclass->get_game_data('item');
          ?>

<pre>
Call:
// 2 arguments:
// 1. REQUIRED: type to get all options are listed on this page
// 2. OPTIONAL: $id : ID of a specific node
// 3. OPTIONAL: datadetailtype: all,allytips,altimages,blurb,enemytips,image,info,lore,partype,passive,recommended,skins,spells,stats,tags
// Tip: Only use ARG 3 in combination with 2 to avoid slow loading
$item = $leagueclass->get_game_data('item');

Result data:

<?=print_r($item, true)?>
</pre>

        </div>

        <div role="tabpanel" class="tab-pane active" id="<?=$group?>detail">
          
          <?php 
            $item_detail = $leagueclass->get_game_data('item', 3092, 'gold,inStore,sanitizedDescription');
          ?>

<pre>
Call:
// 2 arguments:
// 1. REQUIRED: type to get all options are listed on this page
// 2. OPTIONAL: $id : ID of a specific node
// 3. OPTIONAL: all,colloq,consumeOnFull,consumed,depth,from,gold,groups,hideFromAll,image,inStore,into,maps,requiredChampion,sanitizedDescription,specialRecipe,stacks,stats,tags,tree
// Tip: Only use ARG 3 in combination with 2 to avoid slow loading
$item_detail = $leagueclass->get_game_data('item', 3092, 'gold,inStore,sanitizedDescription');

Result data:

<?=print_r($item_detail, true)?>
</pre>

        </div>

      </div>

    </div>

    <?php $group = 'mastery'; ?>
    <h2 id="<?=$group?>"> <?=$group?> </h2>
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">
          <a href="#<?=$group?>list" role="tab" data-toggle="tab"><?=$group?> List</a>
        </li>
        <li role="presentation" class="active">
          <a href="#<?=$group?>detail" role="tab" data-toggle="tab"><?=$group?> Detail</a>
        </li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="<?=$group?>list">
          
          <?php 
            $mastery = $leagueclass->get_game_data('mastery');
          ?>

<pre>
Call:
// 2 arguments:
// 1. REQUIRED: type to get all options are listed on this page
// 2. OPTIONAL: $id : ID of a specific node
// 3. OPTIONAL: datadetailtype: all,allytips,altimages,blurb,enemytips,image,info,lore,partype,passive,recommended,skins,spells,stats,tags
// Tip: Only use ARG 3 in combination with 2 to avoid slow loading
$mastery = $leagueclass->get_game_data('mastery');

Result data:

<?=print_r($mastery, true)?>
</pre>

        </div>

        <div role="tabpanel" class="tab-pane active" id="<?=$group?>detail">
          
          <?php 
            $mastery_detail = $leagueclass->get_game_data('mastery', 4353, 'image,prereq,ranks,sanitizedDescription');
          ?>

<pre>
Call:
// 2 arguments:
// 1. REQUIRED: type to get all options are listed on this page
// 2. OPTIONAL: $id : ID of a specific node
// 3. OPTIONAL: all,image,prereq,ranks,sanitizedDescription
// Tip: Only use ARG 3 in combination with 2 to avoid slow loading
$mastery_detail = $leagueclass->get_game_data('mastery', 4353, 'image,prereq,ranks,sanitizedDescription');

Result data:

<?=print_r($mastery_detail, true)?>
</pre>

        </div>

      </div>

    </div>

    <?php $group = 'runes'; ?>
    <h2 id="<?=$group?>"> <?=$group?> </h2>
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">
          <a href="#<?=$group?>list" role="tab" data-toggle="tab"><?=$group?> List</a>
        </li>
        <li role="presentation" class="active">
          <a href="#<?=$group?>detail" role="tab" data-toggle="tab"><?=$group?> Detail</a>
        </li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="<?=$group?>list">
          
          <?php 
            $rune = $leagueclass->get_game_data('rune');
          ?>

<pre>
Call:
// 2 arguments:
// 1. REQUIRED: type to get all options are listed on this page
// 2. OPTIONAL: $id : ID of a specific node
// 3. OPTIONAL: datadetailtype: all,allytips,altimages,blurb,enemytips,image,info,lore,partype,passive,recommended,skins,spells,stats,tags
// Tip: Only use ARG 3 in combination with 2 to avoid slow loading
$rune = $leagueclass->get_game_data('rune');

Result data:

<?=print_r($rune, true)?>
</pre>

        </div>

        <div role="tabpanel" class="tab-pane active" id="<?=$group?>detail">
          
          <?php 
            $rune_detail = $leagueclass->get_game_data('rune', 5235, 'all');
          ?>

<pre>
Call:
// 2 arguments:
// 1. REQUIRED: type to get all options are listed on this page
// 2. OPTIONAL: $id : ID of a specific node
// 3. OPTIONAL: all,colloq,consumeOnFull,consumed,depth,from,gold,hideFromAll,image,inStore,into,maps,requiredChampion,sanitizedDescription,specialRecipe,stacks,stats,tags
// Tip: Only use ARG 3 in combination with 2 to avoid slow loading
$rune_detail = $leagueclass->get_game_data('mastery', 5235, 'all');

Result data:

<?=print_r($rune_detail, true)?>
</pre>

        </div>

      </div>

    </div>

    <?php $group = 'spells'; ?>
    <h2 id="<?=$group?>"> <?=$group?> </h2>
    <div role="tabpanel">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">
          <a href="#<?=$group?>list" role="tab" data-toggle="tab"><?=$group?> List</a>
        </li>
        <li role="presentation" class="active">
          <a href="#<?=$group?>detail" role="tab" data-toggle="tab"><?=$group?> Detail</a>
        </li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane" id="<?=$group?>list">
          
          <?php 
            $spells = $leagueclass->get_game_data('summoner-spell');
          ?>

<pre>
Call:
// 2 arguments:
// 1. REQUIRED: type to get all options are listed on this page
// 2. OPTIONAL: $id : ID of a specific node
// 3. OPTIONAL: datadetailtype: all,allytips,altimages,blurb,enemytips,image,info,lore,partype,passive,recommended,skins,spells,stats,tags
// Tip: Only use ARG 3 in combination with 2 to avoid slow loading
$spells = $leagueclass->get_game_data('summoner-spell');

Result data:

<?=print_r($spells, true)?>
</pre>

        </div>

        <div role="tabpanel" class="tab-pane active" id="<?=$group?>detail">
          
          <?php 
            $spell_detail = $leagueclass->get_game_data('summoner-spell', 12, 'all');
          ?>

<pre>
Call:
// 2 arguments:
// 1. REQUIRED: type to get all options are listed on this page
// 2. OPTIONAL: $id : ID of a specific node
// 3. OPTIONAL: all,colloq,consumeOnFull,consumed,depth,from,gold,hideFromAll,image,inStore,into,maps,requiredChampion,sanitizedDescription,specialRecipe,stacks,stats,tags
// Tip: Only use ARG 3 in combination with 2 to avoid slow loading
$spell_detail = $leagueclass->get_game_data('summoner-spell', 12, 'all');

Result data:

<?=print_r($spell_detail, true)?>
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
