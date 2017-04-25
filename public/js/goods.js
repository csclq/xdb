myapp.controller('myCtrl', ['$scope', '$http', '$compile', 'retrieve', function ($scope, $http, $compile, retrieve) {
    $scope.info = {};                                                         //筛选条件
    $scope.list = [];                                                         //数据源
    $scope.info.p = 1;                                                        //分页
    $scope.total = 1;                                                         //总页数
    $scope.edit = {};
    $scope.oldsort = 0;


    retrieve.list($scope);
    $scope.paging = function () {                                             //分页
        if ($scope.info.p < 1) {
            $scope.info.p = 1;
        }
        if ($scope.info.p > $scope.total) {
            $scope.info.p = $scope.total;
        }
        retrieve.list($scope);
    }
    $scope.search = function () {                                         //筛选
        $scope.info.p = 1;
        retrieve.list($scope);
    };
    $scope.editsort = function (a, b, c) {
        $scope.edit = {};
        $scope.edit.id = b;
        $scope.oldsort = c;
        $(a.target).empty();
        $(a.target).html($compile("<input value='" + c + "' class='sort' ng-blur='updatesort($event)' / >")($scope));
        $(a.target).find(".sort").focus();
    }
    $scope.updatesort = function (a) {
        $scope.edit.action = 'edit';
        $scope.edit.sort = $(a.target).val();
        if ($scope.oldsort != $scope.edit.sort) {
            retrieve.edit($scope.edit, '/backend/xuduobao/goodsedit');
            retrieve.list($scope);
        } else {
            $(a.target).parent().empty().delay(100).text($scope.edit.sort);
        }
    }

    $scope.togglegoods=function (a,b,c) {
        $scope.edit = {};
        $scope.edit.action = 'edit';
        $scope.edit.id = b;
        $scope.edit.deleted=c==0?1:0;
        retrieve.edit($scope.edit, '/backend/xuduobao/goodsedit');
        retrieve.list($scope);
    }

    $scope.delete=function (a) {
        if(confirm("你确定要删除此商品")){
            $scope.edit = {};
            $scope.edit.action = 'delete';
            $scope.edit.id = a;
            retrieve.edit($scope.edit, '/backend/xuduobao/goodsedit');
            retrieve.list($scope);
        }
    }
}]);

