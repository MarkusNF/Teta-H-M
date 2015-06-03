$(document).ready(function(){
 	imgDrag();

});
 
function imgDrag() {
	$('img').draggable( {
		containment: '#bed',
		cursor: 'move'
		//snap: '#content'
		});
}

// function imgDrop( event, ui ) {
//   var slotNumber = $(this).data( 'number' );
//   var cardNumber = ui.draggable.data( 'number' );
// }