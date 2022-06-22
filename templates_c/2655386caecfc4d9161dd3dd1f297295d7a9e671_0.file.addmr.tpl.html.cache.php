<?php
/* Smarty version 3.1.39, created on 2021-10-15 06:55:52
  from 'C:\xampp8\htdocs\hotel\templates\banquet\addmr.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6168d8a0598cc8_64549861',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2655386caecfc4d9161dd3dd1f297295d7a9e671' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\banquet\\addmr.tpl.html',
      1 => 1634219566,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6168d8a0598cc8_64549861 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '12691433346168d8a0550e87_64693876';
?>
<h4>Money Receipt for Banquet</h4>
<form method="post" action="index.php?module=banquet&func=savemr">
    <input type="hidden" name="mr[id_reservation]" value="<?php echo $_REQUEST['id'];?>
">
    <input type="hidden" name="mr[mrtype]" value="B">
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
        var no = $("#no").val();
        $("#nomsg").html('');
        $.post("index.php?module=banquet&func=checkno&type=mr", { no:no }, function(data) {
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
