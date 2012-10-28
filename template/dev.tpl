    <{include file="header.tpl"}>
        <{if $action eq 'list'}>
         <!--搜索表单-->
        <form>
        搜索：
        <select name="searchName">
            <option value="">请选择搜索条件</option>
            <option value="dev_name">设备名称</option>
            <option value="sn">固定资产号</option>
            <option value="buy_user">购买者</option>
        </select>

        <select name="type_id">
            <option value="">请选择设备类型</option>
                  <{foreach from=$typelist item="type"}>
              <option value="<{$type.id}>" <{if $type.id eq $info.type_id}>selected<{/if}> >
                        <{$type.type_name}>-<{$type.id}>
              </option>
                   <{/foreach}>
        </select>
        <select name="status">
            <option value="1">正常</option>
            <option value="-1">报废</option>
        </select>
        关键字:  <input type="text" name="keyWord" value="">
                 <input type="hidden" name="action" value="search">
                 <input type="submit"  value="搜索">
    </form>
        <a href="<{$smarty.const.URL}>/dev.php?action=add">增加设备</a>
        <table border="1" width="960" align="center" cellspacing="0"cellpadding="3">
            <tr>
                <td>ID</td>
                <td>设备名</td>
                <td>固定资产号</td>
                <td>设备类型</td>
                <td>购买者</td>
                <td>状态</td>
                <td>操作</td>
            </tr>
            <{if $list}>
            <{foreach from=$list item="info"}>
            <tr>
                <td><{$info.id}></td>
                <td><{$info.dev_name}></td>
                <td><{$info.sn}></td>
                <td><{$info.type_id|showTypeNameById}></td>
                <td><{$info.buy_user}></td>
                <td><{if $info.status gt 0}>正常<{elseif $info.status lt 0}>报废<{/if}></td>
                <td>
                    <a href="<{$smarty.const.URL}>/dev.php?action=modify&id=<{$info.id}>">编辑</a>
                    <a href="<{$smarty.const.URL}>/dev.php?action=del&id=<{$info.id}>">删除</a>
                    <a href="<{$smarty.const.URL}>/dev.php?action=forbid&id=<{$info.id}>">报废</a>
                </td>
            </tr>
            <{/foreach}>
            <{else}>
            <tr>
                <td colspan="4"> 暂无设备</td>
            </tr>
            <{/if}>
        </table>
        <{else}>
        <form action="<{$smarty.const.URL}>/dev.php" method="post">
            <table border="1" width="960" align="center" cellspacing="0" cellpadding="3">
                <tr>
                    <td>设备名称</td>
                    <td><input type="text" name="dev_name" value="<{$info.dev_name}>"></td>
                </tr>
                <tr>
                    <td>固定资产号</td>
                    <td><input type="text" name="sn" value="<{$info.sn}>"></td>
                </tr>
                <tr>
                    <td>设备类型</td>
                    <td>
                        <select name="type_id">
                            <option value="">请选择设备类型</option>
                            <{foreach from=$typelist item="type"}>
                            <option value="<{$type.id}>" <{if $type.id eq $info.type_id}>selected<{/if}> >
                                <{$type.type_name}>-<{$type.id}>
                            </option>
                            <{/foreach}>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>购买者</td>
                    <td><input type="text" name="buy_user" value="<{$info.buy_user}>"</td>
                </tr>
                <tr>
                    <td>
                    <{if $info.id}>
                    <input type="hidden" name="id" value="<{$info.id}>">
                    <input type="hidden" name="action" value="upadte">
                    <{else}>
                    <input type="hidden" name="action" value="insert">
                    <{/if}>
                    </td>
                    <td>
                        <input type="submit" value="提交">
                    </td>
                </tr>
            </table>
        </form>
        <{/if}>
    <{include file="footer.tpl"}>