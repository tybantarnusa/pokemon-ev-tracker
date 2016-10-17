var app = angular.module("evtracker", []);

var field = '' +
    '<div class="bordered">' +
    '<input type="text" ng-model="name[x]" /><br />' +
    '<input type="text" ng-model="nature[x]" />' +
    '</div>';

var id = 0;

app.controller('pokemonController', function($scope, $http) {
    $scope.name = [];
    $scope.nature = [];
    $scope.id = [];
    $scope.updateName = function(id) {
        $http.put('./api/index.php/pokemon/Developer/'+id, {
            name: $scope.name[id]
        });
    }
    $scope.updateNature = function(id) {
        $http.put('./api/index.php/pokemon/Developer/'+id, {
            nature: $scope.nature[id]
        });
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
});

app.directive('addPokemon', function($compile, $http){
    return {
        restrict: 'A',
        link: function(scope, element) {
            element.click(function(e){
                var name = scope.name[id] = "Test " + id;
                var nature = scope.nature[id] = "Nature " + id;
                scope.id.push(id++);
                scope.$apply();
                $http.post('./api/index.php/pokemon/Developer', {
                    owner: "Developer",
                    image: "img",
                    name: name,
                    nature: nature
                }).then(function(response){id = response.data.id + 1});
            });
        }
    };
});
