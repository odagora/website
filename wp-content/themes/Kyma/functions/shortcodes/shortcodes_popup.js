(function kyma_shortcodes() {
    tinymce.create('tinymce.plugins.wpex_shortcodesPlugin', {
        init: function (ed, url) {
            // Register commands
            ed.addCommand('mce_shortcodes_shortcodes', function kyma_shortcodes() {
                ed.windowManager.open({
                    file: url + '/shortcodes_iframe.php', // file that contains HTML for our modal window
                    width: 600 + parseInt(ed.getLang('kyma_shortcodes.delta_width', 0)), // size of our window
                    height: 700 + parseInt(ed.getLang('kyma_shortcodes.delta_height', 0)), // size of our window
                    inline: 1
                }, {
                    plugin_url: url
                });
            });

            // Register wpex_shortcodess
            ed.addButton('kyma_shortcodes', {title: 'Kyma Shortcodes', cmd: 'mce_shortcodes_shortcodes', image: url + '/images/add1.png' });
        },

        getInfo: function kyma_shortcodes() {
            return {
                longname: 'Shortcodes',
                author: 'WebHunt Infotech',
                authorurl: 'http://www.webhuntinfotech.com',
                infourl: 'http://www.webhuntinfotech.com',
                version: tinymce.majorVersion + "." + tinymce.minorVersion
            };
        }
    });

    // Register plugin
    // first parameter is the wpex_shortcodes ID and must match ID elsewhere
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('kyma_shortcodes', tinymce.plugins.wpex_shortcodesPlugin);

})();