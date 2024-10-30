const generateSettings = () => {

  let list = {
    categories : [{
      value : '',
      label : '-'
    }],
    labels : [],
    langs : bbw.langs
  }

  for (let category in bbw.settings) {

    const current = bbw.settings[category]

    list['categories'].push({
      value : current.category,
      label : current.label
    })

    list['labels'][current.category] = current.shortcode

  }

  console.log(list)

  return list

}

const settings = generateSettings()

export default settings