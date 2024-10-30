const iframePath = (data) => {

  let url = ajaxurl + '?action=buybox_widget_iframe&category=' + data.category

  if (!data.category)
    return

  data.ean  = data.ean.replace(/[^0-9,]/g, '')
  data.name = data.name.replace(/"/g, '\'');
  data.info = data.info.replace(/"/g, '\'');

  if (data.type == 'number') {

    if (!data.ean || ((data.ean.length != 8) && (data.ean.length != 13)))
      return

    url += '&ean=' + data.ean

  } else {

    if (!data.name || !data.info)
      return

    url += '&name=' + data.name
    url += '&info=' + data.info

  }

  return url

}

const loadIframe = () => {

  const iframe = document.querySelector('.buyboxIframe')
  const widget = iframe ? iframe.contentWindow.document.body : null

  if (!widget)
    return

  const height = widget.scrollHeight
  detectResizeIframe(iframe, widget, height)

}

const detectResizeIframe = (iframe, widget, height) => {

  if (widget.scrollHeight != height) {

    iframe.style.height = widget.scrollHeight + 'px'

  } else {

    setTimeout(() => { detectResizeIframe(iframe, widget, height) }, 100)

  }

}

export const IframePath = iframePath
export const LoadIframe = loadIframe