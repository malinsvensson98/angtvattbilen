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
    <!-- <link rel="shortcut icon" type="image/jpg" href="favicon.ico"/> -->
    <!-- API Theme Hook -->
    <?php wp_head(); ?>
    <!-- jQuery-->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script></head>
<body>
<header>
<nav class="mainmenu">
</nav>
</header>
<div class="inkop">
<?php 
// Kontrollera om användaren är inloggad 
if (!is_user_logged_in()){ 
    wp_redirect(esc_url(site_url('login'))); 
}
 ?>
<br/><br/> <br/>    <br/><br/> <br/>    <br/><br/> <br/>

<h1> Inköpslistan </h1> 
<br/><br/><br/>

<div class="divCreateBuy">
<label>Vi behöver köpa: </label><br/>
<input class="newTitle"><br/>
<button class="createBuy">Lägg till</button>
<br/><br/>
<br/><br/>
</div>

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
<div class="buyWork">
<ul id="myBuy">
<div class="youCantSeeThis">
<?php 

$userBuys = new WP_Query(array( 
    'post_type' => 'buy', 
    'posts_per_page' => -1, 
    'author' => get_current_user_id()
)); 

while($userBuys->have_posts()) {
     $userBuys->the_post(); ?> 
<li data-id="<?php the_ID();?>">

<button class="updateBuy"><i class="fa fa-arrow-right" aria-hidden="true"></i> Spara</button><br/>
<input readonly class="buyTitle" value="<?php echo esc_attr(get_the_title()); ?>"> 
<button class="editBuy"><i class="fa fa-pencil" aria-hidden="true"></i> </button>
<button class="deleteBuy"><i class="fa fa-trash-o" aria-hidden="true"></i> </button><br/><br/><br/>
</li>
<?php
}
?>
</div>
</ul>


    <br/><br/> <br/>
    <br/><br/> <br/>
    <br/><br/> <br/>

</div>
</div>
    <?php
    get_footer(); 
    ?>

    