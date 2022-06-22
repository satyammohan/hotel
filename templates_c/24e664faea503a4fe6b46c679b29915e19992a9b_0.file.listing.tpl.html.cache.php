<?php
/* Smarty version 3.1.39, created on 2021-10-31 11:07:53
  from 'C:\xampp8\htdocs\hotel\templates\roomtype\listing.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_617e2bb1734503_89205793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24e664faea503a4fe6b46c679b29915e19992a9b' => 
    array (
      0 => 'C:\\xampp8\\htdocs\\hotel\\templates\\roomtype\\listing.tpl.html',
      1 => 1630646412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617e2bb1734503_89205793 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp8\\htdocs\\Smarty-3\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
$_smarty_tpl->compiled->nocache_hash = '427080123617e2bb1472a86_87516677';
?>
<h3>
    Room Type Master<hr>
</h3>
<table id="dataTable" class="table table-striped table-bordered" width="100%">
    <thead>    
        <tr>
            <th>#</th></th><th>Image</th><th>Name</th><th>Price</th><th>GST %</th><th>Status</th><th><a class="btn btn-primary" href="index.php?module=roomtype&func=edit" title="Add Room Type"><i class="fa fa-plus"></i></a></th>
        </tr>
    </thead>
    <tbody>
        <?php $_smarty_tpl->_assignInScope('s', 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roomtype']->value, 'mod');
$_smarty_tpl->tpl_vars['mod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mod']->value) {
$_smarty_tpl->tpl_vars['mod']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</td>			
            <?php $_smarty_tpl->_assignInScope('s', $_smarty_tpl->tpl_vars['s']->value+1);?>
            <td><img class="cimg" src="./assets/img/<?php echo $_smarty_tpl->tpl_vars['mod']->value['image'];?>
"></td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['price'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['mod']->value['tax_per'];?>
</td>
            <td><select onchange="update_status('roomtype', '<?php echo $_smarty_tpl->tpl_vars['mod']->value['roomtype'];?>
', this.value, !this.value);">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ini']->value['status'],'selected'=>$_smarty_tpl->tpl_vars['mod']->value['status']),$_smarty_tpl);?>

                </select>
            </td>
            <td>
                <a class="btn btn-primary" href="index.php?module=roomtype&func=edit&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_roomtype'];?>
" title="Edit Room Type"><i class="fa fa-edit"></i></a>
                <a class="btn btn-primary" href="index.php?module=roomtype&func=delete&id=<?php echo $_smarty_tpl->tpl_vars['mod']->value['id_roomtype'];?>
" onclick="return confirm('Do you want to delete?');" title="Delete Room Type"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
