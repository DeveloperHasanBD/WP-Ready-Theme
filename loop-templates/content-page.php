<?php

/**
 * Partial template for content in page.php
 *
 * @package redapple
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div class="redapple_comtainer_width">
	<?php
	the_content();
	understrap_link_pages();
	?>
</div>
