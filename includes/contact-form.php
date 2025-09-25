<?php
/**
 * Contact Form Handler
 * Handles contact form submissions and email functionality
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Contact form handler
function handle_contact_form() {
    if (isset($_POST['contact_form_submit'])) {
        $name = sanitize_text_field($_POST['contact_name']);
        $email = sanitize_email($_POST['contact_email']);
        $message = sanitize_textarea_field($_POST['contact_message']);

        // Get customizable email settings
        $to = get_theme_mod('contact_recipient_email', get_option('admin_email'));
        $subject = get_theme_mod('contact_email_subject', 'New Contact Form Submission - Foto Services');
        $from_name = get_theme_mod('contact_email_from_name', 'Foto Services Website');

        // Create email body
        $body = "You have received a new contact form submission:\n\n";
        $body .= "Name: " . $name . "\n";
        $body .= "Email: " . $email . "\n";
        $body .= "Message:\n" . $message . "\n\n";
        $body .= "---\n";
        $body .= "This email was sent from the contact form on " . get_bloginfo('name') . "\n";
        $body .= "Website: " . home_url() . "\n";
        $body .= "Time: " . current_time('Y-m-d H:i:s');

        // Set email headers
        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: ' . $from_name . ' <' . get_option('admin_email') . '>',
            'Reply-To: ' . $name . ' <' . $email . '>'
        );

        // Send email
        $sent = wp_mail($to, $subject, $body, $headers);

        // Enhanced debugging
        if (!$sent) {
            error_log('Contact form email failed to send. To: ' . $to . ', Subject: ' . $subject);
            // Store failed email for admin review
            update_option('foto_last_email_error', array(
                'to' => $to,
                'subject' => $subject,
                'body' => $body,
                'time' => current_time('Y-m-d H:i:s'),
                'error' => 'wp_mail returned false'
            ));
        } else {
            // Log successful send
            error_log('Contact form email sent successfully to: ' . $to);
            update_option('foto_last_email_success', array(
                'to' => $to,
                'subject' => $subject,
                'time' => current_time('Y-m-d H:i:s')
            ));
        }

        // Redirect with success message
        wp_redirect(add_query_arg('contact_sent', '1', wp_get_referer()));
        exit;
    }
}
add_action('init', 'handle_contact_form');