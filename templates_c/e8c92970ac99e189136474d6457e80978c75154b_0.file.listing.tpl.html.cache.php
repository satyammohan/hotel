<?php
/* Smarty version 3.1.39, created on 2021-10-19 20:07:29
  from 'C:\xampp8\htdocs\hotel\templates\banquet\listing.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616ed829c9f091_66817468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8c92970ac99e189136474d6457e80978c75154b' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\banquet\\listing.tpl.html',
      1 => 1634267812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616ed829c9f091_66817468 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '169253415616ed829afe577_41868477';
?>
<h3>
    Banquet Listing<hr>
</h3>
<table id="dataTable" class="table" width="100%">
    <thead>    
        <tr>
            <th>#</th></th><th>No.</th><th>Date</th><th>Guest</th><th>Amount</th><th>Discount</th>
            <th>GST %</th><th>GST Amount</th><th>Total</th><th>Balance</th><th>Remark</th>
            <th><a class="btn btn-primary" href="index.php?module=banquet&func=edit" title="Add Banquet Bill"><i class="fa fa-plus"></i></a></th>
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
            <td><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['mod']->value['total']-$_smarty_tpl->tpl_vars['mod']->value['received']));?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['remark'];?>
</td>
            <td>
                <?php if ($_SESSION['is_admin']) {?>
                    <a class="btn btn-primary" href="index.php?module=banquet&func=edit&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_banquet'];?>
" title="Edit Banquet Booking"><i class="fa fa-edit"></i></a>
                <?php }?>
                <a class="btn btn-primary" href="index.php?module=banquet&func=addmr&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_banquet'];?>
&type=B" title="Add Money Receipt"><i class="fa fa-id-card"></i></a>
                <a class="btn btn-primary" href="index.php?module=banquet&func=printbanquet&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_banquet'];?>
" title="Print Banquet Booking"><i class="fa fa-print"></i></a>
                <a class="btn btn-danger" href="#" onclick="cancelthis('Do you want to Cancel this Banquet Booking?', 'index.php?module=banquet&func=cancel', '<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_banquet'];?>
')" title="Cancel Banquet Booking"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php }
}
