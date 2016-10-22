<script type="text/javascript">
    var banner_centered = ''
    jQuery("#banner_centered").on('change', function () {
        if (this.checked == true) {
            banner_centered = 'centered';
        }
    });
    jQuery("#banner_color").change(function () {
        if (this.value == '_banner_colored') {
            jQuery("#tr-button-text").hide();
            jQuery("#tr-button-url").hide();
        } else {
            jQuery("#tr-button-text").show();
            jQuery("#tr-button-url").show();
        }
    });
    var BannerDialog = {
        local_ed: 'ed',
        init: function (ed) {
            BannerDialog.local_ed = ed;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function insertAccordion(ed) {

            // Try and remove existing style / blockquote
            tinyMCEPopup.execCommand('mceRemoveNode', false, null);

            var banner_width = jQuery("#banner_width").val();
            var banner_color = jQuery("#banner_color").val();
            var banner_title = jQuery("#banner_title").val();
            var banner_text = jQuery("#banner_text").val();
            var button_icon = jQuery("#button_icon").val();
            var button_text = jQuery("#button_text").val();
            var button_url = jQuery("#button_url").val();

            var re = /,/gi;
            banner_title = banner_title.replace(re, '__');
            banner_text = banner_text.replace(re, '__');

            var mceSelected = tinyMCE.activeEditor.selection.getContent();
            var output = '';

            output += '[banner ';
            if (banner_width) {
                output += ' banner_width=\"' + banner_width + '\"';
            }
            if (banner_color) {
                output += ' banner_color=\"' + banner_color + '\"';
            }
            if (banner_centered) {
                output += ' banner_centered=\"' + banner_centered + '\"';
            }
            if (banner_title) {
                output += ' banner_title=\"' + banner_title + '\"';
            }
            if (banner_text) {
                output += ' banner_text=\"' + banner_text + '\"';
            }
            if (button_text) {
                output += ' button_text=\"' + button_text + '\"';
            }
            if (button_icon) {
                output += ' button_icon=\"' + button_icon + '\"';
            }
            if (button_url) {
                output += ' button_url=\"' + button_url + '\"';
            }
            output += '/]';


            tinyMCEPopup.execCommand('mceReplaceContent', false, output);

            // Return
            tinyMCEPopup.close();
        }
    };
    tinyMCEPopup.onInit.add(BannerDialog.init, BannerDialog);
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
            <th>
                <?php _e('Banner type', 'kyma'); ?>
            </th>
            <td>
                <select id="banner_width">
                    <option value="full"><?php _e('Full Width', 'kyma'); ?></option>
                    <option value="boxed"><?php _e('Boxed Width', 'kyma'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th>
                <?php _e('Banner Background', 'kyma'); ?>
            </th>
            <td>
                <select id="banner_color">
                    <option value="_colored"><?php _e('Colored', 'kyma'); ?></option>
                    <option value="_white"><?php _e('White', 'kyma'); ?></option>
                    <option value="classic_white"><?php _e('Classic White', 'kyma'); ?></option>
                    <option value="_banner_colored"><?php _e('Dark', 'kyma'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th>
                <?php _e('Text Align Center', 'kyma'); ?>
            </th>
            <td>
                <input type="checkbox" id="banner_centered">
            </td>
        </tr>

        <tr>
            <th class="lable-all"><?php _e('Banner title', 'kyma'); ?></th>
            <td><input type="text" id="banner_title" style="font-size:13px;margin-bottom:1%" placeholder="Banner title"
                       class="input-medium" value=""/></td>
        </tr>
        <tr>
            <th id="text-label1"><?php _e('Banner Text', 'kyma'); ?></th>
            <td><textarea class="input-xlarge" style="height:80px;font-size:13px;margin-bottom:2%"
                          placeholder="Banner Text" id="banner_text" value="" type="text"></textarea></td>
        </tr>
        <tr id="tr-button-text">
            <th class="lable-all"><?php _e('Button Text', 'kyma'); ?></th>
            <td><input type="text" id="button_text" style="font-size:13px;margin-bottom:1%" class="input-medium"
                       value="" placeholder="Button Text"/></td>
        </tr>
        <tr>
            <th class="lable-all"><?php _e('Button Icon', 'kyma'); ?></th>
            <td><input type="text" id="button_icon" style="font-size:13px;margin-bottom:1%" class="input-medium"
                       value="" placeholder="icon e.g. fa fa-wordpress"/></td>
        </tr>
        <tr id="tr-button-url">
            <th class="lable-all"><?php _e('Button URL', 'kyma'); ?></th>
            <td><input type="url" id="button_url" style="font-size:13px;margin-bottom:1%" class="input-medium" value=""
                       placeholder="www.example.org"/></td>
        </tr>
        </tbody>
    </table>
    <table class="table table-bordered table-condensed">
        <tbody id="text">
        <tr>
            <td>&nbsp;</td>
            <td><a href="javascript:BannerDialog.insert(BannerDialog.local_ed)" id="insert"
                   style="display: block; line-height: 24px;"><?php _e('Insert', 'kyma'); ?></a></td>
        </tr>
        </tbody>
    </table>
</form>