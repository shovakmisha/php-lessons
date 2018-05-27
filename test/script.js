jQuery(function(){
    var viewModelConstructor = function()
    {
        this.message = "Hello World";
    }

    ko.bindingHandlers.pulseStormHelloWorld = {
        update: function(element, valueAccessor){
            jQuery(element).html('<h1>' + valueAccessor() + '</h1>');
        }
    };
    ko.applyBindings(new viewModelConstructor);
});