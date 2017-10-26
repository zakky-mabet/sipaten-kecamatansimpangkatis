(function($){
  	$(function(){

    	$('.button-collapse').sideNav();

        $('.datepicker').pickadate({
            selectMonths: true, 
            selectYears: 15 
        });

        $('.modal').modal();

        //$('#tabs-swipe-demo').tabs({ 'swipeable': true });
      
        $('.carousel.carousel-slider').carousel({fullWidth: true}); 
  	}); 
})(jQuery); 