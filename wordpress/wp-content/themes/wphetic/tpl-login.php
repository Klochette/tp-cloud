<?php
/*
Template Name: Connexion
*/
$error = false;
if(!empty($_POST)){
    $user = wp_signon($_POST);
    if (is_wp_error($user)){
        $error = $user->get_error_message();
    } else {
        header('location: /wordpress' );
    }
} else {
    $user = wp_get_current_user();
    if ($user->ID != 0){
        header('location: /wordpress');
    }
}

?>
<?php get_header();?>

<div class="container">
    <div class="container__left">
    </div>
    <div class="container__right">
        <div class="right__login">
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" >
                <div class="login__input">
                    <label for="user_login">Username</label>
                    <input type="text" name="user_login" id="user_login">
                </div>

                <div class="login__input">
                    <label for="user_password">Votre mot de passe</label>
                    <input type="password" name="user_password" id="user_password">
                </div>

                <div class="login__remember">
                    <input type="checkbox" name="remember" id="remember" value="1">
                    <label for="remember">Se souvenir de moi</label>
                </div>

                <div class="login__submit">
                    <input class="submit" type="submit" value="Se connecter">
                </div>

                <?php if ($error): ?>
                    <div>
                        <p class="error"><?=$error; ?></p>
                    </div>
                <?php endif ?>
            </form>
        </div>
    </div>
</div>



 
<?php get_footer();?>