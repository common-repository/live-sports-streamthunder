<?php
/*
Plugin Name: Live Sports Streamthunder
Plugin URI: https://www.streamthunder.org/get-widget-streams/
Description: With this plugin show automatically daily list of all kind of sports events on your site or just of sport you want. Put your own links on each sport event to send traffic wherever you want or show links the default link to brind your users usefull sites to watch every sport match.
Version: 2.1
Author: Streamthunder
Author URI: https://streamthunder.org
License: GPL2

*/


// on plugin install
global $sthunder_db_version;
$sthunder_db_version = '2.1';

function sthunder_install()
{
    global $wpdb;
    global $sthunder_db_version;

    $table_name = $wpdb->prefix . 'st_widdgets';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		 `id` int(11) NOT NULL AUTO_INCREMENT,
  `sports` text NOT NULL,
  PRIMARY KEY (`id`)
	) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    add_option('sthunder_db_version', $sthunder_db_version);
    add_option('sthunder_settings', array());
}

// on plugin delete
function sthunder_uninstall()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'st_widdgets';
    $sql = "DROP TABLE $table_name;";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    delete_option('sthunder_db_version');
    delete_option( 'sthunder_settings');
}

// activation hooks
register_activation_hook(__FILE__, 'sthunder_install');
register_uninstall_hook(__FILE__, 'sthunder_uninstall');


function sthunder_get_sports()
{

    $sports = array(
        0 => 'All Sports',
        1 => 'Football',
        2 => 'Basketball',
        3 => 'American Football',
        4 => 'Ice Hockey',
        5 => 'Baseball',
        6 => 'Rugby',
        7 => 'Motor Sports',
        8 => 'Tennis',
        25 => 'Cricket',
        9 => 'Others (Volleyball,Futsal,..)'
    );


    return $sports;
}


function sthunder_redirect($url)
{
    echo '<script>window.location.replace("'.$url.'");</script>';
}


function sthunder_get_sports_names($array)
{

    $sports = sthunder_get_sports();

    if(!$array)
    {
        $array = array(0);
    }

    foreach($array as $sport)
    {
        $sport_names[] = $sports[$sport];
    }

    return implode(', ', $sport_names);

}


/**
 *
 * function returns widget html code from shortcode
 *
 * @param $atts - shortcode attributes
 * @return string
 */
function sthunder_wp_shortcode($atts)
{
    $options = get_option('sthunder_settings');


    if($atts && $options && is_array($options))
    {
        $atts = array_merge($atts, $options);
    }
    elseif($options && is_array($options))
    {
        $atts = $options;
    }

    $iframe_atts = array();
    if($atts)
    {



        foreach($atts as $name=>$value)
        {

            if(!in_array($name, array('widget_scrollbars'))) // ignore special settings
            {
                if(!intval($atts['cs']) || in_array($name, array('cs', 'l', 'l2', 'sp', 'lk', 'fk')))// disable extra styles for custom settings
                {
                $iframe_atts[] = urlencode($name)."=".urlencode($value);
                }
            }


        }
    }

    $added_attributes = $iframe_atts ? "&".implode("&", $iframe_atts):"";



    $iframe_scrolling = isset($options['widget_scrollbars']) ? $options['widget_scrollbars'] : 1;
    $widget_height = isset($options['whs']) && $options['whs'] ? $options['whs'] : 800;
    $iframe_url = isset($options['lk']) && $options['lk'] ? '' : '';
    $sthunder_link = isset($options['sthunder_link']) ? $options['sthunder_link'] : 1;



    $widget = '<div class="st_widget live_streams">
    <iframe src="https://widget.streamthunder.org/'.$iframe_url.'?d=1&s=1'.$added_attributes.'" width="100%" height="'.htmlspecialchars($widget_height).'" scrolling="'.($iframe_scrolling?'auto':'no').'" align="top" frameborder="0">Your browser does not support frames, so you will not be able to view this page.</iframe>
    '.($sthunder_link?'<br><a style="float: right;font-size: 10px;color: #6b6b6b;"  href="https://www.streamthunder.org/get-widget-streams/" target="_blank">Live Stream Sports</a></div>':'');
    return $widget;
}

add_shortcode('sthunder', 'sthunder_wp_shortcode');


// color pick library for admin
function sthunder_color_pick_lib() {
    wp_enqueue_script( 'jscolor', plugin_dir_url( __FILE__ ) . '/js/jscolor.min.js');
}
add_action( 'admin_enqueue_scripts', 'sthunder_color_pick_lib' );


add_action('admin_menu', 'my_admin_menu');

function my_admin_menu()
{
    add_menu_page('Live Sports Streamhunder', 'Live Sports Streamhunder', 'manage_options', 'sthunder_admin_page', 'sthunder_admin_page', 'dashicons-list-view');
    add_submenu_page('sthunder_admin_page', 'Display options', 'Display options', 'manage_options', 'sthunder_settings_page', 'sthunder_settings_page');
    add_submenu_page(null, 'Edit Live Sports Streamhunder widget', 'Edit Live Sports Streamhunder widget', 'manage_options', 'sthunder_edit_widget_page', 'sthunder_edit_widget_page');
}


function sthunder_backend_header($title, $inline = false)
{
    echo '<div class="wrap">
<h1' . ($inline ? ' class="wp-heading-inline"' : '') . '>Live Sports Streamhunder | ' . $title . '</h1>';
}


function sthunder_backend_footer()
{
    echo '
    <hr>
    <a href="https://www.streamthunder.org" target="_blank">Live Stream Sports Widget</a>
    </div>';
}


/**
 *
 * page with list of widgets
 *
 */
function sthunder_admin_page()
{


    sthunder_backend_header('Widgets', 1);


    $path = 'admin.php?page=sthunder_edit_widget_page';
    $url = admin_url($path);


    echo '<a href="' . $url . '" class="page-title-action">Add New</a>
    <hr class="wp-header-end">';

    $wp_list_table = new Sthunder_List_Table();
    $wp_list_table->prepare_items();
    $wp_list_table->display();

    sthunder_backend_footer();

}

/**
 *  page with options common for all widgets
 *
 */
function sthunder_settings_page()
{


    if($_POST)
    {
        if(isset($_POST['submit']))
        {
            unset($_POST['submit']);
        }

        update_option( 'sthunder_settings', $_POST );
    }


    sthunder_backend_header('Settings');


    $path = 'admin.php?page=sthunder_settings_page';


    $url = admin_url($path);



    $options = get_option('sthunder_settings');

    require __DIR__."/templates/settings.php";


    sthunder_backend_footer();
}




function sthunder_edit_widget_page()
{

    global $wpdb;
    $table_name = $wpdb->prefix . 'st_widdgets';




    //deleting widget

    if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['wid']) && intval($_GET['wid']))
    {
        $wpdb->delete( $table_name, array( 'id' => $_GET['wid']), array( '%d' ));
        $path = 'admin.php?page=sthunder_admin_page';
        $url = admin_url($path);
        sthunder_redirect($url);
       return;
    }





    // saving widget config
    if ($_POST) {
        if (isset($_POST['sports']) && is_array($_POST['sports'])) {

            if (isset($_GET['wid']) && intval($_GET['wid'])) {
                $id = $_GET['wid'];
            } else {
                $id = false;
            }


            if (in_array(0, $_POST['sports'])) {
                $sports = '';
            } else {
                $sports = serialize($_POST['sports']);
            }


            $data = array(
                'sports' => $sports
            );





            if(!$id)
            {
                $wpdb->insert($table_name, $data);
                $rowid = $wpdb->insert_id;
            }
            else
            {
                $wpdb->update($table_name, $data, array('id'=>$id));
                $rowid = $id;
            }


             //redirect to widget own page
            if(!$id)
            {
            $path = 'admin.php?page=sthunder_edit_widget_page';

            $path .= '&wid=' . $rowid;

            $url = admin_url($path);

            sthunder_redirect($url);
                return;
            }


        }
    }


    sthunder_backend_header('Edit Widget');


    $path = 'admin.php?page=sthunder_edit_widget_page';


    $wid = false;
    $wdata = false;

    if (isset($_GET['wid'])) {
        if (intval($_GET['wid'])) {
            $wid = $_GET['wid'];
            $path .= '&wid=' . $wid;


            $wdata = $wpdb->get_row("SELECT * FROM ".$table_name." WHERE id = '$wid'", ARRAY_A);
            if($wdata['sports']){
                $wdata['sports_un'] = unserialize($wdata['sports']);
            }


        }
    }

    $url = admin_url($path);
    $sports = sthunder_get_sports();

    require __DIR__."/templates/edit_widget.php";




    sthunder_backend_footer();
}


/**
 * returns shortcode for widget
 *
 * @param $id - widget id
 * @param bool $data - widget data in associative array (optional) if not set data will be taken from db
 *
 */
function sthunder_get_shortcode($id, $data = false){
    $sports = false;
    if(!$data)
    {

    }
    else
    {

        if($data['sports'])
        {
            $data_sports = is_array($data['sports'])?$data['sports']:unserialize($data['sports']);
            $sports = implode(',', $data_sports);
        }

    }


    return '[sthunder'.($sports?' sp="'.$sports.'"':'').']';


}





// including wp table class
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/screen.php');
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}


// extending standard wp class for displaying tables
class Sthunder_List_Table extends WP_List_Table
{


    function __construct()
    {
        parent::__construct(array(
            'singular' => 'wp_list_text_link', //Singular label
            'plural' => 'wp_list_test_links', //plural label, also this well be one of the table css class
            'ajax' => false //We won't support Ajax for this table
        ));
    }





    function get_columns()
    {
        return $columns = array(
            'col_id' => __('ID'),
            'col_sports' => __('Sports'),
            'col_shortcode' => __('Shortcode'),
            'col_action' => __('')
        );
    }


    function prepare_items()
    {
        global $wpdb, $_wp_column_headers;
        $screen = get_current_screen();

        /* -- Preparing your query -- */
        $table_name = $wpdb->prefix . 'st_widdgets';
        $query = "SELECT * FROM $table_name";

        /* -- Ordering parameters -- */
        /* -- Pagination parameters -- */
        //Number of elements in your table?
        $totalitems = $wpdb->query($query); //return the total number of affected rows
        //How many to display per page?
        $perpage = 25;
        //Which page is this?
        $paged = !empty($_GET["paged"]) ? mysql_real_escape_string($_GET["paged"]) : '';
        //Page Number
        if (empty($paged) || !is_numeric($paged) || $paged <= 0) {
            $paged = 1;
        }
        //How many pages do we have in total?
        $totalpages = ceil($totalitems / $perpage);
        //adjust the query to take pagination into account
        if (!empty($paged) && !empty($perpage)) {
            $offset = ($paged - 1) * $perpage;
            $query .= ' LIMIT ' . (int)$offset . ',' . (int)$perpage;
        } /* -- Register the pagination -- */
        $this->set_pagination_args(array(
            "total_items" => $totalitems,
            "total_pages" => $totalpages,
            "per_page" => $perpage,
        ));
        //The pagination links are automatically built according to those parameters

        /* -- Register the Columns -- */
        $columns = $this->get_columns();
        $this->_column_headers = array($columns, array(), array());

        /* -- Fetch the items -- */
        $this->items = $wpdb->get_results($query);
    }


    function display_rows()
    {

        //Get the records registered in the prepare_items method
        $records = $this->items;

        //Get the columns registered in the get_columns  methods
        $columns = $this->get_columns();

        //Loop for each record
        if (!empty($records)) {
            foreach ($records as $rec) {

                //Open the line
                echo '<tr id="record_' . $rec->id . '">';
                foreach ($columns as $column_name => $column_display_name) {

                    //Style attributes for each col
                    $class = "class='$column_name column-$column_name'";

                    $attributes = $class;

                    //edit link
                    $editlink = 'admin.php?page=sthunder_edit_widget_page&wid=' . (int)$rec->id;
                    $editlink = admin_url($editlink);
                    $editbutton = '<a href="'.$editlink.'"><span class="dashicons dashicons-edit"></span></a>';




                    $dellink = 'admin.php?page=sthunder_edit_widget_page&action=delete&wid=' . (int)$rec->id;
                    $dellink = admin_url($dellink);
                    $delbutton = '<a href="'.$dellink.'" onclick="return confirm(\'Are you sure you want to delete this widget?\');" style="color:red"><span class="dashicons dashicons-trash"></span></a>';

                    //Display the cell
                    switch ($column_name) {
                        case "col_id":
                            echo '<td ' . $attributes . '>' .$rec->id . '</td>';
                            break;
                        case "col_sports":
                            echo '<td ' . $attributes . '>' . htmlspecialchars(sthunder_get_sports_names(unserialize($rec->sports))) . '</td>';
                            break;

                        case "col_shortcode":
                            echo '<td ' . $attributes . '>' . sthunder_get_shortcode($rec->id, array('sports'=>$rec->sports)) . '</td>';
                            break;


                        case "col_action":
                            echo '<td ' . $attributes . '>' . $editbutton . '&nbsp;&nbsp;&nbsp;' . $delbutton . '</td>';
                            break;
                    }
                }

                echo '</tr>';
            }
        }
    }


}


?>
