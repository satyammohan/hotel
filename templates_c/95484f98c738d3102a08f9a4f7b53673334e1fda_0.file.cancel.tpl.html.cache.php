<?php
/* Smarty version 3.1.39, created on 2021-09-10 07:18:34
  from 'C:\xampp8\htdocs\hotel\templates\reservation\cancel.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_613ab9723834b3_70596488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95484f98c738d3102a08f9a4f7b53673334e1fda' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\cancel.tpl.html',
      1 => 1631238507,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_613ab9723834b3_70596488 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1476834724613ab97235d079_92423494';
?>
<h4>Reason for Guest Registration Cancellation</h4>
<form method="post" action="index.php?module=reservation&func=cancel">
    <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>
">
    <input type="hidden" name="save" value="1">
    <table>
        <tr>
            <td>Reason :</td><td><textarea name="reason" required rows="6" cols="60"></textarea></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center"><input type="submit" value="Save" class="btn btn-primary"></td>
        </tr>
    </table>
</form><?php }
}
