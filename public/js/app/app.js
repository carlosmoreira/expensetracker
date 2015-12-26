var expenseApp = angular.module('expenseApp', ['ngRoute']);

expenseApp.config(function ($routeProvider, $locationProvider) {
    $routeProvider
        .when('/payments', {
            templateUrl: 'views/monthlyPayments.html',
            controller: 'PaymentsController'
        }).when('/expenses', {
        templateUrl: 'views/expenses.html',
        controller: 'ExpensesController'
    }).otherwise('/payments')

    ;

    // configure html5 to get links working on jsfiddle
    //$locationProvider.html5Mode(true);
});

expenseApp.controller('MainController', function ($scope, $http) {

});


expenseApp.controller('PaymentsController', function ($scope, $http) {
    var loadData = function () {
        $http.get('/pages/monthlyexpenses').then(function (resp) {
            $scope.expenses = resp.data.payments;
            $scope.month = resp.data.month;
            console.log(resp.data);
        }, function (resp) {
            console.log(resp);
            $scope.error = resp.statusText;
        });
    };

    loadData();

    $scope.monthTotal = function(){
        var total = 0;
        angular.forEach($scope.expenses, function(val, key){
            if(val.monthlypayed){
                total += val.monthlypayed.cost;
            }
        });
        return total;
    }

    $scope.saveMonthlyExpense = function (expense) {
        $scope.errors  = null;
        if ($scope.monthlypayedId) {
            expense.trackedExpenseId = $scope.monthlypayedId;
        }

        expense.expense_id = expense.expense.id;

        $http.post('/trackedexpense', expense).then(function (resp) {

            if(resp.data.Error){
                $scope.errors = resp.data.Error;
            }

            loadData();
            expense.trackedExpenseId = null;
            $scope.monthlypayedId = null;
        }, function (resp) {

        });
    }

    $scope.editMonthlyExpense = function (expense) {
        $scope.monthlypayedId = expense.monthlypayed.id;
        expense.monthlypayed = null;
    }
});

expenseApp.controller('ExpensesController', function ($scope, $http) {
    var loadData = function () {
        $http.get('/expense').then(function (resp) {
            //console.log(resp);
            $scope.expenses = resp.data;
        }, function (err) {
            console.log(err);
        });
    }
    $scope.init = function () {
        loadData();
    }

    $scope.editExpense = function (expense) {
        expense.name_copy = expense.name;
        expense.editable = true;
    };

    $scope.update = function (expense) {
        if (expense.name != expense.name_copy) {
            $http.put('/expense/' + expense.id, expense).then(function (resp) {
                console.log(resp);
                loadData();
            }, function (err) {
                console.log(err);
            })
        }
        expense.editable = false;
    }

    $scope.updateActive = function(expense){
        expense.active = (expense.active === 1) ? 0 : 1;
        $http.put('/expense/' + expense.id, expense).then(function (resp) {
            console.log(resp);
            loadData();
        }, function (err) {
            console.log(err);
        })
    }

});