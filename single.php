<?php get_header(); ?>
<main id="single-post-content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php 
// ACF 
$name = get_field( "champaigner_name");
$description = get_field( "description");
$promo_video_url = get_field( "promo_video")['url'];
$thumbnail_url = get_field( "thumbnail")['url'];
$thumbnail_alt = get_field( "thumbnail")['url'];
$tags = get_field( "tags");
?>

    <h1><?php echo $name; ?></h1>
    <?php echo the_permalink(); ?>
    <p><?php echo $description; ?></p>
    <video src="<?php echo $promo_video_url; ?>" controls autoplay>Your browser does not support the video
        tag.</video>
    <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $thumbnail_alt; ?>">
    <?php foreach($tags as $tag ): ?>
    <p>#<?php echo esc_html( $tag->name ) ?></p>
    <?php endforeach; ?>
    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>