<script type="text/javascript">
    fields = 2;
    function addInput() {
        jQuery('#text').append('<tr  id="tr-title' + fields + '"><td class="lable-all" id="title-label' + fields + '">Feature-Title' + fields + '</td><td><input type="text" id="feature-title' + fields + '" style="font-size:13px;margin-bottom:1%" class="input-medium" value="" /></td></tr><tr id="tr-text' + fields + '"><td id="text-label' + fields + '">Feature-Text' + fields + '</td><td><textarea class="input-xlarge" style="height:80px;font-size:13px;margin-bottom:2%" placeholder="This text area show all text" id="feature-text' + fields + '" name="feature-text' + fields + '" value="" type="text"></textarea></td></tr><tr>&nbsp;&nbsp;</tr><tr  id="tr-icon' + fields + '"><td class="lable-all" id="icon-label' + fields + '">Feature-Icon' + fields + '</td><td><input type="text" id="feature-icon' + fields + '" style="font-size:13px;margin-bottom:1%" class="input-medium" value="" /></td></tr>');
        fields += 1;
        jQuery("#more_field").find('input:button').val("Add More Feature Fields");
        jQuery("#remove_button").show();
    }
    function remove_field() {
        if (fields != "1") {
            fields = fields - 1;
            jQuery("#tr-title" + fields).remove();
            jQuery("#tr-text" + fields).remove();
            jQuery("#tr-icon" + fields).remove();
        }

    }

    var FeatureDialog = {
        local_ed: 'ed',
        init: function (ed) {
            FeatureDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function insertFeature(ed) {

            // Try and remove existing style / blockquote
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);
            fields = fields - 1;

            var feature_style = jQuery('#feature_style').val();
            var feature_title = new Array();
            for (i = 1; i <= fields; i++) {

                var title = jQuery("#feature-title" + i).val();
                var re = /,/gi;

                feature_title[i] = title.replace(re, '__');
            }

            var feature_text = new Array();
            var feature_icon = new Array();
            for (i = 1; i <= fields; i++) {
                var text = jQuery("#feature-text" + i).val();
                feature_icon[i] = jQuery("#feature-icon" + i).val();
                var re1 = /,/gi;
                feature_text[i] = text.replace(re1, '__');
            }
            //alert(feature_text);

            var mceSelected = tinyMCE.activeEditor.selection.getContent();
            var output = '';

            output += '[feature ';
            output += ' fields=\"' + fields + '\"';
            if (feature_style) {
                output += ' feature_style=\"' + feature_style + '\"';

            }
            if (feature_title) {
                output += ' feature_title=\"' + feature_title + '\"';

            }
            if (feature_text) {
                output += " feature_text=\'" + feature_text + "\'";
            }
            if (feature_icon) {
                output += " feature_icon=\'" + feature_icon + "\'";
            }
            output += '/]';


            tinyMCEPopup.execCommand('mceReplaceContent', false, output);

            // Return
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(FeatureDialog.init, FeatureDialog);
</script>
<style>
    .shortcode-button {
        background: #2ea2cc;
        background: -webkit-gradient(linear, left top, left bottom, from(#2ea2cc), to(#1e8cbe));
        background: -webkit-linear-gradient(top, #2ea2cc 0%, #1e8cbe 100%);
        background: linear-gradient(top, #2ea2cc 0%, #1e8cbe 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2ea2cc', endColorstr='#1e8cbe', GradientType=0);
        border-color: #0074a2;
        -webkit-box-shadow: inset 0 1px 0 rgba(120, 200, 230, 0.5);
        box-shadow: inset 0 1px 0 rgba(120, 200, 230, 0.5);
        color: #fff;
        text-decoration: none;
        text-shadow: 0 1px 0 rgba(0, 86, 132, 0.7);

    }

    .shortcode-button:hover {
        background: #2ea2cc;
        background: -webkit-gradient(linear, left top, left bottom, from(#2ea2cc), to(#1e8cbe));
        background: -webkit-linear-gradient(top, #2ea2cc 0%, #1e8cbe 100%);
        background: linear-gradient(top, #2ea2cc 0%, #1e8cbe 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2ea2cc', endColorstr='#1e8cbe', GradientType=0);
        border-color: #0074a2;
        -webkit-box-shadow: inset 0 1px 0 rgba(120, 200, 230, 0.5);
        box-shadow: inset 0 1px 0 rgba(120, 200, 230, 0.5);
        color: #fff;
        text-decoration: none;
        text-shadow: 0 1px 0 rgba(0, 86, 132, 0.7);
        opacity: 0.8;
    }

    .remove-button {
        background-color: #da4f49;
        background-image: -moz-linear-gradient(top, #ee5f5b, #bd362f);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ee5f5b), to(#bd362f));
        background-image: -webkit-linear-gradient(top, #ee5f5b, #bd362f);
        background-image: -o-linear-gradient(top, #ee5f5b, #bd362f);
        background-image: linear-gradient(to bottom, #ee5f5b, #bd362f);
        background-repeat: repeat-x;
        border-color: #bd362f #bd362f #802420;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        color: #fff;
        width: 30% !important;
        float: right !important;

    }
</style>
<?php if (!defined('ABSPATH')) {
    require_once('../../../../../../wp-load.php');
} ?>
<form action="/" method="get" accept-charset="utf-8">
    <table class="table table-bordered table-condensed">

        <tbody id="text">
        <tr>
            <td><?php _e('Feature Stype', 'kyma'); ?></td>
            <td><select id="feature_style">
                    <option value="1"><?php _e('Verticle', 'kyma'); ?></option>
                    <option value="2"><?php _e('Horizontal', 'kyma'); ?></option>

                </select></td>
        </tr>
        <tr id="tr-title1">
            <td class="lable-all" id="title-label1"><?php _e('Feature-Title1', 'kyma'); ?></td>
            <td><input type="text" id="feature-title1" style="font-size:13px;margin-bottom:1%"
                       placeholder="feature title" class="input-medium" value=""/></td>
        </tr>
        <tr id="tr-text1">
            <td id="text-label1"><?php _e('Feature-Text1', 'kyma'); ?></td>
            <td><textarea class="input-xlarge" style="height:80px;font-size:13px;margin-bottom:2%"
                          placeholder="feature Text" id="feature-text1" value="" type="text"></textarea></td>
        </tr>
        <tr>&nbsp;&nbsp;</tr>
        <tr id="tr-icon1">
            <td class="lable-all" id="icon-label1"><?php _e('Feature-Icon1', 'kyma'); ?></td>
            <td><input type="text" id="feature-icon1" style="font-size:13px;margin-bottom:1%" class="input-medium"
                       value="" placeholder="icon e.g. fa fa-wordpress"/></td>
        </tr>
        </tbody>
    </table>
    <table class="table table-bordered table-condensed">
        <tbody id="text">
        <tr>
            <td>&nbsp;</td>
            <td><a href="javascript:FeatureDialog.insert(FeatureDialog.local_ed)" id="insert"
                   style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a></td>
        </tr>
        </tbody>
    </table>
    <div style="margin-bottom: 2%;margin-top:3%">
        <div id="more_field" style="float:left">
            <input type="button" onclick="addInput()" class="shortcode-button" name="add" id="more"
                   value="Add Feature Field"/><br>
        </div>
        <input type="button" onclick="remove_field()" class="remove-button" name="remove_button" id="remove_button"
               value="Remove Last Field" style="display:none;"/>
    </div>
</form>