<?php /* Smarty version 2.6.26, created on 2014-03-11 21:26:43
         compiled from file:style/default/templates/registration_fields.tpl.html */ ?>
<h3><?php echo $this->_tpl_vars['registration_fields']; ?>
</h3>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
    var values = new Array();
    $("#add_field").click(function(){
        $.get(
            "includes/registration_ajax.php?do=add",
        {
            name: $("#new_name").val(),
            imp: $("#importance_value").val(),
            type: $("#type_value").val(),
            value_0: $("#0").val(),
            value_1: $("#1").val(),
            value_2: $("#2").val(),
            value_3: $("#3").val(),
            value_4: $("#4").val()
        },
        function(data)
        {
            $("#tbody").append(data);
            document.getElementById('new_form').reset();
            $(".message_border").fadeOut(100);
        })
    })
    
    $(".edit_name").live('change',function(){
        var el = this;
        $.get(
            "includes/registration_ajax.php?do=edit_name",
        {
            name: $(el).val(),
            id: $(el).attr('id')
        },
        function(data)
        {
            $("#change_success").fadeIn();
            $("#change_success").delay(500);
            $("#change_success").fadeOut();
        })
    })
    
    $(".edit_value").live('change',function(){
        var el = this;
        $.get(
            "includes/registration_ajax.php?do=edit_value",
        {
            name: $(el).val(),
            data: $(el).attr('id')          
        },
        function(data)
        {
            $("#change_success").fadeIn();
            $("#change_success").delay(500);
            $("#change_success").fadeOut();
        })
    })
    
    $(".edit_imp").live('change',function(){
        var el = this;
        $.get(
            "includes/registration_ajax.php?do=edit_imp",
        {
            id: $(el).attr('id')
        },
        function()
        {
            $("#change_success").fadeIn();
            $("#change_success").delay(500);
            $("#change_success").fadeOut();
        })
    })
    
    $(".del_field").live('click',function(){
        var check = confirm('<?php echo $this->_tpl_vars['registration_fields_del_confirm']; ?>
');
        if(check == true)
        {
            var el = this;
            $.get(
                "includes/registration_ajax.php?do=del_field",
            {
                data: $(el).attr('id')
            },
            function(){
                $(el).parents('tr').fadeOut();
                //$(el).parents('tr').remove();
                 $("#change_success").fadeIn();
                $("#change_success").delay(500);
                $("#change_success").fadeOut();
            })
        }       
    })
    
    $(".activate_field").live('click',function(){
        var el = this;
        $.get(
            "includes/registration_ajax.php?do=activate_field",
        {
            id: $(el).attr('id')
        },
        function(){
            $(el)
                .removeClass('activate_field')
                .addClass('deactivate_field')
            $(el).attr('src', 'style/default/img/status.png');
            $(el).attr('title', '<?php echo $this->_tpl_vars['registration_fields_active']; ?>
');
             $("#change_success").fadeIn();
            $("#change_success").delay(500);
            $("#change_success").fadeOut();
        })
    })
    
    $(".deactivate_field").live('click',function(){
        var el = this;
        $.get(
            "includes/registration_ajax.php?do=deactivate_field",
        {
            id: $(el).attr('id')
        },
        function(){
            $(el)
                .removeClass('deactivate_field')
                .addClass('activate_field');
            $(el).attr('src', 'style/default/img/status-busy.png');
            $(el).attr('title', '<?php echo $this->_tpl_vars['registration_fields_deactive']; ?>
');                   
            $("#change_success").fadeIn();
            $("#change_success").delay(500);
            $("#change_success").fadeOut();
        })
    })
    
    $("#save_age").click(function(){
        $.get(
            "includes/registration_ajax.php?do=change_age",
        {
            age: $("#reg_age").val()
        },
        function()
        {
            $("#change_success").fadeIn();
            $("#change_success").delay(500);
            $("#change_success").fadeOut();
        })
    })

    
    $("#M").click(function(){
        $("#importance_value").val('M');
    })
    
    $("#O").click(function(){
        $("#importance_value").val('O');
    })
    
    $("#add_value").click(function(){
        var last = $(".text_value:last").attr('id');
        $(".text_value:last").after('<br /><input type="text" name="val_[]" class="text_value"/>');        
    })
    
    $("#main_form").submit(function(){
        if(confirm('<?php echo $this->_tpl_vars['registration_fields_submit_confirm']; ?>
'))
        {
            return true;
        }
        else
        {
            return false;
        }
    })
    $("#add_button").click(function(){
        $(".message_border").fadeIn();
    });
    $(".preview_close").click(function(){
        $(".message_border").fadeOut();
    })
    
    $("#type_value").change(function(){
        if($("#type_value").val() == 'T')
        {
            $("#add_value").fadeOut();
        }
        else
        {
            $("#add_value").fadeIn();
        }
    })
})

</script>
<div id="change_success" style="display: none;">
    <div id="change_success_inner">
        <img src="style/default/img/check.png"/><?php echo $this->_tpl_vars['admin_registration_fields_saved_changes']; ?>

    </div>
</div>
<br />
<button class="jui-button" id="add_button"><?php echo $this->_tpl_vars['admin_registration_fields_add_field']; ?>
</button>
<form action="registration.php?c=fields" method="post" id="main_form">
<div style="margin: 5px 30px;">
<img src="style/default/img/arrow-turn-down.png"/>
<input class="jui-button" value="<?php echo $this->_tpl_vars['admin_registration_fields_del_marked']; ?>
" name="del" type="submit"/>
<input class="jui-button" value="<?php echo $this->_tpl_vars['admin_registration_fields_M_marked']; ?>
" name="M" type="submit"/>
<input class="jui-button" value="<?php echo $this->_tpl_vars['admin_registration_fields_O_marked']; ?>
" name="O" type="submit"/>
</div>
<table border="1" style="width: auto;">
    <thead>
        <tr class="row_0">
            <th><?php echo $this->_tpl_vars['registration_fields_switch']; ?>
</th>
            <th width="20px">&nbsp;</th>
            <th width="100px"><?php echo $this->_tpl_vars['admin_registration_fields_field']; ?>
</th>
            <th width="100px"><?php echo $this->_tpl_vars['admin_registration_fields_type']; ?>
</th>
            <th width="100px"><?php echo $this->_tpl_vars['admin_registration_fields_value']; ?>
</th>
            <th width="250px" colspan="2"><?php echo $this->_tpl_vars['admin_registration_fields_importance']; ?>
</th>
        </tr>
    </thead>
    <tbody id="tbody">
        <?php echo $this->_tpl_vars['FIELDS']; ?>

    </tbody>
</table>  
</form>
<div class="message_border" style="display: none;">
    <div class="message_window">
        <form id="new_form">
        <div class="message_header">
            <h4 style="float: left;"><?php echo $this->_tpl_vars['admin_registration_fields_add_field']; ?>
</h4>
            <img src="style/default/img/close.png" class="preview_close" style="float: right; cursor: pointer;" title="<?php echo $this->_tpl_vars['admin_registration_fields_close']; ?>
"/>
            <div class="clear"></div>
        </div>
        <div class="message_cont">   
            <table border="1">
                <tr>
                    <td><label for="new_name"><?php echo $this->_tpl_vars['admin_registration_fields_name']; ?>
</label></td>
                    <td><input type="text" id="new_name" maxlength="50"/></td>
                </tr>
                <tr>
                    <td><?php echo $this->_tpl_vars['admin_registration_fields_type']; ?>
</td>
                    <td>
                        <select id="type_value">
                            <option selected="selected">&nbsp;</option>
                            <option value="T" id="type_text"><?php echo $this->_tpl_vars['admin_registration_fields_text']; ?>
</option>
                            <option value="C"><?php echo $this->_tpl_vars['admin_registration_fields_checkbox']; ?>
</option>
                            <option value="R"><?php echo $this->_tpl_vars['admin_registration_fields_radio']; ?>
</option>
                            <option value="S"><?php echo $this->_tpl_vars['admin_registration_fields_selection']; ?>
</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $this->_tpl_vars['admin_registration_fields_importance']; ?>
</td>
                    <td>
                        <input type="radio" value="O" id="O" style="width: auto;" name="imp"/>
                        <label for="O"><?php echo $this->_tpl_vars['admin_registration_fields_optional']; ?>
</label>
                        <br />
                        <input type="radio" value="M" id="M" style="width: auto;" name="imp"/>
                        <label for="M"><?php echo $this->_tpl_vars['admin_registration_fields_mandatory']; ?>
</label>
                        <input type="hidden" id="importance_value" value=""/>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $this->_tpl_vars['admin_registration_fields_value']; ?>
</td>
                    <td>
                        <b id="add_value" style="cursor: pointer;">
                        <img src="style/default/img/plus_small.png" border="0" height="13px" width="13px" style="padding-right: 2px;"/><?php echo $this->_tpl_vars['admin_registration_fields_new_value']; ?>
<br /></b>
                        <input type="text" class="text_value" id="0"/>                                                                                                                                    
                    </td>
                </tr>
            </table>
        </div>
        <div class="message_footer">
            <input type="button" value="<?php echo $this->_tpl_vars['admin_registration_fields_add_field']; ?>
" name="save" id="add_field" class="jui-button" style="width: 180px;"/>
            <input type="reset" value="<?php echo $this->_tpl_vars['admin_registration_fields_close']; ?>
" class="jui-button preview_close" style="width: 180px;"/>
        </div>
        </form>
    </div>
</div>