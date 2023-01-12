
<?php
// adding features categorys post query here
query_posts('post_type=post&category_name=featured-story&post_status=publish&posts_per_page=4&order=DESC' . get_query_var('post')
);


?>
<div class="custom_slider customm_container">
  
  <div class="custom_row">
    <div class="col-md-half">
      <div class="content-image">
<?php


  if(have_posts()) :
    while (have_posts()) : the_post();
    // slider tempalte here
  ?>
          <div class="features-image">
            <?php the_post_thumbnail(); ?>
          </div>   
 <?php
    

  endwhile;
  endif;
  ?>
  </div>
  </div>

  <div class="col-md-half last-column">
      <div class="right-content">
        <div class="slider-nav">
  <?php

  if(have_posts()) :
    while (have_posts()) : the_post();

    $featured_news_url_value = get_post_meta( get_the_ID(), 'featured_news_url', true );
    if ( ! empty( $featured_news_url_value ) ) {
      $featured_links =  $featured_news_url_value;
      $target = "_blank";
    } else {
      $featured_links = "#";
      $target = "_self";
    }
    
    // slider tempalte here
  ?>
            <div class="content">
              <div class="categories">
                  <ul class="post-categories">
                    <li>
                      Featured Story
                    </li>
                  </ul>
              <?php // the_category(); ?>

              </div>
              <div class="post-title">
                <h2> <a href="<?php echo $featured_links ?>" target="<?php echo $target;?>"> <?php the_title(); ?></a></h2>
              </div>
            </div>  
 <?php
  endwhile;
  endif;
  wp_reset_query();
  ?>
 
        </div>
      </div>
    </div>
  </div>
</div>
