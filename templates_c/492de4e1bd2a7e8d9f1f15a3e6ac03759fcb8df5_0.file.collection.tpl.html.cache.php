<?php
/* Smarty version 3.1.39, created on 2021-10-19 21:39:24
  from 'C:\xampp8\htdocs\hotel\templates\report\collection.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616eedb4d294b0_70023649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '492de4e1bd2a7e8d9f1f15a3e6ac03759fcb8df5' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\report\\collection.tpl.html',
      1 => 1631499902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616eedb4d294b0_70023649 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '722859651616eedb4cafe46_16834743';
?>
<fieldset>
    <legend><h3>Collection Report<hr></h3></legend>
    <form method="post">
        <table>
            <tr>
                <td>Start</td>
                <td><input type="date" name="start_date" size="9" placeholder="dd-mm-yyyy" value='<?php echo $_REQUEST['start_date'];?>
' /></td>
                <td>End</td>
                <td><input type="date" name="end_date" size="9"  placeholder="dd-mm-yyyy" value='<?php echo $_REQUEST['end_date'];?>
' /></td>
                <td><input type="submit" value="Go" />
                    <input type="button" class="print" value="Print" />
                    <input type="hidden" id="excelfile" value="GST" />
                    <input type="button" class="excel" value="Download" title="Download as Excel" />
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<br />
<div class="print_content">
    <?php echo $_SESSION['cname'];?>
 <?php echo $_SESSION['fyear'];?>
<br>
    Collection Report Period <?php echo smarty_modifier_date_format($_REQUEST['start_date'],"%d-%m-%Y");?>
 - <?php echo smarty_modifier_date_format($_REQUEST['end_date'],"%d-%m-%Y");?>
<br />

    <table id='report' border="1">
        <thead>    
            <tr>
                <th>#</th><th>Date</th><th>No.</th><th>Room</th><th>Name</th><th>Phone</th>
                <th>Type</th><th>Amount</th><th>Remarks</th>
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
                <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['no'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['roomnumber'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['mobile'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['ini']->value['mr_type'][$_smarty_tpl->tpl_vars['mod']->value['type']];?>
</td>
                <td align='right'><?php echo $_smarty_tpl->tpl_vars['mod']->value['amount'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['remark'];?>
</td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    <br>
    Summary
    <table id='report' border="1">
        <thead><tr><th>#</th><th>Type</th><th>Amount</th></tr></thead>
        <tbody>
            <?php $_smarty_tpl->_assignInScope('s', 1);?>
            <?php $_smarty_tpl->_assignInScope('amount', 0);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['s']->value;
$_smarty_tpl->_assignInScope('s', $_smarty_tpl->tpl_vars['s']->value+1);?></td>			
                <td><?php echo $_smarty_tpl->tpl_vars['ini']->value['mr_type'][$_smarty_tpl->tpl_vars['mod']->value['type']];?>
</td>
                <td align='right'><?php echo $_smarty_tpl->tpl_vars['mod']->value['amount'];?>
</td>
                <?php $_smarty_tpl->_assignInScope('amount', $_smarty_tpl->tpl_vars['amount']->value+$_smarty_tpl->tpl_vars['mod']->value['amount']);?>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <tr><th colspan="2">Total :</th><th><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['amount']->value);?>
</th></tr>
        </tbody>
    </table>
</div>
<?php }
}
