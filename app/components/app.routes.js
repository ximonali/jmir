/**
 * testApp.routes.js
 */

 (function () {
    'use strict';

    var app = angular.module('testApp', ['ui.router','ui.bootstrap']);

	app.config(function($stateProvider, $urlRouterProvider) {
	    
	    $urlRouterProvider.otherwise('/home');
	    
	    $stateProvider

	        
	        // HOME STATES AND NESTED VIEWS ========================================
	        .state('home', {
	            url: '/home',
	            views: {
	            	'': {templateUrl: 'app/components/home/home.html'}, //Parent View
	            	'header@home': {templateUrl: 'app/shared/templates/header.html'}, //Child view injected
	            	'footer@home': {templateUrl: 'app/shared/templates/footer.html'} //Child view injected
	            },
	            controller: 'HomeCtrl',
	            active: 'home'
	        })      

	        .state('work',{
	        	url: '/work',
	            views: {
	            	'': {templateUrl: 'app/components/work/work.html'}, 
	            	'header@work': {templateUrl: 'app/shared/templates/header.html'}, 
	            	'footer@work': {templateUrl: 'app/shared/templates/footer.html'} 
	            },
	            controller: 'WorkCtrl',
	            active: 'work'
	        })

	        .state('project', {
        		url: '/work/{projectId}',
        		views: {
	            	'': {templateUrl: 'app/components/work/index.html'}, 
	            	'header@project': {templateUrl: 'app/shared/templates/header.html'}, 
	            	'footer@project': {templateUrl: 'app/shared/templates/footer.html'} 
	            },
	            controller: 'WorkProjectCtrl'

    		});

	        
	});



}());