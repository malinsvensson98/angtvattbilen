<?php 
// Kontrollera om användaren är inloggad 
if (!is_user_logged_in()){ 
    wp_redirect(esc_url(site_url('login'))); 
}
    get_header(); 
    ?>


<br/><br/> <br/>    <br/><br/> <br/> 
<div class="save">
<h1> Edit </h1>


    
    <!-- Startar PHP och inleder med "The-loop"-->
    <?php 
    get_header(); 
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


<div class="saveWork">
<input placeholder="Titel" class="newTitle"> <br/><br/> 
<input placeholder="Kundnamn" class="newKundnamn" name="newKundnamn"> <br/><br/>
<input placeholder="Adress" class="newAdress"> <br/><br/>
<input placeholder="Datum" class="newDatum"> <br/><br/>
<input placeholder="Typ av arbete" class="newTypAvArbete"> <br/><br/>
<input placeholder="Produkter" class="newProdukter"> <br/><br/>
<textarea placeholder="Beskrivning" class="newBeskrivning"></textarea> <br/><br/>
<button class="submitWork"> Publicera </button>


    <br/><br/> <br/>
    <br/><br/> <br/>

<?php
    // För att ladda in mina egna inlägg
    $viewWork = new WP_Query(array(
        // Vad vi vill fråga efter i databasen 
        'posts_per_page' => 1, // Visar allt innehåll
        'post_type' => 'work',
        'has_archive' => true
    )); ?>
    <div style="overflow-x:auto;">
-->

</div>
</ul>
</div>
<br/><br/> <br/>
<br/><br/> <br/>

</div>
<?php
get_footer(); 
?>

    