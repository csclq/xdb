<div>
    <form name="editForm" action="" method="post" >
        <table>
            <caption><?= $actionname ?>管理员</caption>
            <tr>
                <th>名称</th>
                <td><input class="biginput"  name="username" value="<?= $admin['username'] ?>"  /></td>
            </tr>
            <tr>
                <th>部门</th>
                <td>
                    <select name="role_id">
                        <option value="0">-请选择-</option>
                        <?php foreach ($departs as $role) { ?>
                            <option value="<?= $role->id ?>" <?php if ($admin['role_id'] == $role->id) { ?> selected <?php } ?> ><?= $role->name ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>密码</th>
                <td> <input  class="biginput" ng-model="edit.password" name="password"   type="password"  >
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="token" value="<?= $token ?>">
                    <input type="hidden" name="result" value="jump">
                    <input type="submit" class="bigbutton" value=" 确 定 "  />
                </td>
            </tr>
        </table>
    </form>
</div>

<script src="/js/adminedit.js"></script>