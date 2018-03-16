<?php
/**
* The template for displaying the footer
*
* @package vega
*/
?>

<?php get_sidebar('footer'); ?>

<!-- ========== Footer Nav and Copyright ========== -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                                
                <?php if ( has_nav_menu( 'footer' ) ) :  ?>
                <!-- Navigation -->
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'footer',
                    'depth'             => 1,
                    'container'         => '',
                    'menu_class'        => 'nav-foot'
                    )
                );
                ?>
                <!-- /Navigation -->
                <?php else: ?>
                <?php vega_wp_example_nav_footer(); ?>
                <?php endif; ?>
                
            </div>
            <div class="col-md-4">
                <!-- Copyright and Credits -->
                <?php $vega_wp_footer_copyright_message = vega_wp_get_option('vega_wp_footer_copyright_message'); ?>
                <?php $vega_wp_footer_credit_message = vega_wp_get_option('vega_wp_footer_credit_message'); ?>
                <div class="copyright"><?php echo wp_kses_post($vega_wp_footer_copyright_message); ?><br />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.5 8.7" style="height:10px;">
                        <path fill="#b4be35" d="M6.4,0.1c0,0,0.1,0.3,0.2,0.9c1,3,3,5.6,5.7,7.2l-0.1,0.5c0,0-0.4-0.2-1-0.4C7.7,7,3.7,7,0.2,8.5L0.1,8.1 c2.8-1.5,4.8-4.2,5.7-7.2C6,0.4,6.1,0.1,6.1,0.1H6.4L6.4,0.1z"></path>
                    </svg> <a class="text-white no-underline" href="https://keriganmarketing.com" target="_blank" >Site by KMA</a>.</div>
                <!-- /Copyright and Credits -->
            </div>
        </div>
    </div>
</div>
<!-- ========== /Footer Nav and Copyright ========== -->

<?php get_template_part('parts/footer', 'back-to-top'); ?>
<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function($) {
        var bodyHeight = $('body').height(),
            windowHeight = $(window).height()+1;

        if ( bodyHeight < windowHeight ) {
            $('body').addClass("full");
            $('.footer').addClass("stuck");
        }else{
            $('body').removeClass("full");
            $('.footer').removeClass("stuck");
        }

        console.log(windowHeight);
        console.log(bodyHeight);
    });
</script>
</body>
</html>