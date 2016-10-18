var app = angular.module("evtracker", []);

var field = '' +
    '<div class="bordered">' +
    '<input type="text" ng-model="name[x]" /><br />' +
    '<input type="text" ng-model="nature[x]" />' +
    '</div>';

var id = 0;

app.controller('pokemonController', function($scope, $http) {
    $scope.data = {
        names: []
    }
    $http.get('./data/pokemon_names.json').then(function(response){
        $scope.data.names = response.data;
    });
    $scope.name = [];
    $scope.nature = [];
    $scope.id = [];
    $scope.updateName = function(pid) {
        $http.put('./api/index.php/pokemon/Developer/'+pid, {
            name: $scope.name[pid]
        });
    }
    $scope.updateNature = function(pid) {
        $http.put('./api/index.php/pokemon/Developer/'+pid, {
            nature: $scope.nature[pid]
        });
    }
    $scope.remove = function(pid) {
        $http.delete('./api/index.php/pokemon/Developer/' + pid).then(function(response){
            $scope.id.splice($scope.id.indexOf(pid), 1);
            console.log($scope.id);
            delete $scope.name[pid];
            delete $scope.nature[pid];
        });
    }
    $scope.autoselect = function(pid, test) {
        console.log(test);
        $scope.name[pid] = test[0];
        $scope.updateName(pid);
    }
    $http.get('./api/index.php/pokemon/Developer')
    .then(function(response){
        response = response.data;
        for (var i = 0; i < response.length; i++) {
            var pokemon = response[i];
            $scope.name[pokemon.id] = pokemon.name;
            $scope.nature[pokemon.id] = pokemon.nature;
            $scope.id.push(pokemon.id);
            id = pokemon.id;
        }
        id++;
        $('.tst').show();
        $('.loading').hide();
    });
    //setInterval(function(){console.log(id); console.log($scope.id)}, 500);


});

app.directive('addPokemon', function($compile, $http){
    return {
        restrict: 'A',
        link: function(scope, element) {
            element.click(function(e){
                var name = scope.name[id] = "";
                var nature = scope.nature[id] = "";
                scope.id.push(id++);
                scope.$apply();
                $http.post('./api/index.php/pokemon/Developer', {
                    owner: "Developer",
                    image: "img",
                    name: name,
                    nature: nature
                }).then(function(response){console.log(response.data); id = response.data.id + 1});
            });
        }
    };
});
