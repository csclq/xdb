var myapp = angular.module('myapp', []);
myapp.config(['$interpolateProvider', '$httpProvider', function ($interpolateProvider, $httpProvider) {
    $interpolateProvider.startSymbol('{_');
    $interpolateProvider.endSymbol('_}');
    $httpProvider.defaults.transformRequest = function (obj) {
        var str = [];
        for (var p in obj) {
            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
        return str.join("&");
    };
    $httpProvider.defaults.headers.post = {
        'Content-Type': 'application/x-www-form-urlencoded'
    }
}]);
myapp.service('retrieve', function ($http) {
    return {
        'list': function (data) {
            $http({
                'url': '',
                'method': 'POST',
                'data': data.info
            }).success(function (a) {
                data.list = a['data'];
                data.total = a['total'];
                data.totalprice=0;
                a['totalprice'] && (data.totalprice = a['totalprice']);
                a['count'] && (data.count = a['count']);

            })
        },
        'edit':function (data,uri) {
            $http({
                'url': uri,
                'method': 'POST',
                'data': data
            }).success(function (a) {
               if(a['code']==0){
                   data['uri']?(location.href=data['uri']):(location.reload());
               }else{
                   alert("失败: " + a['msg']);
               }
            })
        }
    };
})

myapp.directive('upload',['$http',function () {                                             //图片上传指令
    return {
        restrict:'EA',
        replace:'true',
        scope:{'pic_url':'=upimg'},
        template:'<div><p contenteditable  ng-keyup="chimg($event)"> </p><label><input type="file"  multiple /><i class="fa fa-picture-o fa-5x"></i> </label></div>',
        link:function (scope,element) {
            scope.pic_url=[];
            element.find("input").bind("change",function (e) {

                var files=e.target.files;
                var fd=new FormData();
                for(i in files){
                    fd.append("file[]",files[i]);
                }
                $.ajax({                                    //angularjs的$http上传formdata有问题，暂时使用jquery的方法
                    type:'post',
                    url:'/index/upload',
                    data:fd,
                    dataType:'json',
                    processData: false,
                    contentType: false,
                    success:function (res) {
                        if(res.code==0){
                            for(i in res.data){
                                scope.pic_url.push(res.data[i])
                                element.find("p").append("<img src='"+res.data[i]+"' style='width:100px;margin: 4px' />");
                            }
                            console.log(scope.pic_url)
                        }else{
                            alert(res.msg)
                        }
                    }
                })
            });
            scope.chimg=function (e) {                                              //删除图片
                if(e.keyCode==8 || e.keyCode==46 || e.keyCode==110){
                    if($(e.target).find('img').length!=scope.pic_url.length){
                        scope.pic_url=[];
                        $(e.target).find('img').each(function () {
                            scope.pic_url.push($(this).attr("src"))
                        })
                    }
                }
            }

        }

    }
}])