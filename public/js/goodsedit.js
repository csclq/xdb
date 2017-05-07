myapp.controller('myCtrl', ['$scope', '$http', '$compile', 'retrieve', function ($scope, $http, $compile, retrieve) {



}]);

$("#pimg").change(function () {
    var that=this;
    var fd=new FormData();
        fd.append("file[]",that.files[0]);
    $.ajax({                                    //angularjs的$http上传formdata有问题，暂时使用jquery的方法
        type:'post',
        url:'/index/upload',
        data:fd,
        dataType:'json',
        processData: false,
        contentType: false,
        success:function (res) {
            if(res.code==0){
             $(that).parent().next("input").val(res.data);
             $(that).parent().prev("img").attr("src",res.data);
            }else{
                alert(res.msg)
            }
        }
    })
});


