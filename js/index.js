$(document).ready(function(){
    //Top sale
    $("#top-sale .owl-carousel").owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        responsive:{
            0: {
                items:1
            },
            600: {
                items:3
            },
            1000: {
                items : 5
            }
        }
    });

    //isoTope Filter
    var $grid = $(".grid").isotope({
        itemSelector:'.grid-item',
        layoutMode:'fitRows'
    });

    //filter item on button click
    $(".button-group").on("click","button",function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter:filterValue});
    });

    //New Phones
    $("#new-phones .owl-carousel").owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        responsive:{
            0: {
                items:1
            },
            600: {
                items:3
            },
            1000: {
                items : 5
            }
        }
    });

    //Blog Owl Carousal
    $("#blogs .owl-carousel").owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        responsive:{
            0: {
                items:1
            },
            600: {
                items:2
            },
            1000: {
                items:3
            }
        }
    });

    //Product qty section
    let $qty_up = $(".qty-up");
    let $qty_down = $(".qty-down");
    let $input =$(".qty .qty-input");

    //Click qty up button
    $qty_up.click(function(e){
        if($input.val()>=1 && $input.val()<=10){
            $input.val(function(i, oldval){
                return ++oldval;
            });
        }
    });
    //Click qty down button
    $qty_down.click(function(e){
        if($input.val()>1 && $input.val()<=11){
            $input.val(function(i, oldval){
                return --oldval;
            });
        }
    });


});