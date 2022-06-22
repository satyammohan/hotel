<?php
/* Smarty version 3.1.39, created on 2021-08-30 20:28:19
  from 'C:\xampp8\htdocs\hotel\templates\reservation\edit.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_612cf20b9893a7_84420587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9aa21ad2e7824b5197d46e30f466b2ef415baf2d' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\edit.tpl.html',
      1 => 1627312689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_612cf20b9893a7_84420587 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '1709856155612cf20b7ea1b8_52014669';
?>
<h3>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['id_reservation']) {?>Edit<?php } else { ?>Add<?php }?> Reservation<hr>
</h3>
<form method="post" action="index.php?module=reservation&func=<?php if ($_smarty_tpl->tpl_vars['data']->value['id_reservation']) {?>update<?php } else { ?>insert<?php }?>">
    <table class="table">
        <tr>
            <td><b>No:  *</b></td>
            <td><input type="text" name="t[no]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['no'];?>
"/></td>
            <td><b>Date: *</b></td>
            <td><input type="date" name="t[date]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['date'];?>
"/><br>
                <input type="time" name="t[time]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
"/></td>
            <td><b>Name: *</b><br><b>Other Person:</b></td>
            <td><input type="text" name="t[name]" required size="40" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"/>
                <br><input type="text" name="t[oname]" size="40" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['oname'];?>
"/>
            </td>
        </tr>
        <tr>
            <td><b>Company:</b></td>
            <td><input type="text" name="t[company]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['company'];?>
"/></td>
            <td><b>Gstin:</b></td>
            <td><input type="text" name="t[gstin]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['gstin'];?>
"/></td></td>
            <td><b>Address of Company:</b></td>
            <td><input type="text" name="t[address]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Mobile:</b></td>
            <td><input type="text" name="t[mobile]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mobile'];?>
"/></td>
            <td><b>Adv. Booking No:</b></td>
            <td><input type="text" name="t[ano]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ano'];?>
"/></td>
            <td><b>DOB:</b></td>
            <td><input type="text" name="t[dob]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['dob'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Address:</b></td>
            <td><input type="text" name="t[address]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>
"/></td>
            <td><b>City:</b></td>
            <td><input type="text" name="t[city]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['city'];?>
"/></td>
            <td><b>Arrived From:</b></td>
            <td><input type="text" name="t[arrivedfrom]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['arrivedfrom'];?>
"/></td>
        </tr>
        <tr>
            <td><b>District:</b></td>
            <td><input type="text" name="t[district]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['district'];?>
"/></td>
            <td><b>State:</b></td>
            <td><input type="text" name="t[state]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['state'];?>
"/></td>
            <td><b>Country:</b></td>
            <td><input type="text" name="t[country]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['country'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Fax:</b></td>
            <td><input type="text" name="t[fax]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['fax'];?>
"/></td>
            <td><b>Email:</b></td>
            <td><input type="email" name="t[email]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
"/></td>
            <td><b>ID proof:</b></td>
            <td><input type="text" name="t[id_proof]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id_proof'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Purpose of visit:</b></td>
            <td><input type="text" name="t[purpose]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['purpose'];?>
"/></td>
            <td><b>Probable Destination:</b></td>
            <td><input type="text" name="t[destination]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['destination'];?>
"/></td>
            <td><b>Forwarding Address:</b></td>
            <td><input type="text" name="t[faddress]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['faddress'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Room Type:</b></td>
            <td><select name="t[id_roomtype]"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['rt']->value,'selected'=>$_smarty_tpl->tpl_vars['data']->value['id_roomtype']),$_smarty_tpl);?>
</select></td>
            <td><b>Booking Type:</b></td>
            <td><select name="t[type]"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ini']->value['res_type'],'selected'=>$_smarty_tpl->tpl_vars['data']->value['type']),$_smarty_tpl);?>
</select></td>
            <td><b>Refered By:</b></td>
            <td><input type="text" name="t[refer]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['refer'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Person: *</b></td>
            <td><input type="text" name="t[person]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['person'];?>
"/></td>
            <td><b>Adult:</b></td>
            <td><input type="text" name="t[adult]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['adult'];?>
"/></td>
            <td><b>Child:</b></td>
            <td><input type="text" name="t[child]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['child'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Days Stay:</b></td>
            <td><input type="text" name="t[daysstay]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['daysstay'];?>
"/></td>
            <td><b>Depature Date:</b></td>
            <td><input type="date" name="t[depature_date]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['depature_date'];?>
"/><br>
                <input type="time" name="t[depature_time]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['depature_time'];?>
"/>
            </td>
            <td><b>Booking No:</b></td>
            <td><input type="text" name="t[booking_no]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['booking_no'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Room Category:</b></td>
            <td><input type="text" name="t[roomcategory]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['roomcategory'];?>
"/></td>
            <td><b>Room number: *</b></td>
            <td><input type="text" name="t[roomnumber]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['roomnumber'];?>
"/></td>
            <td><b>Rent:</b></td>
            <td><input type="text" name="t[rent]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['rent'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Food Persons:</b></td>
            <td><input type="text" name="t[foodpersons]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['foodpersons'];?>
"/></td>
            <td><b>Food:</b></td>
            <td><input type="text" name="t[food]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['food'];?>
"/></td>
            <td><b>Extra:</b></td>
            <td><input type="text" name="t[extra]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['extra'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Discount %:</b></td>
            <td><input type="text" name="t[discount]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['discount'];?>
"/></td>
            <td><b>Amount:</b></td>
            <td><input type="text" name="t[amount]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['amount'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Less:</b></td>
            <td><input type="text" name="t[less]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['less'];?>
"/></td>
            <td><b>Rent/day:</b></td>
            <td><input type="text" name="t[rentday]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['rentday'];?>
"/></td></td>
            <td><b>With Tax:</b></td>
            <td><input type="text" name="t[withtax]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['withtax'];?>
"/></td>
        </tr>
        <tr>
            <td><b>GST %:</b></td>
            <td>
                <select name="t[gst]">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['tax']->value,'selected'=>$_smarty_tpl->tpl_vars['data']->value['gst']),$_smarty_tpl);?>

                </select>
            </td>
            <td><b>GST Amount:</b></td>
            <td><input type="text" name="t[gstamt]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['gstamt'];?>
"/></td></td>
            <td><b>Total: *</b></td>
            <td><input type="text" name="t[total]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['total'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Advance Cash:</b></td>
            <td><input type="text" name="t[advancecash]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['advancecash'];?>
"/></td>
            <td><b>Bank Details:</b></td>
            <td><input type="text" name="t[bank]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['bank'];?>
"/></td></td>
            <td><b>Remarks:</b></td>
            <td><input type="text" name="t[remarks]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['remarks'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Food Plan:</b></td>
            <td>
                <select name="t[food_type]">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ini']->value['food_type'],'selected'=>$_smarty_tpl->tpl_vars['data']->value['food_type']),$_smarty_tpl);?>

                </select>
            </td>
            <td><b>Billing Inst.:</b></td>
            <td><input type="text" name="t[billinst]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['billinst'];?>
"/></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" id="hide" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id_reservation'];?>
">
                <input class="btn btn-primary" type="submit" value="Save" />
            </td>
        </tr>
    </table>
</form>


<?php }
}
