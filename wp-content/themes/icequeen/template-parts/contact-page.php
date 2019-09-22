<?php
/**
 * Template Name: Contact Us Page
 */
get_header();
$email                       = get_field('demo_email_address', 'option');
$phone                       = get_field('demo_phone_no', 'option');
$mobile_no                   = get_field('demo_moblie_no', 'option');
$fax_no                      = get_field('demo_abn_no', 'option');
$google_analytics_code       = get_field('demo_please_enter_google_analytics_code', 'option');
$contact_address             = get_field('demo_contact_address', 'option');
$facebook                    = get_field('demo_facebook_url', 'option');
$twitter                     = get_field('demo_twitter_url', 'option');
$linkedin                    = get_field('demo_linkedin_url', 'option');
$google_plus                 = get_field('demo_google_plus_url', 'option');
$youtube                     = get_field('demo_youtube_url', 'option');
$google_iframe            = get_field('demo_goolge_iframe', 'option');
   
?>
      <div class="inner_page_container_main">
           <?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>

          <section id="contact" class="page-block">
             <div class="container">
                <div class="row">
                   <div class="col-md-8 col-sm-8">
                      <p>Fill up form below for appointment. All fields are required.</p>
                      
                      <?php echo do_shortcode('[contact-form-7 id="152" title="Contact From"]');?>
                   </div>
                   <div class="col-md-3 col-md-offset-1 col-sm-4 contactInfo">
                      <h5>GET IN TOUCH</h5>
                      <p class="no-border wow fadeInRight" data-wow-offset="200" data-wow-delay="100ms">
                         <i class="fa fa-clock-o"></i> <?php echo get_field('open_time','option');?>
                      </p>
                      <p class="wow fadeInRight" data-wow-offset="200" data-wow-delay="300ms">
                         <i class="fa fa-map-marker"></i> <?php echo $contact_address;?>
                      </p>
                      <p class="wow fadeInRight" data-wow-offset="200" data-wow-delay="500ms">
                         <i class="fa fa-phone"></i> Phone: <?php echo $phone;?>
                      </p>
                      <p class="wow fadeInRight" data-wow-offset="200" data-wow-delay="700ms">
                         <i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo $email;?>" title="Email Us" target="_blank"><?php echo $email;?></a>
                      </p>
                   </div>
                </div>
                <!-- end row -->
             </div>
             <!-- end container -->
          </section>
      </div>
	  <script>
$( function() {
    $( "#appointmentDate" ).datepicker();
  } );
</script>
	  <script>
	
jQuery.validator.addMethod("phoneAu", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length > 5 && phone_number.match(/^[- +()]*[0-9][- +()0-9]{5,16}$/);
}, "Please enter valid phone number.");
jQuery.validator.addMethod("extension", function(a, b, c) {
    return c = "string" == typeof c ? c.replace(/,/g, "|") : "pdf|doc|docx", this.optional(b) || a.match(new RegExp("\\.(" + c + ")$", "i"))
}, "Please upload file type pdf|doc|docx only.");
jQuery.validator.addMethod("maxfilesize", function(value, element) {
    if (this.optional(element) || !element.files || !element.files[0]) {
        return true;
    } else {
        return element.files[0].size <= 1024 * 1024 * 2;
    }
}, 'The file size can not exceed 2MB.');
var bookappoinment_form = jQuery("#bookappoinment_form").validate({
    rules: {
        'name': {
            required: true
        },
        'appointment_date': {
            required: true
        },
        'email': {
            required: true,
            email: true
        },
        'phone': {
            required: true,
            phoneAu: true,
            rangelength: [5, 16]
        }
    },
    messages: {
        'name': {
            required: "Please enter name."
        },
        'appointment_date': {
            required: "Please select date."
        },
        'email': {
            required: "Please enter your email.",
            email: "Please enter valid email address."
        },
        'phone': {
            required: "Please enter your phone number.",
            rangelength: "Please enter valid phone number."
        }
    },
    errorPlacement: function(error, element) {
        error.insertAfter(element);
    },
    errorElement: "label",
    errorClass: "error"
});
jQuery('#bookappoinment_form .submit_btn_box').find('.submit-btn').on('click', function(event) {
    if (bookappoinment_form.form()) {
        $(this).attr("disabled", true);
        $("#bookappoinment_form").submit();
    } else {
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
    $('body').on('wpcf7mailsent', function() {
        jQuery('.wpcf7-response-output .wpcf7-mail-sent-ok').focus();
        setTimeout(function() {
            jQuery('.wpcf7-mail-sent-ok').hide(600);
            jQuery("#bookappoinment_form").find("input[type=text]").first().focus();
            $(this).attr("disabled", false);
        }, 5000);
    })
});
	  </script>
<?php
    get_footer();
?>