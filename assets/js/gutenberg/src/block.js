import Icons from './icons.js'
import Editor from './editor.js'
import Settings from './settings.js'

const { registerBlockType } = wp.blocks

registerBlockType('simply4net/buybox-widget', {
  title       : Settings.langs.title,
  description : Settings.langs.desc,
  icon        : Icons.logo,
  category    : 'embed',
  supports    : { html: false },
  edit        : Editor,
  save() {
    return null;
  }
})