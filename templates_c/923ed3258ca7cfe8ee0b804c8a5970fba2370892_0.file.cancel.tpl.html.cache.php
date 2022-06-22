<?php
/* Smarty version 3.1.39, created on 2021-10-14 16:35:32
  from 'C:\xampp8\htdocs\hotel\templates\banquet\cancel.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61680efca16402_14139325',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '923ed3258ca7cfe8ee0b804c8a5970fba2370892' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\banquet\\cancel.tpl.html',
      1 => 1633657446,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61680efca16402_14139325 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '129494927461680efc989131_57500197';
?>
<h4>Reason for Banquet Booking Cancellation</h4>
<form method="post" action="index.php?module=banquet&func=cancel">
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
</form>
<?php }
}
