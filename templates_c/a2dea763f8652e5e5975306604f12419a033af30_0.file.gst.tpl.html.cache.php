<?php
/* Smarty version 3.1.39, created on 2021-09-09 07:57:17
  from 'C:\xampp8\htdocs\hotel\templates\report\gst.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6139710568b9c2_34668616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2dea763f8652e5e5975306604f12419a033af30' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\report\\gst.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6139710568b9c2_34668616 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '197763001261397105459f76_55724330';
?>
<fieldset>
    <legend><h3>GST Report<hr></h3></legend>
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
    GST Report Period <?php echo smarty_modifier_date_format($_REQUEST['start_date'],"%d-%m-%Y");?>
 - <?php echo smarty_modifier_date_format($_REQUEST['end_date'],"%d-%m-%Y");?>
<br />
    <table id='report' border="1">
        <tr>
            <th>Sl</th><th>In Date</th><th>Out Date</th><th>No</th><th>Name</th>
            <th>Rent</th><th>Days Stay</th><th>Taxable Value</th>
            <th>GST</th><th>GST Amount</th><th>SGST</th><th>CGST</th><th>Total</th><th>Add Date</th><th>Modify Date</th>
        </tr>
        <?php $_smarty_tpl->_assignInScope('total', 0);
$_smarty_tpl->_assignInScope('goods', 0);
$_smarty_tpl->_assignInScope('gst', 0);?>
        <?php $_smarty_tpl->_assignInScope('s', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'x', false, NULL, 'it', array (
));
$_smarty_tpl->tpl_vars['x']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
$_smarty_tpl->tpl_vars['x']->do_else = false;
?>
            <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['s']->value;
$_smarty_tpl->_assignInScope('s', $_smarty_tpl->tpl_vars['s']->value+1);?></td>			
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['date'],"%d-%m-%Y");?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['depature_date'],"%d-%m-%Y");?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['no'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['name'];?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['rent']);?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['daysstay'];?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['withtax']);?>
</td><td align="right"><?php echo $_smarty_tpl->tpl_vars['tax']->value[$_smarty_tpl->tpl_vars['x']->value['gst']];?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['gstamt']);?>
</td><td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['x']->value['gstamt']/2));?>
</td>
                <td align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['x']->value['gstamt']/2));?>
</td>
                <td align="right"><?php echo $_smarty_tpl->tpl_vars['x']->value['total'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['create_date'],"%d-%m");?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['modify_date'],"%d-%m");?>
</td>
                <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['x']->value['total']);?>
                <?php $_smarty_tpl->_assignInScope('gst', $_smarty_tpl->tpl_vars['gst']->value+$_smarty_tpl->tpl_vars['x']->value['gstamt']);?>
                <?php $_smarty_tpl->_assignInScope('goods', $_smarty_tpl->tpl_vars['goods']->value+$_smarty_tpl->tpl_vars['x']->value['withtax']);?>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <tr>
            <th colspan="7">Total :</th>
            <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['goods']->value);?>
</th><th></th>
            <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['gst']->value);?>
</th>
            <th align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['gst']->value/2));?>
</th>
            <th align="right"><?php echo sprintf("%.2f",($_smarty_tpl->tpl_vars['gst']->value/2));?>
</th>
            <th align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</th>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
</div>
<?php }
}
