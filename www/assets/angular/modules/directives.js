'use strict';

var appDrtvs = angular.module('appDirectives', []);

appDrtvs.directive("resume", function(){
    return {
        restrict: 'EA',
        replace: true,
        transclude: true,
        scope: true,
        controller: 'resumeCtrl',
        templateUrl: 'assets/templates/resume.html',
        link: function(scope, element, attrs){}
    };
});