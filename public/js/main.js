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
            })
        },
        'edit':function (data,uri) {
            $http({
                'url': uri,
                'method': 'POST',
                'data': data
            }).success(function (a) {
            })
        }
    };
})
