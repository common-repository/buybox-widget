!function(n){var r={};function l(e){if(r[e])return r[e].exports;var t=r[e]={i:e,l:!1,exports:{}};return n[e].call(t.exports,t,t.exports,l),t.l=!0,t.exports}l.m=n,l.c=r,l.d=function(e,t,n){l.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},l.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},l.t=function(t,e){if(1&e&&(t=l(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(l.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)l.d(n,r,function(e){return t[e]}.bind(null,r));return n},l.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return l.d(t,"a",t),t},l.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},l.p="",l(l.s=0)}([function(e,t,n){"use strict";n.r(t);var r={logo:wp.element.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 390.4 457.8"},wp.element.createElement("path",{fill:"#00adee",d:"M323.6 221.3c-30.5 17.9-45.8 26.9-76.3 44.8v22.4c22.9-13.4 34.4-20.1 57.2-33.6 7.7-13.4 11.5-20.1 19.1-33.6zM304.6 299.7c-22.9 13.4-34.3 20.1-57.2 33.6v22.4c30.5-17.9 45.8-26.9 76.3-44.8-7.7-4.5-11.5-6.8-19.1-11.2zM139.2 263.5c-30.5-17.9-45.8-26.9-76.3-44.8v22.4c22.9 13.4 34.4 20.1 57.2 33.6 7.6-4.4 11.5-6.7 19.1-11.2zM120.1 319.5c-22.9-13.4-34.3-20.1-57.2-33.6v22.4c30.5 17.9 45.8 26.9 76.3 44.8-7.6-13.5-11.5-20.2-19.1-33.6z"}),wp.element.createElement("path",{fill:"#00adee",d:"M195.2 0L0 114.4v228.9l195.2 114.5 195.2-114.5V114.4L195.2 0zm-17.8 308.3c-7.6 4.5-11.5 6.7-19.1 11.2 7.6 13.4 11.5 20.1 19.1 33.6v67.1c-50.9-29.8-101.8-59.7-152.7-89.5v-179c50.9 29.8 101.8 59.7 152.7 89.5v67.1zm184.4-87c-7.6 13.4-11.5 20.1-19.1 33.6 7.6 4.5 11.5 6.7 19.1 11.2v67.1c-50.9 29.9-101.8 59.7-152.6 89.5v-179c50.9-29.8 101.8-59.7 152.7-89.5-.1 26.8-.1 40.3-.1 67.1z"}))},p=function(){var e={categories:[{value:"",label:"-"}],labels:[],langs:bbw.langs};for(var t in bbw.settings){var n=bbw.settings[t];e.categories.push({value:n.category,label:n.label}),e.labels[n.category]=n.shortcode}return console.log(e),e}(),l=function e(t,n,r){n.scrollHeight!=r?t.style.height=n.scrollHeight+"px":setTimeout(function(){e(t,n,r)},100)},m=function(e){var t=ajaxurl+"?action=buybox_widget_iframe&category="+e.category;if(e.category){if(e.ean=e.ean.replace(/[^0-9,]/g,""),e.name=e.name.replace(/"/g,"'"),e.info=e.info.replace(/"/g,"'"),"number"==e.type){if(!e.ean||8!=e.ean.length&&13!=e.ean.length)return;t+="&ean="+e.ean}else{if(!e.name||!e.info)return;t+="&name="+e.name,t+="&info="+e.info}return t}},b=function(){var e=document.querySelector(".buyboxIframe"),t=e?e.contentWindow.document.body:null;if(t){var n=t.scrollHeight;l(e,t,n)}},o=function(){function r(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}return function(e,t,n){return t&&r(e.prototype,t),n&&r(e,n),e}}();var g=wp.editor.InspectorControls,a=wp.components,y=a.TextControl,v=a.SelectControl,c=wp.element,i=c.Component,d=c.Fragment,u=function(e){function t(){return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t),function(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(t,i),o(t,[{key:"render",value:function(){var e=this.props,t=e.attributes,n=e.setAttributes,r=t.category,l=t.type,o=t.ean,a=t.name,c=t.info,i=[{value:"",label:"-"},{value:"number",label:p.langs.fields.number},{value:"text",label:p.langs.fields.text}],u=m(t),s=r?p.labels[r].error:p.langs.texts.error,f=[p.langs.texts.info,p.langs.texts.help].join("<br>");return wp.element.createElement(d,null,wp.element.createElement(g,null,wp.element.createElement("p",{style:{height:"20px"}}),wp.element.createElement(v,{label:p.langs.fields.category,select:r,options:p.categories,onChange:function(e){return n({category:e,type:"",ean:"",name:"",info:""})},value:r}),r?wp.element.createElement(d,null,wp.element.createElement(v,{label:p.langs.fields.type,select:l,options:i,onChange:function(e){return n({type:e,ean:"",name:"",info:""})},value:l}),"number"===l?wp.element.createElement(y,{label:p.labels.book.ean,key:"ean",onChange:function(e){return n({ean:e})},value:o}):"text"===l?wp.element.createElement(d,null,wp.element.createElement(y,{label:p.labels.book.name,key:"name",onChange:function(e){return n({name:e})},value:a}),wp.element.createElement(y,{label:p.labels.book.info,key:"info",onChange:function(e){return n({info:e})},value:c})):null):null),u?wp.element.createElement("iframe",{className:"buyboxIframe",src:u,allowFullScreen:!0,onLoad:b}):wp.element.createElement("p",{className:"notice notice-error"},s),wp.element.createElement("p",{className:"notice notice-info",dangerouslySetInnerHTML:{__html:f}}))}}]),t}();(0,wp.blocks.registerBlockType)("simply4net/buybox-widget",{title:p.langs.title,description:p.langs.desc,icon:r.logo,category:"embed",supports:{html:!1},edit:u,save:function(){return null}})}]);