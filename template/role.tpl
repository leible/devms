
    <{include file="header.tpl"}>
        <{if $action eq 'list'}>
        <a href="<{$smarty.const.URL}>/role.php?action=add">增加角色</a>
        <table width="960" align="center" border="1" cellspacing="0" cellpadding="3">
            <tr>
                <th>ID</th>
                <th>角色名称</th>
                <th>节点IDS</th>
                <th>操作</th>
            </tr>
            <{if $list}>
            <{foreach from=$list item=info}>
            <tr>
                <td><{$info.id}></td>
                <td><{$info.role_name}></td>
                <td><{$info.node_ids}></td>
                <td>
                    <a href="<{$smarty.const.URL}>/role.php?action=modify&id=<{$info.id}>">编辑</a>
                    <a href="<{$smarty.const.URL}>/role.php?action=del&id=<{$info.id}>">删除</a>
                </td>
            </tr>
            <{/foreach}>
            <{else}>
            <tr>
                <td colspan="4">暂无角色</td>
            </tr>
            <{/if}>
        </table>
        <{else}>
        <form action="<{$smarty.const.URL}>/role.php" method="post">
        <table width="600" align="center">
            <tr>
                <td>角色名称</td>
                <td><input type="text" name="role_name" value="<{$info.role_name}>" /></td>
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
                    <input type="submit" value=" 提交 " />
                </td>
            </tr>
        </table>
        </form>
        <{/if}>
    <{include file="footer.tpl"}>
