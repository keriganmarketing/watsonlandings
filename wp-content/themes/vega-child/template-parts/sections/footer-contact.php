<?php ?>
<div class="section">
    <div class="container">
        <?php if(is_front_page()){ ?><h2 class="block-title">Contact Us</h2><?php } ?>
        <div class="row">
            <div class="col-md-7">
                <h3>Service Area</h3>
                <div class="embed-responsive embed-responsive-4by3" >
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110744.54931545295!2d-85.40719741961689!3d29.842141779736842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x889499febe2f8843%3A0x8834036b36937b09!2s138+White+Blossom+Trail%2C+Port+St+Joe%2C+FL+32456!5e0!3m2!1sen!2sus!4v1516127135309" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="recent-entry col-md-5">
                <h3>Email</h3>
                <?php echo do_shortcode('[ninja_form id=1]'); ?>
            </div>
        </div>
    </div>
</div>
