<?php
get_header(); 
?>

<main id="main-content" role="main">
    <!-- Seção principal -->
    <section class="hero-section" aria-labelledby="hero__title">
      <div class="container">
        <div class="hero__content">
          <h1 id="hero__title">

            <?php the_field('hero_title'); ?>
            <span class="green-detail">
              <?php the_field('hero_title_highlight'); ?>
            </span>
          </h1>
          <p class="hero__description">
            <?php the_field('hero_description'); ?>
          </p>
          <a href="<?php the_field('url_botao'); ?>" class="button-primary">
            <?php the_field('hero_button_text'); ?>
          </a>
        </div>

        <div class="hero__image-container">
          <?php 
            $hero_img = get_field('hero_image');
            if ($hero_img) {
              $alt_from_media = get_post_meta($hero_img, '_wp_attachment_image_alt', true);
              $alt_text = $alt_from_media ? $alt_from_media : 'Woman smiling wearing red';
        
              echo wp_get_attachment_image($hero_img, 'full', false, [
                'class' => 'hero-img',
                'alt' => $alt_text,
              ]);
            }
          ?>
        </div>
      </div>
    </section>
    
    

    <!-- Seção de preços -->
    <section id="pricing-section" class="pricing-section" aria-labelledby="pricing__title">
      <div class="pricing__title-div">
        <h2 id="pricing__title">
          <?php the_field('pricing__title'); ?>
        </h2>
        <p class="pricing__text">
          <?php the_field('pricing__text'); ?>
        </p>
      </div>
      <div class="container">
        <div class="pricing__prices-div">
          <article class="pricing__plan-option">
            <div class="pricing__plan-div card-shadow">
              <p class="plan-price">
                <span aria-label="Price">R$
                  <?php the_field('plan1_price'); ?>
                </span> /
                <?php the_field('plan1_price_period'); ?>
              </p>
              <div class="plan-price__title">
                <h3>
                  <?php the_field('plan1-price__title'); ?>
                </h3>
                <p><strong>
                    <?php the_field('plan1-price__highlight'); ?>
                  </strong></p>
              </div>
              <ul class="plan-features">
                <li>
                  <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  <?php the_field('plan-1-first-feature'); ?>
                </li>
                <li>
                  <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  <?php the_field('plan-1-second-feature'); ?>
                </li>
                <li>
                  <i class="fa-solid fa-circle-xmark" aria-hidden="true"></i>
                  <?php the_field('plan-1-third-feature'); ?>
                </li>
                <li>
                  <i class="fa-solid fa-circle-xmark" aria-hidden="true"></i>
                  <?php the_field('plan-1-fourth-feature'); ?>
                </li>
                <li>
                  <i class="fa-solid fa-circle-xmark" aria-hidden="true"></i>
                  <?php the_field('plan-1-fifth-feature'); ?>
                </li>
              </ul>
              <a href="<?php the_field('url_plan1_button'); ?>" class="button-secondary"><?php the_field('plan1_button_text'); ?></a>
            </div>
          </article>
          <article class="pricing__plan-option">
            <div class="pricing__plan-div card-shadow">
              <p class="plan-price">
                <span aria-label="Price">R$
                  <?php the_field('plan2_price'); ?>
                </span> /
                <?php the_field('plan2_price_period'); ?>
              </p>
              <div class="plan-price__title">
                <h3>
                  <?php the_field('plan2-price__title'); ?>
                </h3>
                <p><strong>
                    <?php the_field('plan2-price__highlight'); ?>
                  </strong></p>
              </div>
              <ul class="plan-features">
                <li>
                  <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  <?php the_field('plan-2-first-feature'); ?>
                </li>
                <li>
                  <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  <?php the_field('plan-2-second-feature'); ?>
                </li>
                <li>
                  <i class="fa-solid fa-circle-xmark" aria-hidden="true"></i>
                  <?php the_field('plan-2-third-feature'); ?>
                </li>
                <li>
                  <i class="fa-solid fa-circle-xmark" aria-hidden="true"></i>
                  <?php the_field('plan-2-fourth-feature'); ?>
                </li>
                <li>
                  <i class="fa-solid fa-circle-xmark" aria-hidden="true"></i>
                  <?php the_field('plan-2-fifth-feature'); ?>
                </li>
              </ul>
              <a href="<?php the_field('url_plan2_button'); ?>" class="button-secondary"><?php the_field('plan2_button_text'); ?></a>
            </div>
          </article>
        </div>
      </div>
    </section>



    <!-- Seção de posts do blog -->
    <section class="blog-section" aria-labelledby="blog-heading">
      <div class="container blog-bg">
        <h2 id="blog-heading"><?php the_field('blog-heading'); ?></h2>
        
        <div class="blog-slider">
            <div class="slider-container">
                <button class="slider-prev" aria-label="Previous slide">&lt;</button>
            
                <div class="slider-wrapper">
                  <?php
                  $query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 6
                  ));
            
                  if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                      $categories = get_the_category();
                  ?>
                      <article class="slide">
                      <div class="slide-image" style="position:relative;">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail('large', ['alt' => esc_attr(get_the_title())]); ?>
                        </a>
                      </div>
                      <div class="slide-content">
                        <?php
                        if (!empty($categories)) :
                          echo '<span class="slide-tag">' . esc_html($categories[0]->name) . '</span>';
                        endif;
                        ?>
                        
                        <h3><?php the_title(); ?></h3>
                        
                        <a class="read-more" href="<?php the_permalink(); ?>">read more</a>
                      </div>
                    </article>
                  <?php
                    endwhile;
                    wp_reset_postdata();
                  endif;
                  ?>
                </div>
            
                <button class="slider-next" aria-label="Next slide">&gt;</button>
                
            <div class="slider-dots"></div>
        </div>
      </div>
        
      </div>
    </section>



    <!-- Seção de formulário -->
    <section id="contact-form" class="contact-section" aria-labelledby="contact__title">
      <div class="container">
        <div class="contact__form card-shadow">
          <div class="contact__form-img">
            <?php 
              $contact_image = get_field('contact_image');
              if ($contact_image) {
                echo wp_get_attachment_image($contact_image, 'full', false, ['alt' => 'Smiling woman with patterned background']);
              }
            ?>
          </div>
          <div class="contact__form-title">
            <?php 
              $contact_icon = get_field('contact_icon');
              if ($contact_icon) {
                echo wp_get_attachment_image($contact_icon, [90, 60], false, ['alt' => 'Ícone de e-mail']);
              }
            ?>
            <h2 id="contact__title"><?php the_field('contact_title'); ?></h2>
          </div>
          <form class="form" action="#" method="post" novalidate>
            <div>
              <label for="name"><?php the_field('contact_name_label'); ?></label>
              <input type="text" id="name" name="name" placeholder="<?php the_field('contact_name_placeholder'); ?>" aria-label="<?php the_field('contact_name_label'); ?>">
            </div>
            <div class="row">
              <div class="col-2">
                <label for="email"><?php the_field('contact_email_label'); ?></label>
                <input type="email" id="email" name="email" placeholder="<?php the_field('contact_email_placeholder'); ?>" required aria-required="true" aria-label="<?php the_field('contact_email_label'); ?>">
              </div>
              <div class="col-2">
                <label for="telephone"><?php the_field('contact_telephone_label'); ?></label>
                <input type="tel" id="telephone" name="telephone" placeholder="<?php the_field('contact_telephone_placeholder'); ?>" aria-label="<?php the_field('contact_telephone_label'); ?>">
              </div>
            </div>
            <div>
              <label for="message"><?php the_field('contact_message_label'); ?></label>
              <textarea rows="5" id="message" name="message" placeholder="<?php the_field('contact_message_placeholder'); ?>" aria-label="<?php the_field('contact_message_label'); ?>"></textarea>
            </div>
            <button class="button-primary form-button col-2 disabled"><?php the_field('contact_button_text'); ?></button>
          </form>
        </div>
      </div>
    </section>
</main>

<?php
get_footer(); 
?>
