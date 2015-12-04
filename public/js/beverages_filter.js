var app = angular.module("beveragesApp", []);
app.controller("beveragesController",function($scope) {
    $scope.beverages = [];
    $.get("beverages/json",function(data) {
        $scope.beverages = JSON.parse(data);
        $scope.$apply();
        console.log($scope.beverages);
    });
    $scope.filterVar = 'beverage_name';
});