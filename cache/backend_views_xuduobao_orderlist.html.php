<script type="text/javascript" src="/jedate/jquery-1.7.2.js"></script>
<script type="text/javascript" src="/jedate/jquery.jedate.js"></script>
<link type="text/css" rel="stylesheet" href="/jedate/skin/jedate.css">
<div class='wrapper main-wrapper wrapper-content '>
    <div class="page-menubar">
        <style type='text/css'>
            .order-list a {
                position: relative;
            }
            .order-list span  {

                float:right;margin-right:20px;
            }
        </style>
       </div>
    <div class="page-content">
        <style type='text/css'>
            .trhead td {  background:#efefef;text-align: center}
            .trbody td {  text-align: center; vertical-align:top;border-left:1px solid #f2f2f2;overflow: hidden; font-size:12px;}
            .trorder { background:#f8f8f8;border:1px solid #f2f2f2;text-align:left;}
            .ops { border-right:1px solid #f2f2f2; text-align: center;}
        </style>

        <div class="page-heading">

            <h2>全部订单</h2>

            <span>订单数:  <span class='text-danger' ng-bind="count"></span> 订单金额:  <span class='text-danger' ng-bind="totalprice || 0 "></span> </span>

        </div>

        <form  class="form-horizontal table-search" role="form">
            <div class="page-toolbar row m-b-sm m-t-sm">
                <div class="col-sm-7">
                    <div class="btn-group btn-group-sm" style='float:left'>
                        <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>

                    </div>
                    <div class='input-group input-group-sm'   >
                        <select name='searchtime'  class='form-control  input-sm select-md'   style="width:85px;padding:0 5px;"  >
                            <option value='create' >下单时间</option>
                        </select>
                        <input class="datainp wicon btn btn-default " id="inpstart" type="text" placeholder="开始日期" value=""  readonly>
                        <input class="datainp wicon btn btn-default " id="inpend" type="text" placeholder="结束日期"   readonly >
                    </div>
                </div>
                <div class="col-sm-2">
                    <select class='form-control  input-sm select-md'   style="width:95px;padding:0 5px;float:left" ng-model="info.status">
                        <option value="" selected>状态</option>
                        <option value="1">待发货</option>
                        <option value="2">已完成</option>
                        <option value="3">作废订单</option>
                    </select>
                </div>
                <div class="col-sm-3 pull-right">
                    <select name='searchfield'  class='form-control  input-sm select-md'   style="width:95px;padding:0 5px;float:left"   ng-model="info.searchname"   >
                        <option value='id' name="id" selected>订单号</option>
                        <option value='fullname' name="fullname">会员信息</option>
                        <option value="mobile" name="mobile">手机号</option>
                    </select>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm"  name="keyword" value="" placeholder="请输入关键词"  ng-model="info.searchvalue"  />
                <span class="input-group-btn">
                    <button class="btn btn-sm btn-primary" type="submit"   ng-click="search()">   搜索</button>
                </span>
                    </div>
                </div>
            </div>
        </form>
        <table class='table table-responsive' style='table-layout: fixed;'>
            <tr style='background:#f8f8f8'>
                <td style="width:150px">订单编号</td>
                <td style='width:50px;border-left:1px solid #f2f2f2;'>姓名</td>
                <td style='width:100px;'>手机号</td>
                <td style='width:70px;text-align: right;'>订单价</td>
                <td style='width:90px;text-align: center;'>已支付</td>
                <td style='width:110px;text-align: center'>状态</td>
                <td style='width:100px;text-align: center;'>点击次数</td>
                <td style='width:100px;text-align: center;'>购买次数</td>
                <td style='width:100px;text-align: center;'>亮灯个数</td>
                <td style='width:130px;text-align: center;'>下单时间</td>
                <td style='width:50px'>详情</td>
            </tr>
            <tr ><td colspan='8' style='height:20px;padding:0;border-top:none;'>&nbsp;</td></tr>
            <tr class='trbody'  ng-repeat="item in list" >
                <td style='text-align: left;'  ng-bind="item.id" > </td>
                <td style='text-align: left;' ng-bind="item.fullname" ></td>
                <td style='text-align: left;overflow:hidden;border-left:none;' ng-bind="item.mobile"><br/></td>
                <td style='text-align:right;border-left:none;' ng-bind="item.unit_price"></td>
                <td rowspan="1"  style='text-align: center;' ng-bind="item.unit_price * item.buy_number | number:2" ></td>
                <td rowspan="1" style='text-align:center;'  ng-switch="item.status" >
                    <span ng-switch-when="0">未购买</span>
                    <span ng-switch-when="1">已购买</span>
                    <span ng-switch-when="2">已发货</span>
                </td>
                <td style='text-align:center'  ng-bind="item.hit_number"></td>
                <td  style='text-align:center'  ng-bind="item.buy_number"></td>
                <td  style='text-align:center' ng-bind="item.star" ></td>
                <td style='text-align:center'  ng-bind="item.submitted_at"></td>
                <td style='text-align:right;font-size:12px;'>
                    <a href="/backend/xuduobao/orderdetail/{_ item.id _}" >查看详情</a>
                </td>
            </tr>
        </table>
        <div style="text-align:right;width:100%;">
            <?= $this->partial('public/paging') ?>
    </div>
</div>
</div>
<script type="text/javascript">
    var start = {
        format: 'YYYY-MM-DD hh:mm:ss',
        minDate: '2014-06-16 23:59:59', //设定最小日期为当前日期
        festival:true,
        //isinitVal:true,
        maxDate: $.nowDate(0), //最大日期
        choosefun: function(elem,datas){
            end.minDate = datas; //开始日选好后，重置结束日的最小日期
        },
        okfun:function (elem,datas) {
            alert(datas)
        }
    };
    var end = {
        format: 'YYYY-MM-DD hh:mm:ss',
        minDate: $.nowDate(0), //设定最小日期为当前日期
        festival:true,
        //isinitVal:true,
        maxDate: '2099-06-16 23:59:59', //最大日期
        choosefun: function(elem,datas){
            start.maxDate = datas; //将结束日的初始值设定为开始日的最大日期
        }
    };
    $("#inpstart").jeDate(start);
    $("#inpend").jeDate(end);
    console.log($("#inpstart").val());
</script>
<script src="/js/orderlist.js"></script>