<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$bg_image = get_sub_field('background_image');

?>

<section class="section-contact" style="background-image: url('<?php echo $bg_image; ?>');">
    <div class="container">
        <div class="contact-wrap">
            <div class="form-wrap">
                <h5><?php echo $subtitle; ?></h5>
                <h2><?php echo $title; ?></h2>
                <form class="book-appointment-form">
                    <div class="grid-wrap">
                        <div class="form-item-wrap">
                            <input type="text" name="full-name" placeholder="Full Name" class="form-item-field">
                        </div>
                        <div class="form-item-wrap">
                            <input type="email" name="email" placeholder="example@gmail.com" class="form-item-field">
                        </div>
                        <div class="form-item-wrap">
                            <select name="department" class="form-item-field">
                                <option value="">Please Select</option>
                                <option value="IT">IT</option>
                                <option value="Sales">Sales</option>
                            </select>
                        </div>
                        <div class="form-item-wrap">
                            <select name="time" class="form-item-field">
                                <option value="">Please Select</option>
                                <option value="4:00 Available">4:00 Available</option>
                                <option value="5:00 Available">5:00 Available</option>
                                <option value="6:00 Available">6:00 Available</option>
                                <option value="7:00 Available">7:00 Available</option>
                                <option value="8:00 Available">8:00 Available</option>
                                <option value="9:00 Available">9:00 Available</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-item-wrap">
                        <textarea name="message" placeholder="Message" class="form-item-field"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Appointment</button>
                </form>
            </div>
        </div>
    </div>
</section>
