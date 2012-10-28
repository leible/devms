<html>
    <head>
        <title>用户页面</title>
    </head>

    <body>
        <{if $action eq 'list'}>
        <a href="<{$smarty.const.URL}>/user.php?action=adduser">增加用户</a>
        <table border="1" width="960" align="center" cellspacing="0" cellpadding="3">
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>角色名</th>
                <th>操作</th>
            </tr>
            <{if $userList}>
            <{foreach from=$userList item="user"}>
            <tr>
                <td><{$user.id}></td>
                <td><{$user.user_name}></td>
                <td><{$user.role_id}></td>
                <td>
                    <a href="<{$smarty.const.URL}>/user.php?action=modify&id=<{$user.id}>">编辑</a>
                    <a href="<{$smarty.const.URL}>/user.php?action=del&id=<{$user.id}>">删除</a>
                </td>
            </tr>
            <{/foreach}>
            <{else}>
            <tr>
                <td colspan="4">暂无信息</td>
            </tr>
            <{/if}>
        </table>
        <{else}>
        <form action="<{$smarty.const.URL}>/user.php" method="post">
            <table border="1" width="960" align="center" cellspacing="0" cellpadding="3">
                <tr>
                    <td>用户名</td>
                    <td><input type="text" name="user_name" value="<{$info.user_name}>"></td>
                </tr>
                <tr>
                    <td>角色名</td>
                    <td>
                        <selcet name="role_id">
                            <option value="">请选择角色</option>
                            <{foreach from=$roleList item="role"}>
                            <option value="<{$role.id}>" <{if $role.id eq $info.role_id}>selected<{/if}> >
                                <{$role.role_name}>-<{$role.id}>
                            </option>
                            <{/foreach}>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <{if $info.id}>
                        <input type="hidden" name="id" value="<{$info.id}>" />
                        <input type="hidden" name="action" value="update" />
                        <{else}>
                        <input type="hidden" name="action" value="add" />
                        <{/if}>
                    </td>
                    <td>
                        <input type="submit" value="提交" />
                    </td>
                </tr>
            </table>

        </form>
        <{/if}>
    </body>
</html>