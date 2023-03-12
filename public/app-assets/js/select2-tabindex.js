jQuery(document).ready(function($) {
    var docBody = $(document.body);
    var shiftPressed = false;
    var clickedOutside = false;
    //var keyPressed = 0;

    docBody.on('keydown', function(e) {
        var keyCaptured = (e.keyCode ? e.keyCode : e.which);
        //shiftPressed = keyCaptured == 16 ? true : false;
        if (keyCaptured == 16) { shiftPressed = true; }
    });
    docBody.on('keyup', function(e) {
        var keyCaptured = (e.keyCode ? e.keyCode : e.which);
        //shiftPressed = keyCaptured == 16 ? true : false;
        if (keyCaptured == 16) { shiftPressed = false; }
    });

    docBody.on('mousedown', function(e){
        // remove other focused references
        clickedOutside = false;
        // record focus
        if ($(e.target).is('[class*="select2"]')!=true) {
            clickedOutside = true;
        }
    });

    docBody.on('select2:opening', function(e) {
        // this element has focus, remove other flags
        clickedOutside = false;
        // flag this Select2 as open
        $(e.target).attr('data-s2open', 1);
    });
    docBody.on('select2:closing', function(e) {
        // remove flag as Select2 is now closed
        $(e.target).removeAttr('data-s2open');
    });

    docBody.on('select2:close', function(e) {
        var elSelect = $(e.target);
        elSelect.removeAttr('data-s2open');
        var currentForm = elSelect.closest('form');
        var othersOpen = currentForm.has('[data-s2open]').length;
        if (othersOpen == 0 && clickedOutside==false) {
            /* Find all inputs on the current form that would normally not be focus`able:
             *  - includes hidden <select> elements whose parents are visible (Select2)
             *  - EXCLUDES hidden <input>, hidden <button>, and hidden <textarea> elements
             *  - EXCLUDES disabled inputs
             *  - EXCLUDES read-only inputs
             */
            var inputs = currentForm.find(':input:enabled:not([readonly], input:hidden, button:hidden, textarea:hidden)')
                .not(function () {   // do not include inputs with hidden parents
                    return $(this).parent().is(':hidden');
                });
            var elFocus = null;
            $.each(inputs, function (index) {
                var elInput = $(this);
                if (elInput.attr('id') == elSelect.attr('id')) {
                    if ( shiftPressed) { // Shift+Tab
                        elFocus = inputs.eq(index - 1);
                    } else {
                        elFocus = inputs.eq(index + 1);
                    }
                    return false;
                }
            });
            if (elFocus !== null) {
                // automatically move focus to the next field on the form
                var isSelect2 = elFocus.siblings('.select2').length > 0;
                if (isSelect2) {
                    elFocus.select2('open');
                } else {
                    elFocus.focus();
                }
            }
        }
    });

    docBody.on('focus', '.select2', function(e) {
        var elSelect = $(this).siblings('select');
        if (elSelect.is('[disabled]')==false && elSelect.is('[data-s2open]')==false
            && $(this).has('.select2-selection--single').length>0) {
            elSelect.attr('data-s2open', 1);
            elSelect.select2('open');
        }
    });

});
