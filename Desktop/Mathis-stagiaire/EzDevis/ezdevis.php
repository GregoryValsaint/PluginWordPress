<?php
/*
Plugin Name: EzDevis
Plugin URI: http://ezdevis.com
Description: Un plugin pour faciliter les devis online
Version: 0.1
Author:Zerbib Mathis
Author URI: http://.com
License: GPL2
*/


/* Include ezd-functions.php utilisation de require_once pour arrêter le script si ezd-functions.php n'est pas trouvé */

require_once plugin_dir_path(__FILE__) . 'includes/ezd-functions.php';

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
$_SERVER['HTTPS'] = 'on';


function activate_my_plugin() { 


/**
 * Si inexistante, on créée la table SQL "ezdevis_clients" après l'activation du thème
 */
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$commissions_table_name = $wpdb->prefix . 'ezdevis_client';
$commissions_sql = "CREATE TABLE wp_ezdevis_client(
        cli_id         Int  Auto_increment  NOT NULL ,
        cli_email      Varchar (50) NOT NULL ,
        cli_e_name     Varchar (50) NOT NULL ,
        cli_numero_tel Varchar (50) NOT NULL ,
        cli_nb_magasin Int NOT NULL ,
        cli_nb_url     Int NOT NULL ,
        cli_opt_stock  Int  ,
        cli_opt_campub Int  ,
        cli_opt_new    Int  ,
        cli_opt_trend  Int  ,
        cli_sect_act   Varchar (50) NOT NULL,
        cli_site_web   Varchar (50) NOT NULL,
        cli_nom        Varchar (50) NOT NULL,
        cli_prenom     Varchar (50) NOT NULL,
        cli_poste      Varchar (50) NOT NULL,
        date_time      TimeStamp NOT NULL 
	,CONSTRAINT ezdevis_client_PK PRIMARY KEY (cli_id)	
) $charset_collate;";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($commissions_sql);

/* on créée la table SQL "ezdevis_ezdevis"*/

global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$commissions_table_name = $wpdb->prefix . 'ezdevis_admin';
$commissions_sql = "CREATE TABLE wp_ezdevis_admin(
        ez_id              Int  Auto_increment  NOT NULL ,
        ez_admin_email     Varchar (50) NOT NULL ,
        ez_client_email    Varchar (50) NOT NULL ,
        ez_accus_reception Varchar (50) NOT NULL ,
        date_time      TimeStamp NOT NULL 
	,CONSTRAINT ezdevis_admin_PK PRIMARY KEY (ez_id)
) $charset_collate;";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($commissions_sql);


 }

 register_activation_hook( __FILE__, 'activate_my_plugin');

/* pour la desinstalation  */




function unistall_my_plugin() {
 global $wpdb;
    $table_name_cli = $wpdb->prefix . 'ezdevis_client';
        $table_name_adm = $wpdb->prefix . 'ezdevis_admin';

    $sql = "DROP TABLE IF EXISTS $table_name_cli, $table_name_adm";
    $wpdb->query($sql);
}

register_uninstall_hook(__FILE__, 'unistall_my_plugin');