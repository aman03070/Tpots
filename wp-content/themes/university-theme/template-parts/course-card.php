<?php
$post_id  = get_the_ID();
$duration = get_post_meta( $post_id, '_course_duration', true );
$fee      = get_post_meta( $post_id, '_course_fee', true );
$level    = get_post_meta( $post_id, '_course_level', true );
$terms    = get_the_terms( $post_id, 'course_category' );
?>

<article class="course-card">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="course-thumbnail">
            <?php the_post_thumbnail( 'medium', ['loading' => 'lazy'] ); ?>
        </div>
    <?php endif; ?>

    <div class="course-content">
        <div class="course-meta-tags">
            <span class="level"><?php echo esc_html( $level ); ?></span>
            <span class="duration"><?php echo esc_html( $duration ); ?></span>
        </div>
        
        <h3 class="course-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
            <div class="course-categories">
                <?php foreach ( $terms as $term ) : ?>
                    <span class="badge"><?php echo esc_html( $term->name ); ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="course-footer">
            <div class="course-price">
                <?php echo $fee ? '$' . esc_html( $fee ) : 'Free'; ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="btn-read-more">View Course</a>
        </div>
    </div>
</article>