<?php
/**
 * Export/Import Customizer Settings
 * Helps preserve customizer values when deploying to new environments
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Export all customizer settings to a JSON file
 * Usage: Add ?export_customizer=1 to your admin URL
 */
function foto_export_customizer_settings() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_GET['export_customizer']) && $_GET['export_customizer'] == '1') {
        $theme_mods = get_theme_mods();

        $json = json_encode($theme_mods, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="customizer-settings-' . date('Y-m-d-His') . '.json"');
        echo $json;
        exit;
    }
}
add_action('admin_init', 'foto_export_customizer_settings');

/**
 * Import customizer settings from JSON file
 * Usage: Place your JSON file in theme root as 'customizer-import.json'
 * Then add ?import_customizer=1 to your admin URL
 */
function foto_import_customizer_settings() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_GET['import_customizer']) && $_GET['import_customizer'] == '1') {
        $file = get_template_directory() . '/customizer-import.json';

        if (!file_exists($file)) {
            wp_die('Import file not found. Please upload customizer-import.json to theme root directory.');
        }

        $json = file_get_contents($file);
        $settings = json_decode($json, true);

        if (!$settings) {
            wp_die('Invalid JSON file.');
        }

        foreach ($settings as $key => $value) {
            set_theme_mod($key, $value);
        }

        wp_redirect(admin_url('customize.php'));
        exit;
    }
}
add_action('admin_init', 'foto_import_customizer_settings');

/**
 * Add admin notice with export/import instructions
 */
function foto_customizer_tools_notice() {
    if (!current_user_can('manage_options')) {
        return;
    }

    $screen = get_current_screen();
    if ($screen && $screen->id === 'themes') {
        ?>
        <div class="notice notice-info">
            <p><strong>Customizer Tools:</strong></p>
            <p>
                <a href="<?php echo admin_url('themes.php?export_customizer=1'); ?>" class="button">Export Customizer Settings</a>
                <a href="<?php echo admin_url('themes.php?import_customizer=1'); ?>" class="button" onclick="return confirm('This will import settings from customizer-import.json file in theme root. Continue?');">Import Customizer Settings</a>
            </p>
            <p><em>To import: Upload customizer-import.json to theme root directory first, then click Import.</em></p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'foto_customizer_tools_notice');
