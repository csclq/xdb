
<div class='wrapper main-wrapper wrapper-content '>
    <link type="text/css" rel="stylesheet" href="/css/dsh_style.css">
    <script src="/js/hm.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/slides.min.jquery.js"></script>
    <div class="row" style="margin-top: 30px">
        <div class="col-md-12 col-sm-12">
            <div class="contact-box">
                <div class="col-sm-1" style="padding:0">
                    <img src="http://abc.5xieys.cn/attachment/images/2/2016/12/as3COOc6scWsKBctZg7C3kS3gYZg6b.png" style="width:65px;height:65px;border-radius:5px">
                </div>
                <div class="col-sm-10"  style="padding-left:10px">
                    <h3>许多宝新品试用平台</h3>
                    <p></p>
                </div>
                <div class="col-sm-1" style="padding-left: 0"><a class="btn btn-primary btn-sm" href="http://web.5xieys.cn/backend/index/shop_edit" style="color: #fff"> 点击修改</a></div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12">
            <div class="contact-box" style="border: 1px solid #e7eaec">
                <div class="forum-item">
                    <div class="row">
                        <a href="http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=goods&goodsfrom=out">
                            <div class="col-sm-3 forum-info">
                                                <span class="views-number goods_totals">
                                                    --
                                                </span>
                                <div>
                                    <small>已售罄商品</small>
                                </div>
                            </div>
                        </a>

                        <a href="orderstatus1.html">
                            <div class="col-sm-3 forum-info">
                                                <span class="views-number status1">
                                                    --
                                                </span>
                                <div>
                                    <small>待发货订单</small>
                                </div>
                            </div>
                        </a>

                        <a href="http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=order.list.status4">
                            <div class="col-sm-3 forum-info">
                                                <span class="views-number status4">
                                                    --
                                                </span>
                                <div>
                                    <small>今日访问量</small>
                                </div>
                            </div>
                        </a>

                        <a href="http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=finance.log.withdraw&status=0">
                            <div class="col-sm-3 forum-info">
                                            <span class="views-number finance_total">
                                                --
                                            </span>
                                <div>
                                    <small>已完成订单</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

    <input type="hidden" name="len" value="0">
    <input type="hidden" name="index" value="0">
    <script>
        function selectImage(obj){
            util.image('',function(val){
                $(obj).attr('src',val.url);

                $.post("http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=shop.index.ajaxshopconfig&type=logo", { value: val.attachment},
                        function(data){
                            if (data.status == 1)
                            {
                                tip.msgbox.suc('修改成功!' || tip.lang.success);
                            }
                            else
                            {
                                tip.msgbox.err('修改失败!' || tip.lang.error);
                            }
                        }, "json");
            });
        }
    </script>


</div>

<script language='javascript'>
    require(['bootstrap'], function ($) {
        $('[data-toggle="tooltip"]').tooltip({
            container: $(document.body)
        });
        $('[data-toggle="popover"]').popover({
            container: $(document.body)
        });
    });

</script>
