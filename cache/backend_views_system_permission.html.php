<div>
    <div class="permission">
        <?php if ($role_id) { ?><form ng-submit="editapp()"><?php } ?>
            <label style="display: inline-block;height: 30px;line-height: 30px;font-size: 18px;padding: 0 4px;background: #00a4ff;color:#fff;box-sizing: border-box"><input type="checkbox" id="all"> 全选 </label><span ng-click="add(0)"> 添加控制器</span>
            <div  style="background: #00A0E4;color: #fff" ng-repeat="controllers in list">
                <label  style="display: inline-block;height: 30px;line-height: 30px;font-size: 18px;margin: 0 4px" class="controller"><input name="app"   ng-click="selectall($event,0)"  type="checkbox" value="{_ controllers.id _}"  ng-if="controllers.checked"  checked /> <input ng-click="selectall($event,0)" name="app" type="checkbox" value="{_ controllers.id _}"  ng-if="!controllers.checked"   />{_ controllers.remark _}</label><span ng-click="add(controllers.id)">添加方法</span>
            <div class="action">
                <label style="display: inline-block;height: 30px;line-height: 30px;margin: 0 10px" ng-repeat="actions in controllers.child"><input name="app" ng-click="selectall($event,1)" type="checkbox" value="{_ actions.id _}"  ng-if="actions.checked"  checked /> <input name="app" ng-click="selectall($event,1)" type="checkbox" value="{_ actions.id _}"  ng-if="!actions.checked"   /> {_ actions.remark _}</label>
            </div>
            <br/>

            </div>
             <?php if ($role_id) { ?> <input type="submit"  style="width: 150px;height: 30px;border-radius: 10px;background: #00a4ff;color:#fff;font-size: 18px;cursor: pointer;text-align: center"  value="确 &nbsp; &nbsp; &nbsp; &nbsp;   定"/><?php } ?>
            <?php if ($role_id) { ?></form><?php } ?>
    </div>

    <div class="add">
        <form name="addForm" ng-submit="addsub()">
            <table>
                <caption>添 加 应 用</caption>
                <tr>
                    <th>名称(英文)</th>
                    <td><input class="biginput" ng-model="edit.name" name="name" required ng-minlength="2" maxlength="10"
                               ng-class="{'error':addForm.name.$invalid}"/></td>
                </tr>
                <tr>
                    <th>描述(中文)</th>
                    <td><input class="biginput" ng-model="edit.remark" name="remark" required ng-minlength="2"
                               maxlength="10" ng-class="{'error':addForm.remark.$invalid}">
                    </td>
                </tr>
                <tr>
                    <th>是否显示</th>
                    <td><input type="radio" ng-model="edit.show" value="1" name="show" checked/> 是 &nbsp;&nbsp;<input
                            type="radio" ng-model="edit.show" value="0" name="show"/> 否
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="bigbutton" value=" 确 定 " ng-disabled="addForm.$invalid" />
                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>
<script>
    $(function () {
        $("#all").change(function () {
            if ($(this).is(':checked')) {
                $(".permission").find("input:checkbox").prop("checked", true);
            } else {
                $(".permission").find("input:checkbox").prop("checked", false);
            }
        })
    })



    myapp.controller('myCtrl', ['$scope', '$http', 'retrieve', function ($scope, $http, retrieve) {
        $scope.info = {};
        $scope.edit = {};
        retrieve.list($scope);
        $scope.addsub = function () {
            $scope.edit.action = 'add';
            retrieve.edit($scope.edit, '/backend/system/appedit');
        }

        $scope.editapp = function () {
            $scope.info.app = [];
            $scope.info.action = 'edit';
            $("input[name=app]").each(function (i, o) {
                if ($(o).is(":checked")) {
                    $scope.info.app.push($(o).val());
                }
            })
            retrieve.edit($scope.info, '');
        }

        $scope.selectall=function (e,a) {
            $(e.target).is(':checked')?(a?($(e.target).parents('.action').prev().prev('.controller').find("input:checkbox").prop("checked", true)):($(e.target).parents('.controller').next().next('.action').find("input:checkbox").prop("checked", true))):(a|| $(e.target).parents('.controller').next().next('.action').find("input:checkbox").prop("checked", false))
        }

        $scope.add=function (id) {
            $(".add form")[0].reset();
            $scope.edit.pid=id;
            $(".add").show();
        }

    }])
</script>