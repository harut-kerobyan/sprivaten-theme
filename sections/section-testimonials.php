<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$testimonials = get_sub_field('testimonials');

?>

<section class="section-testimonials">
    <div class="container">
        <h2 class="section-title"><?php echo $title; ?></h2>
        <p class="section-desc"><?php echo $description; ?></p>
        <?php if ($testimonials) : ?>
            <div class="swiper">
                <div class="testimonials-cards swiper-wrapper">
                    <?php foreach ($testimonials as $item) : ?>
                        <div class="testimonial-card swiper-slide">
                            <div><?php echo $item['stars']; ?></div>
                            <div><?php echo $item['text']; ?></div>
                            <div class="testimonial-card-footer">
                                <div class="testimonial-card-icon-wrap">
                                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>"/>
                                </div>
                                <div>
                                    <div class="link"><?php echo $item['name']; ?></div>
                                    <h6><?php echo $item['position']; ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
