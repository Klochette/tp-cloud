<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'marmishlag' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'mI|M:7Kuc^aE1DKUF}G*O[;a+l)urs<cCeYxnG& +/H0V9sg et5Ly^%9l<+aNS4' );
define( 'SECURE_AUTH_KEY',  'ym<~aw.iGTSRJ:=`Z?F>b9V&!^:;!9L$6K%.~~w{>O#_t:wB<CSpWZwN}DcBW2Ve' );
define( 'LOGGED_IN_KEY',    'S,p;x43,F=$ypF2uI=MFNL,6Rjap9lw[}I9J@,NA.wMA6vO|f+GbwrLNb!<FkDzg' );
define( 'NONCE_KEY',        ',X5H_jGf:ZaBGQ?B]voI8XgSeW:UvYm$a7j-J<pVikEGsO/pIe [ a8{x30qC11U' );
define( 'AUTH_SALT',        '9.5@Qt D-@z,ak,?V>Dl@wUlbjGIvge*(.HpNhb/McLWF:OvRj[DK$H<loLvYa|}' );
define( 'SECURE_AUTH_SALT', 'c,tW;qaQ=O(f&6KIoo1?V|g!#`w7CP${*G>==Q8r3Qq}~}QaHriV!z6Cz_2ar,70' );
define( 'LOGGED_IN_SALT',   '|Y*/:f9l1#skg@#LAT=cCL~s$zP9,4Afa`Lth %2<V;k_YHVOmBe3;:b84f,.`hJ' );
define( 'NONCE_SALT',       '}rBB;;#ZIEU;FmPZf fD49YX`^^0oG[8R1Zev;URAsfUx#HCRetf*XPI2aXeS=<;' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );

