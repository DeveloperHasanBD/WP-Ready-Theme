<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package redapple
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
	<div class="hm_apt_header_menu_section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
					<div class="hm_logo">
						<a href=""><img src="" alt=""></a>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-10 col-xl-10 hm_menu_pos">
					<?php
					if (has_nav_menu('primary_menu')) {
						wp_nav_menu(
							array(
								'theme_location'  => 'primary_menu',
								'container_class'  => 'hm_menu',
							)
						);
					} else {
					?>
						<p>There is not active menu for this location. Please setup from the menu option</p>
					<?php
					}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="mobile_menu">
						<!-- <span><i class="fas fa-bars"></i></span> -->
					</div>
				</div>
			</div>
		</div>
	</div>
