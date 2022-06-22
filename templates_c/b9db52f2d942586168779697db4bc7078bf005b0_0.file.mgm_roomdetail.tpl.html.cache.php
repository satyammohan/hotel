<?php
/* Smarty version 3.1.39, created on 2021-11-14 08:33:19
  from 'C:\xampp8\htdocs\hotel\templates\report\mgm_roomdetail.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61907c774b3c51_34207555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9db52f2d942586168779697db4bc7078bf005b0' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\report\\mgm_roomdetail.tpl.html',
      1 => 1636858341,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61907c774b3c51_34207555 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '23180404061907c77477d13_48427096';
?>
<fieldset>
    <legend><h3>Management Room Details<hr></h3></legend>
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
                    <input type="hidden" id="excelfile" value="Entry" />
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
    Management Room Details Period <?php echo smarty_modifier_date_format($_REQUEST['start_date'],"%d-%m-%Y");?>
 - <?php echo smarty_modifier_date_format($_REQUEST['end_date'],"%d-%m-%Y");?>
<br />
    <table id='report' border="1">
        <tr>
            <th>Sl</th><th>No</th><th>Arr.Date</th><th>Arr.Time</th><th>Depature Date</th><th>Depature Time</th><th>Grcno</th><th>Name</th><th>Others</th><th>Mobile</th><th>Person</th><th>Adult</th><th>Child</th><th>Company</th><th>Gstin</th><th>Adv.Book No</th><th>DOB</th><th>Address</th><th>City</th><th>Arrived from</th><th>District</th><th>State</th><th>Country</th><th>Email</th><th>Id_proof</th><th>Purpose</th><th>Destination</th><th>Forword Address</th><th>Booking Type</th><th>Booking_no</th><th>Refer</th><th>Daysstay</th><th>Remarks</th><th>BillInst.</th><th>Room</th><th>Rent</th><th>Discount</th><th>Gst</th><th>Total</th>
        </tr>
        <?php $_smarty_tpl->_assignInScope('total', 0);
$_smarty_tpl->_assignInScope('gstamt', 0);
$_smarty_tpl->_assignInScope('discount', 0);?>
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
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['no'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['date'],"%d-%m-%Y");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['time'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['x']->value['depature_date'],"%d-%m-%Y");?>
}</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['depature_time'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['grcno'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['oname'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['mobile'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['person'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['adult'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['x']->value['child'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['company'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['gstin'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['ano'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['dob'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['address'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['city'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['arrivedfrom'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['district'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['state'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['country'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['email'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['id_proof'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['purpose'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['destination'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['faddress'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['type'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['booking_no'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['refer'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['daysstay'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['remarks'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['billinst'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['x']->value['roomnumber'];?>
</td>
    
                <td align="right"><?php echo $_smarty_tpl->tpl_vars['x']->value['rentday'];?>
</td>
                <td align="right"><?php echo $_smarty_tpl->tpl_vars['x']->value['discount'];?>
</td>
                <td align="right"><?php echo $_smarty_tpl->tpl_vars['x']->value['gstamt'];?>
</td>
                <td align="right"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['x']->value['total']);?>
</td>

                <?php $_smarty_tpl->_assignInScope('gstamt', $_smarty_tpl->tpl_vars['gstamt']->value+$_smarty_tpl->tpl_vars['x']->value['gstamt']);?>
                <?php $_smarty_tpl->_assignInScope('discount', $_smarty_tpl->tpl_vars['discount']->value+$_smarty_tpl->tpl_vars['x']->value['discount']);?>
                <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['x']->value['total']);?>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <tr>
            <th colspan="36">Total :</th>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['discount']->value);?>
</b></td>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['gstamt']->value);?>
</b></td>
            <td align="right"><b><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['total']->value);?>
</b></td>
        </tr>
    </table>
</div>
<?php }
}
