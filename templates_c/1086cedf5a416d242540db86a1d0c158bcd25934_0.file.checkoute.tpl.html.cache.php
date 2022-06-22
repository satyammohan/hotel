<?php
/* Smarty version 3.1.39, created on 2021-10-24 07:45:41
  from 'C:\xampp8\htdocs\hotel\templates\reservation\checkoute.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6174c1cd55f2b6_55289179',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1086cedf5a416d242540db86a1d0c158bcd25934' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\checkoute.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6174c1cd55f2b6_55289179 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '6721345316174c1cd5242a9_93594885';
?>
<h3>
Guest Checkout<hr>
</h3>
<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
<form method="post" action="index.php?module=reservation&func=savecheckout">
 <table class="table">
    <tr>
        <td><b>Date:</b></td>
        <td><input type="text" disable="disable" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['date'];?>
"/>
            <input type="text" size="3" disable="disable" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
"/></td>
        <td><b>Name:</b></td>
        <td><input type="text" disable="disable" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"/></td>
        <td><b>Person:</b></td>
        <td><input type="text" disable="disable" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['person'];?>
"/></td>
    </tr>
    <tr>
        <td><b>Days Stay:</b></td>
        <td><input type="text" disable="disable" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['daysstay'];?>
"/></td>
        <td><b>Rooms:</b></td>
        <td><input type="text" disable="disable" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['roomnumber'];?>
"/></td>
    </tr>
    <tr>
        <td><b>Depature Date:</b></td>
        <td><input type="date" id="date" name="t[depature_date]" required /></td>
        <td><b>Time:</b></td>
        <td><input type="time" name="t[depature_time]" required /></td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="hidden" id="hide" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id_reservation'];?>
">
            <input class="btn btn-primary" type="submit" value="Save" />
        </td>
    </tr>
 </table>
</form>
<?php echo '<script'; ?>
>
    $( document ).ready(function() {
        $("#date").focus();
    });
<?php echo '</script'; ?>
>
<?php }
}
}
