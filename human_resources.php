<?php 
/*
* Template Name: Human Resources
*/
get_header(); ?>

	<!-- - 1 - Section with metrics info - -->
    <section class="clients">
        <h1 class="clients-header"><?php the_title(); ?></h1>
        <div class="clients-wrapper" style="background: url(<?php the_field('image_cg'); ?>) center center no-repeat; background-size: cover;">
            <div class="clients-content">
                <h2 class="clients-title" style="color:<?php the_field('color_title_cg');?>"><?php the_field('title_cg'); ?></h2>
                <p class="clients-text" style="color:<?php the_field('color_text_cg');?>"><?php the_field('text_cg'); ?></p>
            </div>           
        </div>
    </section>

    <!-- - 2 - Section with partners info - -->
    <section class="clients__main content">

        <?php while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->

            <?php the_content(); ?> <!-- Page Content -->

	    <?php
	    endwhile; //resetting the page loop
	    wp_reset_query(); //resetting the page query
	    ?>

    </section>
        <section class="shared-services-more__clients">

        <h3><?php the_field('title_logos'); ?></h3>


        <?php query_posts('post_type=clients_init&clientcat=human-resources&post_status=publish'); ?>

        <?php if( have_posts() ): ?>
        <?php $counter = 1; ?>

            <div class="shared-services-more__clients-slider">

                <?php while( have_posts() ): the_post(); ?>

                    <div class="shared-services-more__clients-slider__item"><a href="<?php the_field('link_client'); ?>" class="brand_logo_<?php echo $counter; ?>"></a></div>
                    <style>
                        .brand_logo_<?php echo $counter; ?> {
                            background: url(<?php the_field('image_clogo'); ?>) center center no-repeat; background-size: contain;
                        }
                        .brand_logo_<?php echo $counter; ?>:hover {
                            background: #0099cc url(<?php the_field('image_clogo_hover'); ?>) center center no-repeat; background-size: contain;
                        }
                    </style>

                <?php $counter++; // add one per row ?> 
                <?php endwhile; ?>
            </div>
        <?php wp_reset_postdata(); ?>

        <?php else:  ?>
        <p><?php _e( 'Sorry, no clients logos matched your criteria.' ); ?></p>
        <?php endif; ?>

        <style>
            .shared-services-more__clients-slider__item a {
                -webkit-transition: all .2s;
                -moz-transition: all .2s;
                -o-transition: all .2s;
                transition: all .2s;
            }
        </style>

    </section>



	<!-- - 3 - Section with help info - -->
    <section class="section__help" style="background-image: url(<?php the_field('bg_img_contact', 'option'); ?>);">
        <h2 class="section__help-title"><?php the_field('text_contacts', 'option'); ?></h2>
        <a href="<?php the_field('link_url_contacts', 'option'); ?>" class="section__help-link">Contact Us</a>
    </section>


<?php get_footer(); ?>