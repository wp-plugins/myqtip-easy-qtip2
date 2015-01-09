<?php
add_action('wp_head', 'add_my_script');
 
function add_my_script() {

$myqtip_my = get_option('myqtip_my');
$myqtip_at = get_option('myqtip_at');
$myqtip_style = get_option('myqtip_style');
$adjust_y = get_option('adjust_y');
$adjust_x = get_option('adjust_x');


?> 


<style type="text/css">
.myqtip {
	cursor: pointer;
}
 

 
</style> 

<script type="text/javascript">
var 
	my = [
		'top left', 'top right', 'top center',
		'bottom left', 'bottom right', 'bottom center',
		'right center', 'right top', 'right bottom',
		'left center', 'left top', 'left bottom', 'center'
	],
	at = [
		'bottom left', 'bottom right', 'bottom center',
		'top left', 'top right', 'top center',
		'left center', 'left top', 'left bottom',
		'right center', 'right top', 'right bottom', 'center'
	],
	styles = [
		'red', 'blue', 'dark', 'light', 'green', 'jtools', 'plain', 'youtube', 'cluetip', 'tipsy', 'tipped', 'bootstrap'
	];
// Create the tooltips only on document load
jQuery(document).ready(function()
{
	// Loop through the my array
	 
	 
	{
		jQuery('.myqtip')
		
			/*
			 * Lets delete the qTip data from our target element so we can apply multiple tooltips.
			 * Since the data is also stored on the tooltip element itself this isn't a problem!
			 * 
			 * Check here for more details on this: http://craigsworks.com/projects/qtip2/tutorials/advanced/#multi
			 */
			 
			.qtip({
				
				 
				
				position: {
					my: '<?php echo $myqtip_my; ?>' , // Use the corner...
					at: '<?php echo $myqtip_at; ?>', // ...and opposite corner
					 
					viewport: jQuery(window), // Keep it on-screen at all times if possible
         				adjust: {
           						 x: <?php echo $adjust_x; ?>,  y: <?php echo $adjust_y; ?>
        						 }
				},
					
				show: {
					  
				},
				
				hide: {
					
				},
				
				
				style: {
					classes: 'qtip-shadow qtip-' + '<?php echo $myqtip_style; ?>'
					/*classes: 'ui-tooltip-green ui-tooltip-shadow ui-tooltip-rounded '*/
				}
				
			});
			 
	}
	
});
</script>
 
   
<?php }
 
  function myqtip_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
   		"title" => '',
        
   ), $atts));
   return '<span class="myqtip" title="' . $title . '">' . $content . '</span>';
}
add_shortcode('myqtip', 'myqtip_shortcode'); 
 
					