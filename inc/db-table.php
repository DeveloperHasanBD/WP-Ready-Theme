<?php
function rda_db_table_generation()

{

    global $wpdb;

    $rda_table            = $wpdb->prefix . 'rda_table';
    $rda_table_query = "CREATE TABLE {$rda_table} (
    id INT (11) NOT NULL AUTO_INCREMENT,
    name VARCHAR (255),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (id)
)";
    require_once(ABSPATH . "wp-admin/includes/upgrade.php");

    dbDelta($rda_table_query);
}
// add_action('after_switch_theme', 'rda_db_table_generation');
