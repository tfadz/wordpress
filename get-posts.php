
  <?php

  // Pull in all the custom post types of a type
  $related = get_posts( array( 
      'numberposts' => -1,
      'orderby' => 'title',
      'post_type' => 'case_study',
      'order'   => 'ASC', 
      'post__not_in' => array($post->ID) ) );

  if( $related ) foreach( $related as $post ) {

      setup_postdata($post); ?>

      <li>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </li>

<?php }
wp_reset_postdata(); 
?>




<?php 

// Pull in Category Name from Post Type
$obj = get_post_type_object( 'case_study' ); ?>

<div class="cs-header__title h5"><?php echo $obj->labels->singular_name; ?></div>
<h1><?php the_title() ?></h1>
<div><?php the_category(); ?></div>


<?php
// Pull Posts
$args = array(
  'posts_per_page' => -1,
  'no_found_rows'  => true,
  'tag'            => 'bicentenary-2019' 
);
$loop = new WP_Query($args);
if( $loop->have_posts() ) : ?>
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <article>
      <a href="<?php the_permalink(); ?>">
        <figure><?php the_post_thumbnail(); ?></figure></a>
        <h2><?php the_title() ?></h2>
      </article>
    <?php endwhile; ?> 
  <?php endif;
  wp_reset_postdata();
  ?>


