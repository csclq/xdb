<div class="wrapper main-wrapper wrapper-content ">

    <div class="page-content" style="display: block;">
        <div class="page-heading"> <h2>位置购买次数</h2> </div>
        <form action="" method="get" class="form-horizontal">
            <div class="page-toolbar row m-b-sm m-t-sm">
                <div class="col-sm-5">

                    <div class="btn-group btn-group-sm" style="float:left">
                        <button class="btn btn-default btn-sm" type="button" data-toggle="refresh"><i class="fa fa-refresh"></i></button>
                    </div>
                </div>
                <div class="col-sm-6 pull-right">

                    <select name="orderby" class="form-control  input-sm select-md" style="width:100px;float:left">

                        <option value="" selected="">排序</option>
                        <option value="0">降序</option>
                        <option value="1">升序</option>
                    </select>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" name="title" value="" placeholder="商品名称">
				<span class="input-group-btn">

					<button class="btn btn-sm btn-primary btn-sm" type="submit"> 搜索</button>
                       <button type="submit" name="export" value="1" class="btn btn-success  btn-sm">导出 Excel</button>
                    				</span>
                    </div>

                </div>
            </div>

        </form>

        <table class="table table-hover">
            <thead>
            <tr>
                <th style="width:400px;text-align: center" >商城位置</th>
                <th style="width:400px;text-align: center">购买次数</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($info as $item) { ?>
            <tr>
                <td><?= $item->posit ?></td>
                <td><?= $item->num ?></td>
            </tr>
            <?php } ?>
            </tbody></table>
    </div>
</div><div id="tip-msgbox" class="msgbox"></div>

</body>
</html>