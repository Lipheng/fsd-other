$(document).ready(function() {
    //hide addon and drinks on first load
    $('#sub-addon').hide();
    $('#sub-drinks').hide();

    //burger onclick
    $('#menu-burger').on('click', function() {
        $('#sub-addon').hide();
        $('#sub-drinks').hide();

        $('#sub-burgers').show();
    });

    //addon onclick
    $('#menu-addon').on('click', function() {
        $('#sub-burgers').hide();
        $('#sub-drinks').hide();

        $('#sub-addon').show();
    });

    //drinks onclick
    $('#menu-drinks').on('click', function() {
        $('#sub-burgers').hide();
        $('#sub-addon').hide();

        $('#sub-drinks').show();
    });

    ///////////////////////////////// order total

    //order total first load
    function orderTotal() {
        var total = 0;
        $('#order-total').text(total);
    }

    orderTotal();

    //b-1 add button > update order total

    $('#b-1').on('click', function() {
        var total = $('#order-total').text();
        const b1Price = 16;

        //convert total from str to int
        total = parseInt(total);

        //update the total statement
        total += b1Price;
        $('#order-total').text(total);

        //update hidden button value
        $('#order-total-hidden').attr('value', total);
    });

    //b-2 add button > update order total

    $('#b-2').on('click', function() {
        var total = $('#order-total').text();
        const b2Price = 12.5;

        //convert total from str to int
        total = parseInt(total);

        //update the total statement
        total += b2Price;
        $('#order-total').text(total);

        //update hidden button value
        $('#order-total-hidden').attr('value', total);
    });

    //b-3 add button > update order total

    $('#b-3').on('click', function() {
        var total = $('#order-total').text();
        const b3Price = 16;

        //convert total from str to int
        total = parseInt(total);

        //update the total statement
        total += b3Price;
        $('#order-total').text(total);

        //update hidden button value
        $('#order-total-hidden').attr('value', total);
    });

    //b-4 add button > update order total

    $('#b-4').on('click', function() {
        var total = $('#order-total').text();
        const b4Price = 10;

        //convert total from str to int
        total = parseInt(total);

        //update the total statement
        total += b4Price;
        $('#order-total').text(total);

        //update hidden button value
        $('#order-total-hidden').attr('value', total);
    });

    //a-5 add button > update order total

    $('#a-5').on('click', function() {
        var total = $('#order-total').text();
        const a5Price = 5.5;

        //convert total from str to int
        total = parseInt(total);

        //update the total statement
        total += a5Price;
        $('#order-total').text(total);

        //update hidden button value
        $('#order-total-hidden').attr('value', total);
    });

    //a-6 add button > update order total

    $('#a-6').on('click', function() {
        var total = $('#order-total').text();
        const a6Price = 4.5;

        //convert total from str to int
        total = parseInt(total);

        //update the total statement
        total += a6Price;
        $('#order-total').text(total);

        //update hidden button value
        $('#order-total-hidden').attr('value', total);
    });

    //d-7 add button > update order total

    $('#d-7').on('click', function() {
        var total = $('#order-total').text();
        const d7Price = 3;

        //convert total from str to int
        total = parseInt(total);

        //update the total statement
        total += d7Price;
        $('#order-total').text(total);

        //update hidden button value
        $('#order-total-hidden').attr('value', total);
    });

    //d-8 add button > update order total

    $('#d-8').on('click', function() {
        var total = $('#order-total').text();
        const d8Price = 3;

        //convert total from str to int
        total = parseInt(total);

        //update the total statement
        total += d8Price;
        $('#order-total').text(total);

        //update hidden button value
        $('#order-total-hidden').attr('value', total);
    });

    //d-9 add button > update order total

    $('#d-9').on('click', function() {
        var total = $('#order-total').text();
        const d9Price = 3;

        //convert total from str to int
        total = parseInt(total);

        //update the total statement
        total += d9Price;
        $('#order-total').text(total);

        //update hidden button value
        $('#order-total-hidden').attr('value', total);
    });

    //d-10 add button > update order total

    $('#d-10').on('click', function() {
        var total = $('#order-total').text();
        const d10Price = 5;

        //convert total from str to int
        total = parseInt(total);

        //update the total statement
        total += d10Price;
        $('#order-total').text(total);

        //update hidden button value
        $('#order-total-hidden').attr('value', total);
    });

});