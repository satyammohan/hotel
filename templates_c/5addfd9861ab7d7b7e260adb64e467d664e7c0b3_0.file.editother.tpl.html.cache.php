<?php
/* Smarty version 3.1.39, created on 2021-10-24 07:42:41
  from 'C:\xampp8\htdocs\hotel\templates\reservation\editother.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6174c119440635_08245873',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5addfd9861ab7d7b7e260adb64e467d664e7c0b3' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\editother.tpl.html',
      1 => 1635041557,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6174c119440635_08245873 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '13445119826174c1191d9092_22635169';
?>
<h3>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['id_reservation']) {?>Edit<?php } else { ?>Add<?php }?> Guest Registration<hr>
</h3>
<form method="post" onsubmit="return checkform();" action="index.php?module=reservation&func=<?php if ($_smarty_tpl->tpl_vars['data']->value['id_reservation']) {?>checkinupdate<?php } else { ?>checkinupdateinsert<?php }?>">
    <table class="table">
        <tr>
            <td><b>Ref No: *</b><br><b>GRC No:</b></td>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['id_reservation']) {?>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['no'];?>
</td>
            <?php } else { ?>
                <td><input type="text" name="t[no]" id="no" readonly="readonly" required onblur="checkno();" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['no'];?>
"/>
                    <div id="nomsg"></div>
                    <input type="text" id="grcno" name="t[grcno]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['grcno'];?>
"/>
                </td>
            <?php }?>
            <td><b>Arr.Date: *</b></td>
            <td>
                <input type="date" name="t[date]" required value="<?php if ($_smarty_tpl->tpl_vars['data']->value['date']) {
echo $_smarty_tpl->tpl_vars['data']->value['date'];
} else {
echo smarty_modifier_date_format(time(),'%Y-%m-%d');
}?>"/><br>
                <input type="time" name="t[time]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
"/></td>
            <td><b>Dep.Date: *</b></td>
            <td><input type="date" name="t[est_depature_date]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['est_depature_date'];?>
"/><br>
                <input type="time" name="t[est_depature_time]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['est_depature_time'];?>
"/>
            </td>                
        </tr>
        <tr>
            <td><b>Mobile:</b></td>
            <td><input type="text" id="mobile" name="t[mobile]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mobile'];?>
" onblur="checkmobile()"/></td>
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
            <td><b>Days Stay: *</b></td>
            <td><input type="text" id="days" name="t[daysstay]" required value="<?php echo $_smarty_tpl->tpl_vars['data']->value['daysstay'];?>
" /></td>
            <td><b>Remarks:</b></td>
            <td><input type="text" name="t[remarks]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['remarks'];?>
"/></td>
            <td><b>Billing Inst.:</b></td>
            <td><input type="text" name="t[billinst]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['billinst'];?>
"/></td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['id_reservation']) {?>
        <tr>
            <td colspan="6">
                <b>Rooms:</b><?php echo $_smarty_tpl->tpl_vars['data']->value['roomnumber'];?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Total Discount:</b><?php echo $_smarty_tpl->tpl_vars['data']->value['discount'];?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Total GST:</b><?php echo $_smarty_tpl->tpl_vars['data']->value['gstamt'];?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Total Amount:</b><?php echo $_smarty_tpl->tpl_vars['data']->value['total'];?>

            </td>
        </tr>
        <?php } else { ?>
                <tr>
            <td><b>Rooms:</b></td>
            <td><input type="text" id="rooms" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['roomnumber'];?>
" name="t[roomnumber]" onblur="getdetails();"/></td>
        </tr>
        <tr><td colspan="20"><div id="details"></div></td></tr>
        <tr>
                <td><b>Total Discount:</b></td>
                <td><input type="text" name="t[discount]" id="discount" readonly="readonly"/></td>

                <td><b>Total GST:</b></td>
                <td><input type="text" name="t[gstamt]" id="gstamt" readonly="readonly"/></td>

                <td><b>Total Amount: *</b></td>
                <td><input type="text" name="t[total]" id="total" required readonly="readonly"/></td>
            </tr>
        <?php }?>
        <tr>
        <td colspan="2">
            <input type="hidden" id="hide" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id_reservation'];?>
">
            <input class="btn btn-primary" type="submit" value="Save" />
        </td>
        </tr>
    </table>
</form>
<?php echo '<script'; ?>
>
var totalrooms = 0;
$( document ).ready(function() {
    $("#grcno").focus();
});
function checkno() {
    var gno = $("#no").val();
    $("#nomsg").html('');
    $.post("index.php?module=reservation&func=checkno", { no:gno }, function(data) {
        if (data==1) {
            $("#no").focus();
            $("#nomsg").html("Duplicate No.");
        }
    });
}
function getdetails() {
    let days = retvalue("days");
    if (days==0) {
	alert("Please fill up Days Stay:");
	$("#days").focus();
	return;
    }
    let rooms = $("#rooms").val();
    $.post("index.php?module=reservation&func=getroomprice", { rooms:rooms }, function(data1, status) {
        data = JSON.parse(data1);
        totalrooms = data.length;
        availrooms = "";
        console.log(data);
        text = "<table class='room' width='100%'><tr><th>Room</th><th>Tax %</th><th>GST %</th><th>Price</th><th>Discount in Rs.</th><th>GST</th><th>Total</th>";
        for (x in data) {
            console.log(x);
            text += "<tr>";
            text += "<td><input name='room["+x+"][name]'     tabindex='-1' size='5' id='name"+x+"' type='text' readonly='readonly'  value='"+data[x].name+"' ></td>";
            text += "<td><input name='room["+x+"][tax_per]'  tabindex='-1' size='5' id='tax_per"+x+"' type='text' readonly='readonly'  value='"+data[x].tax_per+"' ></td>";
            text += "<td><input name='room["+x+"][gst_per]'  tabindex='-1' size='5' id='gst_per"+x+"' type='text' readonly='readonly'  value='"+data[x].tax_per+"' ></td>";
            text += "<td><input name='room["+x+"][price]'    tabindex='-1' size='5' id='price"+x+"' type='text' readonly='readonly'  value='"+data[x].price+"' ></td>";
            text += "<td><input name='room["+x+"][discount]' size='5' id='discount"+x+"' onblur='gettotal("+x+");' type='text' ></td>";
            text += "<td><input name='room["+x+"][gstamt]'   tabindex='-1' size='5' id='gstamt"+x+"' readonly='readonly' type='text' value='' ></td>";
            text += "<td><input name='room["+x+"][total]'    tabindex='-1' size='5' id='total"+x+"' readonly='readonly' type='text' value='' ></td>";
            text += "<tr>";
            availrooms = availrooms+data[x].name+",";
        }
        availrooms = availrooms.replace(/,\s*$/, "");
        console.log(availrooms);
        $("#rooms").val(availrooms);
        text += "</table>";
        $("#details").html(text);
        for (iloop=0; iloop<totalrooms; iloop++) {
            gettotal(iloop);
        }
    });        
}
function gettotal(id) {
    let days = retvalue("days");
    let tax_per = retvalue("tax_per"+id);
    let price = retvalue("price"+id);
    let discount = retvalue("discount"+id);
    let netprice = price - discount;
    if (netprice < 0) {
        discount = price;
        $("#discount"+id).val(discount);
        netprice = 0;
    }
    let gstamt = 0;
    if (netprice > 1000) {
        gstamt = parseFloat(netprice * tax_per * days / 100).toFixed(2);
        $("#gst_per"+id).val(tax_per);
    } else {
        $("#gst_per"+id).val(0);
    }
    let totalprice = parseFloat((netprice*days) + (gstamt*1)).toFixed(2);
    $("#gstamt"+id).val(gstamt);
    $("#total"+id).val(totalprice);
    completethis();
}
function completethis() {
    let days = retvalue("days");
    let mygstamt = 0;
    let mydiscount = 0;
    let mytotal = 0;
    for (i=0; i<totalrooms; i++) {
        let gstamt = retvalue("gstamt"+i);
        let disc = retvalue("discount"+i);
        let totalprice = retvalue("total"+i);
        mygstamt = mygstamt + gstamt*1;
        mydiscount = mydiscount+ disc*days;
        mytotal = mytotal + totalprice*1;
    }
    $("#discount").val(mydiscount);
    $("#gstamt").val(mygstamt);
    $("#total").val(mytotal);
}
function retvalue(id) {
    retdata = $("#"+id).val() ? $("#"+id).val() : 0;
    retdata = parseFloat(retdata).toFixed(2);
    return retdata;
}
function checkmobile() {
    let mobile=$("#mobile").val();
    $.post("index.php?module=reservation&func=getguestdetails", { mobile:mobile }, function(data1, status) {
        data = JSON.parse(data1);
        if (data) {
            console.log(data);
            if (confirm("Data exists for this "+mobile+" number. Want to Prefill")) {
                $("#name").val(data.name);
                $("#company").val(data.company);
                $("#gstin").val(data.gstin);
                $("#address").val(data.address);
                $("#dob").val(data.dob);
                $("#city").val(data.city);
                $("#arrivedfrom").val(data.arrivedfrom);
                $("#district").val(data.district);
                $("#state").val(data.state);
                $("#country").val(data.country);
                $("#email").val(data.email);
                $("#id_proof").val(data.id_proof);
            }
        }
    });
}
function checkform() {
    let total = retvalue("total");
    if (total==0) {
        alert("Total amount can't be zero");
        return false;
    }
    return true;
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
<?php }
}
