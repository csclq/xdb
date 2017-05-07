myapp.controller('myCtrl', ['$scope', '$http',  'retrieve', function ($scope, $http, retrieve) {
    $scope.edit={};

    $scope.sub=function () {
        $scope.edit.action='edit';
        retrieve.edit($scope.edit, '');
    }

    $scope.del=function (id) {
        if(confirm("确定要删除！！！")){
            $scope.edit.action='delete';
            $scope.edit.id=id;
            retrieve.edit($scope.edit, '');
        }
    }

}]);
