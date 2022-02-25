//custom jquery method for toggle attr
$.fn.toggleAttr = function (attr, attr1, attr2) {
    return this.each(function () {
        var self = $(this);
        if (self.attr(attr) == attr1) self.attr(attr, attr2);
        else self.attr(attr, attr1);
    });
};

(function ($) {
    // USE STRICT
    "use strict";

    MARVINS.data = {
        csrf: $('meta[name="csrf-token"]').attr("content"),
    };

    MARVINS.plugins = {
        notify: function (type = "success", message = "") {
            $.notify( message,
                {
                    verticalAlign:"top",
                    type: type,
                }
            );
        },
    };

})(jQuery);