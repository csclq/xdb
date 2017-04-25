<div class='wrapper main-wrapper wrapper-content ' ng-controller="myCtrl">

    <div class="page-content">
        <div class="page-heading">
            <h2>商品列表</h2> </div>

        <form action="" method="get" class="form-horizontal form-search" role="form">
            <div class="page-toolbar row m-b-sm m-t-sm">
                <div class="col-sm-8 pull-right">
                    <select name="cate" class='form-control input-sm select-sm select2' style="width:200px;float:left" data-placeholder="商品分类">
                        <option value="" selected >商品分类</option>
                        <?php foreach ($category as $cate) { ?>
                        <option value="<?= $cate->id ?>"  ><?= $cate->name ?></option>
                        <?php } ?>
                    </select>

                    <div class="input-group">
                        <input type="text" class="input-sm form-control" name='keyword' value="" placeholder="ID/名称/编号/条码/商户名称"> <span class="input-group-btn">

                    <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
                    </div>

                </div>
            </div>
        </form>

        <table class="table table-hover table-responsive">
            <thead class="navbar-inner">
            <tr>
                <th style="width:25px;"><input type='checkbox' /></th>
                <th style="width:60px;text-align:center;">排序</th>
                <th style="width:60px;">商品</th>
                <th  style="width:200px;">&nbsp;</th>
                <th style="width:70px;" >价格</th>
                <th style="width:70px;" >库存</th>
                <th style="width:80px;" >销量</th>
                <th  style="width:60px;" >状态</th>
                <th style="">操作</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="product in list">
                <td>
                    <input type='checkbox'  value="{_ product['id'] _}}"/>
                </td>
                <td style='text-align:center;'>
                    <a href='javascript:;' data-toggle='ajaxEdit' data-href="http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=goods.change&type=displayorder&id=219" >{_ product.sort _}</a>
                </td>
                <td>
                    <img src="{_ product['pic_url'] _}" style="width:40px;height:40px;padding:1px;border:1px solid #ccc;"  />
                </td>
                <td class='full' style="overflow-x: hidden">
                    <span class="text-danger">[邮费]</span>
                    <br/>
                    <a href='javascript:;' data-toggle='ajaxEdit' data-edit='textarea'  data-href="http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=goods.change&type=title&id=219" >邮费</a>
                </td>
                <td>
                    <a href='javascript:;' data-toggle='ajaxEdit' data-href="http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=goods.change&type=marketprice&id=219" >{_ product['price'] _}</a>
                </td>
                <td>
                    <a href='javascript:;' data-toggle='ajaxEdit' data-href="http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=goods.change&type=total&id=219" >{_ product['stock'] _}</a>
                </td>
                <td><?= $product->sale_count ?></td>
                <td  style="overflow:visible;">
                                <span class='label label-success'
                                      data-toggle='ajaxSwitch'
                                      data-confirm = "确认是下架？"
                                      data-switch-refresh='true'
                                      data-switch-value='1'
                                      data-switch-value0='0|下架|label label-default|http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=goods.status&status=1&id=219'
                                      data-switch-value1='1|上架|label label-success|http://abc.5xieys.cn/web/index.php?c=site&a=entry&m=ewei_shopv2&do=web&r=goods.status&status=0&id=219'
                                        >
                      <?php if ($product->deleted) { ?>上架<?php } else { ?>下架 <?php } ?></span>
                </td>
                <td  style="overflow:visible;position:relative">
                    <a  class='btn btn-default btn-sm' href="goodsedit.html" title="编辑"><i class='fa fa-edit'></i> 编辑</a>
                    <a  class='btn btn-default btn-sm' data-toggle='ajaxRemove' href="#" data-confirm='确认删除此商品？'><i class='fa fa-trash'></i> 删除</a>
                    <a href="javascript:;" class='btn btn-default btn-sm js-clip' data-url="#"><i class='fa fa-link'></i> 复制链接</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <button ng-click="log()">显示 </button>
    <?= $this->partial('public/paging') ?>
   </div>
<script src="/js/goods.js"></script>