$(document).ready(function(){
 	imgDrag();

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
}
