<?php
/**
 * Admin Functions
 * Contains all admin-specific functionality and debug tools
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add admin menu for email debugging
function foto_services_admin_menu() {
    add_options_page(
        'Email Debug',
        'Email Debug',
        'manage_options',
        'foto-email-debug',
        'foto_services_email_debug_page'
    );
}
add_action('admin_menu', 'foto_services_admin_menu');

function foto_services_email_debug_page() {
    ?>
    <div class="wrap">
        <h1>Email Debug Status</h1>

        <?php
        $last_success = get_option('foto_last_email_success');
        $last_error = get_option('foto_last_email_error');
        $recipient_email = get_theme_mod('contact_recipient_email', get_option('admin_email'));
        ?>

        <h2>Current Settings</h2>
        <table class="form-table">
            <tr>
                <th>Recipient Email</th>
                <td><?php echo esc_html($recipient_email); ?></td>
            </tr>
            <tr>
                <th>WordPress Admin Email</th>
                <td><?php echo esc_html(get_option('admin_email')); ?></td>
            </tr>
        </table>

        <?php if ($last_success): ?>
        <h2>Last Successful Email</h2>
        <table class="form-table">
            <tr>
                <th>To</th>
                <td><?php echo esc_html($last_success['to']); ?></td>
            </tr>
            <tr>
                <th>Subject</th>
                <td><?php echo esc_html($last_success['subject']); ?></td>
            </tr>
            <tr>
                <th>Time</th>
                <td><?php echo esc_html($last_success['time']); ?></td>
            </tr>
        </table>
        <?php endif; ?>

        <?php if ($last_error): ?>
        <h2>Last Email Error</h2>
        <table class="form-table">
            <tr>
                <th>To</th>
                <td><?php echo esc_html($last_error['to']); ?></td>
            </tr>
            <tr>
                <th>Subject</th>
                <td><?php echo esc_html($last_error['subject']); ?></td>
            </tr>
            <tr>
                <th>Error</th>
                <td><?php echo esc_html($last_error['error']); ?></td>
            </tr>
            <tr>
                <th>Time</th>
                <td><?php echo esc_html($last_error['time']); ?></td>
            </tr>
            <tr>
                <th>Message Body</th>
                <td><pre><?php echo esc_html($last_error['body']); ?></pre></td>
            </tr>
        </table>
        <?php endif; ?>

        <h2>Send Test Email</h2>
        <?php if (isset($_POST['send_test_email'])): ?>
            <?php
            $test_to = sanitize_email($_POST['test_email']);
            if ($test_to) {
                $test_sent = wp_mail(
                    $test_to,
                    'Test Email from Foto Services',
                    "This is a test email sent at " . current_time('Y-m-d H:i:s') . "\n\nIf you received this, your email configuration is working!"
                );
                if ($test_sent) {
                    echo '<div class="notice notice-success"><p>Test email sent successfully to ' . esc_html($test_to) . '</p></div>';
                } else {
                    echo '<div class="notice notice-error"><p>Test email failed to send to ' . esc_html($test_to) . '</p></div>';
                }
            }
            ?>
        <?php endif; ?>

        <form method="post">
            <table class="form-table">
                <tr>
                    <th><label for="test_email">Send Test Email To:</label></th>
                    <td>
                        <input type="email" id="test_email" name="test_email" value="<?php echo esc_attr($recipient_email); ?>" class="regular-text" required />
                        <input type="submit" name="send_test_email" value="Send Test Email" class="button button-primary" />
                    </td>
                </tr>
            </table>
        </form>

        <h2>Troubleshooting</h2>
        <ul>
            <li><strong>Email not received?</strong> Check spam folder first</li>
            <li><strong>wp_mail failing?</strong> Your hosting may not support PHP mail(). Contact hosting provider</li>
            <li><strong>Want better delivery?</strong> Install SMTP plugin like "WP Mail SMTP"</li>
            <li><strong>Gmail users:</strong> Check "All Mail" and "Spam" folders</li>
        </ul>
    </div>
    <?php
}