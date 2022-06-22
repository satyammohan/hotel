<?php
/* Smarty version 3.1.39, created on 2021-10-24 07:59:23
  from 'C:\xampp8\htdocs\hotel\templates\reservation\editinfo.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6174c503d94ec9_25239832',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f7fb3b456a43cf8aefeeabbe260cc86d5785051' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\editinfo.tpl.html',
      1 => 1635042507,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6174c503d94ec9_25239832 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '11493123756174c503d4c5d3_84906296';
if ($_smarty_tpl->tpl_vars['data']->value['id_reservation']) {?>
<h3>
    Admin Edit Guest Registration<hr>
</h3>
<form method="post" action="index.php?module=reservation&func=checkinupdate">
    <table class="table">
        <tr>
            <td><b>Ref No: *</b><br><b>GRC No:</b><br><b>Bill No:</b></td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['no'];?>
<br><?php echo $_smarty_tpl->tpl_vars['data']->value['grcno'];?>
<br><?php echo $_smarty_tpl->tpl_vars['data']->value['billno'];?>

            </td>
            <td><b>Arr.Date: *</b></td>
            <td>
                <input type="date" name="t[date]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['date'];?>
"/><br>
                <input type="time" name="t[time]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
"/></td>
            <td><b>Dep.Date: *</b></td>
            <td><input type="date" name="t[depature_date]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['depature_date'];?>
"/><br>
                <input type="time" name="t[depature_time]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['depature_time'];?>
"/>
            </td>                
        </tr>
        <tr>
            <td><b>Mobile:</b></td>
            <td><input type="text" id="mobile" name="t[mobile]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mobile'];?>
"/></td>
            <td><b>Name: *</b><br><b>Other Person:</b></td>
            <td><input type="text" id="name" name="t[name]" required size="30" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"/>
                <br><input type="text" name="t[oname]" size="30" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['oname'];?>
"/>
            </td>
            <td><b>Person: *</b><br><b>Adult:</b></td>
            <td>
		<input type="text" name="t[person]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['person'];?>
"/><br>
		<input type="text" name="t[adult]" size="3" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['adult'];?>
"/>
                <b>Child:</b><input type="text" name="t[child]" size="3" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['child'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Company:</b></td>
            <td><input type="text" id="company" name="t[company]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['company'];?>
"/></td>
            <td><b>Gstin:</b></td>
            <td><input type="text" id="gstin" name="t[gstin]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['gstin'];?>
"/></td></td>
        </tr>
        <tr>
            <td><b>Adv. Booking No:</b></td>
            <td><input type="text" name="t[ano]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['ano'];?>
"/></td>
            <td><b>DOB:</b></td>
            <td><input type="text" id="dob" name="t[dob]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['dob'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Address:</b></td>
            <td><input type="text" id="address" name="t[address]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>
"/></td>
            <td><b>City:</b></td>
            <td><input type="text" id="city" name="t[city]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['city'];?>
"/></td>
            <td><b>Arrived From:</b></td>
            <td><input type="text" id="arrivedfrom" name="t[arrivedfrom]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['arrivedfrom'];?>
"/></td>
        </tr>
        <tr>
            <td><b>District:</b></td>
            <td><input type="text" id="district" name="t[district]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['district'];?>
"/></td>
            <td><b>State:</b></td>
            <td><input type="text" id="state" name="t[state]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['state'];?>
"/></td>
            <td><b>Country:</b></td>
            <td><input type="text" id="country" name="t[country]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['country'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Email:</b></td>
            <td><input type="email" id="email" name="t[email]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
"/></td>
            <td><b>ID proof:</b></td>
            <td><input type="text" id="id_proof" name="t[id_proof]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id_proof'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Purpose of Visit:</b></td>
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
            <td><b>Booking Type:</b></td>
            <td><select name="t[type]"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ini']->value['res_type'],'selected'=>$_smarty_tpl->tpl_vars['data']->value['type']),$_smarty_tpl);?>
</select></td>
            <td><b>Booking No:</b></td>
            <td><input type="text" name="t[booking_no]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['booking_no'];?>
"/></td>
            <td><b>Refered By:</b></td>
            <td><input type="text" name="t[refer]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['refer'];?>
"/></td>
        </tr>
        <tr>
            <td colspan="4">
                <b>Stay: </b><?php echo $_smarty_tpl->tpl_vars['data']->value['daysstay'];?>
&nbsp;&nbsp;&nbsp;
                <b>Rooms: </b><?php echo $_smarty_tpl->tpl_vars['data']->value['roomnumber'];?>
&nbsp;&nbsp;&nbsp;
                <b>Rent: </b><?php echo $_smarty_tpl->tpl_vars['data']->value['total']+$_smarty_tpl->tpl_vars['data']->value['discount']-$_smarty_tpl->tpl_vars['data']->value['gstamt'];?>
&nbsp;&nbsp;&nbsp;
                <b>Discount: </b><?php echo $_smarty_tpl->tpl_vars['data']->value['discount'];?>
&nbsp;&nbsp;&nbsp;
                <b>Net: </b><?php echo $_smarty_tpl->tpl_vars['data']->value['total']-$_smarty_tpl->tpl_vars['data']->value['gstamt'];?>
&nbsp;&nbsp;&nbsp;
                <b>GST: </b><?php echo $_smarty_tpl->tpl_vars['data']->value['gstamt'];?>
&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Amount: </b><?php echo $_smarty_tpl->tpl_vars['data']->value['total'];?>

            </td>
            <td><b>Remarks:</b></td>
            <td><input type="text" name="t[remarks]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['remarks'];?>
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
<?php } else { ?>
    <h4>No Data to Edit</h4>
<?php }
}
}
