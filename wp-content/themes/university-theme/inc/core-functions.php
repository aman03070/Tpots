<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// 1. Register 'Courses' Custom Post Type
add_action( 'init', 'univ_register_course_cpt' );
function univ_register_course_cpt() {
    $args = [
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-welcome-learn-more',
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'labels'        => [
            'name'          => 'Courses',
            'singular_name' => 'Course',
            'add_new_item'  => 'Add New Course',
            'all_items'     => 'All Courses',
        ],
    ];
    register_post_type( 'course', $args );
}

// 2. Register 'Course Categories' Taxonomy
add_action( 'init', 'univ_register_course_taxonomy' );
function univ_register_course_taxonomy() {
    $args = [
        'hierarchical'      => true,
        'show_admin_column' => true,
        'labels'            => [
            'name'          => 'Course Categories',
            'singular_name' => 'Course Category',
        ],
    ];
    register_taxonomy( 'course_category', [ 'course' ], $args );
}

// 3. Register Native Meta Box
add_action( 'add_meta_boxes', 'univ_add_course_meta_box' );
function univ_add_course_meta_box() {
    add_meta_box( 'course_information', 'Course Information', 'univ_render_course_meta_box', 'course', 'normal', 'high' );
}

// 4. Render Meta Box Form
function univ_render_course_meta_box( $post ) {
    wp_nonce_field( 'save_course_info', 'course_info_nonce' );

    $duration = get_post_meta( $post->ID, '_course_duration', true );
    $fee      = get_post_meta( $post->ID, '_course_fee', true );
    $level    = get_post_meta( $post->ID, '_course_level', true );
    $deadline = get_post_meta( $post->ID, '_admission_deadline', true );
    $featured = get_post_meta( $post->ID, '_featured_course', true );

    ?>
    <style>
        .univ-meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; padding: 10px 0; }
        .univ-meta-field { display: flex; flex-direction: column; }
        .univ-meta-field label { font-weight: 600; margin-bottom: 6px; }
        .univ-meta-field input, .univ-meta-field select { padding: 6px; }
    </style>
    <div class="univ-meta-grid">
        <div class="univ-meta-field">
            <label for="course_duration">Course Duration (Text)</label>
            <input type="text" id="course_duration" name="course_duration" value="<?php echo esc_attr( $duration ); ?>">
        </div>
        <div class="univ-meta-field">
            <label for="course_fee">Course Fee (Number)</label>
            <input type="number" step="0.01" id="course_fee" name="course_fee" value="<?php echo esc_attr( $fee ); ?>">
        </div>
        <div class="univ-meta-field">
            <label for="course_level">Course Level</label>
            <select id="course_level" name="course_level">
                <option value="">Select Level</option>
                <option value="Beginner" <?php selected( $level, 'Beginner' ); ?>>Beginner</option>
                <option value="Intermediate" <?php selected( $level, 'Intermediate' ); ?>>Intermediate</option>
                <option value="Advanced" <?php selected( $level, 'Advanced' ); ?>>Advanced</option>
            </select>
        </div>
        <div class="univ-meta-field">
            <label for="admission_deadline">Admission Deadline (Date)</label>
            <input type="date" id="admission_deadline" name="admission_deadline" value="<?php echo esc_attr( $deadline ); ?>">
        </div>
        <div class="univ-meta-field" style="grid-column: span 2; flex-direction: row; align-items: center; gap: 10px;">
            <input type="checkbox" id="featured_course" name="featured_course" value="yes" <?php checked( $featured, 'yes' ); ?>>
            <label for="featured_course" style="margin: 0;">Mark as Featured Course</label>
        </div>
    </div>
    <?php
}

// 5. Save Meta Data Securely
add_action( 'save_post', 'univ_save_course_meta' );
function univ_save_course_meta( $post_id ) {
    // Security Checks
    if ( ! isset( $_POST['course_info_nonce'] ) || ! wp_verify_nonce( $_POST['course_info_nonce'], 'save_course_info' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    // Sanitize and Save
    if ( isset( $_POST['course_duration'] ) ) {
        update_post_meta( $post_id, '_course_duration', sanitize_text_field( wp_unslash( $_POST['course_duration'] ) ) );
    }
    if ( isset( $_POST['course_fee'] ) ) {
        update_post_meta( $post_id, '_course_fee', floatval( wp_unslash( $_POST['course_fee'] ) ) );
    }
    if ( isset( $_POST['admission_deadline'] ) ) {
        update_post_meta( $post_id, '_admission_deadline', sanitize_text_field( wp_unslash( $_POST['admission_deadline'] ) ) );
    }
    if ( isset( $_POST['course_level'] ) ) {
        $valid_levels = ['Beginner', 'Intermediate', 'Advanced'];
        $level = in_array( $_POST['course_level'], $valid_levels ) ? $_POST['course_level'] : '';
        update_post_meta( $post_id, '_course_level', sanitize_text_field( wp_unslash( $level ) ) );
    }

    $is_featured = isset( $_POST['featured_course'] ) ? 'yes' : 'no';
    update_post_meta( $post_id, '_featured_course', $is_featured );
}