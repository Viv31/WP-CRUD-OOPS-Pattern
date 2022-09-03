<?php
/**
 * Plugin Name: CRUD OOPS
 * Author:Vaibhav Gangrade
 * Description:
 * Version:1.0
 * Author URI:
 * Plugin URL:
 * Stable Version:1.0
 */

//Prevent Direct Access for accesing plugin file
if (!defined('ABSPATH')) exit;
//including file for creating table when plugin gets activated
include_once ('include/create_table_plugin_activation.php');

//Defining class for plugin
class ffoops_CRUD_OOPS
{

    //Constructor for class
    public function __construct()
    {
        //Passing global connection variable to constructor
        global $wpdb;

        //Passing action hook which will load all css,js and our ajax object
        add_action('wp_enqueue_scripts', 'crud_css_js_files');
        function crud_css_js_files()
        {

            //css
            wp_enqueue_style('style', plugins_url('css/style.css', __FILE__));

            //js
            wp_enqueue_script('js', plugins_url('js/script.js', __FILE__) , array(
                'jquery'
            ));

            //passing ajax url
            wp_localize_script('ajax-script', 'plugin_ajax_object', array(
                'ajax_url' => admin_url('admin-ajax.php')
            ));
        }
        //Adding shortcode for displaying user listing
        add_shortcode('feedback-list-data', array(
            $this,
            'ffooops_ListUserData'
        ));

        //Adding shortcode for adding user feedback
        add_shortcode('add-feedback-form', array(
            $this,
            'ffooops_AddUserData'
        ));

        //for using ajax for admin section
        add_action('wp_ajax_ffooops_AddUserData', 'ffooops_AddUserData');

        //for using ajax without admin login
        add_action('wp_ajax_nopriv_ffooops_AddUserData', 'ffooops_AddUserData');

    }

    //Defining method for insert form
    public function ffooops_AddUserData()
    {
        //including our insert form from insert folder
        include_once ('include/add_user_form.php');

    }
    //Defining method for Update data
    public function ffooops_UpdateData()
    {

    }
    //List user data
    public function ffooops_ListUserData()
    {
        //Geeting list of feedback
        include_once ('include/listing-data.php');

    }
    //Delete User Data
    public function ffooops_DeleteUserData()
    {

    }

}

//Checking if class is present it will create object of class
if (class_exists('ffoops_CRUD_OOPS'))
{
    //creating object for class
    $ffoops_crud_oops = new ffoops_CRUD_OOPS();
}

?>
