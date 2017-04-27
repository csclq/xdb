<div class="grid" >
    <div class="toolbar">
        <div class="search">
            <label>名称: <input  class="input" ng-model="info.name" /> </label>
            <label>备注:
                <input  class="input" ng-model="info.remark" />
            </label>
            <label><span class="button" ng-click="search()"> 查 找 </span> </label>

        </div>
        <div class="tool">
            <label><span class="button" ng-click="add()"> 新 增 </span> </label>&nbsp;&nbsp;
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
                    <th>备注</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in list">
                    <!--<td><input type="checkbox" name="departid[]" value="{_ item['id'] _}" ></td>-->
                    <td ng-bind="item['id']"></td>
                    <td ng-bind="item['name']"></td>
                    <td ng-bind="item['remark']">
                    </td>
                    <td><a href="/backend/system/permission/{_ item['id'] _}">[ 权限分配 ]</a>&nbsp;&nbsp;<a ng-click="delete(item['id'])">[ 删 除 ]</a></td>
                </tr>

            </tbody>
        </table>
    </div>
    <?= $this->partial('public/paging') ?>
<button ng-click="loginfo()">显示</button>
</div>
<div class="add" >
    <form name="addForm" >
        <table>
            <caption>添加新部门</caption>
            <tr>
                <th>名称</th>
                <td><input class="biginput" ng-model="edit.name" name="name"  /></td>
            </tr>
            <tr>
                <th>备注</th>
                <td> <input  class="biginput" ng-model="edit.remark" name="depart" required ng-minlength="2" maxlength="10" ng-class="{'error':addForm.depart.$invalid}">
                  </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" class="bigbutton" value=" 确 定 " ng-disabled="addForm.$invalid" ng-click="addsub()" />
                </td>
            </tr>
        </table>
    </form>
</div>
<script src="/js/depart.js"></script>