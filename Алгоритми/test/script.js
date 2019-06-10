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

    // function binary_search(list, item) {
    //     let low = 0;
    //     let high = list.length - 1;
    //     while (low <= high) {
    //         let mid = Math.floor((low + high) / 2);
    //         let guess = list[mid];
    //         if (guess === item) {
    //             return mid;
    //         }
    //         if (guess > item) {
    //             high = mid - 1;
    //         } else {
    //             low = mid + 1;
    //         }
    //     }
    //     return null;
    // }
    // const my_list = [1, 3, 5, 7, 9];
    // console.log(binary_search(my_list, 3)); // 1



});

/*

    function person_is_seller(name) {
        return name[name.length - 1] === "m";
    }

    const graph = {};
    graph["you"] = ["alice", "bob", "claire"];
    graph["bob"] = ["anuj", "peggy"];
    graph["alice"] = ["peggy"];
    graph["claire"] = ["thom", "jonny"];
    graph["anuj"] = [];
    graph["peggy"] = [];
    graph["thom"] = [];
    graph["jonny"] = [];

    function search(name) {
        let search_queue = [];
        search_queue = search_queue.concat(graph[name]);
        // This array is how you keep track of which people you've searched before.
        const searched = [];
        while (search_queue.length) {
            let person = search_queue.shift();
            // Only search this person if you haven't already searched them
            if (searched.indexOf(person) === -1) {
                if (person_is_seller(person)) {
                    console.log(person + " is a mango seller!");
                    return true;
                }

                search_queue = search_queue.concat(graph[person]);
                // Marks this person as searched
                searched.push(person);
            }
        }
        return false;
    }

    search("you"); // thom is a mango seller!
*/



/*

function person_is_seller(name) {
    return name[name.length - 1] === "m";
}

const graph = {};

graph["проснутся"] = ["сделать зарядку", "почистить зубы", "упаковать обед"];

graph["сделать зарядку"] = ["принять душ"];
graph["почистить зубы"] = ["позавтракать"];
graph["принять душ"] = ["одется"];

graph["упаковать обед"] = [];

graph["позавтракать"] = [];
graph["одется"] = [];


function search(name) {
    let search_queue = [];
    search_queue = search_queue.concat(graph[name]);
    // This array is how you keep track of which people you've searched before.
    const searched = [];
    while (search_queue.length) {
        let person = search_queue.shift();

        console.log(person);

        // Only search this person if you haven't already searched them
        if (searched.indexOf(person) === -1) {
            if (person_is_seller(person)) {
                console.log(person + " is a mango seller!");
                return true;
            }

            search_queue = search_queue.concat(graph[person]);
            // Marks this person as searched
            searched.push(person);
        }
    }
    return false;
}

search("проснутся");

 */

// Алгоритм Дайстры

// the graph








/*


    const graph = {};
    graph["start"] = {};
    graph["start"]["a"] = 6;
    graph["start"]["b"] = 2;

    graph["a"] = {};
    graph["a"]["fin"] = 1;

    graph["b"] = {};
    graph["b"]["a"] = 3;
    graph["b"]["fin"] = 5;

    graph["fin"] = {};

    // The costs table
    const costs = {};
    costs['a'] = 6;
    costs['b'] = 2;
    costs['fin'] = Infinity;

    // the parents table
    const parents = {};
    parents['a'] = 'start';
    parents['b'] = 'start';
    parents['fin'] = null;

    let processed = [];


    function find_lowest_cost_node(costs) {
        let lowest_cost = Infinity;
        let lowest_cost_node = null;

        // Go through each node
        for (let node in costs) {
            let cost = costs[node];
            // If it's the lowest cost so far and hasn't been processed yet...
            if (cost < lowest_cost && (processed.indexOf(node) === -1)) {
                // ... set it as the new lowest-cost node.
                lowest_cost = cost;
                lowest_cost_node = node;
            }
        }
        return lowest_cost_node;
    }

    let node = find_lowest_cost_node(costs);

    while (node !== null) {
        let cost = costs[node];
        // Go through all the neighbors of this node
        let neighbors = graph[node];
        Object.keys(neighbors).forEach(function(n) {
            let new_cost = cost + neighbors[n];
            // If it's cheaper to get to this neighbor by going through this node
            if (costs[n] > new_cost) {
                // ... update the cost for this node
                costs[n] = new_cost;
                // This node becomes the new parent for this neighbor.
                parents[n] = node;
            }
        });

        // Mark the node as processed
        processed = processed.concat(node);

        // Find the next node to process, and loop
        node = find_lowest_cost_node(costs);
    }

    console.log("Cost from the start to each node:");
    console.log(costs); // { a: 5, b: 2, fin: 6 }



*/


/*

    // the graph
    const graph = {};
    graph["start"] = {};
    graph["start"]["one"] = 5;
    graph["start"]["two"] = 2;

    graph["one"] = {};
    graph["one"]["one_top"] = 4;
    graph["one"]["one_down"] = 2;

    graph["one_top"] = {};
    graph["one_top"]["one_top_right"] = 3;
    graph["one_top"]["one_top_down"] = 6;

    graph["one_down"] = {};
    graph["one_down"]["one_down_finish"] = 1;

    graph["one_down_finish"] = 1;


    graph["two"] = {};
    graph["two"]["two_up"] = 8;
    graph["two"]["two_right"] = 7;

    graph["two_right"]["two_right_finish"] = 1;

    graph["two_right_finish"] = 1;


    graph["fin"] = {};

    // The costs table - хеш-таблица для хранения стоимостей всех узлов
    const costs = {};
    costs['a'] = 5;
    costs['b'] = 2;
    costs['fin'] = Infinity;



    cost["one"] = {};
    cost["one"]["one_top"] = 4;
    cost["one"]["one_down"] = 2;

    cost["one_top"] = {};
    cost["one_top"]["one_top_right"] = 3;
    cost["one_top"]["one_top_down"] = 6;

    costs["one_down"] = {};
    costs["one_down"]["one_down_finish"] = 1;

    cost["one_down_finish"] = 1;


    graph["two"] = {};
    graph["two"]["two_up"] = 8;
    graph["two"]["two_right"] = 7;

    graph["two_right"]["two_right_finish"] = 1;

    graph["two_right_finish"] = 1;



    // the parents table
    const parents = {};
    parents['a'] = 'start';
    parents['b'] = 'start';
    parents['fin'] = null;

    let processed = [];
*/





 // жадные алгоритмы

    // You pass an array in, and it gets converted to a set.

    // задача полягає в тому що в мене є список штатів і список радіостанцій які захватують по декілька з цих штатів.

    let states_needed = new Set(["mt", "wa", "or", "id", "nv", "ut", "ca", "az"]);

    const stations = {};
    stations["kone"] = new Set(["id", "nv", "ut"]);
    stations["ktwo"] = new Set(["wa", "id", "mt"]);
    stations["kthree"] = new Set(["or", "nv", "ca"]);
    stations["kfour"] = new Set(["nv", "ut"]);
    stations["kfive"] = new Set(["ca", "az"]);

    const final_stations = new Set();


    while (states_needed.size) {
        let best_station = null;
        let states_covered = new Set();
        for (let station in stations) {
            let states = stations[station];
            let covered = new Set([...states_needed].filter((x) => states.has(x)));
            if (covered.size > states_covered.size) {
                best_station = station;
                states_covered = covered;
            }
        }
        states_needed = new Set([...states_needed].filter((x) => !states_covered.has(x)));
        final_stations.add(best_station);
    }

    console.log(final_stations); // Set { 'kone', 'ktwo', 'kthree', 'kfive' }