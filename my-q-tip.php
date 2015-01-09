<?php
/*
Plugin Name: MyQtip - easy qTip2
Plugin URI: http://monothemes.com/
Description: MyQtip for Wordpress is a plugin that uses qTip2 to display nice looking, user friendly tooltips. Colors and position are easily changeable. For use - paste shortcode [myqtip title='my text tips' ] any content [/myqtip]  or add .myqtip class
Version: 1.0.1
Author: Andrey Monin, dgamoni
Author URI: http://monothemes.com/
License: GPL2

*/


function dgamoni_enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
	 
	wp_register_script( 'my-plugin-script', plugins_url('js/jquery.qtip.js', __FILE__) );
	wp_enqueue_script( 'my-plugin-script', array('jquery'));
	 
    //wp_enqueue_script('qtip', 'http://craigsworks.com/projects/qtip2/packages/nightly/jquery.qtip.js', array('jquery'), false, true);
	
	wp_register_style('myPluginStylesheet', plugins_url('js/jquery.qtip.css', __FILE__));
	wp_enqueue_style( 'myPluginStylesheet');
	
	include( plugin_dir_path( __FILE__ ) . 'getoptions.php');
	//include( plugin_dir_path( __FILE__ ) . 'demo.php');
	
}
add_action('wp_enqueue_scripts', 'dgamoni_enqueue_scripts');

 
// create custom plugin settings menu
add_action('admin_menu', 'dgamoni_create_menu');

function dgamoni_create_menu() {

	//create new top-level menu
	add_menu_page('MyQtip Settings', 'MyQtip Settings', 'administrator', __FILE__, 'dgamoni_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'baw-settings-group', 'myqtip_my' );
	register_setting( 'baw-settings-group', 'myqtip_at' );
	register_setting( 'baw-settings-group', 'myqtip_style' );
	register_setting( 'baw-settings-group', 'adjust_x' );
	register_setting( 'baw-settings-group', 'adjust_y' );
}

function dgamoni_settings_page() {?>
<div class="wrap" style="background:url(<?php echo plugins_url('js/corners.jpg', __FILE__)?>) 90% 43% no-repeat;">
<h2>MyQtip Settings</h2>
<p>For use - paste shortcode  <span style="color:blue;letter-spacing: 1.5px;font-size: 120%;line-height: 2;"> [myqtip title='my text tips' ] any content [/myqtip] </span>  <br>

or add <span style="color:blue;">.myqtip</span> class for link or other tag. Text tips  is taken from the <span style="color:blue;">title</span> attribute</p>

<p style="margin-right: 621px;">qTip utilises a special positioning system using corners. The basic concept behind it is pretty simple, in fact it turns out to be plain English when read aloud! For example, let's say we want to position my tooltips top left corner at the bottom right of my target.</p>
<p>See demo to the official <a href="http://craigsworks.com/projects/qtip2/demos/#viewport">website</a></p>
<form method="post" action="options.php">
    <?php settings_fields( 'baw-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Tooltip position (my)</th>
        <td><select  name="myqtip_my" id="my" > 
        
<option value="top left"<?php if (get_option('myqtip_my') == 'top left' ) { ?> selected="selected"<?php } ?>>top left</option>
<option value="top right"<?php if (get_option('myqtip_my') == 'top right' ) { ?> selected="selected"<?php } ?>>top right</option>
<option value="top center"<?php if (get_option('myqtip_my') == 'top center' ) { ?> selected="selected"<?php } ?>>top center</option>
<option value="bottom left"<?php if (get_option('myqtip_my') == 'bottom left' ) { ?> selected="selected"<?php } ?>>bottom left</option>
<option value="bottom right"<?php if (get_option('myqtip_my') == 'bottom right' ) { ?> selected="selected"<?php } ?>>bottom right</option>
<option value="bottom center"<?php if (get_option('myqtip_my') == 'bottom center' ) { ?> selected="selected"<?php } ?>>bottom center</option>
<option value="left top"<?php if (get_option('myqtip_my') == 'left top' ) { ?> selected="selected"<?php } ?>>left top</option>
<option value="left bottom"<?php if (get_option('myqtip_my') == 'left bottom' ) { ?> selected="selected"<?php } ?>>left bottom</option>
<option value="left center"<?php if (get_option('myqtip_my') == 'left center' ) { ?> selected="selected"<?php } ?>>left center</option>
<option value="right top"<?php if (get_option('myqtip_my') == 'right top' ) { ?> selected="selected"<?php } ?>>right top</option>
<option value="right bottom"<?php if (get_option('myqtip_my') == 'right bottom' ) { ?> selected="selected"<?php } ?>>right bottom</option>
<option value="right center"<?php if (get_option('myqtip_my') == 'right center' ) { ?> selected="selected"<?php } ?>>right center</option>
<option value="center"<?php if (get_option('myqtip_my') == 'center' ) { ?> selected="selected"<?php } ?>>center</option>
            
		</select></td>
         
        </tr>
         
        <tr valign="top">
        <th scope="row">Target position (at)</th>
        <td><select name="myqtip_at" id="at">
        
<option value="top left"<?php if (get_option('myqtip_at') == 'top left' ) { ?> selected="selected"<?php } ?>>top left</option>
<option value="top right"<?php if (get_option('myqtip_at') == 'top right' ) { ?> selected="selected"<?php } ?>>top right</option>
<option value="top center"<?php if (get_option('myqtip_at') == 'top center' ) { ?> selected="selected"<?php } ?>>top center</option>
<option value="bottom left"<?php if (get_option('myqtip_at') == 'bottom left' ) { ?> selected="selected"<?php } ?>>bottom left</option>
<option value="bottom right"<?php if (get_option('myqtip_at') == 'bottom right' ) { ?> selected="selected"<?php } ?>>bottom right</option>
<option value="bottom center"<?php if (get_option('myqtip_at') == 'bottom center' ) { ?> selected="selected"<?php } ?>>bottom center</option>
<option value="left top"<?php if (get_option('myqtip_at') == 'left top' ) { ?> selected="selected"<?php } ?>>left top</option>
<option value="left bottom"<?php if (get_option('myqtip_at') == 'left bottom' ) { ?> selected="selected"<?php } ?>>left bottom</option>
<option value="left center"<?php if (get_option('myqtip_at') == 'left center' ) { ?> selected="selected"<?php } ?>>left center</option>
<option value="right top"<?php if (get_option('myqtip_at') == 'right top' ) { ?> selected="selected"<?php } ?>>right top</option>
<option value="right bottom"<?php if (get_option('myqtip_at') == 'right bottom' ) { ?> selected="selected"<?php } ?>>right bottom</option>
<option value="right center"<?php if (get_option('myqtip_at') == 'right center' ) { ?> selected="selected"<?php } ?>>right center</option>
<option value="center"<?php if (get_option('myqtip_at') == 'center' ) { ?> selected="selected"<?php } ?>>center</option>

		</select></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Style</th>
       <td><select name="myqtip_style" id="myqtip_style">
        
      
<option value="red"<?php if (get_option('myqtip_style') == 'red' ) { ?> selected="selected"<?php } ?>>red</option>
<option value="blue"<?php if (get_option('myqtip_style') == 'blue' ) { ?> selected="selected"<?php } ?>>blue</option>
<option value="dark"<?php if (get_option('myqtip_style') == 'dark' ) { ?> selected="selected"<?php } ?>>dark</option>
<option value="light"<?php if (get_option('myqtip_style') == 'light' ) { ?> selected="selected"<?php } ?>>light</option>
<option value="green"<?php if (get_option('myqtip_style') == 'green' ) { ?> selected="selected"<?php } ?>>green</option>
<option value="jtools"<?php if (get_option('myqtip_style') == 'jtools' ) { ?> selected="selected"<?php } ?>>jtools</option>
<option value="plain"<?php if (get_option('myqtip_style') == 'plain' ) { ?> selected="selected"<?php } ?>>plain</option>
<option value="youtube"<?php if (get_option('myqtip_style') == 'youtube' ) { ?> selected="selected"<?php } ?>>youtube</option>
<option value="cluetip"<?php if (get_option('myqtip_style') == 'cluetip' ) { ?> selected="selected"<?php } ?>>cluetip</option>
<option value="tipsy"<?php if (get_option('myqtip_style') == 'tipsy' ) { ?> selected="selected"<?php } ?>>tipsy</option>
<option value="tipped"<?php if (get_option('myqtip_style') == 'tipped' ) { ?> selected="selected"<?php } ?>>tipped</option>
<option value="bootstrap"<?php if (get_option('myqtip_style') == 'bootstrap' ) { ?> selected="selected"<?php } ?>>bootstrap</option>


		</select></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">adjust.x</th>
       <td> 
		<select name="adjust_x">
        <option value="-50"<?php if (get_option('adjust_x') == '-50' ) { ?> selected="selected"<?php } ?>>-50</option>
            <option value="-45"<?php if (get_option('adjust_x') == '-45' ) { ?> selected="selected"<?php } ?>>-45</option>
            <option value="-40"<?php if (get_option('adjust_x') == '-40' ) { ?> selected="selected"<?php } ?>>-40</option>
            <option value="-35"<?php if (get_option('adjust_x') == '-35' ) { ?> selected="selected"<?php } ?>>-35</option>
            <option value="-30"<?php if (get_option('adjust_x') == '-30' ) { ?> selected="selected"<?php } ?>>-30</option>
            <option value="-25"<?php if (get_option('adjust_x') == '-25' ) { ?> selected="selected"<?php } ?>>-25</option>
            <option value="-20"<?php if (get_option('adjust_x') == '-20' ) { ?> selected="selected"<?php } ?>>-20</option>
            <option value="-15"<?php if (get_option('adjust_x') == '-15' ) { ?> selected="selected"<?php } ?>>-15</option>
            <option value="-10"<?php if (get_option('adjust_x') == '-10' ) { ?> selected="selected"<?php } ?>>-10</option>
			<option value="-5"<?php if (get_option('adjust_x') == '-5' ) { ?> selected="selected"<?php } ?>>-5</option>
			<option value="0"<?php if (get_option('adjust_x') == '0' ) { ?> selected="selected"<?php } ?>>0</option>
            <option value="5"<?php if (get_option('adjust_x') == '5' ) { ?> selected="selected"<?php } ?>>5</option>
            <option value="10"<?php if (get_option('adjust_x') == '10' ) { ?> selected="selected"<?php } ?>>10</option>
            <option value="15"<?php if (get_option('adjust_x') == '15' ) { ?> selected="selected"<?php } ?>>15</option>
            <option value="20"<?php if (get_option('adjust_x') == '20' ) { ?> selected="selected"<?php } ?>>20</option>
            <option value="25"<?php if (get_option('adjust_x') == '25' ) { ?> selected="selected"<?php } ?>>25</option>
            <option value="30"<?php if (get_option('adjust_x') == '30' ) { ?> selected="selected"<?php } ?>>30</option>
            <option value="35"<?php if (get_option('adjust_x') == '35' ) { ?> selected="selected"<?php } ?>>35</option>
            <option value="40"<?php if (get_option('adjust_x') == '40' ) { ?> selected="selected"<?php } ?>>40</option>
            <option value="45"<?php if (get_option('adjust_x') == '45' ) { ?> selected="selected"<?php } ?>>45</option>
			<option value="50"<?php if (get_option('adjust_x') == '50' ) { ?> selected="selected"<?php } ?>>50</option>	
			
		</select></td>
        </tr>
 
		<tr valign="top">
        <th scope="row">adjust.y</th>
       <td> 
		<select name="adjust_y">
        	<option value="-50"<?php if (get_option('adjust_y') == '-50' ) { ?> selected="selected"<?php } ?>>-50</option>
            <option value="-45"<?php if (get_option('adjust_y') == '-45' ) { ?> selected="selected"<?php } ?>>-45</option>
            <option value="-40"<?php if (get_option('adjust_y') == '-40' ) { ?> selected="selected"<?php } ?>>-40</option>
            <option value="-35"<?php if (get_option('adjust_y') == '-35' ) { ?> selected="selected"<?php } ?>>-35</option>
            <option value="-30"<?php if (get_option('adjust_y') == '-30' ) { ?> selected="selected"<?php } ?>>-30</option>
            <option value="-25"<?php if (get_option('adjust_y') == '-25' ) { ?> selected="selected"<?php } ?>>-25</option>
            <option value="-20"<?php if (get_option('adjust_y') == '-20' ) { ?> selected="selected"<?php } ?>>-20</option>
            <option value="-15"<?php if (get_option('adjust_y') == '-15' ) { ?> selected="selected"<?php } ?>>-15</option>
            <option value="-10"<?php if (get_option('adjust_y') == '-10' ) { ?> selected="selected"<?php } ?>>-10</option>
			<option value="-5"<?php if (get_option('adjust_y') == '-5' ) { ?> selected="selected"<?php } ?>>-5</option>
			<option value="0"<?php if (get_option('adjust_y') == '0' ) { ?> selected="selected"<?php } ?>>0</option>
            <option value="5"<?php if (get_option('adjust_y') == '5' ) { ?> selected="selected"<?php } ?>>5</option>
            <option value="10"<?php if (get_option('adjust_y') == '10' ) { ?> selected="selected"<?php } ?>>10</option>
            <option value="15"<?php if (get_option('adjust_y') == '15' ) { ?> selected="selected"<?php } ?>>15</option>
            <option value="20"<?php if (get_option('adjust_y') == '20' ) { ?> selected="selected"<?php } ?>>20</option>
            <option value="25"<?php if (get_option('adjust_y') == '25' ) { ?> selected="selected"<?php } ?>>25</option>
            <option value="30"<?php if (get_option('adjust_y') == '30' ) { ?> selected="selected"<?php } ?>>30</option>
            <option value="35"<?php if (get_option('adjust_y') == '35' ) { ?> selected="selected"<?php } ?>>35</option>
            <option value="40"<?php if (get_option('adjust_y') == '40' ) { ?> selected="selected"<?php } ?>>40</option>
            <option value="45"<?php if (get_option('adjust_y') == '45' ) { ?> selected="selected"<?php } ?>>45</option>
			<option value="50"<?php if (get_option('adjust_y') == '50' ) { ?> selected="selected"<?php } ?>>50</option>
            
			
		</select></td>
        </tr>
        
    </table>
    <div>
    
    
    </div>
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
    </p>
</form>


<div class="wp-box">
<p>MyQtip - beautiful tips</p>
<p>MyQtip this is plugin for WordPress, based qTip2 jQuery plugin</p>
<p>More options will be in the next version.</p>
<p>Please donate for quick work
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">
</form></p>

</div>



</div>

    
<?php }