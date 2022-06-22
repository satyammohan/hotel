<?php
/* Smarty version 3.1.39, created on 2021-10-30 09:01:40
  from 'C:\xampp8\htdocs\hotel\templates\corporate\listing.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_617cbc9c70c065_49690123',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fe359b8e4a82b504b0630205302385973ef1d31' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\corporate\\listing.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617cbc9c70c065_49690123 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '1670593370617cbc9c6eb2b3_09063867';
?>
<h3>
    Corporate Master<hr>
</h3>
<table id="dataTable" class="table" width="100%">
    <thead>    
        <tr>
            <th>#</th></th><th>Name</th><th>Address</th><th>GSTIN</th><th>Contact</th><th>Create On</th><th><a class="btn btn-primary" href="index.php?module=corporate&func=edit" title="Add Corporate"><i class="fa fa-plus"></i></a></th>
        </tr>
    </thead>
    <tbody>
        <?php $_smarty_tpl->_assignInScope('s', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['corporate']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['s']->value;
$_smarty_tpl->_assignInScope('s', $_smarty_tpl->tpl_vars['s']->value+1);?></td>			
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['address'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['gstin'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['contact'];?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mod']->value['create_date'],"%d-%m-%y");?>
</td>
            <td>
                <a class="btn btn-primary" href="index.php?module=corporate&func=edit&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_corporate'];?>
" title="Edit Corporate"><i class="fa fa-edit"></i></a>
                <a class="btn btn-primary" href="index.php?module=corporate&func=delete&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_corporate'];?>
" onclick="return confirm('Do you want to delete this Room?');" title="Delete Corporate"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
