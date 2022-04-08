<?php
 function debug($var)
 {
     echo "<pre>";
     print_r($var);
     echo "</pre>";
     die();
 }
?>

<?php 
    /*
    * Template Name: article
    * Template Post Type: page, post
    */
?>

<?php

    // init var for template
    $categories =  get_the_category(get_the_ID());
    $ingredients = explode("\\" ,get_post_meta( get_the_ID(), 'ingredients', true ));
    $price = get_post_meta(get_the_ID(), 'price');
    $duration = get_post_meta( get_the_ID(), 'duration');
    $nb_parts = get_post_meta( get_the_ID(), 'nb_parts');
    $rate = get_post_meta( get_the_ID(), 'rate');
    $preparation = explode("\\" ,get_post_meta( get_the_ID(), 'preparation', true ));
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<?php 
        while (have_posts()) : the_post(); 
    ?>
    <div>
		<div class="header">
            <h2><?php the_title(); ?></h2>
            <div class="d-f">
                <?php foreach($categories as $categorie) : ?>
                        <p class='item'> <?= $categorie->name ?></p>
                <?php endforeach ?>
            </div>
        </div>
        <div class="pl-5 pr-5">
            <div class="infos_container">
                <div class="first">
                    <div class="details d-f">
                        <?php if(isset($duration)) : ?>
                            <p><strong>Temps </strong><br /> <span><?= $duration[0] ?></span></p>
                        <?php endif ?>
                        <?php if(isset($price)) : ?>
                            <p><strong>Prix </strong><br /> <span><?= $price[0] ?>€</span></p> 
                        <?php endif ?>
                        <?php if(isset($nb_parts)) : ?>
                            <p><strong>Nb pers </strong><br /> <span><?= $nb_parts[0] ?></span></p>
                        <?php endif ?>
                    </div>
                    <div>
                        <p><strong>Ingrédients :</strong></p>
                        <?php if(isset($ingredients)) : ?>
                            <ul>
                                <?php foreach ($ingredients as $ingredient) : ?>
                                    <li><?= $ingredient ?></li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </div>
                    <div class="rate">
                        Note :
                        <?php for($i=0; $i < 5 ; $i++) :?>
                            <?php if($i < $rate[0]): ?>
                                <div class="rate__block rate__block--active"></div>
                            <?php else : ?>
                                <div class="rate__block"></div>
                            <?php endif ?>
                        <?php endfor ?>
                    </div>
                </div>
                <div class="second">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('medium');
                    }
                    ?>
                </div>
            </div>
            <div class="preparation">
                <h3>Préparation</h3>
                <?php if(isset($preparation)) : ?>
                    <ul>
                        <?php foreach ($preparation as $key => $step) : ?>
                            
                            <li><span><?= $key + 1 ?></span><?= $step ?></li>
                        <?php endforeach ?>
                    </ul>
                <?php endif ?>
            </div>
            <?php 
                endwhile;
                endif; 

                if (comments_open() || get_comments_number()){
                    comments_template();
                }
            ?>
            <p class="date"><small><?php the_date(); ?></small></p>
        </div>
    </div>
<?php get_footer(); ?>




