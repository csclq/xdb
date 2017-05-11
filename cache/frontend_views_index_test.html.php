<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
    <link href="/css/style.css" type="text/css" rel="stylesheet" />
    <script src="/js/jquery.js"></script>
    <!--<script src="/js/angular.min.js"></script>-->

    <script src="/js/main.js"></script>
</head>
<body ng-app="myapp">
<div ng-controller="myCtrl">

    <button ng-click="showpic()">按键</button>
    <br />
    <br />
    <br />
        <upload upimg="add.pic"></upload>
        <!--<input type="file" name="file[]" multiple ><br />-->
        <!--<input type="submit" value="确定">-->
</div>

</body>
</html>
<script>
console.log(location)
</script>