    <{include file="header.tpl"}>
        <{if $action eq 'list'}>
        <a href="<{$smarty.const.URL}>/type.php?action=add">增加类型</a>
        <table border="1" width="960" cellspacing="0" cellpadding="3" align="center">
            <tr>
                <th>ID</th>
                <th>类型名称</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            <{foreach from=$list item=infolist}>
            <tr>
                <td><{$infolist.id}></td>
                <td><{$infolist.type_name}></td>
                <td><{$infolist.status}></td>
                <td>
                    <a href="<{$smarty.const.URL}>/type.php?action=del&id=<{$infolist.id}>">删除</a> |
                    <a href="<{$smarty.const.URL}>/type.php?action=modify&id=<{$infolist.id}>">修改</a>
                </td>
            </tr>
            <{foreachelse}>
            <tr>
                <td colspan="4">没有东西</td>
            </tr>
            <{/foreach}>
        </table>
        <{else}>
        <form action="<{$smarty.const.URL}>/type.php" method="post">
        <table width="600" align="center">
            <tr>
                <td>角色名称</td>
                <td><input type="text" name="type_name" value="<{$info.type_name}>" /></td>
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