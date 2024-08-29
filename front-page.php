<?php get_header()?>
    <section class="banner bg--dark clr--light">
      <div class="container">
        <div class="banner__wrapper">
          <h1 class="banner__title">The Blog</h1>
          <div class="banner__article">
            <div class="banner__grid">
              <div class="banner__primary">
                <?php $bannerlg = new WP_Query(array (
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'meta_key' => 'Grouping',
                    'meta_value' => 'Bannerlg'
                ))?>
                <?php if($bannerlg->have_posts()) : while($bannerlg->have_posts()) : $bannerlg->the_post()?>
                <div class="card__banner__lg">
                  <?php if(has_post_thumbnail()) { the_post_thumbnail();}?>
                  <ul class="card__meta flex">
                    <li class="article__date"><?php echo get_the_date('M j, Y')?></li>
                  </ul>
                  <p class="article__excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 25)?>
                  </p>
                  <a href="<?php the_permalink()?> " class="article__more">Read More</a>
                </div>
                <?php endwhile;
                else:
                    echo "no blogs";
                endif;
                wp_reset_postdata();
                ?>
              </div>

              <div class="banner__secondary">
                <?php $bannersm = new WP_Query(array (
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'meta_key' => 'Grouping',
                        'meta_value' => 'Bannersm'
                ))?>
                <?php if($bannersm->have_posts()) : while($bannersm->have_posts()) : $bannersm->the_post()?>
                <div class="card__banner__sm">
                  <div class="flex">
                    <?php if(has_post_thumbnail()) { the_post_thumbnail();}?>
                    <div class="wrapper">
                      <ul class="card__meta flex">
                        <li class="article__date"><?php echo get_the_date('M j, Y')?>/li>
                      </ul>
                      <h3>
                        <?php the_title()?>
                      </h3>
                      <a href="<?php the_permalink()?>">Read More</a>
                    </div>
                  </div>
                </div>
                <?php endwhile;
                else:
                    echo "no blogs";
                endif;
                wp_reset_postdata();
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="latest py--10">
      <div class="container">
        <h2>Latest Story</h2>
        <div class="latest__grid">

        <?php $latest = new WP_Query(array (
            'post_type' => 'post',
            'posts_per_page' => 3,
            'meta_key' => 'Grouping',
            'meta_value' => 'Latest',
            'order' => "ASC"
        ))?>

        <?php if($latest->have_posts()) : while($latest->have_posts()) : $latest->the_post()?>
          <div class="card__single__col">
            <figure class="img__wrapper">
              <?php if(has_post_thumbnail()) { the_post_thumbnail();}?>
            </figure>
            <ul class="card__meta flex">
              <li class="article__date"><?php echo get_the_date('M j, Y')?></li>
              <li class="article__category"><?php echo get_the_category()[0]->name?></li>
            </ul>
            <h3><?php the_title() ?></h3>
            <p>
              <?php echo wp_trim_words(get_the_excerpt(), 25)?>
            </p>
            <a href="<?php the_permalink()?>">Read More</a>
          </div>

        <?php endwhile;
        else:
        echo "no blogs";
        endif;
        wp_reset_postdata();
        ?>
        </div>
      </div>
    </section>

    <section class="feature bg--dark clr--light py--5 text--center">
      <div class="container">
        <h2>Feature News</h2>

         <?php $feature = new WP_Query(array (
            'post_type' => 'post',
            'posts_per_page' => 1,
            'meta_key' => 'Grouping',
            'meta_value' => 'Feature',
            'order' => "ASC"
        ))?>

         <?php if($feature->have_posts()) : while($feature->have_posts()) : $feature->the_post()?>
        <div class="feature__wrapper">
          <h3><?php the_title()?></h3>
          <p>
           <?php echo wp_trim_words(get_the_excerpt(), 30)?>
          </p>
          <a href="<?php the_permalink()?>">Read the full Story</a>
        </div>
        <div class="feature__img">
          <?php if(has_post_thumbnail()) { the_post_thumbnail();}?>
        </div>

        <?php endwhile;
          else:
            echo "no blogs";
          endif;
          wp_reset_postdata();
        ?>
      </div>
    </section>

    

    <section class="other py--10">
      <div class="container">
        <div class="other__grid">
          <div class="other__main">

        <?php $othermain = new WP_Query(array (
            'post_type' => 'post',
            'posts_per_page' => 3,
            'meta_key' => 'Grouping',
            'meta_value' => 'Othermain',
            'order' => "ASC"
        ))?>

         <?php if($othermain->have_posts()) : while($othermain->have_posts()) : $othermain->the_post()?>
            <div class="card__two__col">
              <figure>
                <?php if(has_post_thumbnail()) { the_post_thumbnail();}?>
              </figure>

              <div class="other__content">
                <ul class="card__meta flex">
                  <li class="article__date"><?php echo get_the_date('M j, Y')?></li>
                </ul>
                <h3>
                  <?php the_title()?>
                </h3>
                <p>
                  <?php echo wp_trim_words(get_the_excerpt(), 32)?>
                </p>
                <a href="<?php the_permalink()?>">Read more</a>
              </div>
            </div>
            
        <?php endwhile;
          else:
            echo "no blogs";
          endif;
          wp_reset_postdata();
        ?>
          </div>
          <div class="other__side">
        <?php $otherside = new WP_Query(array (
            'post_type' => 'post',
            'posts_per_page' => 7,
            'meta_key' => 'Grouping',
            'meta_value' => 'Otherside',
            'order' => "ASC"
        ))?>
         <?php if($otherside->have_posts()) : while($otherside->have_posts()) : $otherside->the_post()?>
            <div class="card__sidebar">
              <ul class="card__meta flex">
                <li class="article__date"><?php echo get_the_date('M j, Y')?></li>
              </ul>
              <h3>
                <?php the_title()?>
              </h3>
              <a href="<?php the_permalink()?>">Read more</a>
            </div>
        <?php endwhile;
          else:
            echo "no blogs";
          endif;
          wp_reset_postdata();
        ?>

          </div>
        </div>
      </div>
    </section>
<?php get_footer()?>
