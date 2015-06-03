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
		drop: handleDropEvent
	});
}

function handleDropEvent( event, ui ) {
  	var draggable = ui.draggable;
  	//$(this).find('img').remove();


  	alert( 'The square with ID "' + draggable.attr('id') + '" was dropped onto me!' );
}

// function imgDrop( event, ui ) {
//   var slotNumber = $(this).data( 'number' );
//   var cardNumber = ui.draggable.data( 'number' );
// }