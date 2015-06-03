$(document).ready(function(){
 init();

});
 
function init() {
	$('#makeMeDraggable').draggable( {
		containment: '#content',
		cursor: 'move',
		snap: '#content'
		});
}