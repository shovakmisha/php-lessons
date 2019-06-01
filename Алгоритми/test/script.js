jQuery(function(){

    // var viewModelConstructor = function()
        // {
    //     this.message = "Hello World";
    // }
    // ko.bindingHandlers.pulseStormHelloWorld = {
    //     update: function(element, valueAccessor){
    //         jQuery(element).html('<h1>' + valueAccessor() + '</h1>');
    //     }
    // };
    // ko.applyBindings(new viewModelConstructor);

    function binary_search(list, item) {
        let low = 0;
        let high = list.length - 1;

        while (low <= high) {
            let mid = Math.floor((low + high) / 2);
            let guess = list[mid];
            if (guess === item) {
                return mid;
            }
            if (guess > item) {
                high = mid - 1;
            } else {
                low = mid + 1;
            }
        }

        return null;
    }

    const my_list = [1, 3, 5, 7, 9];

    console.log(binary_search(my_list, 3)); // 1



});