/**
 * AJAX Nette Framwork plugin for jQuery
 *
 * @copyright   Copyright (c) 2009 Jan Marek
 * @license     MIT
 * @link        http://nettephp.com/cs/extras/jquery-ajax
 * @version     0.2
 */

jQuery.extend({
	nette: {
		updateSnippet: function (id, html) {
			$("#" + id).html(html);
		},

		success: function (payload) {
			// redirect
			if (payload.redirect) {
				window.location.href = payload.redirect;
				return;
			}

			// snippets
			if (payload.snippets) {
				for (var i in payload.snippets) {
					jQuery.nette.updateSnippet(i, payload.snippets[i]);
				}
			}
		}
	}
});

jQuery.ajaxSetup({
	success: jQuery.nette.success,
	dataType: "json"
});

$(function () {
    // vhodně nastylovaný div vložím po načtení stránky
    $('<div id="ajax-spinner"></div>').appendTo("body").ajaxStop(function () {
        // a při události ajaxStop spinner schovám a nastavím mu původní pozici
        $(this).hide().css({
            position: "fixed",
            left: "50%",
            top: "50%"
        });
    }).hide();
});

// zajaxovatění odkazů provedu takto
$("a.ajax").live("click", function (event) {
    event.preventDefault();

    $.get(this.href);

    // zobrazení spinneru a nastavení jeho pozice
    $("#ajax-spinner").show();
});

// odesílání formulářů
$('form.ajax').live('submit', function (event) {
    event.preventDefault();
    $.post(this.action, $(this).serialize());
    
    // zobrazení spinneru a nastavení jeho pozice
    //$("#ajax-spinner").show();
//    .css({
//        position: "absolute",
//        left: event.pageX + 20,
//        top: event.pageY + 40
//    })
});

$("div.flash").livequery(function () {
    $(this).delay(2000).animate({"opacity": 0}, 2000).slideUp();
}); 