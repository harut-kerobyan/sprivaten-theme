<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$video_type = get_sub_field('video_type');
$video_file = get_sub_field('video_file');
$youtube_link = get_sub_field('youtube_link');

?>

<section class="section-video">
    <div class="container">
        <h2 class="section-title"><?php echo $title; ?></h2>
        <p class="section-desc"><?php echo $description; ?></p>
        <div class="video-wrap">
            <?php if ($video_type == 'Youtube' && $youtube_link) : ?>
                <iframe width="800" height="400" src="<?php echo $youtube_link; ?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            <?php elseif ($video_file) : ?>
                <video controls>
                    <source src="<?php echo $video_file['url']; ?>" type="<?php echo $video_file['mime_type']; ?>">
                </video>
            <?php endif; ?>
        </div>
    </div>
</section>
