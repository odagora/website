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
            var size = jQuery('select#column-size').val();
            var textdata = jQuery('textarea#column-content').val();
            var bg_color = jQuery('select#bg_color').val();
            var font_color = jQuery('select#font_color').val();
            var mceSelected = tinyMCE.activeEditor.selection.getContent();
            if (!textdata) {
                textdata = "text";
            }
            var output = '';
            if (size == "col-md-6") {
                output1 = "[column size='" + size + "' ] " + textdata + "[/column]";
                output2 = output1;
                output = '[row bg_color="' + bg_color + '" font_color="' + font_color + '"]' + output1 + output2 + '[/row]';
            }
            if (size == "col-md-12") {
                var output1 = "[column size='" + size + "' ] " + textdata + "[/column]";
                output = '[row bg_color="' + bg_color + '" font_color="' + font_color + '"]' + output1 + '[/row]';
            }
            if (size == "col-md-3") {
                var output1 = "[column size='" + size + "' ] " + textdata + "[/column]";
                var output2 = output3 = output4 = output1;
                output = '[row bg_color="' + bg_color + '" font_color="' + font_color + '"]' + output1 + output2 + output3 + output4 + '[/row]';
            }
            if (size == "col-md-4") {
                var output1 = "[column size='" + size + "' ] " + textdata + "[/column]";
                var output2 = output3 = output1;
                output = '[row bg_color="' + bg_color + '" font_color="' + font_color + '"]' + output1 + output2 + output3 + '[/row]';
            }
            if (size == "col-md-8") {
                var output1 = "[column size='" + size + "' ] " + textdata + "[/column]";
                var output2 = "[column size='col-md-4' ]" + textdata + "[/column]";
                output = '[row bg_color="' + bg_color + '" font_color="' + font_color + '"]' + output1 + output2 + '[/row]';
            }
            if (size == "col-md-9") {
                var output1 = "[column size='" + size + "' ] " + textdata + "[/column]";
                var output2 = "[column size='col-md-3' ] " + textdata + "[/column]";
                output = '[row bg_color="' + bg_color + '" font_color="' + font_color + '"]' + output1 + output2 + '[/row]';
            }
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
            <option value="bg_white" selected="selected"><?php _e('None', 'kyma'); ?></option>
            <option value="bg_color1"><?php _e('BackGround 1', 'kyma'); ?></option>
            <option value="bg_color2"><?php _e('BackGround 2', 'kyma'); ?></option>
            <option value="bg_color3"><?php _e('BackGround 3', 'kyma'); ?></option>
            <option value="bg_color4"><?php _e('BackGround 4', 'kyma'); ?></option>
            <option value="bg_color5"><?php _e('BackGround 5', 'kyma'); ?></option>
            <option value="bg_color6"><?php _e('BackGround 6', 'kyma'); ?></option>
            <option value="bg_color7"><?php _e('Orange', 'kyma'); ?></option>
            <option value="bg_color8"><?php _e('BackGround 8', 'kyma'); ?></option>
            <option value="bg_color9"><?php _e('BackGround 9', 'kyma'); ?></option>
            <option value="bg_color10"><?php _e('BackGround 10', 'kyma'); ?></option>
            <option value="bg_color11"><?php _e('BackGround 11', 'kyma'); ?></option>
            <option value="bg_color12"><?php _e('BackGround 12', 'kyma'); ?></option>
            <option value="bg_color13"><?php _e('BackGround 13', 'kyma'); ?></option>
            <option value="bg_color13"><?php _e('BackGround 14', 'kyma'); ?></option>
            <option value="bg_gray"><?php _e('Gray', 'kyma'); ?></option>
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
        <label for="column-size"><?php _e('Size', 'kyma'); ?></label>
        <select name="column-size" id="column-size" size="1">
            <option value="col-md-6" selected="selected">1/2</option>
            <option value="col-md-3">1/4</option>
            <option value="col-md-4">1/3</option>
            <option value="col-md-8">2/3</option>
            <option value="col-md-9">3/4</option>
            <option value="col-md-12"><?php _e('full width layout', 'kyma'); ?></option>
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