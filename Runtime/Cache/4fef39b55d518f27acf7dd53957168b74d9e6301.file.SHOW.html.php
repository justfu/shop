<?php /* Smarty version Smarty-3.1.6, created on 2016-07-22 17:58:40
         compiled from "E:/xampp/htdocs/shop/Admin/View\Goods\SHOW.html" */ ?>
<?php /*%%SmartyHeaderCode:270605791e58a524c25-40830657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fef39b55d518f27acf7dd53957168b74d9e6301' => 
    array (
      0 => 'E:/xampp/htdocs/shop/Admin/View\\Goods\\SHOW.html',
      1 => 1469181509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '270605791e58a524c25-40830657',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5791e58a5c4ed',
  'variables' => 
  array (
    'info' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5791e58a5c4ed')) {function content_5791e58a5c4ed($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\xampp\\htdocs\\ThinkPHP\\Library\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>会员列表</title>

        <link href="<?php echo @ADMIN_CSS_URL;?>
mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{ background-color: #9F88FF }
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：商品管理-》商品列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo @__MODULE__;?>
/Goods/add" target="right">【添加商品】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div class="div_search">
            <span>
                <form action="#" method="get">
                    品牌<select name="s_product_mark" style="width: 100px;">
                        <option selected="selected" value="0">请选择</option>
                        <option value="1">苹果apple</option>
                    </select>
                    <input value="查询" type="submit" />
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">

                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>商品名称</td>
                        <td>库存</td>
                        <td>价格</td>
                        <td>图片</td>
                        <td>缩略图</td>
                        <td>品牌</td>
                        <td>创建时间</td>
                        <td align="center">操作</td>
                    </tr>
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['v']->iteration++;
?>
                    <tr id="product1">
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->iteration;?>
</td>
                        <td><a href="#"><?php echo $_smarty_tpl->tpl_vars['v']->value['g_name'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['g_count'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['g_price'];?>
</td>
                        <td><img src="<?php echo @SITE_URL;?>
<?php echo $_smarty_tpl->tpl_vars['v']->value['g_img'];?>
" height="60" width="60"></td>
                        <td><img src="<?php echo @SITE_URL;?>
<?php echo $_smarty_tpl->tpl_vars['v']->value['g_img'];?>
" height="40" width="40"></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['g_brand'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['g_createtime'],'%Y-%m-%d %H:%M:%S');?>
</td>
                        <td><a href="<?php echo @__CONTROLLER__;?>
/update/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['g_id'];?>
">修改</a></td>
                        <td><a href="javascript:;" onclick="delete_good(<?php echo $_smarty_tpl->tpl_vars['v']->value['g_id'];?>
)">删除</a></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            [1]
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
<script type="text/javascript">
    function delete_good(id){
        if(confirm('您确定要删除吗!!!操作不可逆!!')){
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "<?php echo @__CONTROLLER__;?>
/delete/id/"+id, true);
//            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.onreadystatechange = function(){
                var XMLHttpReq = xhr;
                if (XMLHttpReq.readyState == 4) {
                    if (XMLHttpReq.status == 200) {
                        var text = XMLHttpReq.responseText;
                        location.reload();
                    }
                }
            };
            xhr.send();
        }
    }
</script><?php }} ?>