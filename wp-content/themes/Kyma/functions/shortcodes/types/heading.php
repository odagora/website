<?php if (!defined('ABSPATH')) {
    require_once('../../../../../../wp-load.php');
} ?>
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
            var title = jQuery('input#heading_title').val();
            var heading_style = jQuery('select#heading_style').val();


            //set highlighted content variable
            var mceSelected = tinyMCE.activeEditor.selection.getContent();

            // setup the output of our shortcode
            var output = '';

            output = '&nbsp;';
            output = '[heading title="' + title + '"';

            if (heading_style) {
                output += ' heading_style="' + heading_style + '" ';
            }

            output += ']';

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
            <td>
                <select class="select-medium" size="1" id="heading_style" name="heading_style">
                    <option selected="selected"
                            value="Theme Standard"><?php _e('Theme Standard', 'kyma'); ?></option>
                    <option value="h1"><?php _e('h1', 'kyma'); ?></option>
                    <option value="h2"><?php _e('h2', 'kyma'); ?></option>
                    <option value="h3"><?php _e('h3', 'kyma'); ?></option>
                    <option value="h4"><?php _e('h4', 'kyma'); ?></option>
                    <option value="h5"><?php _e('h5', 'kyma'); ?></option>
                    <option value="h6"><?php _e('h6', 'kyma'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Title', 'kyma'); ?></td>
            <td><input class="input-medium" type="text" name="heading_title" value="" id="heading_title"/></td>
        </tr>
        <td>&nbsp;</td>
        <td><a href="javascript:HeadingDialog.insert(HeadingDialog.local_ed)" id="insert"
               style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a>
        </td>
        </tbody>
    </table>
</form>
