myapp.controller("msgCtrl",['$scope','$compile','$http',function ($scope,$compile,$http) {
    $scope.add={};
    $scope.add.type=1;
    var html = '<p>标 &nbsp; &nbsp; 题 <input  name="title[]" type="text" class="input" required ></p>'+
        '<p>内 &nbsp; &nbsp; 容 <input  name="content[]" class="input" required /></p>'+
        '<p>链 &nbsp; &nbsp; 接 <input name="url[]" class="input" type="url" required /> </p>'+
        '<p>上传图片 <input type="file"  name="img[]" class="input" required /> </p>';
    var template = angular.element(html);
    var newHtml = $compile(template)($scope);
    $scope.addnews = function () {
        angular.element(document.getElementById("newstmp")).append(newHtml.clone());
    }
    $scope.add=function () {
        $(".add").show()
    }
    $scope.del=function (id) {
        $http({
            url:'delmsg',
            method:'post',
            data:{"id":id}
        }).success(function (a) {
           location.reload();
        })
    }


}])