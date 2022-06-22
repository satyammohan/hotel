<?php
/* Smarty version 3.1.39, created on 2021-10-19 20:07:26
  from 'C:\xampp8\htdocs\hotel\templates\banquet\cancellist.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616ed8265ebca2_96341721',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b994a48d4416eef3e7e5371d8a19fda4f7ff1a34' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\banquet\\cancellist.tpl.html',
      1 => 1634267845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616ed8265ebca2_96341721 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '2138147611616ed8265c2ba5_67369979';
?>
<h3>
    Banquet Cancel Listing<hr>
</h3>
<table id="dataTable" class="table" width="100%">
    <thead>    
        <tr>
            <th>#</th></th><th>No.</th><th>Date</th><th>Guest</th><th>Amount</th><th>Discount</th>
            <th>GST %</th><th>GST Amount</th><th>Total</th><th>Remark</th>
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
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['roomnumber'];?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mod']->value['date'],"%d-%m-%y");?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
<br><?php echo $_smarty_tpl->tpl_vars['mod']->value['proof'];?>
<br><?php echo $_smarty_tpl->tpl_vars['mod']->value['gstin'];?>
<br><?php echo $_smarty_tpl->tpl_vars['mod']->value['address'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['amount'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['discamt'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['tax_per'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['gstamount'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['total'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['remark'];?>
</td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php }
}
