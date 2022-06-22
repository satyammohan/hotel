<?php
/* Smarty version 3.1.39, created on 2021-10-24 07:45:50
  from 'C:\xampp8\htdocs\hotel\templates\reservation\checkout.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6174c1d662b8c9_31874458',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12bed887b5910c72b189dbd493fd4fb6f40b70bd' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\checkout.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6174c1d662b8c9_31874458 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '12763933386174c1d65d0646_38813724';
?>
<h3>
    Guest Room Checkout<hr>
</h3>
<table id="dataTable" class="table" width="100%">
    <thead>    
        <tr>
            <th>#</th><th>No.</th><th>Type</th><th>Res.Date</th><th>Room</th><th>Days</th><th>Name</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $_smarty_tpl->_assignInScope('s', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rooms']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['s']->value;
$_smarty_tpl->_assignInScope('s', $_smarty_tpl->tpl_vars['s']->value+1);?></td>			
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['no'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['type'];?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mod']->value['date'],"%d-%m-%y");?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value['time'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['roomnumber'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['daysstay'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
<br><?php echo $_smarty_tpl->tpl_vars['mod']->value['mobile'];?>
<br><?php echo $_smarty_tpl->tpl_vars['mod']->value['city'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['total'];?>
</td>
            <td>
                <a class="btn btn-primary" href="index.php?module=reservation&func=checkoute&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_reservation'];?>
" title="Guest Check Out"><i class="fa fa-edit"></i></a>
            </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
