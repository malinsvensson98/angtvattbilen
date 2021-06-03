<!--
Theme name: Angtvattvattbilen
Author: Malin Svensson 
Year: 2021 
Course: Examensarbete, Mittuniversitetet -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ångtvättbilen västernorrland</title>
    <link rel="shortcut icon" type="image/jpg" href="favicon.ico"/>
    <!-- API Theme Hook -->
    <?php wp_head(); ?>
</head>
<body class="start">
<div class="mainFrontPage">

<br/><br/><br/><br/> <br/><br/> <br/><br/> 
<!-- Importera logotyp --> 
<img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" style="width:30%;">

<br/><br/>   <br/><br/> <br/><br/> 
<h1> Detta är sidan för utloggning (page-logout.php) </h1>

      <!-- Startar PHP och inleder med "The-loop"-->
      <?php 
    if (have_posts()){
        while(have_posts()){ 
            the_post();
            ?> <article>
            <h1> <?php the_title();?></h1> <?php 
            the_content();
            ?></article><?php
        }
    }


    ?>
<br/><br/> <br/><br/> <br/><br/> <br/><br/> <br/><br/> <br/><br/> <br/><br/> <br/><br/> 
</div>
</body>
</html>
