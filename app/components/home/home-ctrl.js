/**
 * HomeCtrl.js
 */
(function () {
    'use strict';

    var app = angular.module('testApp');
    app.controller('HomeCtrl', ['$scope','$http', function ($scope, $http) {

            $scope.formData = {};
            $scope.showTheForm = true;
            // process the form
            $scope.processForm = function() {
                //var $scope.customer = $scope.formData;
                $http({
                    method  : 'POST',
                    url     : 'app/components/home/process.php',
                    data    : $.param($scope.formData),  
                    headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  
                })
                    .success(function(data) {
                        console.log(data);

                        if (!data.success) {
                            // if not successful, bind errors to error variables
                            $scope.errorName = data.errors.name;
                            $scope.errorProvince = data.errors.province;
                            $scope.errorSalary = data.errors.salary;
                            $scope.errorTelephone = data.errors.telephone;
                            $scope.errorPostalcode = data.errors.postalcode;
                            $scope.showTheForm = true;
                            $scope.showResults = false;
                            
                        } else {
                            // if successful, bind results and success message to message
                            $scope.showTheForm = false;
                            $scope.showResults = true;
                            $scope.message = data.message;
                            $scope.name = data.name;
                            $scope.province = data.province;
                            $scope.telephone = data.telephone;
                            $scope.postalcode = data.postalcode;
                            $scope.salary = data.salary;

                            $scope.errorName = '';
                            $scope.errorProvince = '';
                            $scope.errorTelephone = '';
                            $scope.errorPostalcode = '';
                            $scope.errorSalary = '';        

                             //timing the alert box to close after 5 seconds
                             /*window.setTimeout(function () {
                                 $(".alert").fadeTo(500, 0).slideUp(500, function () {
                                     $(this).remove();
                                 });
                             }, 6000);*/

                        }
                    });

            };



	  }]);

}());
