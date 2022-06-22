<?php
/* Smarty version 3.1.39, created on 2021-10-15 06:44:53
  from 'C:\xampp8\htdocs\hotel\templates\common\empty.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6168d60d771552_24540382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f54181e37dfc6a1f808f47b2f4e2e950a894120f' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\common\\empty.tpl.html',
      1 => 1631239521,
      2 => 'file',
    ),
    '62890f6725b23e8882315885127c949e401c5a83' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\cancelmr.tpl.html',
      1 => 1631239085,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
),true)) {
function content_6168d60d771552_24540382 (Smarty_Internal_Template $_smarty_tpl) {
?><h4>Reason for Money Receipt Cancellation</h4>
<form method="post" action="index.php?module=reservation&func=cancelmr">
    <input type="hidden" name="id" value="300">
    <input type="hidden" name="save" value="1">
    <table>
        <tr>
            <td>Reason :</td><td><textarea name="reason" required rows="6" cols="60"></textarea></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center"><input type="submit" value="Save" class="btn btn-primary"></td>
        </tr>
    </table>
</form>
<?php }
}
