<?php
/*
Plugin Name: Yosta id payment method
Description: Add ID Column to Payment Methods Table
Version: 0.1
Author: Joost Abrahams
Author URI: https://mantablog.nl
GitHub Plugin URI: https://github.com/joost-abrahams/
Source  URI: https://rudrastyh.com/woocommerce/add-id-column-to-payment-methods-table.html
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Requires Plugins: woocommerce
*/

// Exit if accessed directly
defined( 'ABSPATH' ) or die;

//declare complianz with consent level API
$plugin = plugin_basename( __FILE__ );
add_filter( "wp_consent_api_registered_{$plugin}", '__return_true' );

add_filter( 'woocommerce_payment_gateways_setting_columns', 'rudr_add_payment_method_column' );

function rudr_add_payment_method_column( $default_columns ) {

	$default_columns = array_slice( $default_columns, 0, 2 ) + array( 'id' => 'ID' ) + array_slice( $default_columns, 2, 3 );
	return $default_columns;

}

// woocommerce_payment_gateways_setting_column_{COLUMN ID}
add_action( 'woocommerce_payment_gateways_setting_column_id', 'rudr_populate_gateway_column' );

function rudr_populate_gateway_column( $gateway ) {

	echo '<td style="width:10%">' . $gateway->id . '</td>';

}
