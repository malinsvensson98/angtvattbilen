
<?php 
/*
// Kontrollera om användaren är inloggad 
if (!is_user_logged_in()){ 
    wp_redirect(esc_url(site_url('login'))); 
}
    get_header(); ?>
<br/><br/> <br/>    <br/><br/> <br/>    <br/><br/> <br/>

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


    <br/><br/> <br/>
    <br/><br/> <br/>
    <br/><br/> <br/>
    <br/><br/> <br/>
    <br/><br/> <br/>
    <br/><br/> <br/>
    <br/><br/> <br/>
    <br/><br/> <br/>
    <br/><br/> <br/>


    <?php
    get_footer(); 
    ?>

    