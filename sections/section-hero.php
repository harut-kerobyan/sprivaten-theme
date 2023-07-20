<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
$button_1 = get_sub_field('button_1');
$button_2 = get_sub_field('button_2');
$bg_image = get_sub_field('background_image');

?>

<section class="section-hero" style="background-image: url('<?php echo $bg_image; ?>');">
    <div class="container">
        <div class="hero-wrap">
            <div class="hero-content-wrap">
                <h1><?php echo $title; ?></h1>
                <h4><?php echo $description; ?></h4>
                <div class="buttons-wrap">
                    <?php if ($button_1) : ?>
                        <a href="<?php echo $button_1['url']; ?>" target="<?php echo $button_1['target']; ?>"
                           class="btn btn-secondary">
                            <?php echo $button_1['title']; ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($button_2) : ?>
                        <a href="<?php echo $button_2['url']; ?>" target="<?php echo $button_2['target']; ?>"
                           class="btn btn-ghost">
                            <?php echo $button_2['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-wrap">
                <h3>Book Appointment</h3>
                <form class="book-appointment-form">
                    <div class="form-item-wrap">
                        <label>
                            <span>Name*</span>
                            <input type="text" name="full-name" placeholder="Full Name" class="form-item-field">
                        </label>
                    </div>
                    <div class="form-item-wrap">
                        <label>
                            <span>Email*</span>
                            <input type="email" name="email" placeholder="example@gmail.com" class="form-item-field">
                        </label>
                    </div>
                    <div class="form-item-wrap">
                        <label>
                            <span>Department*</span>
                            <select name="department" class="form-item-field">
                                <option value="">Please Select</option>
                                <option value="IT">IT</option>
                                <option value="Sales">Sales</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-item-wrap">
                        <label>
                            <span>Time*</span>
                            <select name="time" class="form-item-field">
                                <option value="">Please Select</option>
                                <option value="4:00 Available">4:00 Available</option>
                                <option value="5:00 Available">5:00 Available</option>
                                <option value="6:00 Available">6:00 Available</option>
                            </select>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Appointment</button>
                </form>
            </div>
        </div>
    </div>
</section>
