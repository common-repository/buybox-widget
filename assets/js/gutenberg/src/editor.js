import Settings from './settings.js'
import { IframePath, LoadIframe } from './iframe.js'

const { InspectorControls }          = wp.editor
const { TextControl, SelectControl } = wp.components
const { Component, Fragment }        = wp.element

export default class EditorBlock extends Component {

  constructor() {

    super(...arguments)

  }

  render() {

    const { attributes, setAttributes } = this.props
    const { category, type, ean, name, info } = attributes

    const types = [
      {
        value: '',
        label: '-'
      },
      {
        value: 'number',
        label: Settings.langs.fields.number
      },
      {
        value: 'text',
        label: Settings.langs.fields.text
      },
    ]

    const path  = IframePath(attributes)
    const error = category ? Settings.labels[category].error : Settings.langs.texts.error
    const help  = [Settings.langs.texts.info, Settings.langs.texts.help].join('<br>')

    return (
      <Fragment>
        <InspectorControls>
          <p style={{height:'20px'}} />
          <SelectControl
            label={Settings.langs.fields.category}
            select={category}
            options={Settings.categories}
            onChange={ (value) => setAttributes({ category: value, type: '', ean: '', name: '', info: '' }) }
            value={category}
          />
          { (category) ? (
            <Fragment>
              <SelectControl
                label={Settings.langs.fields.type}
                select={type}
                options={types}
                onChange={ (value) => setAttributes({ type: value, ean: '', name: '', info: '' }) }
                value={type}
              />
              { (type === 'number') ? (
                <TextControl
                  label={Settings.labels['book'].ean}
                  key="ean"
                  onChange={ (value) => setAttributes({ ean: value }) }
                  value={ean}
                />
              ) : (
                (type === 'text') ? (
                  <Fragment>
                    <TextControl
                      label={Settings.labels['book'].name}
                      key="name"
                      onChange={ (value) => setAttributes({ name: value }) }
                      value={name}
                    />
                    <TextControl 
                      label={Settings.labels['book'].info}
                      key="info"
                      onChange={ (value) => setAttributes({ info: value }) }
                      value={info}
                    />
                  </Fragment>
                ) : null)
              }
            </Fragment>
          ) : null}
        </InspectorControls>
        { (path) ? (
          <iframe
            className="buyboxIframe"
            src={path}
            allowFullScreen={true}
            onLoad={LoadIframe}
          />
        ) : (
          <p className="notice notice-error">{error}</p>
        )}
        <p className="notice notice-info" dangerouslySetInnerHTML={{ __html: help }} />
      </Fragment>
    )

  }

}
