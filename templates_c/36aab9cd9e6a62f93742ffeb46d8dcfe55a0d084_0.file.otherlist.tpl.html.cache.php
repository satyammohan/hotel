<?php
/* Smarty version 3.1.39, created on 2021-10-19 20:06:56
  from 'C:\xampp8\htdocs\hotel\templates\reservation\otherlist.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616ed808296b48_15338813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36aab9cd9e6a62f93742ffeb46d8dcfe55a0d084' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\otherlist.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616ed808296b48_15338813 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '1947820762616ed80827b9d7_93986895';
?>
<h3>
    Laundry/Other Bill List<hr>
</h3>
<table id="dataTable" class="table" width="100%">
    <thead>
        <tr>
            <th>#</th><th>Date</th><th>Room</th><th>Name</th><th>No.</th><th>Amount</th><th>GST %</th><th>GST Amount</th><th>Net Amount</th><th>Remark</th>
        </tr>
    </thead>
    <tbody>
        <?php $_smarty_tpl->_assignInScope('s', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['other']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['s']->value;
$_smarty_tpl->_assignInScope('s', $_smarty_tpl->tpl_vars['s']->value+1);?></td>			
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mod']->value['date'],"%d-%m-%Y");?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['roomnumber'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
<br><?php echo $_smarty_tpl->tpl_vars['mod']->value['email'];?>
<br><?php echo $_smarty_tpl->tpl_vars['mod']->value['phone'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['no'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['goodsvalue'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['gstper'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['gstamount'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['amount'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['remark'];?>
</td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
