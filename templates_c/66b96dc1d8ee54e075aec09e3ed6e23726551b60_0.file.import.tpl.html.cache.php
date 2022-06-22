<?php
/* Smarty version 3.1.39, created on 2021-11-02 07:31:12
  from 'C:\xampp8\htdocs\hotel\templates\management\import.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61809be84b3857_04218379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66b96dc1d8ee54e075aec09e3ed6e23726551b60' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\management\\import.tpl.html',
      1 => 1635818467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61809be84b3857_04218379 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '205938610561809be84ae321_12406686';
?>
<h3>
    Import Data<hr>
</h3>
<form method="post" enctype="multipart/form-data" action="index.php?module=management&func=importsave">
	Choose file to Import <input type="file" name="file"><br>
	<input type="Submit" value="Save">

</form>
<?php }
}
