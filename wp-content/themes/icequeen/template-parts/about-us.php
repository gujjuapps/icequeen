<?php
/**
 * Template Name: About Us Page
 */

get_header(); ?>
<?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
<section>
      <div class="cms-pages">
       <div class="container">
         <div class="row">
           <div class="col-xs-12">
                <?php if ( have_posts() ) {
                        while ( have_posts() ) { the_post();
                            the_content();
                     } } wp_reset_postdata();
                ?>
           </div>
         </div>
       </div>
      </div>
     </section>
<?php $team_title       = get_field('demo_team_member_title');
        $team_rep       = get_field('demo_team_member_section');
       if($team_title || $team_rep) {
?>
     <section class="blogection">
      <div class="container">
        <div class="row">
         <div class="col-xs-12 col-sm-12">
         <?php if($team_title) { ?>
                <h2 class="text-center"><?php echo $team_title; ?></h2>
          <?php } ?>
         </div>
         <?php if($team_rep) { $team_cont = 1; ?>
       <?php foreach( $team_rep as $team_obj) {
                    $team_name         = $team_obj['dmeo_member_name'];
                    $team_content      = $team_obj['demo_member_desciption'];
                    $team_img          = $team_obj['demo_member_image'];
                     if($team_img){
                        $team_img_filter 	= aq_resize( $team_img, 381, 381, true, false, true );
                     }
                     $team_img_src 	= $team_img ? $team_img_filter[0] : 'https://placeholdit.imgix.net/~text?txtsize=20&txt='.$team_name.'&w=381&h=381';
        ?>
         <div class="col-xs-6 col-sm-4 col-md-3 texm-sec">
          <div class="team_box_img_main">
             <a data-fancybox data-src="#hidden-content-<?php echo $team_cont; ?>" href="javascript:;" <?php if($team_cont == 1) { ?>class="team_box_rotat sticky_button" <?php } else{ ?>class="team_box_rotat" <?php } ?>>
               <span class="team_box_img">
                 <img src="<?php echo $team_img_src; ?>">
               </span>
               <span class="team_member_name"><?php echo $team_name; ?></span>
               <div style="display: none;" class="hidden-content" id="hidden-content-<?php echo $team_cont; ?>">
                   <?php if($team_name) { ?>
                        <h2><?php echo $team_name; ?></h2>
                  <?php } ?>
                <?php if($team_img_src) { ?>
                  <img src="<?php echo $team_img_src; ?>" class="alignleft" width="170px">
                  <?php } ?>
                  <?php echo $team_content; ?>
                </div>
             </a>
            </div>
         </div>
         <?php $team_cont++; } } ?>


    </div>
  </div>
    </section>
<?php } ?>
<?php  $client_name    = get_field('demo_clients_title');
        $client_rep     = get_field('demo_add_client_image');
        if($client_name || $client_rep){
?>
    <section>
    	<div class="client_logo_section">
        	<div class="container">
            	<div class="row">
                    <?php if($client_name) { ?>
                	<div class="col-sm-12">
                    	<div class="h2 text-center"><?php echo $client_name; ?></div>
                    </div>
                    <?php } ?>

                    <div class="col-sm-12">
                    	<div id="client_logo_slider" class="owl-carousel">
                            <?php foreach( $client_rep as $client_obj) {
                                    $client_img          = $client_obj['demo_client_image'];
                                     if($client_img){
                                        $client_img_url 	= aq_resize( $client_img, 155, 155, true, false, true );
                                     }
                                     $client_img_src 	= $client_img ? $client_img_url[0] : 'https://placeholdit.imgix.net/~text?txtsize=20&txt=image&w=381&h=381';
                            ?>
                            <div class="item">
                            	<div class="clientlogo_box_main">
                                    <div class="client_logo_box">
                                        <img src="<?php echo $client_img_src; ?>" alt="logo">
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php
    get_footer();
?>
