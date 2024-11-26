<?php
/*
Plugin Name: WhatsApp Contact Form
Description: A simple and customizable contact form that sends messages directly to WhatsApp.
Version: 1.0
Author: Himansu
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class WhatsAppContactForm {

    /**
     * Initialize the plugin.
     *
     * Hooks into the admin menu and initializes the setting.
     */
    public function __construct() {
        // Add shortcode for the contact form.
        add_shortcode('whatsapp_contact_form', [$this, 'render_contact_form']);

        // Add settings page to the admin menu.
        add_action('admin_menu', [$this, 'add_settings_page']);

        // Register settings.
        add_action('admin_init', [$this, 'register_settings']);
    }

    // Render the Contact Form
    public function render_contact_form() {
        ob_start();
        ?>
        <form id="whatsapp-contact-form" action="" method="post">
            <p>
                <label for="wcf_name">Name:</label>
                <input type="text" name="wcf_name" id="wcf_name" required>
            </p>
            <p>
                <label for="wcf_email">Email:</label>
                <input type="email" name="wcf_email" id="wcf_email" required>
            </p>
            <p>
                <label for="wcf_message">Message:</label>
                <textarea name="wcf_message" id="wcf_message" rows="5" required></textarea>
            </p>
            <input type="submit" name="wcf_submit" value="Send Message via WhatsApp">
        </form>
        <?php
        if (isset($_POST['wcf_submit'])) {
            $this->handle_form_submission();
        }
        return ob_get_clean();
    }

    /**
     * Handle form submission and redirect to WhatsApp.
     *
     * This function sanitizes user input from the contact form,
     * constructs a WhatsApp message, and opens it in a new window.
     */
    public function handle_form_submission() {
        // Sanitize form input
        $name = sanitize_text_field($_POST['wcf_name']);
        $email = sanitize_email($_POST['wcf_email']);
        $message = sanitize_textarea_field($_POST['wcf_message']);
        
        // Get saved phone number option
        $phone_number = esc_attr(get_option('wcf_phone_number'));

        // Format WhatsApp message
        $whatsapp_message = "Name: $name%0AEmail: $email%0AMessage: $message";
        $whatsapp_url = "https://wa.me/{$phone_number}?text=" . urlencode($whatsapp_message);

        // Redirect to WhatsApp in a new window
        echo "<script>window.open('$whatsapp_url', '_blank');</script>";
    }

    /**
     * Add settings page for the WhatsApp phone number.
     *
     * Hooks into the admin_menu action and adds a new options page.
     */
    public function add_settings_page() {
        add_options_page(
            __('WhatsApp Contact Form Settings', 'whatsapp-contact-form'),
            __('WhatsApp Contact Form', 'whatsapp-contact-form'),
            'manage_options',
            'whatsapp-contact-form-settings',
            [$this, 'render_settings_page']
        );
    }

    // Render Settings Page
    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1>WhatsApp Contact Form Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('wcf_settings');
                do_settings_sections('whatsapp-contact-form-settings');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    // Register Settings
    public function register_settings() {
        register_setting('wcf_settings', 'wcf_phone_number');
        add_settings_section('wcf_main_section', 'Main Settings', null, 'whatsapp-contact-form-settings');
        add_settings_field(
            'wcf_phone_number',
            'WhatsApp Phone Number',
            [$this, 'render_phone_number_field'],
            'whatsapp-contact-form-settings',
            'wcf_main_section'
        );
    }

    // Render Phone Number Field
    public function render_phone_number_field() {
        $phone_number = esc_attr(get_option('wcf_phone_number'));
        echo '<input type="text" name="wcf_phone_number" value="' . $phone_number . '" placeholder="Enter phone number">';
        echo '<p><small>Enter the phone number in international format, without "+" (e.g., 1234567890).</small></p>';
    }
}

// Initialize the plugin
new WhatsAppContactForm();
