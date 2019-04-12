// також в define можна писати від яких модулів буде залежати мій модуль
define([], function () {

    return {

        sum: function (x, y) {
            return x + y;
        },

        abs: function (x) {
            return (x > 0) ? x : (-1) * x;
        },

        mySqrt: function (a) {
            //var x = 1;
            //var xn = (1/2)*(a/x);

            return "sqrt";
        }
    };

});
