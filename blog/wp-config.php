<?php
/** 
 * Setările de bază pentru WordPress.
 *
 * Acest fișier conține următoarele detalii despre: setările MySQL, prefixul pentru tabele,
 * cheile secrete, localizarea WordPress și ABSPATH. Informații adăugătoare pot fi găsite
 * în pagina {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} din Codex. Setările MySQL pot fi obținute de la serviciul de găzduire.
 *
 * Acest fișier este folosit la crearea wp-config.php din timpul procesului de instalare.
 * Folosirea interfeței web nu e obligatorie, acest fișier poate fi copiat
 * sub numele de "wp-config.php", iar apoi populate toate detaliile.
 *
 * @package WordPress
 */

// ** Setările MySQL: aceste informații pot fi obținute de la serviciile de găzduire ** //
/** Numele bazei de date pentru WordPress */
define('DB_NAME', 'ironcoders_blog');

/** Numele de utilizator MySQL */
define('DB_USER', 'root');

/** Parola utilizatorului MySQL */
define('DB_PASSWORD', 'inventor16');

/** Adresa serverului MySQL */
define('DB_HOST', 'localhost');

/** Setul de caractere pentru tabelele din baza de date. */
define('DB_CHARSET', 'utf8');

/** Schema pentru unificare. Nu faceți modificări dacă nu sunteți siguri. */
define('DB_COLLATE', '');

/**#@+
 * Cheile unice pentru autentificare
 *
 * Modificați conținutul fiecărei chei pentru o frază unică.
 * Acestea pot fi generate folosind {@link http://api.wordpress.org/secret-key/1.1/salt/ serviciul pentru chei de pe WordPress.org}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%ESCEd,^KR2b)0$xB-QMbsRYSeofU8PDO/kYGl3t%|;jr&ZvCp_!to([!7D2[;%U');
define('SECURE_AUTH_KEY',  'zPuzOiaK$/i0!,&`c.a3XAp8BAj>)lxa!Q{8Q{d=tPChL$8!/<SMY(@L(vBC-CZv');
define('LOGGED_IN_KEY',    'P#-0} darr:A%MGMwW37ks8xSxkBHk9?j1p9Lxo<=uTzG|C?lNi-e1[povCX-_`S');
define('NONCE_KEY',        ']SJlLIp -w-+s!C8 yXi@O|3-+_S$VvCfLX6}1XK1=%u|c|FAOU_hF2bP%:8p_EA');
define('AUTH_SALT',        ',9s~{90O?iMk*GGUSnf=RaS{Mew]uF>+qm,sQ^-qiA@Se5;~%V)]18pkJ}CBt@Bs');
define('SECURE_AUTH_SALT', '33#5B2pZA(4BdWa4Jh+5N:w?>Q`n?ANwHuIuw>`:V+f06p_dv[j:I|Qd{jdH`kj;');
define('LOGGED_IN_SALT',   'BqcL|@3>+Rn>ZqwB*6k>V+,Nilg1~l4l:czo3?bL<x=nCp@Cl!ak)H_VdW<tR{uv');
define('NONCE_SALT',       '|UyVZT,g=qfs6+-rg-mm/#915=ncpK8[LV rLmcPrj>KJ;n`3Z -@2_.5Y82*w~(');

/**#@-*/

/**
 * Prefixul tabelelor din MySQL
 *
 * Acest lucru permite instalarea a câteva instanțe WordPress folosind aceeași bază de date
 * și prefix diferit. Sunt permise doar cifre, litere și caracterul liniuță de subliniere.
 */
$table_prefix  = 'wp_';

/**
 * Limba pentru localizarea WordPress, implicit vine cu Engleză
 *
 * Modificați acest parametru, pentru a folosi o altă localizare. Fișierul .mo
 * pentru localizarea respectivă trebuie plasat în directorul wp-content/languages.
 */
define ('WPLANG', 'ro_RO');

/**
 * Pentru dezvoltatori: WordPress în mod de depanare.
 *
 * Setează cu true pentru a permite afișarea notificărilor la dezvoltare.
 * Este mult recomadată folosirea modului WP_DEBUG la dezvoltarea modulelor și
 * a șabloanelor în mediile personale.
 */
define('WP_DEBUG', false);

/* Asta e tot, am terminat cu editarea. Spor! */

/** Calea absolută spre directorul WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sunt încărcați toți parametrii WordPress și conectat fișierul. */
require_once(ABSPATH . 'wp-settings.php');
?>
