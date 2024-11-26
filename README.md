# WhatsApp Contact Form for WordPress

**WhatsApp Contact Form** is a simple and customizable WordPress plugin that allows users to submit contact forms which send messages directly to a specified WhatsApp number. It provides an easy-to-use interface with a customizable contact form, featuring a date-time picker for enhanced flexibility.

## Features

- Customizable contact form with fields for Name, Email, and Message.
- Send messages directly to WhatsApp using a formatted link.
- Fully customizable WhatsApp phone number via the WordPress admin settings.
- Shortcode support to embed the form on any page or post.
- Clean and simple design, easy to integrate into any theme.
- Option to configure additional form fields and behavior.

## Installation

### 1. Install the Plugin

- **Option 1**: Upload the plugin via the WordPress Admin Panel.
    - Go to **Plugins > Add New**.
    - Click **Upload Plugin**, choose the downloaded ZIP file, and click **Install Now**.
    - After installation, click **Activate Plugin**.
  
- **Option 2**: Manually install via FTP:
    - Download the plugin ZIP.
    - Extract the ZIP and upload the `whatsapp-contact-form` folder to your `wp-content/plugins/` directory.
    - Go to **Plugins > Installed Plugins** in your WordPress dashboard and activate the plugin.

### 2. Configure the WhatsApp Number
- Go to **Settings > WhatsApp Contact Form** in the WordPress Admin.
- Enter your WhatsApp number in international format (without `+`), e.g., `1234567890`.
- Save the settings.

### 3. Add the Form to a Page
- Create or edit a page/post where you want the form to appear.
- Add the following shortcode: `[whatsapp_contact_form]` to display the form.

## Usage

Once the plugin is activated, you'll see a **WhatsApp Contact Form** meta box in the post/page editor. The form includes fields for the user's name, email, and message. When the user submits the form, the plugin automatically opens WhatsApp with the preformatted message, ready to send.

### Customize the Form

The form fields can be easily extended by modifying the code, or you can add additional options via the plugin settings page in the WordPress admin.

## Requirements

- WordPress 5.0 or later
- PHP 7.0 or later

## Changelog

### Version 1.0
- Initial release with customizable contact form.
- WhatsApp message submission via preformatted URL.

## Troubleshooting

- **Form Not Showing**: Ensure the shortcode `[whatsapp_contact_form]` is correctly inserted into the page or post.
- **Phone Number Format**: Ensure the WhatsApp number is entered correctly in the settings page (in international format, without `+`).
- **JavaScript Not Working**: Ensure your theme does not block external JavaScript files. Try disabling other plugins or switching to the default WordPress theme (e.g., Twenty Twenty-Three) to test.

## Contributing

Feel free to fork this repository and submit pull requests. If you find a bug or have a feature request, open an issue, and we'll be happy to review it.

---

Enjoy using **WhatsApp Contact Form**? ⭐️ Star the project on GitHub and help spread the word!
