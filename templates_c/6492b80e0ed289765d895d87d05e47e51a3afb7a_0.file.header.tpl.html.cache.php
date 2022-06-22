<?php
/* Smarty version 3.1.39, created on 2021-11-14 08:46:15
  from 'C:\xampp8\htdocs\hotel\templates\common\header.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61907f7fbdc791_60281104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6492b80e0ed289765d895d87d05e47e51a3afb7a' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\common\\header.tpl.html',
      1 => 1630891650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61907f7fbdc791_60281104 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '52080684161907f7fbd4325_46291973';
?>
<div class="header">
  <nav class="navbar fixed-top" style="padding: 0">
    <div class="container-fluid mt-2 mb-2">
      <div class="col-lg-12 text-white">
        <div class="float-left" >
          <b>Welcome Admin</b>
        </div>
        <div class="float-right">
            <a href="#" class="text-white">
              <span data-target=".bs-logout-modal-sm" data-toggle="modal"><i class="fa fa-power-off"></i></span>
            </a>  
        </div>
        <div class="text-center">
            <?php echo $_SESSION['cname'];?>
&nbsp;
            <?php echo smarty_modifier_date_format($_SESSION['sdate'],$_smarty_tpl->tpl_vars['smarty_date']->value);?>
-<?php echo smarty_modifier_date_format($_SESSION['edate'],$_smarty_tpl->tpl_vars['smarty_date']->value);?>

        </div>
      </div>
    </div>
  </nav>
</div>
<?php }
}
