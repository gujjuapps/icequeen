<?php
/**
 * Template Name: Faq Page
 */

get_header(); ?>
<div class="container-main">
<?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
<section class="inner_page faq_page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="services-detail">
                    <?php if ( have_posts() ) {
                            while ( have_posts() ) { the_post();
                            the_content();
                           } wp_reset_postdata(); }
                   ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php $faq_data = get_field('demo_faq_data');
                        if($faq_data){ $fcount = 1; ?>
                    <div class="panel-group faq" id="accordion">
                       <?php foreach ($faq_data as $faq_obj) { ?>
                            <div class="panel">
                                <div class="panel-heading">
                                    <a title="<?php echo $faq_obj['demo_faq_question']?>" data-toggle="collapse" data-parent="#accordion" href="#q_0<?php echo $fcount; ?>" <?php if($fcount != 1){ ?>class="collapsed"<?php } ?> aria-expanded="false">
                                        <?php echo $faq_obj['demo_faq_question']?>
                                    </a>
                                </div>
                                <div class="panel-collapse collapse <?php if($fcount == 1){ echo 'in'; } ?>" aria-expanded="false" id="q_0<?php echo $fcount; ?>">
                                    <div class="answer">
                                        <?php echo $faq_obj['demo_faq_answer']?>
                                    </div>
                                </div>
                            </div>
                      <?php $fcount++; } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
</div>
<?php
    get_footer();
?>
