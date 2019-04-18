jQuery(function(){
    var viewModelConstructor = function()
    {
        this.message = "Hello";

        this.customMessage = "кастомна привязка  ";

    }

    var theTemplate = "<h1 data-bind=\"text:message\"></h1>";



    ko.bindingHandlers.pulseStormHelloWorld = {
        update: function(element, valueAccessor){
            jQuery(element).html('<h1>' + valueAccessor() + '</h1>');
        }
    };

    ko.components.register('component-hello-world', {
        viewModel:viewModelConstructor,
        template:theTemplate
    });

    // ko.applyBindings();

    ko.applyBindings(new viewModelConstructor);

});