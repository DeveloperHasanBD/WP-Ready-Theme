<?php

/**
 * Partial template for content in page.php
 *
 * @package redapple
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<main>
	<?php
	the_content();
	understrap_link_pages();
	?>
</main>
