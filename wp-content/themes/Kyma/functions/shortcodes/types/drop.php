<?php if (!defined('ABSPATH')) {
    require_once('../../../../../../wp-load.php');
} ?>
<script type="text/javascript">
    var DropDialog = {
        local_ed: 'ed',
        init: function (ed) {
            DropDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function insertDrop(ed) {
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);

            var dropcp_style = jQuery('select#dropcp_style').val();
            var dropcp_text = jQuery('textarea#dropcp_text').val();
            var dropcp_first_letter = jQuery('input#dropcp_first_letter').val();
            var mceSelected = tinyMCE.activeEditor.selection.getContent();
            var output = '';
            output = '&nbsp;';

            output = '[dropcap';

            if (dropcp_first_letter) {
                output += ' dropcp_first_letter=\"' + dropcp_first_letter + '\"';
            }
            if (dropcp_style) {
                output += ' dropcp_style=\"' + dropcp_style + '\"';
            }

            if (dropcp_text) {
                output += ' dropcp_text=\"' + dropcp_text + '\"';
            }

            output += '/]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(DropDialog.init, DropDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">
    <table class="table table-bordered table-condensed">
        <tbody>
        <tr>
            <td class="lable-all"><?php _e('Style', 'kyma'); ?></td>
            <td>
                <select class="select-medium" size="1" id="dropcp_style" name="dropcp_style">
                    <option value="dropcaps"
                            selected="selected"><?php _e('Sqaure Plain', 'kyma'); ?></option>
                    <option
                        value="dropcaps dropcaps-color-style"><?php _e('Sqaure Colored', 'kyma'); ?></option>

                </select>
            </td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('First Letter', 'kyma'); ?></td>
            <td><input class="input-medium" placeholder="First Letter of the Word" type="text" id="dropcp_first_letter"
                       value="" name="dropcp_first_letter"></td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Content', 'kyma'); ?></td>
            <td class="text-box"><textarea class="input-xlarge" id="dropcp_text"
                                           value="<?php _e('This text area show all text.....', 'kyma'); ?>"
                                           name="dropcp_text" type="text"></textarea></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="javascript:DropDialog.insert(DropDialog.local_ed)" id="insert"
                   style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a>
            </td>
        </tr>
        </tbody>
    </table>
</form>
