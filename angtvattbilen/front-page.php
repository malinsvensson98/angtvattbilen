<?php 
// Kontrollera om användaren är inloggad 
if (!is_user_logged_in()){ 
    wp_redirect(esc_url(site_url('login'))); 
}
    get_header(); ?>

<br/><br/> <br/><br/><br/><br/><br/>
<div class="welcome">
<h1> Välkommen 

<!-- För att läsa ut namnet på den inloggade -->
<?php global $current_user; wp_get_current_user(); ?>
<?php if ( is_user_logged_in() ) { 
 echo $current_user->user_firstname . "!"; } 
else { wp_loginout(); } ?></h1>


<h2><i> Vad vill du göra idag? </i></h2><br/>


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
<form action="https://www.malinsvensson.se/angtvattbilen/buy/">
    <button class="block"> Inköpslistan <i class="arrow"><i class="fa fa-arrow-right" aria-hidden="true"></i>
</i></button>
</form>
<form action="https://www.malinsvensson.se/angtvattbilen/members/">
    <button class="block"> Alla medarbetare <i class="arrow"><i class="fa fa-arrow-right" aria-hidden="true"></i>
</i></button>
</form>


<br/><br/> <br/>
<br/><br/> <br/><br/>



</div>

    <?php
    get_footer(); 
    ?>

    