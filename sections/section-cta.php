<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$button = get_sub_field('button');

?>

<section class="section-cta">
    <div class="container">
        <div class="cta-wrap">
            <div>
                <h3><?php echo $title; ?></h3>
                <p><?php echo $description; ?></p>
            </div>
            <div class="buttons-wrap">
                <?php if ($button) : ?>
                    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"
                       class="btn btn-primary">
                        <?php echo $button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
