<?php
/* Smarty version 3.1.39, created on 2021-10-14 08:08:38
  from 'C:\xampp8\htdocs\hotel\templates\reservation\cancellist.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6167982ed9d177_62493534',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fb2b9752f732d0b329441a9ed1aae6f65d77e26' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\cancellist.tpl.html',
      1 => 1631239058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6167982ed9d177_62493534 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '8137530826167982ed036e6_49594010';
?>
<h3>
    Room Cancellation List<hr>
</h3>
<table id="dataTable" class="table" width="100%">
    <thead>    
        <tr>
            <th>#</th></th><th>Cancel</th><th>Reason</th><th>Type</th><th>Check In Date</th><th>Room</th><th>Name</th>
            <th>Days</th><th>Corporate</th>
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
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mod']->value['cancel_date'],"%d-%m-%y");?>
<br><b><?php echo $_smarty_tpl->tpl_vars['mod']->value['uname'];?>
</b></td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['cancel_reason'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['type'];?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mod']->value['date'],"%d-%m-%y");?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value['time'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['roomnumber'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
<br><?php echo $_smarty_tpl->tpl_vars['mod']->value['email'];?>
<br><?php echo $_smarty_tpl->tpl_vars['mod']->value['phone'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['daysstay'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['cname'];?>
</td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php }
}
