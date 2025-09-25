<?php
/**
 * Custom Fields (Meta Boxes)
 * Contains all custom field definitions and handlers
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add Custom Fields (ACF Alternative)
function foto_services_custom_fields() {
    // Service fields
    add_meta_box('service_details', 'Service Details', 'service_details_callback', 'service');

    // Portfolio fields
    add_meta_box('portfolio_details', 'Portfolio Details', 'portfolio_details_callback', 'portfolio');

    // Testimonial fields
    add_meta_box('testimonial_details', 'Testimonial Details', 'testimonial_details_callback', 'testimonial');
}
add_action('add_meta_boxes', 'foto_services_custom_fields');

function service_details_callback($post) {
    $icon = get_post_meta($post->ID, '_service_icon', true);
    $features = get_post_meta($post->ID, '_service_features', true);
    ?>
    <p>
        <label>Icon:</label>
        <input type="text" name="service_icon" value="<?php echo esc_attr($icon); ?>" placeholder="🖼️" />
    </p>
    <p>
        <label>Features (one per line):</label>
        <textarea name="service_features" rows="5" cols="50"><?php echo esc_textarea($features); ?></textarea>
    </p>
    <?php
}

function portfolio_details_callback($post) {
    $before_image = get_post_meta($post->ID, '_before_image', true);
    $after_image = get_post_meta($post->ID, '_after_image', true);
    ?>
    <p>
        <label>Before Image URL:</label>
        <input type="url" name="before_image" value="<?php echo esc_url($before_image); ?>" style="width:100%" />
    </p>
    <p>
        <label>After Image URL:</label>
        <input type="url" name="after_image" value="<?php echo esc_url($after_image); ?>" style="width:100%" />
    </p>
    <?php
}

function testimonial_details_callback($post) {
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    $author = get_post_meta($post->ID, '_testimonial_author', true);
    $location = get_post_meta($post->ID, '_testimonial_location', true);
    ?>
    <p>
        <label>Rating (1-5):</label>
        <input type="number" name="testimonial_rating" value="<?php echo esc_attr($rating); ?>" min="1" max="5" />
    </p>
    <p>
        <label>Author:</label>
        <input type="text" name="testimonial_author" value="<?php echo esc_attr($author); ?>" />
    </p>
    <p>
        <label>Location:</label>
        <input type="text" name="testimonial_location" value="<?php echo esc_attr($location); ?>" />
    </p>
    <?php
}

// Save custom fields
function save_custom_fields($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Service fields
    if (isset($_POST['service_icon'])) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
    }
    if (isset($_POST['service_features'])) {
        update_post_meta($post_id, '_service_features', sanitize_textarea_field($_POST['service_features']));
    }

    // Portfolio fields
    if (isset($_POST['before_image'])) {
        update_post_meta($post_id, '_before_image', esc_url_raw($_POST['before_image']));
    }
    if (isset($_POST['after_image'])) {
        update_post_meta($post_id, '_after_image', esc_url_raw($_POST['after_image']));
    }

    // Testimonial fields
    if (isset($_POST['testimonial_rating'])) {
        update_post_meta($post_id, '_testimonial_rating', intval($_POST['testimonial_rating']));
    }
    if (isset($_POST['testimonial_author'])) {
        update_post_meta($post_id, '_testimonial_author', sanitize_text_field($_POST['testimonial_author']));
    }
    if (isset($_POST['testimonial_location'])) {
        update_post_meta($post_id, '_testimonial_location', sanitize_text_field($_POST['testimonial_location']));
    }
}
add_action('save_post', 'save_custom_fields');