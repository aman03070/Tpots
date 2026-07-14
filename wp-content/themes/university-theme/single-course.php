$fee = get_post_meta( get_the_ID(), '_course_fee', true );
if ( $fee ) {
    echo '<p>Fee: $' . esc_html( $fee ) . '</p>';
}