<?php
/* Smarty version 3.1.39, created on 2021-10-19 21:58:34
  from 'C:\xampp8\htdocs\hotel\templates\reservation\checkinsmall.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616ef232dc5347_95899278',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '246204e1568936cea6658bcaacfef86d3205eed1' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\checkinsmall.tpl.html',
      1 => 1630810750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616ef232dc5347_95899278 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '565248626616ef232d727c7_72385025';
echo '<script'; ?>
>
    function recalculate() {
        let days = retvalue("days");
        let olddays = retvalue("olddays");
        if (days==0) {
            days = olddays;
            $("#days").val(days);
        }
        let discount = retvalue("olddiscount");
        let gstamt = retvalue("oldgstamt");
        let total = retvalue("oldtotal");
        discount = parseFloat(discount / olddays * days).toFixed(2);
        gstamt = parseFloat(gstamt / olddays * days).toFixed(2);
        total = parseFloat(total / olddays * days).toFixed(2);
        $("#discount").val(discount);
        $("#gstamt").val(gstamt);
        $("#total").val(total);
    }
    function retvalue(id) {
        retdata = $("#"+id).val() ? $("#"+id).val() : 0;
        retdata = parseFloat(retdata).toFixed(2);
        return retdata;
    }
    <?php echo '</script'; ?>
>
    <style>
        .room {
            background-color: lightgrey ;
        }
        input[text]:read-only {
            background-color: #ccc;
        }
    </style>
<h3>
    Edit Guest Registration<hr>
</h3>
<?php if ($_smarty_tpl->tpl_vars['data']->value['id_reservation']) {?>
<form method="post" action="index.php?module=reservation&func=checkinupdate">
    <table class="table">
        <tr>
            <td><b>Ref No:</b><br><b>GRC No:</b></td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['no'];?>
<br><?php echo $_smarty_tpl->tpl_vars['data']->value['grcno'];?>
</td>
            <td><b>Arr.Date:</b></td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['date'];?>
<br><?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
</td>
            <td><b>Dep.Date: *</b></td>
            <td><input type="date" name="t[est_depature_date]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['est_depature_date'];?>
"/><br>
                <input type="time" name="t[est_depature_time]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['est_depature_time'];?>
"/>
            </td>     
        </tr>
        <tr>
            <td><b>Name: *</b><br><b>Other Person:</b></td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
<br><?php echo $_smarty_tpl->tpl_vars['data']->value['oname'];?>
</td>
            <td><b>Person: *</b></td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['person'];?>
</td>
            <td><b>Adult:</b><br><b>Child:</b></td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['adult'];?>
<br><?php echo $_smarty_tpl->tpl_vars['data']->value['child'];?>
</td>
        </tr>
        <tr>
            <td><b>Mobile:</b></td>
            <td><input type="text" name="t[mobile]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mobile'];?>
" /></td>
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
            <td><b>Email:</b></td>
            <td><input type="email" name="t[email]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
"/></td>
            <td><b>ID proof:</b></td>
            <td><input type="text"  name="t[id_proof]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id_proof'];?>
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
            <td><b>Days Stay: *</b></td>
            <td>
                <input type="hidden" id="olddays" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['daysstay'];?>
"/>
                <input type="hidden" id="olddiscount" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['discount'];?>
"/>
                <input type="hidden" id="oldgstamt" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['gstamt'];?>
"/>
                <input type="hidden" id="oldtotal" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['total'];?>
"/>
                <input type="text" id="days" name="t[daysstay]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['daysstay'];?>
" onblur="recalculate();" />
            </td>
            <td><b>Remarks:</b></td>
            <td><input type="text" name="t[remarks]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['remarks'];?>
"/></td>
            <td><b>Billing Inst.:</b></td>
            <td><input type="text" name="t[billinst]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['billinst'];?>
"/></td>
        </tr>
        <tr>
            <td><b>Rooms:</b><br><b>Total Discount:</b></td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['roomnumber'];?>
<br><input type="text" name="t[discount]" id="discount" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['discount'];?>
" readonly="readonly"/></td>
            <td><b>Total GST:</b></td>
            <td><input type="text" name="t[gstamt]" id="gstamt" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['gstamt'];?>
" /></td>
            <td><b>Total Amount: *</b></td>
            <td><input type="text" name="t[total]" id="total" required readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['total'];?>
" /></td>
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
}
