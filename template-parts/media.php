
<?php
// adding features categorys post query here
query_posts('post_type=post&category_name=news&post_status=publish&posts_per_page=-1&order=DESC' . get_query_var('post')
);


?>

<div class="row cs_post media cat_news">

    <?php

    if(have_posts()) :
      while (have_posts()) : the_post();

      $featured_news_url_value = get_post_meta( get_the_ID(), 'featured_news_url', true );
      if ( ! empty( $featured_news_url_value ) ) {
        $featured_links =  $featured_news_url_value;
        $target = "_blank";
      } else {
        $featured_links = get_the_permalink();
        $target = "_self";
      }
    ?>
      <div class="col-md-4 col-lg-3">
        <div class="post_column">
            <div class="features-image">
              <?php the_post_thumbnail(); ?>
            </div>
            <div class="post_content">
              <h2> <a href="<?php echo $featured_links ?>" target="<?php echo $target;?>"> <?php the_title(); ?></a></h2>
              <div class="categories">
                <p class="post-meta"><span class="published"> <?php echo the_time('M j, Y'); ?></span> | News</p>
<!-- 
                    <ul class="post-categories">
                      <li>
                        <?php //echo the_time('M j, Y'); ?>
                      </li>
                      <li>
                        News
                      </li>
                    </ul> -->
                <?php // the_category(); ?>
                </div>
                <a class="read_more cs_btn" href="<?php echo $featured_links ?>" target="<?php echo $target;?>">Read More</a>
            </div> 
          </div> 
        </div> 
  <?php
    endwhile;
    endif;
    wp_reset_query();
    ?>

</div>
