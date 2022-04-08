<?php

class RecipesMetaBox {

    public static function register() {
        add_action('add_meta_boxes', [self::class, 'add']);
        add_action('save_post', [self::class, 'save']);
        add_action('edit_post', [self::class, 'edit']);
        add_action('admin_menu', [self::class, 'remove_meta_boxes']);
        add_action('update_option', [self::class, 'turn_on_comments']);
    }

    public static function add (){
        add_meta_box(
            'ingredients_preparations',
            'Ingrédients et préparation',
            [self::class, 'ingredients_preparation'],
            'recipe',
        );
        add_meta_box(
            'nb_people',
            'Nombre de personnes',
            [self::class, 'nb_people'],
            'recipe',
        );
        add_meta_box(
            'price',
            'Prix (en €)',
            [self::class, 'price'],
            'recipe',
        );
        add_meta_box(
            'rate',
            'Note (sur 5)',
            [self::class, 'rate'],
            'recipe',
        );
        add_meta_box(
            'time',
            'Temps de préparation',
            [self::class, 'time'],
            'recipe',
        );
    }

    // Sets the comments to allowed by default
    function turn_on_comments() { 
        update_option('default_comment_status', 'open');
    } 
    
    
    // Hides the metabox in the edit screen (replace post-type-here with your custom post type)
    function remove_meta_boxes() {
        remove_meta_box('commentstatusdiv', 'recipe', 'normal');
    }

    function ingredients_preparation(){
        $ingredients = get_post_meta(get_the_ID(), 'ingredients', true);
        $preparation = get_post_meta(get_the_ID(), 'preparation', true);
        ?>
            <label for="ingredients">ingrédients (séparer avec des "\")</label>
            <textarea name="ingredients" id="ingredients" style="width: 100%; height: 50px"><?php echo $ingredients; ?></textarea>
            <label for='preparation'>étapes de préparation (séparer avec des "\")</label>
            <textarea name="preparation" id="preparation" style="width: 100%; height: 50px"><?php echo $preparation; ?></textarea>
        <?php
    }
    
    function nb_people(){
        $value = get_post_meta(get_the_ID(), 'nb_parts', true);
        ?>
            <input type="number" name="nb_parts" id="nb_parts" value="<?php echo $value ?>"/>
        <?php
    }
    
    function price(){
        $value = get_post_meta(get_the_ID(), 'price', true);
        ?>
            <input type="number" min="0" name="price" id="price" value="<?php echo $value ?>" />
        <?php
    }
    
    function rate(){
        $value = get_post_meta(get_the_ID(), 'rate', true);
        ?>
            <input type="number" min="0" max="5" name="rate" id="rate" value="<?php echo $value ?>"/>
        <?php
    }
    
    function time(){
        $duration = get_post_meta(get_the_ID(), 'duration', true);
        $hours = explode("h" , $duration)[0];
        $minutes = explode("m", explode("h", $duration)[1])[0];
        ?>
            <form id='duration'>
                <input id='h' name='h' type='number' min='0' max='24' value=<?php echo $hours ?>>
                <label for='h'>h</label>
                <input id='m' name='m' type='number' min='0' max='59' value=<?php echo $minutes ?>>
                <label for='m'>m</label>
            </form>
        <?php
    }

    function save($recipe_id){
        if (array_key_exists('nb_parts', $_POST)){
            if ($_POST['nb_parts'] == ""){ 
                delete_post_meta($recipe_id, 'nb_parts');
            }else{
                update_post_meta($recipe_id, 'nb_parts', $_POST['nb_parts']);
            }
        };
        if (array_key_exists('ingredients', $_POST)){
            if($_POST['ingredients'] == ""){
                delete_post_meta($recipe_id, 'ingredients');
            }else{
                update_post_meta($recipe_id, 'ingredients', $_POST['ingredients']);
            }
        };
        if (array_key_exists('preparation', $_POST)){
            if($_POST['preparation'] == ""){
                delete_post_meta($recipe_id, 'preparation');
            }else{
                update_post_meta($recipe_id, 'preparation', $_POST['preparation']);
            }
        };
        if (array_key_exists('price', $_POST)){
            if($_POST['price'] == ""){
                delete_post_meta($recipe_id, 'price');
            }else{
                update_post_meta($recipe_id, 'price', $_POST['price']);
            }
        };
        if (array_key_exists('rate', $_POST)){
            if($_POST['rate'] == ""){
                delete_post_meta($recipe_id, 'rate');
            }else{
                update_post_meta($recipe_id, 'rate', $_POST['rate']);
            }
        };
        if (array_key_exists('h', $_POST) || array_key_exists('m', $_POST)){
           $duration = $_POST['h'] . ($_POST['h'] > 0 ? 'h' : "") . $_POST['m'] . ($_POST['m'] > 0 ? 'm' : "");
           if($_POST['m'] == "" && $_POST["h"] == ""){
            delete_post_meta($recipe_id, 'duration');
           }else{
            update_post_meta($recipe_id, 'duration', $duration);
           }
           
        };
    }
}