<?php get_header() ?>
<?php
        $featured_content_query = new WP_Query( array(
     'post_type' => 'champaigners',
     'meta_key'		=> 'is_featured',
    'meta_value'	=> true,
   )); 

    $champaigners_query = new WP_Query( array(
     'post_type' => 'champaigners',
     'posts_per_page' => 8,
   )); 

   ?>
<main id="front-page">
    <section class="hv-center" id="hero">
        <?php if ( $featured_content_query -> have_posts() ):  ?>
        <?php while ( $featured_content_query -> have_posts()): $featured_content_query -> the_post(); ?>
        <?php 
            // ACF 
            $is_featured = get_field( "is_featured");       
            $heading = get_field( "heading");
            $subheading = get_field( "subheading");
            $bg_url = get_field( "background_image")['url'];
            $bg_alt = get_field( "background_image")['alt'];
         ?>
        <div id="hero-content">
            <h1 id="hero-heading"><?php echo $heading ?></h1>
            <h3 id="hero-subheading"><?php echo $subheading ?></h3>
        </div>
        <!-- <div class="tint"></div> -->
        <div id="bg-container">

            <!-- <div id="hero-bg"></div> -->
        </div>
        <?php endwhile; endif; ?>

    </section>
    <section id="latest-champaigners">


        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h5>Latest Uploads</h5>
                </div>
                <?php if ( $champaigners_query -> have_posts() ):  ?>
                <?php while ( $champaigners_query -> have_posts()): $champaigners_query -> the_post(); ?>
                <?php 
        // ACF 
            $name = get_field( "champaigner_name");
            $description = get_field( "description");
            // $promo_video_url = get_field( "promo_video")['url'];
            $thumbnail_url = get_field( "thumbnail")['url'];
            $thumbnail_alt = get_field( "thumbnail")['url'];
            $tags = get_field( "tags");
        ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 py-3">
                    <a class="champaigners-thumbnail-link" href=" <?php echo the_permalink(); ?>" target="_blank">
                        <img class="champaigners-thumbnail" src="<?php echo $thumbnail_url; ?>"
                            alt="<?php echo $thumbnail_alt; ?>">
                    </a>
                </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>

    <!-- <section id="recommended-champaigners">
        <h3>Our Favorites</h3>
    </section> -->
</main>







<?php get_footer() ?>