<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wordpressEval');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'wordpressEval');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'admin');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '$$]n;GwG0rb-,3M34t$eR^TN0;F<&2j-4AZQ)~O3|T~j>Qzi0{)36n y^,|eqb>$');
define('SECURE_AUTH_KEY',  '-&^0nfZB]Ai*<)Elj?C2^+:u Re}s?-aCvN37 Cq3W!$]&M^m4eGd+FeIL>X.xkF');
define('LOGGED_IN_KEY',    'pE}t[[N?e/9-i#lP3,)Z]! &GK7HLf@AePl(&3<2,M(($F7zEvZ9[p@oM`N7&B`1');
define('NONCE_KEY',        'Guzyg~U$lC5b1arHbiV`~jp6}{,k@[1?P?h d$&wmVcmf1T9BJ_=OaR%WR;Or=[I');
define('AUTH_SALT',        'ON9*tH@Q<1,bosP*FVZ_Y6t<Ey{w4pHG|,Zkh<UU[aY(c:kS%1Ft8r!Ses8-QhYQ');
define('SECURE_AUTH_SALT', 'K}{p8qD#wrqaT[R?boi7?b#[*!^?[1;@.5fhhCus:7{1UbAZwO8^g[mc]7tDVHsn');
define('LOGGED_IN_SALT',   'NW~_s^Vv(JWRyJUnS0( /n|Z}c(:~cxP-#~So;7,n-e|kGO,}0)2Zd1]]$r8?Rr|');
define('NONCE_SALT',       '@De2x,-u(I4zZ:0<:}1a`HnI:,/Wsj(ZaC]Vrjd?94m1!i xuYG&LK}PiJ?1m9ur');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'boo_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');