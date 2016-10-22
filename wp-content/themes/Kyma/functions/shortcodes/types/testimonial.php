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
            var style = jQuery('select#testistyle').val();
            var size = jQuery('#testiheading').val();
            var mceSelected = tinyMCE.activeEditor.selection.getContent();

            var outputbutton = '[testimonial ';
            outputbutton += ' testimonial_style="' + style + '" ';
            outputbutton += ' testimonial_heading="' + size + '" /]';

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
            <td class="lable-all"><?php _e('Testimonial Style', 'kyma'); ?></td>
            <td>
                <select class="select-small" size="1" id="testistyle" name="buttonstyle">
                    <option selected="selected" value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Testimonial Heading', 'kyma'); ?></td>
            <td>
                <input type="text" class="select-medium" id="testiheading">
            </td>
        </tr>
        <tr>

        <tr>
            <td>&nbsp;</td>
            <td><a href="javascript:BUTTONDialog.insert(BUTTONDialog.local_ed)" id="insert"
                   style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a></td>
        </tr>
        </tbody>
    </table>
</form>
