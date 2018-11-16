var appSrvs = angular.module('appServices', []);

appSrvs.factory('Resume', function($http, $q) {
    return({
        getEdu: function(userid){
            return $http({
                method: "get",
                url: "assets/php/db_resume.php?table=education&userid="+userid,
                params: {action: "get"}
                }).then(handleSuccess, handleError);
        },
        getExp: function(userid){
            return $http({
                method: "get",
                url: "assets/php/db_resume.php?table=experiences&userid="+userid,
                params: {action: "get"}
                }).then(handleSuccess, handleError);
        },
        getSkillsPro: function(userid){
            return $http({
                method: "get",
                url: "assets/php/db_resume.php?table=skills_pro&userid="+userid,
                params: {action: "get"}
                }).then(handleSuccess, handleError);
        },
        getSkillsInfo: function(userid){
            return $http({
                method: "get",
                url: "assets/php/db_resume.php?table=skills_info&userid="+userid,
                params: {action: "get"}
                }).then(handleSuccess, handleError);
        },
        getSkillsCom: function(userid){
            return $http({
                method: "get",
                url: "assets/php/db_resume.php?table=skills_com&userid="+userid,
                params: {action: "get"}
                }).then(handleSuccess, handleError);
        },
        getDetails: function(userid){
            return $http({
                method: "get",
                url: "assets/php/db_resume.php?table=details&userid="+userid,
                params: {action: "get"}
                }).then(handleSuccess, handleError);
        }
    });

    function handleError( response ) {
        if (
            ! angular.isObject( response.data ) ||
            ! response.data.message
            ) {
            return( $q.reject( "An unknown error occurred." ) );
        }
        return( $q.reject( response.data.message ) );
    }

    function handleSuccess( response ) {
        return( response.data );
    }
});