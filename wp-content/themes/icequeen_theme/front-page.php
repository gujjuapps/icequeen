<?php
/**
 * The front page template file
 */
get_header(); ?>

<section>
         <div id="slides">
            <div class="slides-container">

               <div class="slide active">
                  <img src="<?php echo get_template_directory_uri();?>/images/slide1.jpg" alt="slide" class="img-responsive">               
               </div>

               <div class="slide active">
                  <img src="<?php echo get_template_directory_uri();?>/images/slide2.jpg" alt="slide" class="img-responsive">               
               </div>

               <div class="slide active">
                  <img src="<?php echo get_template_directory_uri();?>/images/slide3.jpg" alt="slide" class="img-responsive">               
               </div>

               <div class="slide active">
                  <img src="<?php echo get_template_directory_uri();?>/images/slide4.jpg" alt="slide" class="img-responsive">               
               </div>

               <div class="slide active">
                  <img src="<?php echo get_template_directory_uri();?>/images/slide5.jpg" alt="slide" class="img-responsive">               
               </div>

               <div class="slide active">
                  <img src="<?php echo get_template_directory_uri();?>/images/slide6.jpg" alt="slide" class="img-responsive">               
               </div>
            </div>
            <nav class="slides-navigation">
               <a class="prev" href="#"> <i class="fa fa-chevron-left"></i></a>
               <a class="next" href="#"> <i class="fa fa-chevron-right"></i></a>
            </nav>
         </div>
         <div class="carousel-caption">
               <div class="inner">
                  <h1>STAY <span id="changingword" style="display: inline;">BEAUTIFUL</span></h1>
                  <h5>
                       <?php if(get_field('watch_the_video_link')) { ?>
                      <a href="<?php echo get_field('watch_the_video_link');?>" target="_blank">WATCH THE VIDEO</a>
                       <?php } if(get_field('book_a_treatment_link')) { ?>
                     <a href="<?php echo get_field('book_a_treatment_link');?>" class="book" target="_blank">BOOK A TREATMENT</a>
                       <?php } ?>
                  </h5>
               </div>
            </div>
      </section>
      <section id="services" class="page-block">
         <div class="container">
         <div class="row">
         <div class="col-md-12 col-sm-12">
            <h2><?php echo get_field('title_text');?></span></h2>
            
            <?php $select_page = get_field('select_page');
        ?>
            <div id="serviceList" class="carousel slide clearfix" data-ride="carousel">
               <!-- Indicators -->
               <ol class="carousel-indicators clearfix">
                  <li data-target="#serviceList" data-slide-to="0" class="item0"><strong><?php echo $select_page[0]->post_title;?></strong><span>0</span></li>
                  <li data-target="#serviceList" data-slide-to="1" class="item1"><strong><?php echo $select_page[1]->post_title;?></strong><span>1</span></li>
                  <li data-target="#serviceList" data-slide-to="2" class="item2"><strong><?php echo $select_page[2]->post_title;?></strong><span>2</span></li>
                  <li data-target="#serviceList" data-slide-to="3" class="item3"><strong><?php echo $select_page[3]->post_title;?></strong><span>3</span></li>
                  <li data-target="#serviceList" data-slide-to="4" class="item4"><strong><?php echo $select_page[4]->post_title;?></strong><span>4</span></li>
               </ol>
               <!-- Wrapper for slides -->
               <div class="carousel-inner">
                  <div class="item">
                     <div class="col-md-4 col-sm-5">
                        <img class="img-responsive" src="<?php echo  get_field('add_image', $select_page[0]->ID); ?>" alt="1" >                        
                     </div>
                     <div class="col-md-7 col-md-offset-1 col-sm-7">
                           <h3><?php echo $select_page[0]->post_title;?></h3>
                           <p>
                             <?php echo get_field('short_description', $select_page[0]->ID); ?>
                           </p>
                              <a class="btn btn-primary read" href="<?php echo get_permalink($select_page[0]->ID);?>" rel="prettyPhoto[iframes]"> Read More </a>                           
                        </div>                     
                  </div>
                  <div class="item">
                        <div class="col-md-4 col-sm-5">
                           <img class="img-responsive" width="350" src="<?php echo  get_field('add_image', $select_page[1]->ID); ?>" alt="1">                          
                        </div>
                        <div class="col-md-7 col-md-offset-1 col-sm-7">
                              <h3><?php echo $select_page[1]->post_title;?></h3>
                              <p>
                                  <?php echo get_field('short_description', $select_page[1]->ID); ?>
                              </p>
                              <a class="btn btn-primary read" href="<?php echo get_permalink($select_page[1]->ID);?>" rel="prettyPhoto[iframes]"> Read More </a>           
                           </div>
                     </div>
                     <div class="item">
                           <div class="col-md-4 col-sm-3">
                              <img class="img-responsive" src="<?php echo  get_field('add_image', $select_page[2]->ID); ?>" alt="1">                              
                           </div>
                           <div class="col-md-7 col-md-offset-1 col-sm-7">
                                 <h3><?php echo $select_page[2]->post_title;?></h3>
                                 <p>
                                     <?php echo get_field('short_description', $select_page[2]->ID); ?>
                                 </p>
                              <a class="btn btn-primary read" href="<?php echo get_permalink($select_page[2]->ID);?>" rel="prettyPhoto[iframes]"> Read More </a>                           
                              </div>
                      </div>
                       <div class="item active">
                            <div class="col-md-4 col-sm-3">
                               <img class="img-responsive" src="<?php echo  get_field('add_image', $select_page[3]->ID); ?>" alt="4">                               
                            </div> 
                            <div class="col-md-7 col-md-offset-1 col-sm-7">
                                  <h3><?php echo $select_page[3]->post_title;?></h3>
                                  <p>
                                      <?php echo get_field('short_description', $select_page[3]->ID); ?>
                                  </p>
                              <a class="btn btn-primary read" href="<?php echo get_permalink($select_page[3]->ID);?>" rel="prettyPhoto[iframes]"> Read More </a>                           
                               </div>                            
                       </div>
                   
                   
                   <?php $gallery = get_field('add_gallery', $select_page[4]->ID); 
                 //  echo "<pre>";
                 //  print_r($gallery);
                 //  die;
                   if(!empty($gallery)){
                   ?>
                   
                       <div class="container wideGallery item ">
                             <ul class="galleryImg clearfix">
                                 <?php foreach ($gallery as $src){ ?>
                                <li  class="wow fadeInLeft" data-wow-offset="200" data-wow-delay="100ms">
                                   <a href="<?php echo $src['url'];?>" title="Your caption" rel="prettyPhoto[gallery1]">
                                      <img class="img-reponsive" src="<?php echo $src['sizes']['thumbnail'];?>" alt="Gallery">
                                      <div></div>
                                      <div></div>
                                   </a>
                                </li>
                                 <?php } ?>
                             </ul>
                        </div>
                <?php } ?>
                   <!-- end row -->
               </div>
               <!-- end container -->
               <!-- <div class="highlightBox">
                  <div class="boxBg">
                    <div class="page-block-big">
                          <h1 class="wow fadeInDown" data-wow-offset="200" data-wow-delay="100ms" >CRYOTHERAPY<strong> FOR BEAUTY</strong></h1>
                  <h1 class="wow fadeInUp" data-wow-offset="200" data-wow-delay="200ms" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;-webkit-animation-delay: 200ms; -moz-animation-delay: 200ms; animation-delay: 200ms;"><strong>CRYOTHERAPY</strong> FOR RELAXATION</h1>
                         </div>
                     </div> -->
            </div>
            <!-- end highlightBox -->   
      </section>

      <section id="highlightbox_section" class="">
           <div class="highlightBox">
              <div class="boxBg">
                <div class="page-block-big">
                      <h1 class="wow fadeInDown" data-wow-offset="200" data-wow-delay="100ms">CRYOTHERAPY<strong> FOR BEAUTY</strong></h1>
                <h1 class="wow fadeInUp" data-wow-offset="200" data-wow-delay="200ms"><strong>CRYOTHERAPY</strong> FOR RELAXATION</h1>
                    </div>
                </div>
            </div>
      </section>
<?php /* ?>
      <section id="subscribe" class="page-block-small wow fadeInDown" data-wow-offset="200" data-wow-delay="300ms">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-12 wow fadeInLeft" data-wow-offset="200" data-wow-delay="500ms">
                  <h4 class="subscribeHeading">Subscribe to our <span>newsletter</span> for special offers</h4>
               </div>
               <div class="col-md-6 col-sm-12 wow fadeInRight" data-wow-offset="200" data-wow-delay="800ms">
                   <form action="#" method="post" onSubmit="return false" role="form" id="newsletter" name="newsletter">
                         <div class="form-row">
                        <div class="col-md-10 col-sm-10 col-xs-12">
                           <input id="emailSubscribe" name="emailSubscribe" class="form-control" placeholder="Enter Your Email Address Here..." type="email">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 text-center">
                           <input id="newslettersubmit" name="newslettersubmit" value="+" class="btn btn-primary" type="submit">
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </section> <?php */ ?>
<?php /*?>
      <section id="contact" class="page-block">
         <div class="container">
            <div class="row">
               <h2>Contact <span>Us</span></h2>
               <div class="col-md-8 col-sm-8">
                  <p>Fill up form below for appointment. All fields are required.</p>
                   <form action="#" method="post" onSubmit="return false" role="form" id="contactform" name="contactform">
                     <div class="field-wrapper">
                        <div class="form-row col-md-6 wow fadeInLeft" data-wow-offset="200" data-wow-delay="100ms">
                           <input class="form-control" id="name" name="name" placeholder="Your Name" type="text">
                        </div>
                        <div class="form-row col-md-6 wow fadeInRight" data-wow-offset="200" data-wow-delay="200ms">
                           <input class="form-control" id="phone" name="phone" placeholder="Your Phone" type="tel">
                        </div>
                        <div class="form-row col-md-6 wow fadeInLeft" data-wow-offset="150" data-wow-delay="300ms">
                           <input class="form-control" id="email" name="email" placeholder="Your Email" type="email">
                        </div>
                        <div class="form-row col-md-6 wow fadeInRight" data-wow-offset="150" data-wow-delay="400ms">
                           <input class="form-control" id="datetimepicker" name="datetimepicker" placeholder="Preffered Date &amp; Time" type="datetime">
                        </div>
                        <div class="form-row col-md-12 clearfix wow fadeInUp" data-wow-offset="100" data-wow-delay="500ms">
                           <textarea cols="60" rows="3" id="comment" name="comment" class="form-control" placeholder="Write your comment here..."></textarea>
                        </div>
                        <div class="col-md-12 wow fadeInUp" data-wow-offset="50" data-wow-delay="700ms">
                           <input value="Submit" class="btn btn-default" id="contactsubmit" name="contactsubmit" type="submit">
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-3 col-md-offset-1 col-sm-4 contactInfo">
                  <h5>GET IN TOUCH</h5>
                  <p class="no-border wow fadeInRight" data-wow-offset="200" data-wow-delay="100ms">
                     <i class="fa fa-clock-o"></i> <?php echo get_field('open_time','option');?>
                  </p>
                  <p class="wow fadeInRight" data-wow-offset="200" data-wow-delay="300ms">
                     <i class="fa fa-map-marker"></i> <?php echo get_field('demo_contact_address','option');?>
                  </p>
                  <p class="wow fadeInRight" data-wow-offset="200" data-wow-delay="500ms">
                     <i class="fa fa-phone"></i> Phone: <?php echo get_field('demo_phone_no','option');?>
                  </p>
                  <p class="wow fadeInRight" data-wow-offset="200" data-wow-delay="700ms">
                     <i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo get_field('demo_email_address','option');?>" title="Email Us" target="_blank"><?php echo get_field('demo_email_address','option');?></a>
                  </p>
               </div>
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </section> <?php */?>
<?php get_footer(); ?>


