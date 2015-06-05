$(document).ready(function(){
 	imgDrag();
 	chooseBackground();
});
 
function imgDrag() {
	$('img').draggable( {
		containment: '#bed',
		cursor: 'move'
		//snap: '#content'
	});

	 $('.bin').droppable({
        drop: function(event, ui) {
            ui.draggable.remove();
        }
    });

	$('#bed').droppable({
        drop: function(event, ui) {
            ui.draggable;
        }
    });
}

function chooseBackground() {
	$('#background').change(function() {
		var backgroundImage = $('#background').val();
		$('select option:selected').each(function() {
			$('#bed').html('<img class="board" src="img/' + backgroundImage + '.jpg"/><div class="bin"></div>');
		});
	}).trigger('change');
}