(function ( $ ) {
 
    $.fn.alert = function( options ) {
 
        // This is the easiest way to have default options.
        var settings = $.extend({
            // These are the defaults.
            alert: "info",
            text: "Mensaje",
            el: "#alert",
            delay: 1000
        }, options );

        // Create element button dissmis
        var btn = $('<button>').attr({
            'type': "button",
            'data-dismiss': "alert",
            'aria-label': "Close",
            'class': "float-right close"
        }).append(
            $('<span>').attr('aria-hidden',"true").html('x')
        );

        // Create element div alert
        var div = $('<div>').attr({
            'id': "alert",
            'class': "alert alert-" + settings.alert,
            'style': "display:none"
        });

        // Add element button to div
        div.append(btn);

        // Add element div to DOM
        div.append(
            $('<span>').html( settings.text )
        );

        // Si existe un elemento visible, remover
        if ($( settings.el ).length) {
            $( settings.el ).fadeOut().remove()
        }

        // Display alert with effects
        return this.prepend( div ) && $( settings.el ).fadeIn( settings.delay );
    };
 
}( jQuery ));