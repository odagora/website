<?php if (!defined('ABSPATH')) {
    require_once('../../../../../../wp-load.php');
} ?>
<script type="text/javascript">
    var ColumnDialog = {
        local_ed: 'ed',
        init: function (ed) {
            ColumnDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function insertColumn(ed) {
            tinyMCEPopup.execCommand('mceRemoveNode', true, null);
            var bg_color = jQuery('select#bg_color').val();
            var font_color = jQuery('select#font_color').val();
            var mceSelected = tinyMCE.activeEditor.selection.getContent();
            var output = '';
            output = "[row bg_color='" + bg_color + "' font_color='" + font_color + "' ][row]";
            tinyMCEPopup.execCommand('mceReplaceContent', true, output);
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(ColumnDialog.init, ColumnDialog);

</script>
<form action="/" method="get" accept-charset="utf-8">
    <div class="form-section clearfix">
        <label for="row-background-color"><?php _e('Row Background Color', 'kyma'); ?></label>
        <select id="bg_color" size="1">
            <option value="bg_color1" selected="selected"><?php _e('BackGround 1', 'kyma'); ?></option>
            <option value="bg_color2"><?php _e('BackGround 2', 'kyma'); ?></option>
            <option value="bg_color3"><?php _e('BackGround 3', 'kyma'); ?></option>
            <option value="bg_color4"><?php _e('BackGround 4', 'kyma'); ?></option>
            <option value="bg_color5"><?php _e('BackGround 5', 'kyma'); ?></option>
            <option value="bg_color6"><?php _e('BackGround 6', 'kyma'); ?></option>
            <option value="bg_color7"><?php _e('BackGround 7', 'kyma'); ?></option>
            <option value="bg_color8"><?php _e('BackGround 8', 'kyma'); ?></option>
            <option value="bg_color9"><?php _e('BackGround 9', 'kyma'); ?></option>
            <option value="bg_color10"><?php _e('BackGround 10', 'kyma'); ?></option>
            <option value="bg_color11"><?php _e('BackGround 11', 'kyma'); ?></option>
            <option value="bg_color12"><?php _e('BackGround 12', 'kyma'); ?></option>
            <option value="bg_color13"><?php _e('BackGround 13', 'kyma'); ?></option>
            <option value="bg_color13"><?php _e('BackGround 14', 'kyma'); ?></option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="row-background-color"><?php _e('Font Color', 'kyma'); ?></label>
        <select id="font_color" size="1">
            <option value="" selected="selected"><?php _e('Default', 'kyma'); ?></option>
            <option value="white_section"><?php _e('White', 'kyma'); ?></option>
        </select>
    </div>
    <div class="form-section clearfix">
        <label for="column-content"><?php _e('Content', 'kyma'); ?><br/>
            <small><?php _e('Leave Blank To Use Highlighted', 'kyma'); ?></small>
        </label>
        <textarea type="text" name="" value="" id="column-content"></textarea>
    </div>
    <a href="javascript:ColumnDialog.insert(ColumnDialog.local_ed)" id="insert"
       style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a>
</form>