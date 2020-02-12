<?php 
/* Template Name: Contact Form */ 
?>

<?php get_header(); ?>

<!-- Title and promo text -->
<div class="pagebgd">
	<div class="container_12">
		<div class="grid_6_no_margin">
    		<div class="pagetitle">
            	 <?php if(class_exists('the_breadcrumb') ){ $bc = new the_breadcrumb;} ?>
            </div>
    	</div>
    	<div class="grid_6_no_margin">
    		 <?php get_search_form(); ?>
    	</div>
		<div class="clearnospacing"></div>
	</div>
</div>
<?php $promo = get_post_meta($post->ID, "_promo", $single = false);?>
<?php if(!empty($promo[0]) ):?>
   <div class="calloutcontainer">
		<div class="container_12">
			<div class="grid_12">            
				<?php echo do_shortcode($promo[0]);?>
			</div>
		</div>
	</div>    
<?php endif?>
<div class="divider_shadow"></div>
<!-- Page contents -->
<div class="pagecontents">
    <div class="container_12">
        <div class="grid_9 paddingleft">	            
             <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                    <div class="clearsmall"></div>
					<div class="contentbox">
						<?php if(isset($hasError) || isset($captchaError)): ?>
                            <p class="error"><?php _e('There was an error submitting the form.', 'Cosmopolitan')?><p>
                        <?php endif ?>
                      
                        <form id="contactForm" method="post" class="contactsubmit">
                            <p><?php _e('Your email address will not be shared.', 'Cosmopolitan')?></p>
                            <div class="clearsmall"></div>
                            <div id="registerErrors"></div>
                            <div>
                                <input type="text" name="contactName" id="contactName" title="<?php _e( 'Name', 'Cosmopolitan' ); ?>" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField txt" />
                                <?php if(isset($nameError) && $nameError != ''): ?><span class="error"><?php echo $nameError;?></span><?php endif;?>
                            </div>
                            <div>    
                                <input type="text" name="email" id="email" title="<?php _e( 'E-mail', 'Cosmopolitan' ); ?>" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" class="requiredField txt" />
                                <?php if(isset($emailError) && $emailError != ''): ?><span class="error"><?php echo $emailError;?></span><?php endif;?>
                            </div>
                            <div>
                                <input type="text" name="subject" title="<?php _e( 'Subject', 'Cosmopolitan' ); ?>" value="<?php if(isset($_POST['subject'])) echo $_POST['subject'];?>" class="txt" id="subject" />
                                <?php if(isset($subject) && !$subject = ''): ?><span class="error"><?php echo $subjectError;?></span><?php endif;?>
                            </div>
                            <div>
                                <textarea name="message" title="<?php _e( 'Message', 'Cosmopolitan' ); ?>" rows="8" tabindex="3" id="message" class="txt requiredField"><?php echo isset($_POST['message']) && $_POST['message']!='' ?  stripslashes($_POST['message'])  : ''?></textarea>
                                <?php if(isset($messageError) && $messageError != '') { ?>
                                    <span class="error"><?php echo $messageError;?></span> 
                                <?php } ?>
                            </div>                       
                            <div>
                                <?php 
                                    $al_options = get_option('al_general_settings'); 
                                    $options = array(
                                        $al_options['al_contact_error_message'], 
                                        $al_options['al_contact_success_message'],
                                        $al_options['al_subject'],
                                        $al_options['al_email_address']
                                    );
                                ?>
                                <input type="hidden" name = "options" value="<?php echo implode(',', $options) ?>" />
                                <input type="hidden" name="siteurl" value="<?php echo get_option('blogname')?>" />
                                <input type="submit" id="send" class="button highlight small" name="sendmail" value="<?php _e( 'Submit', 'Cosmopolitan' ); ?>" />
                                <div class="clearnospacing"></div>
                            </div>
                        </form>
                	</div>
				<?php endwhile; ?>
            <?php endif; ?>   
        </div>
        <aside class="grid_3 sidebarright alignright">
        	<?php generated_dynamic_sidebar() ?>
        </aside>
        <div class="clear"></div>
    </div>
</div>

   
<script type="text/javascript">

jQuery(document).ready(function(){
  jQuery("#contactForm").validate({
	submitHandler: function() {
	
		var postvalues =  jQuery(".contactsubmit").serialize();
		jQuery.ajax
		 ({
		   type: "POST",
		   url: "<?php echo get_template_directory_uri()  ?>/contact-form.php",
		   data: postvalues,
		   success: function(response)
		   {
		 	 jQuery("#registerErrors").addClass('success-message').html(response).show('normal');
		     jQuery('.contactsubmit :input.not("#send")').val("");
		 	 jQuery('.contactsubmit #message').val("");
		   }
		 });
		return false;
		
    },
	focusInvalid: true,
	focusCleanup: false,
	errorLabelContainer: jQuery("#registerErrors"),
  	rules: 
	{
		contactName: {required: true},
		email: {required: true, minlength: 6,maxlength: 50, email:true},
		message: {required: true}
	},
	
	messages: 
	{
		contactName: {required: "<?php _e( 'Name is required', 'Cosmopolitan' ); ?>"},
		email: {required: "<?php _e( 'E-mail is required', 'Cosmopolitan' ); ?>", email: "<?php _e( 'Please provide a valid e-mail', 'Cosmopolitan' ); ?>"},
		message: {required: "<?php _e( 'Message is required', 'Cosmopolitan' ); ?>"}
		
	},
	
	errorPlacement: function(error, element) 
	{
		var er = element.attr("name");
		error.insertAfter(element);
	},
	invalidHandler: function()
	{
		jQuery("body").animate({ scrollTop: 0 }, "slow");
	}
});
});
</script>
<?php get_footer(); ?>