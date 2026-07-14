University Website Custom WordPress Theme and Plugin

This repository contains the solution for the University Website practical assessment. It involves converting a provided Figma design into a fully responsive, custom WordPress website without the use of page builders like Elementor or Divi, or custom field plugins like ACF.

The project strictly adheres to WordPress Coding Standards, PHP 8+ best practices, and utilizes native WordPress APIs for custom post types, taxonomies, and meta boxes.

Prerequisites
WordPress: Latest Version 6.x+
PHP: Version 8.0 or higher
Server: Local environment like XAMPP, LocalWP, Docker, or a live server.

Setup Instructions

Installation

Clone or download this repository.

Navigate to the wp-content/themes/ directory of your WordPress installation and place the university-theme folder inside it.

Navigate to the wp-content/plugins/ directory and place the university-utilities folder inside it.

Activation

Log in to your WordPress Admin Dashboard.

Go to Appearance then Themes, locate the University Custom Theme, and click Activate.

Go to Plugins then Installed Plugins, locate University Utilities, and click Activate.

Configuration
Set the Front Page: Create a new page named Home and publish it. Go to Settings then Reading. Under Your homepage displays, select A static page. Choose Home as your Homepage and save changes.

Setup Menus: Go to Appearance then Menus. Create a new menu for the header and assign it to the Primary Menu display location. Create a new menu for the footer and assign it to the Footer Menu display location.

Manage Courses: A new menu item called Courses will now appear in your admin sidebar. Go to Courses then Add New Course. You can utilize the native Course Information meta box below the editor to input Course Duration, Fee, Level, Admission Deadline, and toggle the Featured status. Use Course Categories to assign relevant taxonomies.

List of Plugins Used

Third-Party Plugins: None
As per the strict technical requirements of this assessment, no third-party plugins such as Advanced Custom Fields, Elementor, WPBakery, Contact Form 7, etc. were used. All functionality, including metadata saving, data sanitization, security nonces, and layout rendering, was custom-coded using native WordPress APIs.

Custom Plugins: University Utilities
Location: Included in this repository under wp-content/plugins/university-utilities.
Functionality: Registers the custom shortcode for university_year to output dynamic copyright information in the footer, keeping utility logic separate from presentation logic.

Technical Highlights
Frontend: Built with semantic HTML5, modern CSS3 using Flexbox and Grid, and Vanilla JS for the modal interactions. No heavy CSS frameworks were used, ensuring optimal performance and a lightweight DOM.
Backend: Custom Post Type course and Custom Taxonomy course_category registered natively.
Security: Native Meta Box utilizes strict sanitization, input validation, output escaping, capability checks, and nonce verification.