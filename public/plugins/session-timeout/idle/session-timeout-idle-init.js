var htm = $('html');

var UIIdleTimeout = function() {
    return {
        init: function() {
            var o;
            $("body").append(""), $.idleTimeout("#idle-timeout-dialog", ".modal-content button:last", {
                idleAfter: (htm.data('idle-after')-1) * 60,
                timeout: 3e4,
                pollingInterval: (htm.data('idle-after')-1) * 60,
                keepAliveURL: "/",
                serverResponseEquals: "OK",
                titleMessage: 'Advertencia: %s segundos hasta cerrar sesión | ',
                warningLength: 50,
                onTimeout: function() {
                    //window.location = "pages-lockscreen.html"
                    $('#logout-form-left').submit();
                },
                onIdle: function() {
                    $("#idle-timeout-dialog").modal("show"), o = $("#idle-timeout-counter"), $("#idle-timeout-dialog-keepalive").on("click", function() {
                        $("#idle-timeout-dialog").modal("hide")
                    })
                },
                onCountdown: function(e) {
                    o.html(e)
                }
            })
        }
    }
}();
jQuery(document).ready(function() {
    UIIdleTimeout.init()
});

/*$.idleTimeout('#idletimeout', '#idletimeout a', {
    idleAfter: 5,
    pollingInterval: 2,
    keepAliveURL: 'keep.php',
    serverResponseEquals: 'OK',
    onTimeout: function(){
        $(this).slideUp();
        window.location = "lock-screen.html";
    },
    onIdle: function(){
        $(this).slideDown(); // show the warning bar
    },
    onCountdown: function( counter ){
        $(this).find("span").html( counter ); // update the counter
    },
    onResume: function(){
        $(this).slideUp(); // hide the warning bar
    }
});*/