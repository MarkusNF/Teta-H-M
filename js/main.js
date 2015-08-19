var $ = jQuery;
var counter, pos, element, slug, posts;

$(document).ready(function(){
    filteringCategories();  

    $('.cover').on('click', function() {
        $('.active').removeClass('active');
        $(this).addClass('active');
    });

    dragImg();
});

function filteringCategories() {
    $('.menu ul li a').on('click', function() {
        itemName = $(this).attr('id');
        console.log(itemName);

        $('#clothes div').each(function() {
            if($(this).hasClass(itemName)) {
                $(this).show();
                //console.log($(this));
            } else {
                $(this).hide();
            }
        });

    });
}

function dragImg(){
    //Counter
    counter = 0;
    //Make element draggable
    $('.wp-post-image').draggable({
        helper:'clone',
        containment: '#bed',

        // start: function(e, ui) {
        //  ui.helper.animate({
        //      width: 80,
        //      height: 150
        //  });
        // },

        //When first dragged
        stop:function(ev, ui) {
            var pos = $(ui.helper).offset();
            objName = '#clonediv'+counter;
            $(objName).removeClass('wp-post-image');

            //When an existiung object is dragged
            $(objName).draggable({
                containment: 'parent',
                stop:function(ev, ui) {
                    var pos=$(ui.helper).offset();
                }
            });
        }
    }).css('position','absolute');
    //Make element droppable
    $('#bed').droppable({
        drop: function(ev, ui) {
            if (ui.draggable.attr('id').search(/drag[0-9]/) != -1){
                counter++;
                var pos = $(ui.helper).offset();
                var element = $(ui.draggable).clone();
                //element.addClass("tempclass");
                $(this).append(element);
                $(element).attr('id','clonediv'+counter);
                //$("#clonediv"+counter).removeClass("tempclass");

                //Get the dynamically item id
                draggedNumber = ui.draggable.attr('id').search(/drag([0-9])/)
                itemDragged = 'dragged' + RegExp.$1

                $("#clonediv"+counter).addClass(itemDragged);
            }
        }
    });
    //Make element disapear
    $('#bin').droppable({
        drop: function(event, ui) {
            console.log('bin');
            ui.draggable.remove();

        }
    });
}