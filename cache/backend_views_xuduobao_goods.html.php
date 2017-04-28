<div class='wrapper main-wrapper wrapper-content '>

    <div class="page-content">
        <div class="page-heading">
            <h2>商品列表</h2> </div>

            <div class="page-toolbar row m-b-sm m-t-sm">
                <div class="col-sm-8 pull-right">
                    <select name="cate" class='form-control input-sm select-sm select2' style="width:200px;float:left" data-placeholder="商品分类" ng-model="info.cate">
                        <option value="" selected >商品分类</option>
                        <?php foreach ($category as $cate) { ?>
                        <option value="<?= $cate->id ?>"  ><?= $cate->name ?></option>
                        <?php } ?>
                    </select>

                    <div class="input-group">
                        <input type="text" class="input-sm form-control" name='keyword' value="" placeholder="ID/名称/编号/条码/商户名称" ng-model="info.filter"> <span class="input-group-btn">

                    <button class="btn btn-sm btn-primary" type="submit" ng-click="search()"> 搜索</button> </span>
                    </div>

                </div>
            </div>

        <table class="table table-hover table-responsive">
            <thead class="navbar-inner">
            <tr>
                <th style="width:5%;"><input type='checkbox' />ID</th>
                <th style="width:8%;text-align:center;">排序</th>
                <th style="width:8%;">商品</th>
                <th style="width:8%;" >价格</th>
                <th style="width:8%;" >库存</th>
                <th style="width:8%;" >销量</th>
                <th  style="width:8%;" >状态</th>
                <th style="width:6%">选中</th>
                <th style="width:6%">购买</th>
                <th style="width:6%">发货</th>
                <th style="width:9%">购买位置统计</th>
                <th style="width:20%">操作</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="product in list">
                <td>
                    <input type='checkbox'  value="{_ product.id _}"/>{_ product.id _}
                </td>
                <td style='text-align:center;' ng-dblclick="editsort($event,product.id,product.sort)">
                    {_ product.sort _}
                </td>
                <td>
                    <img ng-src="{_ product.pic_url _}" style="width:40px;height:40px;padding:1px;border:1px solid #ccc;"  />
                </td>
                <td>
                    {_ product.price _}
                </td>
                <td>
                  {_ product.stock _}
                </td>
                <td>{_ product.sale_count _}</td>
                <td ng-dblclick="togglegoods($event,product.id,product.deleted)"><span ng_if="product.deleted==1">下架</span><span ng_if="product.deleted==0">上架</span>
                </td>
                <td>{_ product.select_count _}</td>
                <td>{_ product.sale_count _}</td>
                <td>{_ product.send_count _}</td>
                <td>4</td>
                <td  style="overflow:visible;position:relative">
                    <a  class='btn btn-default btn-sm' href="/backend/xuduobao/goodsedit/{_ product.id _}" title="编辑"><i class='fa fa-edit'></i> 编辑</a>
                    <a  class='btn btn-default btn-sm' ng-click="delete(product.id)"><i class='fa fa-trash'></i> 删除</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <?= $this->partial('public/paging') ?>
   </div>
<script src="/js/goods.js"></script>