<?php get_header(); ?>

<main id="primary" class="site-main">

    <section class="hero-section" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-bg.jpg' ); ?>');">
        <div class="container text-center">
            <h1>Join the University of Aberdeen in India</h1>
            <p>Global challenges are waiting for new ways of thinking. Discover your true north and learn overseas, block subjects and continually excel.</p>
        </div>
    </section>

    <section class="stats-bar bg-navy-dark">
        <div class="container grid-3-col text-center">
            <div class="stat-item"><h3 class="text-yellow">Top 20</h3><p>Ranked among the top global universities</p></div>
            <div class="stat-item"><h3 class="text-yellow">Top 10</h3><p>Globally for graduate employability</p></div>
            <div class="stat-item"><h3 class="text-yellow">96%</h3><p>Of graduates are in employment or further study 6 months after graduation</p></div>
        </div>
    </section>

    <section class="why-choose bg-light-grey py-5">
        <div class="container">
            <h2 class="section-title">Why Choose Aberdeen</h2>
            <div class="grid-3-col">
                <div class="card standard-card border-top-yellow">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/uk-degree.jpg' ); ?>" alt="UK Degree">
                    <div class="card-body">
                        <h3>UK Degree in India</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video-intro text-center py-5">
        <div class="container">
            <h2 class="section-title">Discover Aberdeen Mumbai</h2>
            <p>Intro text about the campus...</p>
            <div class="video-wrapper">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/video-thumb.jpg' ); ?>" alt="Play Video">
                </div>
        </div>
    </section>

    <section class="our-programmes bg-navy py-5">
        <div class="container">
            <h2 class="section-title text-white">Our Programmes</h2>
            <div class="grid-2-col">
                
                <?php
                // Custom Query to fetch 2 Featured Courses
                $course_args = [
                    'post_type'      => 'course',
                    'posts_per_page' => 2,
                    'meta_query'     => [
                        [
                            'key'   => '_featured_course',
                            'value' => 'yes',
                        ]
                    ]
                ];
                $course_query = new WP_Query( $course_args );

                if ( $course_query->have_posts() ) :
                    while ( $course_query->have_posts() ) : $course_query->the_post();
                        // Call the reusable card template
                        get_template_part( 'template-parts/course-card' );
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="text-white">No programmes found.</p>';
                endif;
                ?>

            </div>
        </div>
    </section>

    <section class="cta-banner bg-navy-dark my-5">
        <div class="container grid-2-col align-items-center">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/student-cta.jpg' ); ?>" alt="Student">
            <div class="cta-content">
                <h3 class="text-yellow">Ready to Move Forward?</h3>
                <p class="text-white">Connect with Aberdeen's global network...</p>
                <a href="#" class="btn-primary trigger-modal">Apply Now</a>
            </div>
        </div>
    </section>

    </main>

<?php get_footer(); ?>