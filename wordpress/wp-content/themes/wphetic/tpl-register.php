<?php
/*
Template Name: Register
*/
$error = false;
if(!empty($_POST)){
    $p = $_POST;
    if($p['user_pass'] != $p['user_pass2']){
        $error = "Les deux mots de passe ne correspondent pas.";
    } else {
        if (!is_email($p['user_email'])){
            $error = "Veuillez entrer un email valide";
        } 
        else{
            $user = wp_insert_user(array(
                'user_login' => $p['user_login'],
                'user_pass' => $p['user_pass'],
                'user_email' => $p['user_email'],
                'user_registered' => date('Y-m-d H:i:s')
            ));
            if(is_wp_error($user)){
                $error = $user->get_error_message();
            }else{
                $msg = "Félicitations ". $p . " ! Vous êtes inscrits avec tous vos amis sur Marmishlag.";
                $headers = "From : " . get_option('admin_email') . " with love and SHLAG ! ✨\r\n";
                wp_mail($p['user_email'], 'Inscription réussie', $msg, $headers);
                $p = array();
                wp_signon($user);
                header('location: /wordpress');
            }
        }
    }
}
?>

<?php get_header();?>
<?php if ($error): ?>
    <div>
        <?php echo $error; ?>
    </div>
<?php endif ?>
<div class="container">
    <div class="container__left">
    </div>
    <div class="container__right">
        <div class="right__login">
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" >
                <div class="login__input">
                    <label for="user_login">Votre pseudo</label>
                    <input type="text" value="<?php echo isset($p['user_login']) ? $p['user_login'] : ''; ?>" name="user_login" id="user_login">
                </div>
                <div class="login__input">
                    <label for="user_email">Votre email</label>
                    <input type="text" value="<?php echo isset($p['user_email']) ? $p['user_email'] : ''; ?>" name="user_email" id="user_login">
                </div>

                <div class="login__input">
                    <label for="user_pass">Votre mot de passe</label>
                    <input type="password" value="<?php echo isset($p['user_pass']) ? $p['user_pass'] : ''; ?>" name="user_pass" id="user_password">
                </div>

                <div class="login__input">
                    <label for="user_pass2">Confirmez votre mot de passe</label>
                    <input type="password" name="user_pass2" id="user_password">
                </div>

                <div class="login__submit">
                    <input class="submit" type="submit" value="S'inscrire">
                </div>

            </form>
        </div>
    </div>
</div>
<?php get_footer();?>