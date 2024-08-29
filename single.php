<?php get_header() ?>
<?php while(have_posts()) : the_post()?>
    <section class="single__banner bg--dark clr--light py--10">
      <div class="container">
        <div class="single__banner__header flex justify--between align--end">
          <h1>
           <?php the_title()?>
          </h1>
          <ul>
            <li><?php echo get_the_date('M j, Y')?></li>
            <li>By: <?php echo get_the_author_meta('first_name'); ?></li>
          </ul>
        </div>
        <div class="single__banner__body">
          <p>
            <?php echo get_the_excerpt()?>
          </p>
          <?php if(has_post_thumbnail( )) {
            the_post_thumbnail();
            }?>
        </div>
      </div>
    </section>
<?php endwhile; ?>

        <main class="single__article py--10 bg--dark clr--light">
      <div class="container">
        <div class="single__article__wrapper">
          <div class="single__article__info bg--light clr--dark">
            <div class="single__article__meta">
              <h4>Category</h4>
              <p><?php echo get_the_category()[0]->name?></p>
            </div>

            <div class="single__article__meta">
              <h4>Tags</h4>
              <p>
                <?php $tags = get_the_tags();
                    
                    foreach($tags as $tag) { 
                        echo $tag->name . ", ";
                     } ?>
                
                
              </p>
            </div>

            <div class="single__article__meta">
              <h4>Author</h4>
              <p>by: <span><?php echo get_the_author_meta('first_name')?></span></p>
            </div>

            <div class="single__article__meta">
              <h4>Reading</h4>
              <p><?php echo get_post_meta(get_the_ID(), 'Reading', true)?>mins</p>
            </div>
          </div>

          <div class="single__article__body">
            <div class="wrapper">
             <?php the_content()?>
            </div>

            <div class="single__navigation mt--10">
              <ul class="flex justify--between">
                <li><?php echo  get_previous_post_link( ' %link', 'Previous' )?></li>
                <li><?php echo  get_next_post_link( ' %link ', 'Next' )?></li>
        
              </ul>
            </div>
          </div>
        </div>
      </div>
    </main>

    
    <div class="single__other bg--dark clr--light">
      <div class="container">
        <div class="single__other__wrapper">
          <div class="single__other__sidebar">
            
          <?php $otherSide = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'orderby' => 'rand',
            'post__not_in' => array(get_the_ID())
          ))?>

          <?php if($otherSide->have_posts()) : while($otherSide->have_posts()) : $otherSide->the_post()?>
            
            <div class="card__sidebar">
              <ul class="card__meta flex">
                <li class="article__date"><?php echo get_the_date('M j, Y')?></li>
              </ul>
              <h3>
                <?php the_title()?>
              </h3>
              <a href="<?php the_permalink();?>">Read more</a>
            </div>
        <?php 
          endwhile;
        else: 
          echo "no post";
        endif;
        wp_reset_postdata();

        ?>
 
          </div>

           <?php $main = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'orderby' => 'rand',
            'post__not_in' => array(get_the_ID())
          ))?>

          <?php if($main->have_posts()) : while($main->have_posts()) : $main->the_post()?>
          <div class="single__other__main">
            <div class="card__other">
              <?php if(has_post_thumbnail( )) {
                the_post_thumbnail();
              }?>
              <div class="overlay"></div>
              <div class="card__other__body">
                <h3>
                 <?php the_title()?>
                </h3>
                <p>
                  <?php echo  get_the_excerpt(  )?>
                </p>
                <a href="<?php the_permalink()?>">Continue Reading</a>
              </div>
            </div>
                    <?php 
          endwhile;
        else: 
          echo "no post";
        endif;
        wp_reset_postdata();

        ?>
          </div>
        </div>
      </div>
    </div>
<?php get_footer() ?>

