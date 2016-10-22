<?php if (!defined('ABSPATH')) {
    require_once('../../../../../../wp-load.php');
} ?>
<script type="text/javascript">
    /*alert  script js*/
    var AlertDialog = {
        local_ed: 'ed',
        init: function (ed) {
            AlertDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function insertAlert(ed) {
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);

            var alert_style = jQuery('select#alert_style').val();
            var alert_heading = jQuery('input#alert_heading').val();
            var alert_text = jQuery('textarea#alert_text').val();
            var alert_color = jQuery('select#alert_color').val();
            var mceSelected = tinyMCE.activeEditor.selection.getContent();
            var output = '';
            output = '&nbsp;';

            output = '[alert ';

            if (alert_heading) {
                output += ' alert_heading=\"' + alert_heading + '\"';
            }
            if (alert_text) {
                output += ' alert_text=\"' + alert_text + '\"';
            }

            if (alert_style) {
                output += ' alert_style=\"' + alert_style + '\"';
            }

            output += '/]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(AlertDialog.init, AlertDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">
    <table class="table table-bordered table-condensed">
        <tbody>
        <tr>
            <td class="lable-all"><?php _e('Alert Type', 'kyma'); ?></td>
            <td><select class="select-medium" size="1" id="alert_style" name="alert_style">
                    <option value="alert alert-warning"
                            selected="selected"><?php _e('Warning', 'kyma'); ?></option>
                    <option value="alert alert-danger"><?php _e('Danger', 'kyma'); ?></option>
                    <option value="alert alert-success"><?php _e('Success', 'kyma'); ?></option>
                    <option value="alert alert-info"><?php _e('Info', 'kyma'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Title', 'kyma'); ?></td>
            <td><input class="input-medium" placeholder="<?php _e('Warning', 'kyma'); ?>" type="text" id="alert_heading" value=""
                       name="alert_heading"></td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Content', 'kyma'); ?></td>
            <td class="text-box"><textarea class="input-xlarge" id="alert_text"
                                           value="This text area show all text....." name="alert_text"
                                           type="text"><?php _e('This text area show all text.....', 'kyma'); ?></textarea>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="javascript:AlertDialog.insert(AlertDialog.local_ed)" id="insert"
                   style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a></td>
        </tr>
        </tbody>
    </table>
</form>
