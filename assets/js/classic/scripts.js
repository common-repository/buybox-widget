(function($) {

  var settings = bbw.settings;

  /* ---
    Change fields status
  --- */

    $.fn.changeFields = function(value) {

      var inputs = $(this).find('> .mce-abs-layout-item');
      inputs.each(function(index) {

        if ((index == 0) || (index > 3))
          return true;

        if (((index == 1) && (value == bbw.langs.fields.number)) || ((index > 1) && (value == bbw.langs.fields.text))) {

          $(this).find('label')
            .removeClass('mce-disabled')
            .attr('aria-disabled', false)
          ;

          $(this).find('input')
            .removeClass('mce-disabled')
            .attr('aria-disabled', false)
            .attr('disabled', false)
          ;

        } else {

          $(this).find('label')
            .addClass('mce-disabled')
            .attr('aria-disabled', true)
          ;

          $(this).find('input')
            .addClass('mce-disabled')
            .attr('aria-disabled', true)
            .attr('disabled', true)
          ;

        }

      });

    };

  /* ---
    Fields list
  --- */

    function getFields(langs, isPopover, content) {

      var fields = [];

      fields.push({
        type   : 'combobox',
        name   : 'type',
        label  : bbw.langs.fields.type,
        values : [
          {
            text  : bbw.langs.fields.number,
            value : bbw.langs.fields.number
          },
          {
            text  : bbw.langs.fields.text,
            value : bbw.langs.fields.text
          }
        ],
        onselect : function(e) {

          var value   = this.value();
          var wrapper = $(this.$el.context).parent().parent().parent();
          wrapper.changeFields(value);

        }
      });

      fields.push({
        type     : 'textbox',
        name     : 'ean',
        disabled : true,
        label    : langs.ean
      });
      fields.push({
        type     : 'textbox',
        name     : 'name',
        disabled : true,
        label    : langs.name
      });
      fields.push({
        type     : 'textbox',
        name     : 'info',
        disabled : true,
        label    : langs.info
      });

      if (isPopover) {

        fields.push({
          type   : 'combobox',
          name   : 'popover_type',
          label  : bbw.langs.popover_types.label,
          value  : bbw.langs.popover_types.hover,
          values : [
            {
              text  : bbw.langs.popover_types.hover,
              value : bbw.langs.popover_types.hover
            },
            {
              text  : bbw.langs.popover_types.click,
              value : bbw.langs.popover_types.click
            }
          ]
        });

      }

      fields.push({
        type    : 'container',
        html    : '<p>' + bbw.langs.texts.info + '</p>',
        classes : 'bbw-info'
      });

      fields.push({
        type    : 'container',
        html    : '<p>' + bbw.langs.texts.help + '</p>',
        classes : 'bbw-help'
      });

      return fields;

    };

  /* ---
    Create shortcode
  --- */

    function createShortcode(data, category, isPopover, selection) {

      var code = '[buybox-widget category="' + category + '"';

      if (!data.type)
        return;

      if (data.type == bbw.langs.fields.number) {

        data.ean = data.ean.replace(/[^0-9,]/g, '');

        if (!data.ean || ((data.ean.length != 8) && (data.ean.length != 13)))
          return;

        code += ' ean="' + data.ean + '"';

      } else if (data.type == bbw.langs.fields.text) {

        data.name = data.name.replace(/"/g, '\'');
        data.info = data.info.replace(/"/g, '\'');

        if (!data.name || !data.info)
          return;

        code += ' name="' + data.name + '" info="' + data.info + '"';

      }

      if (isPopover) {

        selection = selection.replace(/"/g, '\'');

        if (!selection || !data.popover_type)
          return;

        if (data.popover_type == bbw.langs.popover_types.click)
          code += ' popover-event="click"';
        else
          code += ' popover-event="hover"';

        code += ']' + selection + '[/buybox-widget]';

      } else {

        code += '/]';

      }

      return code;

    };

  /* ---
    Editor button
  --- */

    tinymce.create('tinymce.plugins.buybox', {

      init : function(editor, url) {

        /* ---
          Menu list
        --- */

          var cats = [];

          for (var index in settings) {

            if (settings[index]['category_id'])
              cats.push(settings[index]);

          }

          var fieldsCount = cats.length;
          var list        = [];
          var listPopover = [];
          var clickAction = function(i, isPopover) {

            return function() {

              editor.windowManager.open({
                title    : bbw.langs.title + ': ' + cats[i].label,
                body     : getFields(cats[i].shortcode, isPopover, editor.selection.getContent()),
                onsubmit : function(e) {

                  var code = createShortcode(e.data, cats[i].category, isPopover, editor.selection.getContent());

                  if (!code) {

                    e.preventDefault();
                    alert(cats[i].shortcode.error);
                    return;

                  }

                  editor.execCommand(
                    'mceInsertContent',
                    false,
                    '<span class="bb-widget-wrap">' + code + '</span>'
                  );

                }

              });

            };

          };

          for (var i = 0; i < fieldsCount; i++) {

            list.push({
              text    : cats[i].label,
              onclick : clickAction(i, false)
            });

            listPopover.push({
              text    : cats[i].label,
              onclick : clickAction(i, true)
            });

          }

        /* ---
          Buttons
        --- */

          editor.addButton('buybox', {
            title : bbw.langs.title,
            cmd   : 'buybox',
            image : url + '/../../img/logo.png',
            type  : 'menubutton',
            menu  : [{
              text    : bbw.langs.editor_menu.default,
              type    : 'menubutton',
              menu    : list
            }, {
              text    : bbw.langs.editor_menu.popover,
              type    : 'menubutton',
              menu    : listPopover,
              classes : 'bbw-popover'
            }]
          });

          editor.on('NodeChange', function() {

            if (!editor.selection.getContent()) {

              $('.mce-bbw-popover')
                .addClass('mce-disabled')
                .attr('aria-disabled', true)
                .attr('disabled', true)
              ;

            } else {

              $('.mce-bbw-popover')
                .removeClass('mce-disabled')
                .attr('aria-disabled', false)
                .attr('disabled', false)
              ;

            }

          });

      }

    });

    tinymce.PluginManager.add('buybox', tinymce.plugins.buybox);

})(jQuery);