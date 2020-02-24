jQuery(document).ready(function(){
// This button will increment the value
    $(".plus").click( function(e) {

        e.preventDefault();

        // Define field variable
        field = "input[name=" + $(this).attr("field") + "]";

        // Get its current value
        var currentVal = parseInt($(field).val());

        // If is not undefined
        if ( !isNaN(currentVal) && currentVal < 20 ) {

            // Increment
            $(field).val(currentVal + 1);

        }

    });

// This button will decrement the value till 0
    $(".minus").click( function(e) {

        e.preventDefault();

        // Define field variable
        field = "input[name=" + $(this).attr("field") + "]";

        // Get its current value
        var currentVal = parseInt($(field).val());

        // If it isn't undefined or its greater than 0
        if ( !isNaN(currentVal) && currentVal > 1 ) {
            // Decrement one
            $(field).val(currentVal - 1);
        }

    });

    $(".plusRoom").click( function(e) {

        e.preventDefault();

        // Define field variable
        field = "input[name=" + $(this).attr("field") + "]";

        // Get its current value
        var currentVal = parseInt($(field).val());

        // If is not undefined
        if ( !isNaN(currentVal) && currentVal < 20 ) {

            // Increment
            $(field).val(currentVal + 1);

        }

    });

// This button will decrement the value till 0
    $(".minusRoom").click( function(e) {

        e.preventDefault();

        // Define field variable
        field = "input[name=" + $(this).attr("field") + "]";

        // Get its current value
        var currentVal = parseInt($(field).val());

        // If it isn't undefined or its greater than 0
        if ( !isNaN(currentVal) && currentVal > 1 ) {
            // Decrement one
            $(field).val(currentVal - 1);
        }

    });
});