'use strict';

var appCtrls = angular.module('appControllers', []);

appCtrls.controller("mainCtrl", function($scope, $element, $attrs, $transclude, $window, Resume){

  $scope.userid = $window._userid;

  Resume.getDetails($scope.userid).then(function(d) { 
    $scope.details = d[0];
    $scope.details.fullname = $scope.details.name + " " + $scope.details.surname;
    $scope.details.photo = "assets/images/profile/"+$scope.userid +".png";
    $scope.details.resume_link = "assets/resumes/"+$scope.userid +".pdf";

    // Strip HTML tags from summary
    var html = $scope.details.summary;
    var div = document.createElement("div");
    div.innerHTML = html;
    $scope.details.summaryStripped = div.textContent || div.innerText || "";

    // Google MAP :
    var q=encodeURIComponent($scope.details.address);
    $('#map').attr('src','https://www.google.com/maps/embed/v1/place?key=AIzaSyCrQtWRYtGHMQ5p-fW0-hLaRS21NP6-ng8&q='+q);

  });

  Resume.getSkillsPro($scope.userid).then(function(d) { $scope.skillsPro = d; });
  Resume.getSkillsInfo($scope.userid).then(function(d) { $scope.skillsInfo = d; });
  Resume.getSkillsCom($scope.userid).then(function(d) { $scope.skillsCom = d; });

  $scope.copyright = new Date();

});

appCtrls.controller("resumeCtrl", function($scope, $element, $attrs, $transclude, Resume){

  $scope.resumeType = $attrs.resume;
  $scope.userid = $attrs.userid;

  function manageData(d){

      angular.forEach(d, function(value, key) {
          value.logo = 'assets/images/'+$scope.resumeType+'/'+$scope.userid+'_'+value[0]+'.png';
      });

    return d;
  }

  if ($scope.resumeType == 'education'){
    Resume.getEdu($scope.userid).then(function(d) { 
      $scope.entries = manageData(d);
    });
  }
  else if ($scope.resumeType == 'experiences'){
    Resume.getExp($scope.userid).then(function(d) {
      $scope.entries = manageData(d);
    });
  }

});

