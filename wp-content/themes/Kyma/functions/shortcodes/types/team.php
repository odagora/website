<?php $parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once $parse_uri[0] . 'wp-load.php';?>
<script type="text/javascript">
    var TEAMDialog = {
        local_ed: 'ed',
        init: function (ed) {
            TEAMDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function insertTEAM(ed) {
            // Try and remove existing style / blockquote
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);
            // set up variables to contain our input values
            var team_style = jQuery('#team_style').val();
            //set highlighted content variable
            var mceSelected = tinyMCE.activeEditor.selection.getContent();
            // setup the output of our shortcode
            var output = '';
            output = '&nbsp;';
            output = '[team style="' + team_style + '"';
            output += ' /]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            // Return
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(TEAMDialog.init, TEAMDialog);
</script>
<form action="/" method="get" accept-charset="utf-8">
    <table class="table table-bordered table-condensed">
        <tbody>
        <tr>
            <td class="lable-all"><?php _e('Style', 'kyma'); ?></td>
            <td><select id="team_style" class="input-medium">
                    <option value="1"><?php _e('Style 1', 'kyma'); ?></option>
                    <option value="2"><?php _e('Style 2', 'kyma'); ?></option></td>
        </tr>
        <td>&nbsp;</td>
        <td><a href="javascript:TEAMDialog.insert(TEAMDialog.local_ed)" id="insert"
               style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a>
        </td>
        </tbody>
    </table>
</form>
