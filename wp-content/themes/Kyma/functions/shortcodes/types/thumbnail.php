<?php $parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once $parse_uri[0] . 'wp-load.php';?>
<script type="text/javascript">
    var HeadingDialog = {
        local_ed: 'ed',
        init: function (ed) {
            HeadingDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function insertHeading(ed) {
            // Try and remove existing style / blockquote
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);
            // set up variables to contain our input values
            var thumbnail = jQuery('input#thumbnail').val();
            //set highlighted content variable
            var mceSelected = tinyMCE.activeEditor.selection.getContent();
            // setup the output of our shortcode
            var output = '';
            output = '&nbsp;';
            output = '[thumbnail style="' + thumbnail + '"';
            output += ' /]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            // Return
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(HeadingDialog.init, HeadingDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">
    <table class="table table-bordered table-condensed">
        <tbody>
        <tr>
            <td class="lable-all"><?php _e('Style', 'kyma'); ?></td>
            <td><input type="text" id="thumbnail" name="thumbnail" class="input-medium"/></td>
        </tr>
        <td>&nbsp;</td>
        <td><a href="javascript:HeadingDialog.insert(HeadingDialog.local_ed)" id="insert"
               style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a>
        </td>
        </tbody>
    </table>
</form>
