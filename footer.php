<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coopers
 */

?>

    <footer aria-labelledby="footer__title">
      <div class="footer-content container">
        <h3 id="footer__title"><?php the_field('footer_title', 6); ?></h3>
        <address>
          <a href="mailto:<?php the_field('footer_email', 6); ?>">
            <?php the_field('footer_email', 6); ?>
          </a>
        </address>
        <p class="copyright"><?php the_field('footer_copyright', 6); ?></p>
      </div>
      <div class="footer-decoration"></div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
