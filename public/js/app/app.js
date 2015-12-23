var expenseApp = angular.module('expenseApp', ['ngRoute']);

expenseApp.config(function($routeProvider, $locationProvider) {
    $routeProvider
        .when('/expenses', {
            templateUrl: 'views/allExpenses.html',
            controller: 'ExpensesController'
        }).otherwise('/expenses')

    ;

    // configure html5 to get links working on jsfiddle
    //$locationProvider.html5Mode(true);
});

expenseApp.controller('MainController', function($scope, $http){
    $http.get('/pages/monthlyexpenses').then(function(resp){
        $scope.expenses = resp.data;
        console.log(resp.data);
    }, function(err){console.log(err)});
});


expenseApp.controller('ExpensesController', function($scope){

});