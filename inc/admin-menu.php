<?php
function lagmp_custom_admin_menu()
{
    add_menu_page(
        __('CSV Export/Import', 'redapple'),
        __('CSV Export/Import', 'redapple'),
        'manage_options',
        'csv-ex-imp',
        'wtb_csv_exp_imp',
        'dashicons-media-spreadsheet',
        90
    );
}
// add_action('admin_menu', 'lagmp_custom_admin_menu');