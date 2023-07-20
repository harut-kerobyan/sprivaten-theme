<?php
$logo = get_field('footer_logo', 'option');
$socials = get_field('socials', 'option');
$copyright = get_field('copyright_text', 'option');
?>

</main>
<footer id="footer">
    <div class="container">
        <div class="footer-brand">
            <a href="<?php echo esc_url(home_url()); ?>"
               title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                <?php if (!empty($logo)) : ?>
                    <img <?php awesome_acf_responsive_image($logo['ID'], 'full', '187px'); ?>
                            alt="logo"/>
                <?php endif; ?>
            </a>
            <?php if ($socials) : ?>
                <div class="footer-socials">
                    <?php foreach ($socials as $social) : ?>
                        <a href="<?php echo $social['link']; ?>" target="_blank">
                            <img src="<?php echo $social['icon']; ?>" alt="icon">
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="footer-widgets">
            <div class="footer-widget">
                <?php dynamic_sidebar( 'widget_area_1' ); ?>
            </div>
            <div class="footer-widget">
                <?php dynamic_sidebar( 'widget_area_2' ); ?>
            </div>
            <div class="footer-widget">
                <?php dynamic_sidebar( 'widget_area_3' ); ?>
            </div>
            <div class="footer-widget">
                <?php dynamic_sidebar( 'widget_area_4' ); ?>
            </div>
            <div class="footer-widget">
                <h5 class="widget-title">Get In Touch</h5>
                <div class="subscribe-form">
                    <input type="email" placeholder="Your Email">
                    <button class="btn btn-primary">Subscribe</button>
                </div>
                <small>Lorem impsum dolor amit</small>
            </div>
        </div>
    </div>
    <div class="copyright-block">
        <div class="container">
            <?php echo $copyright; ?>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
