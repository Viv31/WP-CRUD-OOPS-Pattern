<?php
################ START CREATE TABLE ON PLUGIN ACTIVATION ########################

//Passing gloabal DB variable
global $wpdb;

//Creating global variable for custom table
global $table_name;

//Defining table name
$table_name = 'feedback_crud';
$charset_collate = $wpdb->get_charset_collate();
   	$sql ="CREATE TABLE IF NOT EXISTS $table_name(
     		id mediumint(11) NOT NULL AUTO_INCREMENT,
     		firstnsme varchar(100) NOT NULL,
     		lastname varchar(100) NOT NULL,
            user_email varchar(100) NOT NULL,
            subject varchar(100) NOT NULL,
            message varchar(100) NOT NULL,
    		PRIMARY KEY  (id) ) $charset_collate;";
   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta( $sql );

################ END CREATE TABLE ON PLUGIN ACTIVATION ########################
