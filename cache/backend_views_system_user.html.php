<div class="grid">
    <div class="toolbar">
        <div class="search">
            <label>名称: <input  class="input" ng-model="info.username" /> </label>
            <label>部门:
                <select ng-model="info.role_id">
                    <option value="0">全部</option>
                    <?php foreach ($departs as $depart) { ?>
                    <option value="<?= $depart->id ?>"><?= $depart->name ?></option>
                    <?php } ?>
                </select>
            </label>
            <label><span class="button" ng-click="search()"> 查 找 </span> </label>

        </div>
        <div class="tool">
            <label><a href="/backend/system/useredit" class="button"> 新 增 </a></label>&nbsp;&nbsp;
            <!--<label><span class="button" ng-click="del()"> 删 除 </span> </label>&nbsp;&nbsp;-->
        </div>
    </div>
    <div class="table">
        <table>
            <thead>
            <tr>
                <!--<th><input type="checkbox"></th>-->
                <th>ID</th>
                <th>名称</th>
                <th>部门</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="item in list">
                <!--<td><input type="checkbox" name="departid[]" value="{_ item['id'] _}" ></td>-->
                <td ng-bind="item['id']"></td>
                <td ng-bind="item['username']"></td>
                <td ng-bind="item['role']">
                <td ng-bind="item['status']"></td>
                </td>
                <td><a href="/backend/system/useredit/{_ item['id'] _}">[ 编辑 ]</a>&nbsp;&nbsp;<a ng-click="edit(item['id'])">[ 删 除 ]</a></td>
            </tr>

            </tbody>
        </table>
    </div>
    <?= $this->partial('public/paging') ?>

</div>

<script src="/js/admin.js"></script>