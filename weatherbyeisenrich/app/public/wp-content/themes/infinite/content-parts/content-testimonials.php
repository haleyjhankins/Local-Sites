
<div class="testimonials" style="background-color: #ececec; padding-top: 40px;">
  <h1 class="tac mb2">See What People Are Saying</h1>
  <hr class="bcg30 hr--sm mb1">

  <div id='RRCurrentTestimonial' style="height:115px; margin: 0 auto; display: block; text-align: center; margin-bottom: 40px;">

  </div>
  <div id='RRTestimonials' style="display: none; "></div>
</div>


<script src='https://cf.rocketreferrals.com/testimonialwidget/R50bUFZSc8akRgkBIuz5Uw.js'></script>

<script type='text/javascript'>jQuery(document).ready(function(){
	var current_index = 0;
	var testimonial_container = jQuery('#RRCurrentTestimonial');
	var testimonials_array = jQuery('#RRTestimonials').find('blockquote');
	testimonial_container.html(testimonials_array[current_index].outerHTML)
	current_index ++;
	setInterval(function(){
	testimonial_container.fadeOut().promise().done(function(){
	testimonial_container.html(testimonials_array[current_index].outerHTML);
	testimonial_container.fadeIn().promise().done(function(){
	if(current_index == testimonials_array.length-1){
	current_index = 0;
	}else{
	current_index++;
}
});
});
}, 7500);});
</script>
