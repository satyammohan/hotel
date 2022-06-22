<?php
/* Smarty version 3.1.39, created on 2021-10-19 20:07:20
  from 'C:\xampp8\htdocs\hotel\templates\reservation\mrlist.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616ed820698e76_39478223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08c93d04d72a35f0a55d3e5ff14fb350c0e06594' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\mrlist.tpl.html',
      1 => 1634350480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616ed820698e76_39478223 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '787703726616ed820661359_34643464';
?>
<h3>
    Money Receipt List<hr>
</h3>
<table id="dataTable" class="table" width="100%">
    <thead>    
        <tr>
            <th>#</th><th>Date</th><th>No.</th><th>Type</th><th>Room</th><th>Name</th>
            <th>Type</th><th>Amount</th><th>Remarks</th><th width="120px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $_smarty_tpl->_assignInScope('s', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mr']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['s']->value;
$_smarty_tpl->_assignInScope('s', $_smarty_tpl->tpl_vars['s']->value+1);?></td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mod']->value['date'],"%d-%m-%Y");?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['mod']->value['mrtype'] == "B") {?>Banquet<?php } else { ?>Room<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['no'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['roomnumber'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
<br><?php echo $_smarty_tpl->tpl_vars['mod']->value['email'];?>
<br><?php echo $_smarty_tpl->tpl_vars['mod']->value['phone'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['ini']->value['mr_type'][$_smarty_tpl->tpl_vars['mod']->value['type']];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['amount'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['remark'];
if ($_smarty_tpl->tpl_vars['mod']->value['cancel_date']) {?><font color='red'><br>Cancel Reason:<?php echo $_smarty_tpl->tpl_vars['mod']->value['cancel_reason'];
}?></font></td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['mod']->value['cancel_date']) {?>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mod']->value['cancel_date'],"%d-%m-%Y");?>

                <?php } else { ?>
                    <a class="btn btn-primary" href="index.php?module=<?php if ($_smarty_tpl->tpl_vars['mod']->value['mrtype'] == 'B') {?>banquet<?php } else { ?>reservation<?php }?>&func=printmr&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id'];?>
" title="Print Money Receipt"><i class="fa fa-print"></i></a>
                    <a class="btn btn-danger" href="#" onclick="cancelthis('Do you want to Cancel this Money Receipt?', 'index.php?module=reservation&func=cancelmr', '<?php echo $_smarty_tpl->tpl_vars['mod']->value['id'];?>
')" title="Cancel MR"><i class="fa fa-times"></i></a>
                <?php }?>
            </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php }
}
