<?php
/* Smarty version 3.1.39, created on 2021-11-14 08:34:58
  from 'C:\xampp8\htdocs\hotel\templates\reservation\listing.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61907cda202149_59563849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0db340196ffba989dfbef1c136210f1ac0ee799' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\listing.tpl.html',
      1 => 1635041694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61907cda202149_59563849 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '38510974561907cda1c9708_04021727';
?>
<h3>
Guest Booking Listing<hr>
</h3>
<table id="dataTable" class="table" width="100%">
    <thead>    
        <tr>
            <th>#</th><th>No.</th><th>Type</th><th>Date</th><th>Room</th><th>Days</th><th>Name</th>
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
            <td>In:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mod']->value['date'],"%d-%m-%y");?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value['time'];?>
</br>
                Out:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mod']->value['depature_date'],"%d-%m-%y");?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value['depature_time'];?>
<br>
                Entry:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mod']->value['create_date'],"%d-%m-%y");?>

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
                <a class="btn btn-primary" href="index.php?module=reservation&func=checkin&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_reservation'];?>
" title="Edit Reservation"><i class="fa fa-edit"></i></a>
                <a class="btn btn-primary" href="index.php?module=reservation&func=addmr&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_reservation'];?>
" title="Add Money Receipt"><i class="fa fa-id-card"></i></a>
                <a class="btn btn-primary" href="index.php?module=reservation&func=addfood&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_reservation'];?>
" title="Add Food Bill"><i class="fa fa-cutlery"></i></a>
                <a class="btn btn-primary" href="index.php?module=reservation&func=addother&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_reservation'];?>
" title="Add Laundry and other Bills"><i class="fa fa-shopping-bag"></i></a>
                <?php if ($_smarty_tpl->tpl_vars['mod']->value['billno']) {?>
                    <a class="btn btn-primary" href="index.php?module=reservation&func=printroom&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_reservation'];?>
" title="Print"><i class="fa fa-print"></i></a>
                    <a class="btn btn-secondary" href="index.php?module=reservation&func=printroom&noother=1&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_reservation'];?>
" title="Only Room Bill Print"><i class="fa fa-print"></i></a>
                <?php } else { ?>
                    <a class="btn btn-primary" href="index.php?module=reservation&func=changeroom&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_reservation'];?>
" title="Change Room"><i class="fa fa-exchange"></i></a>
                    <a class="btn btn-danger" href="#" onclick="cancelthis('Do you want to Cancel this Booking?', 'index.php?module=reservation&func=cancel', '<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_reservation'];?>
')" title="Cancel Booking"><i class="fa fa-times"></i></a>
                <?php }?>
                <?php if ($_SESSION['is_admin']) {?>
                    <a class="btn btn-success" href="index.php?module=reservation&func=editinfo&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_reservation'];?>
" title="Edit Other Info"><i class="fa fa-edit"></i></a>
                <?php }?>
            </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
