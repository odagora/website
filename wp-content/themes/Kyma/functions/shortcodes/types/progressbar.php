<?php if (!defined('ABSPATH')) {
    require_once('../../../../../../wp-load.php');
} ?>
<script type="text/javascript">
    fields = 2;
    function addInput() {
        jQuery('#text').append('<tr  id="tr-title' + fields + '"><td class="lable-all" id="title-label' + fields + '">Skill-' + fields + '</td><td><input type="text" id="skill-' + fields + '" style="font-size:13px;margin-bottom:1%" class="input-medium" value="" /></td></tr><tr id="tr-text' + fields + '"><td id="text-label' + fields + '">Percentage</td><td><input type="number" class="input-medium" style="font-size:13px;margin-bottom:1%" placeholder="85" id="percent-' + fields + '" name="percent-' + fields + '" value="" ></td></tr><tr>&nbsp;&nbsp;</tr><tr id="tr-color' + fields + '"><td id="text-label' + fields + '">Bar-' + fields + ' Color:</td><td><input type="text" id="color-' + fields + '" class="input-medium"></td></tr><tr>');
        fields += 1;
        jQuery("#more_field").find('input:button').val("Add More Skills");
        jQuery("#remove_button").show();
    }


    function remove_field() {
        if (fields != "1") {
            fields = fields - 1;
            jQuery("#tr-title" + fields).remove();
            jQuery("#tr-text" + fields).remove();
        }

    }

    var AccordionDialog = {
        local_ed: 'ed',
        init: function (ed) {
            AccordionDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function insertAccordion(ed) {

            // Try and remove existing style / blockquote
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);
            fields = fields - 1;

            var bar_type = jQuery('#bar_type').val();
            var skills = new Array();
            for (i = 1; i <= fields; i++) {

                var title = jQuery("#skill-" + i).val();
                var re = /,/gi;

                skills[i] = title.replace(re, '__');
            }

            var percentage = new Array();
            for (i = 1; i <= fields; i++) {
                var text = jQuery("#percent-" + i).val();
                var re1 = /,/gi;
                percentage[i] = text.replace(re1, '__');
            }

            var color = new Array();
            for (i = 1; i <= fields; i++) {
                var colors = jQuery("#color-" + i).val();
                var re2 = /,/gi;
                color[i] = colors.replace(re2, '__');
            }
            //alert(accordian_text);

            var mceSelected = tinyMCE.activeEditor.selection.getContent();
            var output = '';

            output += '[skills ';
            output += ' fields=\"' + fields + '\"';
            if (bar_type) {
                output += ' bar_type=\"' + bar_type + '\"';

            }
            if (skills) {
                output += ' skill=\"' + skills + '\"';

            }
            if (percentage) {
                output += " percent=\'" + percentage + "\'";
            }
            if (color) {
                output += " color=\'" + color + "\'";
            }
            output += '/]';


            tinyMCEPopup.execCommand('mceReplaceContent', false, output);

            // Return
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(AccordionDialog.init, AccordionDialog);
</script>
<style>
    .shortcode-button {
        background: #2ea2cc;
        background: -webkit-gradient(linear, left top, left bottom, from(#2ea2cc), to(#1e8cbe));
        background: -webkit-linear-gradient(top, #2ea2cc 0%, #1e8cbe 100%);
        background: linear-gradient(top, #2ea2cc 0%, #1e8cbe 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2ea2cc', endColorstr='#1e8cbe', GradientType=0);
        border-color: #0074a2;
        -webkit-box-shadow: inset 0 1px 0 rgba(120, 200, 230, 0.5);
        box-shadow: inset 0 1px 0 rgba(120, 200, 230, 0.5);
        color: #fff;
        text-decoration: none;
        text-shadow: 0 1px 0 rgba(0, 86, 132, 0.7);

    }

    .shortcode-button:hover {
        background: #2ea2cc;
        background: -webkit-gradient(linear, left top, left bottom, from(#2ea2cc), to(#1e8cbe));
        background: -webkit-linear-gradient(top, #2ea2cc 0%, #1e8cbe 100%);
        background: linear-gradient(top, #2ea2cc 0%, #1e8cbe 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2ea2cc', endColorstr='#1e8cbe', GradientType=0);
        border-color: #0074a2;
        -webkit-box-shadow: inset 0 1px 0 rgba(120, 200, 230, 0.5);
        box-shadow: inset 0 1px 0 rgba(120, 200, 230, 0.5);
        color: #fff;
        text-decoration: none;
        text-shadow: 0 1px 0 rgba(0, 86, 132, 0.7);
        opacity: 0.8;
    }

    .remove-button {
        background-color: #da4f49;
        background-image: -moz-linear-gradient(top, #ee5f5b, #bd362f);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ee5f5b), to(#bd362f));
        background-image: -webkit-linear-gradient(top, #ee5f5b, #bd362f);
        background-image: -o-linear-gradient(top, #ee5f5b, #bd362f);
        background-image: linear-gradient(to bottom, #ee5f5b, #bd362f);
        background-repeat: repeat-x;
        border-color: #bd362f #bd362f #802420;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        color: #fff;
        width: 30% !important;
        float: right !important;

    }
</style>
<form action="/" method="get" accept-charset="utf-8">
    <table class="table table-bordered table-condensed">
        <tbody>

        <tr>
            <td><?php _e('Pregress bar type', 'kyma'); ?></td>
            <td><select id="bar_type">
                    <option value="1"><?php _e('Bar Type-1', 'kyma'); ?></option>
                    <option value="2"><?php _e('Bar Type-2', 'kyma'); ?></option>
                    <option value="3"><?php _e('Circle', 'kyma'); ?></option>
                    <option value="4"><?php _e('Square', 'kyma'); ?></option>
                </select></td>
        </tr>
        <tr id="tr-title1'">
            <td class="lable-all" id="title-labe1l'+fields+'"><?php _e('Skill-1', 'kyma'); ?></td>
            <td><input type="text" id="skill-1" style="font-size:13px;margin-bottom:1%"
                       class="input-medium" value=""/></td>
        </tr>
        <tr id="tr-text1'">
            <td id="text-label1'"><?php _e('Percentage', 'kyma'); ?></td>
            <td><input type="number" class="input-medium"
                       style="font-size:13px;margin-bottom:1%" placeholder="85" id="percent-1" name="percent-1"
                       value=""></td>
        </tr>
        <tr>&nbsp;&nbsp;</tr>
        <tr id="tr-color1'">
            <td id="text-label1'"><?php _e('Bar-1 Color:', 'kyma'); ?></td>
            <td>
                <div class="color-picker" style="position: relative;">
                    <input type="text" name="color-1" id="color-1" value="#eee"/>

                    <div style="position: absolute;" id="colorpicker"></div>
                </div>
            </td>
        </tr>
        <tr>&nbsp;&nbsp;</tr>
        </tbody>
    </table>
    <table class="table table-bordered table-condensed">
        <tbody id="text">
        <tr>
            <td>&nbsp;</td>
            <td><a href="javascript:AccordionDialog.insert(AccordionDialog.local_ed)" id="insert"
                   style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a></td>
        </tr>
        </tbody>
    </table>
    <div style="margin-bottom: 2%;margin-top:3%">
        <div id="more_field" style="float:left">
            <input type="button" onclick="addInput()" class="shortcode-button" name="add" id="more" value="Add Skills"/><br>
        </div>
        <input type="button" onclick="remove_field()" class="remove-button" name="remove_button" id="remove_button"
               value="Remove Last Skill" style="display:none;"/>
    </div>
</form>
