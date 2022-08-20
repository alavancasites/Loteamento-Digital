$(document).ready(function() {
	$('.accordionButton').click(function() {
		$('.accordionButton').removeClass('on');
	 	$('.accordionContent').slideUp('normal');
		if($(this).next().is(':hidden') == true) {
			$(this).addClass('on');
			$(this).next().slideDown('normal');
		 } 
	 });
	$('.accordionButton').mouseover(function() {
		$(this).addClass('over');
	}).mouseout(function() {
		$(this).removeClass('over');										
	});
	$('.accordionContent').hide();
});
/*
  <div class="accordionButton">Button 1 Content</div>
  <div class="accordionContent">Content 1<br /><br /><br /><br /><br /><br /><br /><br />Long Example</div>
*/

/*
	$( ".accordionButton" ).first().addClass( "on" ); //Add classe on no primeiro registro, para deixar aberto
	CSS:
	 .accordionButton  { cursor:pointer;}
	 .accordionContent { display:block;}
*/