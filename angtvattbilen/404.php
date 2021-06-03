<?php 
// Kontrollera om användaren är inloggad 
if (!is_user_logged_in()){ 
    wp_redirect(esc_url(site_url('login'))); 
}
get_header(); ?> 
<div class="welcome">
<div class="sendHere"><br/><br/>
<h1> Sidan du försökte nå finns inte, vill du istället: </h1>
<br/><br/><br/><br/><br/>

<form action="https://www.malinsvensson.se/angtvattbilen/save/">
    <button class="block"> Spara arbete <i class="arrow"><i class="fa fa-arrow-right" aria-hidden="true"></i>
</i></button>
</form>
<form action="https://www.malinsvensson.se/angtvattbilen/view/">
    <button class="block"> Se lagrade arbeten <i class="arrow"><i class="fa fa-arrow-right" aria-hidden="true"></i>
</i></button>
</form>
<form action="https://www.malinsvensson.se/angtvattbilen/images/">
    <button class="block"> Bilduppladdning <i class="arrow"><i class="fa fa-arrow-right" aria-hidden="true"></i>
</i></button>
</form>
<form action="https://www.malinsvensson.se/angtvattbilen/user">
    <button class="block"> Min profil <i class="arrow"><i class="fa fa-arrow-right" aria-hidden="true"></i>
</i></button>
</form>
<form action="https://www.malinsvensson.se/angtvattbilen/members/">
    <button class="block"> Alla medarbetare <i class="arrow"><i class="fa fa-arrow-right" aria-hidden="true"></i>
</i></button>
</form>
</div>
</div>

    <!-- Startar PHP och inleder med "The-loop"-->
    <?php 
    get_header(); 
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
    <br/><br/><br/><br/><br/><br/><br/>

    <?php
    get_footer(); 
    ?>
</div>
