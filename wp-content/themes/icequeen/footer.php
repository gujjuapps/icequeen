<?php
/**
 * The template for displaying the footer
 */
?>
<?php  $site_logo                   = get_field('demo_site_logo', 'option');
       $email                       = get_field('demo_email_address', 'option');
       $phone                       = get_field('demo_phone_no', 'option');
       $google_analytics_code       = get_field('demo_please_enter_google_analytics_code', 'option');
       $contact_address             = get_field('demo_contact_address', 'option');
       $facebook                    = get_field('demo_facebook_url', 'option');
       $twitter                     = get_field('demo_twitter_url', 'option');
       $pintrest                    = "";//get_field('demo_pinterest_url', 'option');
       $google_plus                 = "";//get_field('demo_google_plus_url', 'option');
       $youtube                     = "";//get_field('demo_youtube_url', 'option');
?>

      <footer id="copyright" class="page-block-small wow fgadeInDown" data-wow-offset="70" data-wow-delay="700ms">
         <div class="container text-center">
            <div class="row">
                <p><?php echo get_field('copy_right_text','option');?></p>
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </footer>
     
      </div>
<?php wp_footer(); ?>
 <script>
             $(document).ready(function () {        
          var b = ["YOUNG", "HEALTHY", "ACTIVE", "FIT", "STRONG", "COOL", "AGILE", "SHARP", "BEAUTIFUL"],
            a = 0;
          setInterval(function () {
                $("#changingword").fadeOut(function () {
              $(this).text(b[a = (a + 1) % b.length]).fadeIn();
                 })
            }, 3000);
          
         });
      </script>
<?php echo $google_analytics_code; ?>
         
         </body>
         </html>
