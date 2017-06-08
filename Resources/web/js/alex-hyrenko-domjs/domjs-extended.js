(function (domjs) {
    'use strict';

    domjs.extend({
        value: function (value, index) {
            return this.val(value, index);
        },

        get size() {
            return this.length;
        },

        set size(value) {
            this.length = value;
        },
        native: function (index) {
            return domjs.isElement(this[index]) ? this[index] : null;
        },

        disabled (value) {
            return this.each(function (element) {
                element.disabled = value;
            });
        },

        lock: function () {
            return this.find('input, button, select, textarea').disabled(true);
        },

        unlock: function () {
            return this.find('input, button, select, textarea').disabled(false);
        },
    });

})(app.DOM);