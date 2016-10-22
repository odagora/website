<script type="text/javascript">
    fields = 2;
    function addInput() {
        jQuery('#text').append('<tr  id="tr-title-' + fields + '"><td class="lable-all" id="title-label-' + fields + '">Tab-Title-' + fields + '</td><td><input type="text" id="accordian-title-' + fields + '" style="font-size:13px;margin-bottom:1%" class="input-medium" value="" /></td></tr><tr id="tr-head-' + fields + '"><td class="lable-all" id="head-label-' + fields + '">Text Heading-' + fields + '</td><td><input type="text" id="tab-heading-' + fields + '" style="font-size:13px;margin-bottom:1%" class="input-medium" value="" /></td></tr><tr id="tr-text-' + fields + '"><td id="text-label-' + fields + '">Tab-Text-' + fields + '</td><td><textarea class="input-xlarge" style="height:80px;font-size:13px;margin-bottom:2%" placeholder="This text area show all text" id="accordian-text-' + fields + '" name="accordian-text-' + fields + '" value="" type="text"></textarea></td></tr><tr>&nbsp;&nbsp;</tr><tr  id="tr-icon-' + fields + '"><td class="lable-all" id="icon-label-' + fields + '">Tab-Icon-' + fields + '</td><td><input type="text" id="accordian-icon-' + fields + '" style="font-size:13px;margin-bottom:1%" class="input-medium" value="" /></td></tr>');
        fields += 1;
        jQuery("#more_field").find('input:button').val("Add More Tab Fields");
        jQuery("#remove_button").show();
    }


    function remove_field() {
        if (fields != "1") {
            fields = fields - 1;
            jQuery("#tr-title-" + fields).remove();
            jQuery("#tr-head-" + fields).remove();
            jQuery("#tr-text-" + fields).remove();
            jQuery("#tr-icon-" + fields).remove();
        }

    }
    jQuery("#tab-type").change(function () {
        if (this.value != 1) {
            jQuery("#tr-tab-style").hide();
        } else {
            jQuery("#tr-tab-style").show();
        }
    })
    var TabDialog = {
        local_ed: 'ed',
        init: function (ed) {
            TabDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function insertTab(ed) {

            // Try and remove existing style / blockquote
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);
            fields = fields - 1;
            var tab_type = jQuery("#tab-type").val();
            var tab_style = "";
            tab_style = jQuery("#tab-style").val();
            var accordian_title = new Array();
            var tab_heading = new Array();
            var accordian_text = new Array();
            var accordian_icon = new Array();
            for (i = 1; i <= fields; i++) {
                var title = jQuery("#accordian-title-" + i).val();
                var heading = jQuery("#tab-heading-" + i).val();
                var text = jQuery("#accordian-text-" + i).val();
                accordian_icon[i] = jQuery("#accordian-icon-" + i).val();
                var re = /,/gi;
                accordian_title[i] = title.replace(re, '__');
                tab_heading[i] = heading.replace(re, '__');
                accordian_text[i] = text.replace(re, '__');
            }
            var mceSelected = tinyMCE.activeEditor.selection.getContent();
            var output = '';
            output += '[tabs ';
            output += ' fields=\"' + fields + '\"';

            if (tab_type) {
                output += ' tab_type=\"' + tab_type + '\"';

            }
            if (tab_type == 1) {
                output += ' tab_style=\"' + tab_style + '\"';

            }
            if (accordian_title) {
                output += ' tab_title=\"' + accordian_title + '\"';

            }
            if (tab_heading) {
                output += ' tab_heading=\"' + tab_heading + '\"';

            }
            if (accordian_text) {
                output += " tab_text=\'" + accordian_text + "\'";
            }
            if (accordian_icon) {
                output += " tab_icon=\'" + accordian_icon + "\'";
            }
            output += '/]';


            tinyMCEPopup.execCommand('mceReplaceContent', false, output);

            // Return
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(TabDialog.init, TabDialog);
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
<?php if (!defined('ABSPATH')) {
    require_once('../../../../../../wp-load.php');
} ?>
<form action="/" method="get" accept-charset="utf-8">
    <table class="table table-bordered table-condensed">
        <tbody id="text">
        <tr>
            <td>&nbsp;</td>
            <td><a href="javascript:TabDialog.insert(TabDialog.local_ed)" id="insert"
                   style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a></td>
        </tr>
        <tr id="tr-type">
            <td class="lable-all" id="type-label"><?php _e('Tab Type', 'kyma'); ?></td>
            <td><select id="tab-type">
                    <option value="1"><?php _e('Horizontal', 'kyma'); ?></option>
                    <option value="2"><?php _e('Vertical', 'kyma'); ?></option>
                </select></td>
        </tr>
        <tr id="tr-tab-style">
            <td class="lable-all" id="tab-style-label"><?php _e('Tab Style', 'kyma'); ?></td>
            <td><select id="tab-style">
                    <option value="squre"><?php _e('Squre', 'kyma'); ?></option>
                    <option value="circle"><?php _e('Circle', 'kyma'); ?></option>
                </select></td>
        </tr>
        <tr id="tr-title-1">
            <td class="lable-all" id="title-label-1"><?php _e('Tab-Title-1', 'kyma'); ?></td>
            <td><input type="text" id="accordian-title-1" style="font-size:13px;margin-bottom:1%" class="input-medium"
                       value=""/></td>
        </tr>
        <tr id="tr-head-1">
            <td class="lable-all" id="head-label-1"><?php _e('Text Heading-1', 'kyma'); ?></td>
            <td><input type="text" id="tab-heading-1" style="font-size:13px;margin-bottom:1%" class="input-medium"
                       value=""/></td>
        </tr>
        <tr id="tr-text-1">
            <td id="text-label-1"><?php _e('Tab-Text-1', 'kyma'); ?></td>
            <td><textarea class="input-xlarge" style="height:80px;font-size:13px;margin-bottom:2%"
                          placeholder="This text area show all text" id="accordian-text-1" name="accordian-text-1"
                          value="" type="text"></textarea></td>
        </tr>
        <tr>&nbsp;&nbsp;</tr>
        <tr id="tr-icon-1">
            <td class="lable-all" id="icon-label-1"><?php _e('Tab-Icon-1', 'kyma'); ?></td>
            <td><input type="text" id="accordian-icon-1" style="font-size:13px;margin-bottom:1%" class="input-medium"
                       value=""/></td>
        </tr>
        </tbody>
    </table>
    <div style="margin-bottom: 2%;margin-top:3%">
        <div id="more_field" style="float:left">
            <input type="button" onclick="addInput()" class="shortcode-button" name="add" id="more"
                   value="Add Tab Field"/><br>
        </div>
        <input type="button" onclick="remove_field()" class="remove-button" name="remove_button" id="remove_button"
               value="Remove Last Field" style="display:none;"/>
    </div>
</form>