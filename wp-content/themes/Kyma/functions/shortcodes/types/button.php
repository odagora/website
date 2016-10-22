<?php if (!defined('ABSPATH')) {
    require_once('../../../../../../wp-load.php');
} ?>
<script type="text/javascript">
    /*button script*/
    var BUTTONDialog = {
        local_ed: 'ed',
        init: function (ed) {
            BUTTONDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function insertBUTTON(ed) {
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);
            var style = jQuery('select#buttonstyle').val();
            var size = jQuery('select#size').val();
            var btn_disable = jQuery('input#btn_disable').attr('checked') ? 1 : 0;

            var target = jQuery('select#target').val();
            var buttonlink = jQuery('input#button-link').val();
            var textdata = jQuery('input#button-text').val();
            var btnicon = jQuery('input#button-icon').val();

            var mceSelected = tinyMCE.activeEditor.selection.getContent();

            var outputbutton = '[button ';
            outputbutton += ' style="' + style + '" ';
            outputbutton += ' size="' + size + '" ';
            outputbutton += ' btn_disable="' + btn_disable + '" ';

            if (target == 'blank') {
                outputbutton += ' target="blank"';
            }
            if (btnicon != '') {
                outputbutton += ' icon="' + btnicon + '"';
            }
            if (buttonlink && textdata) {

                outputbutton += ' url="' + buttonlink + '" ]' + textdata + '[/button]';

            }
            else {
                if (buttonlink) {
                    outputbutton = outputbutton + ' url="' + buttonlink + '" ]Button[/button]';
                }
                if (textdata) {
                    outputbutton = outputbutton + ']' + textdata + '[/button]';
                }
            }
            if (!buttonlink && !textdata) {
                outputbutton = outputbutton + ']' + mceSelected + '[/button]';
            }

            tinyMCEPopup.execCommand('mceReplaceContent', false, outputbutton);
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(BUTTONDialog.init, BUTTONDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">
    <table class="table table-bordered table-condensed">
        <tbody>
        <tr>
            <td>&nbsp;</td>
            <td class="lable-all"><?php _e('Select Setting', 'kyma'); ?> </td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Color', 'kyma'); ?></td>
            <td>
                <select class="select-medium" size="1" id="buttonstyle" name="buttonstyle">
                    <option selected="selected" value="btn btn-primary"><?php _e('Blue', 'kyma'); ?></option>
                    <option value="color6"><?php _e('Green', 'kyma'); ?></option>
                    <option value="color4"><?php _e('Blue</option>', 'kyma'); ?></option>
                    <option value="color5"><?php _e('Purple', 'kyma'); ?></option>
                    <option value="color7"><?php _e('Grey', 'kyma'); ?></option>
                    <option value=""><?php _e('White', 'kyma'); ?></option>
                    <option value="color3"><?php _e('Red', 'kyma'); ?></option>
                    <option value="color1"><?php _e('Default', 'kyma'); ?></option>
                    <option value="color2"><?php _e('Default Dark', 'kyma'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Size', 'kyma'); ?></td>
            <td>
                <select class="select-medium" size="1" id="size" name="size">

                    <option selected="selected" value="large_btn"><?php _e('Large', 'kyma'); ?></option>
                    <option value="medium_btn"><?php _e('Medium', 'kyma'); ?></option>
                    <option value="small_btn"><?php _e('Small', 'kyma'); ?></option>
                </select>
            </td>
        </tr>
        <tr>

        <tr>
            <td class="lable-all"><?php _e('Target', 'kyma'); ?></td>
            <td>
                <select class="select-medium" name="target" id="target" size="1">
                    <option value="self" selected="selected"><?php _e('Self', 'kyma'); ?></option>
                    <option value="blank"><?php _e('Blank', 'kyma'); ?></option>
                </select>
            </td>
        </tr>

        </tr>

        <tr>
            <td class="lable-all"><?php _e('Link', 'kyma'); ?></td>
            <td><input class="input-medium" placeholder="http://facebook.com" type="text" id="button-link"></td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Text', 'kyma'); ?></td>
            <td><input class="input-medium" placeholder="Button Name" type="text" id="button-text" value="Button Here">
            </td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Button Icon', 'kyma'); ?></td>
            <td><input class="input-medium" placeholder="Icon" type="text" id="button-icon"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="javascript:BUTTONDialog.insert(BUTTONDialog.local_ed)" id="insert"
                   style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a></td>
        </tr>
        </tbody>
    </table>
</form>
