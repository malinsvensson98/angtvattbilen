
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

<?php 
// Kontrollera om användaren är inloggad 
if (!is_user_logged_in()){ 
    wp_redirect(esc_url(site_url('login'))); 
}
?>
<br/><br/> <br/><br/><br/><br/>    

<div class="aview">

<h1> Arkiv </h1>
<br/><br/>
<a href="https://www.malinsvensson.se/angtvattbilen/view/?">Tillbaka till de senast sparade arbetena</a>
<br/> <br/><br/><br/> <br/>  

    <?php 


    // För att ladda in mina egna inlägg
    $viewWork = new WP_Query(array(
        // Vad vi vill fråga efter i databasen 
        'posts_per_page' => -1, // Visar allt innehåll
        'post_type' => 'work',
        'has_archive' => true
    )); ?>

<div style="overflow-x:auto;">

    <!-- För att skriva ut rubriker till alla rader i tabellen -->
    <table class="view"> 
     <tr class="label">
        <td> Kundnamn </td>
        <td> Adress </td>
        <td> Datum </td>
        <td> Typ av arbete </td>
        <td> Produkter </td>
        <td> Beskrivning </td>
        <td> Inlagd av: </td>
        <td>  </td>
     </tr>
 
     <?php 
     // Loopa för att skriva ut inläggen 
     while($viewWork->have_posts()) { 
     $viewWork->the_post();?> 
     <tr> 
 
     <td><a href="<?php the_permalink() ?>"><?php the_field(kundnamn)?></a></td>
     <td><?php the_field(adress)?><br/> 
     <?php the_field(postnummer_stad)?></td>
     <td><?php the_field(datum)?></td>
     <td><?php the_field(typ_av_arbete)?></td>
     <td><?php echo wp_trim_words(get_field(produkter), 4)?></td>
     <td><a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_field(beskrivning), 4)?></td>
     <td><?php the_author() ?></td>
 
     <!-- Läser ut knapp för att radera -->
    <td><ul><li data-id="<?php the_ID(); ?>">
    <button class="deleteWork"> Radera </button>
    </td>
    </tr>
    <?php
     };     
     ?>
     </table> 
    </div>

    <br/> <br/>
    <?php echo paginate_links(); ?>
    <br/> <br/><br/>
    <br/><br/> <br/>
    <br/><br/> <br/>

</div>

    <?php
    get_footer(); 
    ?>

    