var url;
var id;
var getPath;

window.onload = function() {
    url = window.location.href;
    id = url.split('/');
    getPath = "beverages/jsonID/" + id[4];
};

var app = angular.module("beverageApp", []);
app.controller("beverageController",function($scope) {
    $scope.comments = [];
    $.get(getPath,function(data) {
        $scope.comments = JSON.parse(data);
        $scope.$apply();
        console.log($scope.comments);
    });
});