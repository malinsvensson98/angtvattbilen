<?php 
// Kontrollera om användaren är inloggad 
if (!is_user_logged_in()){ 
    wp_redirect(esc_url(site_url('login'))); 
}

    get_header(); 
    ?>

<br/><br/><br/><br/><br/><br/>    
<div class="aview">
<h1> <?php the_title();?> </h1>
<br/>
<br/><a href="<?php echo site_url('/work'); ?>">Tillbaka till översikt</a>
<br/><br/><br/>
</div>
<div class="viewSingle">
    <?php 
     if (have_posts()){
         while(have_posts()){ 
            the_post();?> 
            <ul>
            <li data-id="<?php the_ID(); ?>"> 
            <br/><br/>
            <h4>Titel</h4>
            <input readonly class="singleField"  class="updateTitle" value="<?php the_title(); ?>"> <br/><br/>
            <h4>Kundnamn</h4>
            <input readonly class="singleField" class="updateKundnamn" name="kundnamn" value="<?php echo esc_attr(the_field(kundnamn)); ?>"> <br/><br/>
              <h4>Adress</h4>
              <input readonly class="singleField" class="updateAdress" value="<?php echo esc_attr(the_field(adress)); ?>"> <br/><br/>
             <h4>Datum</h4>
             <input readonly class="singleField" class="updateDatum" value="<?php echo esc_attr(the_field(datum)); ?>"> <br/><br/>
             <h4>Typ av arbete</h4>
             <input readonly class="singleField" class="updateTypAvArbete" value="<?php echo esc_attr(the_field(typ_av_arbete)); ?>"> <br/><br/>
            <h4>Produkter</h4>
            <input readonly class="singleField" class="updateProdukter" value="<?php echo esc_attr(the_field(produkter)); ?>"> <br/><br/>
           <h4>Beskrivning</h4>
           <textarea readonly class="singleTextArea" class="updateBeskrivning"><?php echo esc_attr(the_field(beskrivning)); ?></textarea> <br/><br/>
            <h4>Skriven av</h4>
            <?php the_author();?> </li></ul>
            <?php
         }         

     }?>
</div>
</ul>


<br/><br/> <br/>
<br/><br/> <br/>


<?php get_footer(); ?>
