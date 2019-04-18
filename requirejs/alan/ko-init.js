
//jQuery(function(){
//    viewModel = {
//        title:"Hello ",
//        content:"So many years of hello "
        //    };
//    ko.applyBindings(viewModel);
//});

jQuery(function(){
    var viewModelConstructor = function()
    {
        this.getTitle = function()
        {
            return "Hello World";
        }
        this.content = "So many years of hello world";

        this.theValue = ko.observable("1");

        var that = this;
        this.pickRandomValue = function(){
            //var val = Math.floor(Math.random() * (3));
            that.theValue('3');
        };


        this.first = {
            theTitle:ko.observable("Hello World"),
            theContent:ko.observable("Back to Hello World")
        };
        this.second = {
            theTitle:ko.observable("Goodbye World"),
            theContent:ko.observable("We're sailing west now")
        };


    };

    viewModel = new viewModelConstructor;
    ko.applyBindings(viewModel);
});