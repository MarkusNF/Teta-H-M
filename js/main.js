var counter, pos, element;

$(document).ready(function(){
    $('.cover').click(function() {
        $('.active').removeClass('active');
        $(this).addClass("active");
    });
    dragImg();
    chooseBackground();

});

function chooseBackground() {
    $('#background').change(function() {
        var backgroundImage = $('#background').val();
        $('select option:selected').each(function() {
            $('#bed').html('<img class="board" src="img/' + backgroundImage + '.jpg"/><div class="bin"></div>');
        });
    }).trigger('change');
}

function dragImg(){
    //Counter
    counter = 0;
    //Make element draggable
    $(".shirt").draggable({
        helper:'clone',
        containment: '#bed',

        //When first dragged
        stop:function(ev, ui) {
            var pos=$(ui.helper).offset();
            objName = "#clonediv"+counter
            
            //console.log(pos);

            $(objName).removeClass("shirt");


            //When an existiung object is dragged
            $(objName).draggable({
                containment: 'parent',
                stop:function(ev, ui) {
                    var pos=$(ui.helper).offset();
                    //console.log($(this).attr("id"));
                    //console.log(pos.left)
                    //console.log(pos.top)
                }
            });
        }
    }).css('position','absolute');
    //Make element droppable
    $("#bed").droppable({
        drop: function(ev, ui) {
            console.log("Släpp");
            if (ui.draggable.attr('id').search(/drag[0-9]/) != -1){
                counter++;
                var pos=$(ui.helper).offset();
                console.log(pos);
                var element=$(ui.draggable).clone();
                console.log();
                //element.addClass("tempclass");
                $(this).append(element);
                $(element).attr("id","clonediv"+counter);
                //$("#clonediv"+counter).removeClass("tempclass");

                //Get the dynamically item id
                draggedNumber = ui.draggable.attr('id').search(/drag([0-9])/)
                itemDragged = "dragged" + RegExp.$1
                console.log(itemDragged)

                $("#clonediv"+counter).addClass(itemDragged);
            }
        }
    });
    //Make element disapear
    $('#bin').droppable({
        drop: function(event, ui) {
            ui.draggable.remove();
        }
    });
}


// function dragImg(){
//     //Counter
//     counter = 0;
//     //Make element draggable
//     $(".pic").draggable({
//         helper:'clone',
//         containment: '#bed',

//         //When first dragged
//         stop:function(ev, ui) {
//         	var pos=$(ui.helper).offset();
//         	objName = "#clonediv"+counter
//         	$(objName).css({"left":pos.left,"top":pos.top});
//         	$(objName).removeClass("pic");


//            	//When an existiung object is dragged
//             $(objName).draggable({
//             	containment: 'parent',
//                 stop:function(ev, ui) {
//                 	var pos=$(ui.helper).offset();
//                 	console.log($(this).attr("id"));
// 					console.log(pos.left)
//                     console.log(pos.top)
//                 }
//             });
//         }
//     });
//     //Make element droppable
//     $("#bed").droppable({
// 		drop: function(ev, ui) {
// 			if (ui.draggable.attr('id').search(/drag[0-9]/) != -1){
// 				counter++;
// 				var element=$(ui.draggable).clone();
// 				element.addClass("tempclass");
// 				$(this).append(element);
// 				$(".tempclass").attr("id","clonediv"+counter);
// 				$("#clonediv"+counter).removeClass("tempclass");

// 				//Get the dynamically item id
// 				draggedNumber = ui.draggable.attr('id').search(/drag([0-9])/)
// 				itemDragged = "dragged" + RegExp.$1
// 				console.log(itemDragged)

// 				$("#clonediv"+counter).addClass(itemDragged);
// 			}
//     	}
//     });
// }
