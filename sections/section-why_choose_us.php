<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$feature_items = get_sub_field('feature_items');

?>

<section class="section-why-us">
    <div class="container">
        <h2 class="section-title"><?php echo $title; ?></h2>
        <p class="section-desc"><?php echo $description; ?></p>
        <?php if ($feature_items) : ?>
            <div class="why-us-cards">
                <?php foreach ($feature_items as $item) : ?>
                    <div class="why-us-card">
                        <div class="why-us-card-head">
                            <div>
                                <div class="why-us-card-icon-wrap">
                                    <img src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>"/>
                                </div>
                            </div>
                            <h5><?php echo $item['title']; ?></h5>
                        </div>
                        <?php if ($item['learn_more'] || $item['content']) : ?>
                            <div class="why-us-card-body">
                                <div><?php echo $item['content']; ?></div>
                                <?php if ($item['learn_more']) : ?>
                                    <a href="<?php echo $item['learn_more']['url']; ?>"
                                       target="<?php echo $item['learn_more']['target']; ?>" class="link">
                                        <?php echo $item['learn_more']['title']; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
