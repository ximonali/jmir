/**
 * WorkCtrl.js
 */
(function () {
    'use strict';

    var app = angular.module('testApp');


    app.controller('WorkCtrl', ['$scope','$http','$timeout', function ($scope, $http,$timeout) {

            getAllWork();
            function getAllWork() {
                $http.get("app/components/work/getAllWork.php").success(function(data){
                    //console.log(data);
                    $scope.datos = data;
                    $scope.list = data;
                    $scope.currentPage = 1; //current page
                    $scope.entryLimit = 5; //max no of items to display in a page
                    $scope.filteredItems = $scope.list.length; //Initially for no filter  
                    $scope.totalItems = $scope.list.length;


                });
            }

      $scope.setPage = function(pageNo) {
          $scope.currentPage = pageNo;
      };
      $scope.filter = function() {
          $timeout(function() { 
              $scope.filteredItems = $scope.filtered.length;
          }, 10);
      };
      $scope.sort_by = function(predicate) {
          $scope.predicate = predicate;
          $scope.reverse = !$scope.reverse;
      };


    }]);


    app.filter('startFrom', function() {
        return function(input, start) {
            if(input) {
                start = +start; 
                return input.slice(start);
            }
            return [];
        }
    });


}());