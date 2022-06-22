<?php
/* Smarty version 3.1.39, created on 2021-11-14 08:46:15
  from 'C:\xampp8\htdocs\hotel\templates\reservation\addmr.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61907f7fe03dc4_42969931',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7d2636f5c49ce7d38d55e50e76e9dd7d6efc5b8' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\reservation\\addmr.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61907f7fe03dc4_42969931 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '172011147161907f7fde8c10_13941768';
?>
<h4>Money Receipt</h4>
<form method="post" action="index.php?module=reservation&func=savemr">
    <input type="hidden" name="mr[id_reservation]" value="<?php echo $_REQUEST['id'];?>
">
    <table>
        <tr>
            <td>Date :</td><td><input type="date" name="mr[date]" required class="form-control" value="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
"  ></td>
        </tr>
        <tr>
            <td>Mr No :</td>
            <td><input type="text" name="mr[no]" required class="form-control" id="no" onblur="checkno();" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['no'];?>
"/>
                <div id="nomsg"></div>
            </td>
        </tr>
        <tr>
            <td>Type :</td><td>
                <select name="mr[type]" required class="form-control" onchange="showdiv(this.value)">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ini']->value['mr_type'],'selected'=>$_smarty_tpl->tpl_vars['data']->value['type']),$_smarty_tpl);?>

                </select>
                <div id="showdiv" style="display:none">
                    <input placeholder="Mention Google Pay/Amazon Pay/BHIM" type=text id="upitype" name="mr[upitype]" class="form-control">
                    <input placeholder="Mention Paid to" type=text id="paidto" name="mr[paidto]" class="form-control">
                </div>
            </td>
        </tr>
        <tr>
            <td>Amount :</td><td><input type="text" name="mr[amount]" required class="form-control"></td>
        </tr>
        <tr>
            <td>Remarks :</td><td><textarea name="mr[remark]" class="form-control" cols=60 rows=6></textarea></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center"><input type="submit" value="Save" class="btn btn-primary"></td>
        </tr>
    </table>
</form>
<?php echo '<script'; ?>
>
    function showdiv(e) {
        if (e==4) {
            $("#showdiv").show();
        } else {
            $("#upitype").val('');
            $("#paidto").val('');
            $("#showdiv").hide();
        }
    }
    $(document).ready(function() {
        $("#no").focus();
    });
    function checkno() {
        var gno = $("#no").val();
        $("#nomsg").html('');
        $.post("index.php?module=reservation&func=checkno&type=mr", { no:gno }, function(data) {
            if (data==1) {
                $("#no").focus();
                $("#nomsg").html("Duplicate No.");
            }
        });
    }
<?php echo '</script'; ?>
>
<?php }
}
