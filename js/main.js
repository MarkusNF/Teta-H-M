var $ = jQuery;
var counter, pos, element, slug, posts, price, sum;
var total_price = 0;
var images_array = [];
var current_position = 0;
var numberOfSlides = 0;

$(document).ready(function(){
    filteringCategories();  

    $('.cover').on('click', function() {
        $('.active').removeClass('active');
        $(this).addClass('active');
    });

    // if( $('body').hasClass('tax-gender_category') ){
    //  $('.cover .wp-post-image').each(function() {
    //      var imgUrl = $(this).attr('src');
    //      images_array.push(imgUrl);
    //      console.log(images_array);
    //  });
    //  numberOfSlides = images_array.length-1;

    //  $('.control_next').on('click', function() {
    //      right();
    //      console.log(current_position);
    //  });

    //  $('.control_prev').on('click', function() {
    //      left();
    //  });
    // }

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

function left() {
    if(current_position == 0) {
        current_position = images_array.length - 1;
    } else {
        current_position--;
    }
}

function right() {
    if(current_position == images_array.length - 1) {
        current_position = 0;
    }
    else {
        current_position++;
    }
}

function dragImg(){
    //Counter
    counter = 0;
    //Make element draggable
    $('.wp-post-image, .meta').draggable({
        helper:'clone',
        containment: '#bed',

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

                //Här skrivs priset ut för varje plagg som dragits ner till rutan
                price = ($('#bed #clonediv'+counter).attr('data-price'));
                console.log(price);
                $('#shoppingList ul').append('<li>Pris: '+price+'</li>');

                //Härifrån har jag försökt att plussa priserna till totalen, men inte lyckats
                var new_price = ($('#shoppingList').find('li').html());
                console.log('ny pris li '+new_price);
                new_price = new_price.replace('Pris: ', '');
                console.log('int '+new_price);
                
                total_price += new_price;
                console.log('total '+total_price);
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
