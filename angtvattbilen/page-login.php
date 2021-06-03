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
<br/><br/><br/><br/>
<!-- Importera logotyp --> 
<div class="loginPage">
<img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" style="width:30%;">
<br/><br/>
<?php 
// Kontrollera om användaren är inloggad 
if (is_user_logged_in()){ 
    wp_redirect(esc_url(site_url('/'))); 
}
?>

      <!-- Startar PHP och inleder med "The-loop"-->
      <?php 
    if (have_posts()){
        while(have_posts()){ 
            the_post();
            ?> <article>
             <?php 
            the_content();
            ?></article><?php
        }
    }


    ?>
</div>
</div>

</div>

</body>
</html>