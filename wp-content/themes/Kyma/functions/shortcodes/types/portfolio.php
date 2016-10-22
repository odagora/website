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
            var port_cat = jQuery.map(jQuery("#port_cat option:selected"), function (el, i) {
                return jQuery(el).val();
            });
            var port_cat = port_cat.join(", ");
            var port_col = jQuery('select#port_col').val();
            var hide_filter = jQuery('select#hide_filter').val();

            var width = jQuery('select#width').val();
            
            var mceSelected = tinyMCE.activeEditor.selection.getContent();

            var outputbutton = '[portfolio ';
            outputbutton += ' port_cat="' + port_cat + '" ';
            outputbutton += ' port_col="' + port_col + '" ';
            outputbutton += ' width="' + width + '" ';
            outputbutton += ' hide_filter="' + hide_filter + '" /]';

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
            <td class="lable-all"><?php _e('Portfolio Category', 'kyma'); ?></td>
            <td>
            <?php  $terms = get_terms('portfolio_taxonomy', 'orderby=count&order=desc&hide_empty=1');  ?>
                    <select class="select-medium" id="port_cat" name="port_cat" multiple><?php 
                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $term) { ?>
                            <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option><?php 
                        }
                    }else{ ?>
                        <option value=""><?php _e('Please add portfolio category first','kyma'); ?></option><?php 
                    } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="lable-all"><?php _e('Portfolio Column', 'kyma'); ?></td>
            <td>
                <select class="select-medium" id="port_col" name="port_col">
                    <option value="four" selected="selected" value="large_btn"><?php _e('Four Column', 'kyma'); ?></option>
                    <option value="three"><?php _e('Three Column', 'kyma'); ?></option>
                    <option value="two"><?php _e('Two Column', 'kyma'); ?></option>
                </select>
            </td>
        </tr>
        <tr>

        <tr>
            <td class="lable-all"><?php _e('Portfolio Width', 'kyma'); ?></td>
            <td>
                <select class="select-medium" name="width" id="width" >
                    <option value="boxed" selected="selected"><?php _e('Boxed Width', 'kyma'); ?></option>
                    <option value="full"><?php _e('Full Width', 'kyma'); ?></option>
                </select>
            </td>
        </tr>

        <tr>
            <td class="lable-all"><?php _e('Hide Filter', 'kyma'); ?></td>
            <td><select class="select-medium" name="hide_filter" id="hide_filter" >
                    <option value="1" selected="selected"><?php _e('Yes', 'kyma'); ?></option>
                    <option value="0"><?php _e('No', 'kyma'); ?></option>
                </select></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a href="javascript:BUTTONDialog.insert(BUTTONDialog.local_ed)" id="insert"
                   style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a></td>
        </tr>
        </tbody>
    </table>
</form>
