<?php
  // Pulling examples from a post to use for Custom Dimensions
    if(is_single()) {
        // Get author
      $getauthor = $posts[0]->post_author;
      $gaAuthor = get_the_author_meta('display_name', $getauthor);

      // Get Pub Date
      $getdate = $posts[0]->post_date;
      $gaDate = get_the_date($getdate);

      // Get Mod Date
      $getmoddate = $posts[0]->post_date_modified;
      $gaModDate = get_the_modified_date('Y-m-d H:i:s', $getmoddate);

      // Get Tags
      $current_post_tags = wp_get_post_tags( get_the_ID() );
      $gaTags = wp_list_pluck( $current_post_tags, 'name' );
      $gaTags = join( ', ', $gaTags );

      // Get Sections
      $getcats = get_the_category( get_the_ID() );
      $gaCats = wp_list_pluck( $getcats, 'cat_name');
      $gaCat = join( ',', $gaCats );
      }
  ?>

<!-- GA Analytics code using above variables -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-your-ga-account', 'auto');
    ga('send', 'pageview', {
        'dimension1': '<?=$gaAuthor?>',
        'dimension2': '<?=$gaTags?>',
        'dimension6': '<?=$gaDate?>',
        'dimension7': '<?=$gaModDate?>',
        'dimension9': '<?=$gaCat?>'
    });
  </script>