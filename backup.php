<?php get_header() ?>
<?php
        $champaigners_query = new WP_Query( array(
     'category_name' => 'champaigner',
     'orderby'=> 'champaigner_name', 
     'order' => 'ASC'
   )); 

   ?>
<main id="front-page">
    <section id="hero">
        <?php if ( $champaigners_query -> have_posts() ):  ?>
        <?php while ( $champaigners_query -> have_posts()): $champaigners_query -> the_post(); ?>
        <?php 
            // ACF 
            $name = get_field( "champaigner_name");
            $description = get_field( "description");
            $promo_video_url = get_field( "promo_video")['url'];
            $thumbnail_url = get_field( "thumbnail")['url'];
            $thumbnail_alt = get_field( "thumbnail")['url'];
            $tags = get_field( "tags");
         ?>
        <div class="video-info">
            <h1><?php echo $name; ?></h1>
            <?php foreach($tags as $tag ): ?>
            <p>#<?php echo esc_html( $tag->name ) ?></p>
            <?php endforeach; ?>
            <p><?php echo $description; ?></p>
        </div>

        <video src="<?php echo $promo_video_url; ?>" autoplay muted>
            Your browser does not support the videotag.
        </video>
        <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $thumbnail_alt; ?>">
        <?php echo the_permalink(); ?>
        <?php endwhile ?>
        <?php endif ?>

    </section>
    <section id="latest-champaigners">

        <h3>Latest Uploads</h3>

    </section>

    <section id="recommended-champaigners">
        <h3>Our Favorites</h3>

    </section>
</main>







<?php get_footer() ?>