var $ = jQuery;
var counter, pos, element, slug, posts, cloneId, price, sum;
var total_price = 0;

$(document).ready(function(){
    filteringCategories();  

    //Här är den korta koden
    
    // $('#clothes').on('click', '.nav-links a', function(e) {
    //  e.preventDefault();
    //  console.log('clicked link');

    //  var link = $(this).attr('href');
    //  $('#clothes').fadeOut(300, function() {
    //      $(this).load(link + ' #clothes', function() {
    //          $(this).fadeIn(300);
    //      });
    //  });
    // });

    //$('#speech-bubble').show();
    //setTimeout(function() { $('#speech-bubble').hide(); }, 5000);

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
                cloneId = $('#clonediv'+counter).attr('id');
                console.log('cloneid '+cloneId);

                $('#shoppingList ul').append('<li class="'+cloneId+'">Pris: '+price+'</li>');

                //Härifrån har jag försökt att plussa priserna till totalen, men inte lyckats
                // var new_price = ($('#shoppingList').find('li').html());
                // console.log('ny pris li '+new_price);
                // new_price = new_price.replace('Pris: ', '');
                // console.log('int '+new_price);
                
                // total_price += new_price;
                // console.log('total '+total_price);
            }
        }
    });
    //Make element disapear
    $('#bin').droppable({
        drop: function(event, ui) {
            item = $(ui.draggable).attr('id');
            console.log(item);
            $('#shoppingList ul li').each(function() {
                if( $('#shoppingList ul li').hasClass(item) ){
                    $('#shoppingList ul .'+item).remove();
                } 
            });
            console.log('bin');
            ui.draggable.remove();

        }
    });
}
