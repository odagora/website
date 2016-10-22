<script type="text/javascript">
    /*alert  script js*/
    var tooltip_style = '';
    jQuery('#tooltip_style').change(function () {
        tooltip_style = this.value;
        if (tooltip_style == 2) {
            jQuery("#tooltip_1_effects").hide();
            jQuery("#tooltip_2_effects").show();
        } else if (tooltip_style == 3) {
            jQuery("#tooltip_1_effects").hide();
            jQuery("#tooltip_2_effects").hide();
        } else {
            jQuery("#tooltip_1_effects").show();
            jQuery("#tooltip_2_effects").hide();
        }
    });
    var TooltipDialog = {
        local_ed: 'ed',
        init: function (ed) {
            TooltipDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function insertTooltip(ed) {
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);
            tooltip_style = jQuery('#tooltip_style').val();
            if (tooltip_style == 1) {
                var tooltip_effect = jQuery("#tooltip_effect").val();
            } else if (tooltip_style == 2) {
                var tooltip_effect = jQuery("#tooltip_2_effect").val();
            }
            var tooltip_title = jQuery('input#tooltip_title').val();
            var tooltip_text = jQuery('input#tooltip_text').val();
            var tooltip_over_text = jQuery('input#tooltip_over_text').val();
            var tooltip_readmore_text = jQuery('input#tooltip_readmore_text').val();
            var tooltip_readmore_link = jQuery('input#tooltip_readmore_link').val();

            var mceSelected = tinyMCE.activeEditor.selection.getContent();
            var output = '';
            output = '&nbsp;';

            output = '[tooltip ';
            if (tooltip_style != 3) {
                output += ' tooltip_effect=\"' + tooltip_effect + '\"';
            }
            if (tooltip_style) {
                output += ' tooltip_style=\"' + tooltip_style + '\"';
            }
            if (tooltip_over_text) {
                output += ' tooltip_over_text=\"' + tooltip_over_text + '\"';
            }
            if (tooltip_title) {
                output += ' tooltip_title=\"' + tooltip_title + '\"';
            }
            if (tooltip_text) {
                output += ' tooltip_text=\"' + tooltip_text + '\"';
            }
            if (tooltip_readmore_text) {
                output += ' tooltip_readmore_text=\"' + tooltip_readmore_text + '\"';
            }
            if (tooltip_readmore_link) {
                output += ' tooltip_readmore_link=\"' + tooltip_readmore_link + '\"';
            }
            output += '/]';
            tinyMCEPopup.execCommand('mceReplaceContent', false, output);
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(TooltipDialog.init, TooltipDialog);
</script>
<?php if (!defined('ABSPATH')) {
    require_once('../../../../../../wp-load.php');
} ?>
<form action="/" method="get" accept-charset="utf-8">
    <table class="table table-bordered table-condensed">
        <tbody>
        <tr>
            <td class="lable-all"><?php _e('Tooltip Style', 'kyma'); ?></td>
            <td><select class="select-medium" size="1" id="tooltip_style" name="tooltip_style">
                    <option value="1" selected="selected"><?php _e('Style-1', 'kyma'); ?></option>
                    <option value="2"><?php _e('Style-2', 'kyma'); ?></option>
                    <option value="3"><?php _e('Style-3', 'kyma'); ?></option>
                </select>
            </td>
        </tr>
        <tr id="tooltip_1_effects">
            <td class="lable-all"><?php _e('Tooltip Effect', 'kyma'); ?></td>
            <td><select class="select-medium" size="1" id="tooltip_effect" name="tooltip_effect">
                    <option value="1" selected="selected"><?php _e('Effect-1', 'kyma'); ?></option>
                    <option value="2"><?php _e('Effect-2', 'kyma'); ?></option>
                    <option value="3"><?php _e('Effect-3', 'kyma'); ?></option>
                    <option value="4"><?php _e('Effect-4', 'kyma'); ?></option>
                    <option value="5"><?php _e('Effect-5', 'kyma'); ?></option>
                </select>
            </td>
        </tr>
        <tr id="tooltip_2_effects" style="display: none;">
            <td class="lable-all"><?php _e('Tooltip Effect', 'kyma'); ?></td>
            <td><select class="select-medium" size="1" id="tooltip_2_effect">
                    <option value="turnright"
                            selected="selected"><?php _e('Tooltip turn left', 'kyma'); ?></option>
                    <option value="turnleft"><?php _e('Tooltip turn left', 'kyma'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Tool tip Hover Text', 'kyma'); ?></td>
            <td><input class="input-medium" placeholder="Tool tip hover text" type="text" id="tooltip_over_text"
                       value="" name="tooltip_over_text"></td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Tool tip title', 'kyma'); ?></td>
            <td><input class="input-medium" placeholder="Tool tip title" type="text" id="tooltip_title" value=""></td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Tool tip Text', 'kyma'); ?></td>
            <td><input class="input-medium" placeholder="Tool tip text" type="text" id="tooltip_text" value=""
                       name="tooltip_text"></td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Tool tip read more text', 'kyma'); ?></td>
            <td><input class="input-medium" placeholder="Tool tip read more text" type="text" id="tooltip_readmore_text"
                       value=""></td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Tool tip read more link', 'kyma'); ?></td>
            <td><input class="input-medium" placeholder="Tool tip read more link" type="text" id="tooltip_readmore_link"
                       value=""></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="javascript:TooltipDialog.insert(TooltipDialog.local_ed)" id="insert"
                   style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a></td>
        </tr>
        </tbody>
    </table>
</form>