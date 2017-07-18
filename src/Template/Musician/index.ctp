<?php echo $Showcalendar; ?>


<script type="text/javascript">

$('.calendar').on('click',".show-next-block",function(){
	$(".show-booking-block").remove();	
	$('#calendarhtml .dates li').removeClass("curved-li-bottom");
	$('#calendarhtml .dates li').removeClass("curved-li-top");
	var columntext = $(this).html();
	var cellTime = $(this).attr('data-current-date');
	if($(this).hasClass("blocked") == false && $(this).hasClass("selected-cell") == false){
		$('#calendarhtml .dates .date').removeClass("selected-cell");
		$(this).addClass("selected-cell");
		$(this).parent().after('<li class="show-booking-block"><img class="center-image" src="<?php echo $this->Url->build('/', true); ?>/img/calendar/ajax-loading.gif"/></li>');
		$(".show-booking-block").prev().addClass("curved-li-bottom");
		$(".show-booking-block").next().addClass("curved-li-top");
			$.ajax({
				type: "GET",
				url: "<?php echo $this->Url->build('/', true); ?>musician/getslotsbydate",
				data: {date_field: cellTime},
				success: function(events){
					$(".show-booking-block").html(events);
				}
			});
		}		
});

</script>

