"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[997],{626:(e,t,n)=>{n.d(t,{Z:()=>a});var r=n(879),i=n.n(r)()((function(e){return e[1]}));i.push([e.id,".inner-box[data-v-5ce171f2]{display:flex;flex-direction:column}",""]);const a=i},879:e=>{e.exports=function(e){var t=[];return t.toString=function(){return this.map((function(t){var n=e(t);return t[2]?"@media ".concat(t[2]," {").concat(n,"}"):n})).join("")},t.i=function(e,n,r){"string"==typeof e&&(e=[[null,e,""]]);var i={};if(r)for(var a=0;a<this.length;a++){var o=this[a][0];null!=o&&(i[o]=!0)}for(var s=0;s<e.length;s++){var c=[].concat(e[s]);r&&i[c[0]]||(n&&(c[2]?c[2]="".concat(n," and ").concat(c[2]):c[2]=n),t.push(c))}},t}},379:(e,t,n)=>{var r,i=function(){return void 0===r&&(r=Boolean(window&&document&&document.all&&!window.atob)),r},a=function(){var e={};return function(t){if(void 0===e[t]){var n=document.querySelector(t);if(window.HTMLIFrameElement&&n instanceof window.HTMLIFrameElement)try{n=n.contentDocument.head}catch(e){n=null}e[t]=n}return e[t]}}(),o=[];function s(e){for(var t=-1,n=0;n<o.length;n++)if(o[n].identifier===e){t=n;break}return t}function c(e,t){for(var n={},r=[],i=0;i<e.length;i++){var a=e[i],c=t.base?a[0]+t.base:a[0],l=n[c]||0,u="".concat(c," ").concat(l);n[c]=l+1;var d=s(u),f={css:a[1],media:a[2],sourceMap:a[3]};-1!==d?(o[d].references++,o[d].updater(f)):o.push({identifier:u,updater:m(f,t),references:1}),r.push(u)}return r}function l(e){var t=document.createElement("style"),r=e.attributes||{};if(void 0===r.nonce){var i=n.nc;i&&(r.nonce=i)}if(Object.keys(r).forEach((function(e){t.setAttribute(e,r[e])})),"function"==typeof e.insert)e.insert(t);else{var o=a(e.insert||"head");if(!o)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");o.appendChild(t)}return t}var u,d=(u=[],function(e,t){return u[e]=t,u.filter(Boolean).join("\n")});function f(e,t,n,r){var i=n?"":r.media?"@media ".concat(r.media," {").concat(r.css,"}"):r.css;if(e.styleSheet)e.styleSheet.cssText=d(t,i);else{var a=document.createTextNode(i),o=e.childNodes;o[t]&&e.removeChild(o[t]),o.length?e.insertBefore(a,o[t]):e.appendChild(a)}}function p(e,t,n){var r=n.css,i=n.media,a=n.sourceMap;if(i?e.setAttribute("media",i):e.removeAttribute("media"),a&&"undefined"!=typeof btoa&&(r+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(a))))," */")),e.styleSheet)e.styleSheet.cssText=r;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(r))}}var v=null,h=0;function m(e,t){var n,r,i;if(t.singleton){var a=h++;n=v||(v=l(t)),r=f.bind(null,n,a,!1),i=f.bind(null,n,a,!0)}else n=l(t),r=p.bind(null,n,t),i=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(n)};return r(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;r(e=t)}else i()}}e.exports=function(e,t){(t=t||{}).singleton||"boolean"==typeof t.singleton||(t.singleton=i());var n=c(e=e||[],t);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var r=0;r<n.length;r++){var i=s(n[r]);o[i].references--}for(var a=c(e,t),l=0;l<n.length;l++){var u=s(n[l]);0===o[u].references&&(o[u].updater(),o.splice(u,1))}n=a}}}},997:(e,t,n)=>{n.r(t),n.d(t,{default:()=>c});const r=(0,n(538).aZ)({name:"MonthlyView",props:["activities","general"],data:function(){return{isOpen:0}}});var i=n(379),a=n.n(i),o=n(626),s={insert:"head",singleton:!1};a()(o.Z,s);o.Z.locals;const c=(0,n(900).Z)(r,(function(){var e=this,t=e._self._c;e._self._setupProxy;return t("div",{staticClass:"columns is-multiline m-1"},e._l(e.activities,(function(n,r){return t("div",{key:r,staticClass:"column is-4"},[t("div",{staticClass:"box"},[t("div",{staticClass:"inner-box"},[t("a",[e._v("\n                    קטגוריה:\n                   "),t("div",{staticClass:"tag is-small is-black"},[t("b",[e._v("\n                          "+e._s(n.type_name)+"\n                      ")])])]),e._v(" "),t("a",[e._v("\n                    סך הוצאות:\n                   "),t("div",{staticClass:"tag is-small is-black"},[t("b",[e._v("\n                           "+e._s(Intl.NumberFormat("he-IL",{style:"currency",currency:"ILS"}).format(n.total_amount))+"\n                       ")])])]),e._v(" "),t("hr"),e._v(" "),t("h6",{staticClass:"subtitle is-6-mobile has-text-centered"},[e._v("\n                    פירוט הוצאות עבור הקטגוריה\n                ")]),e._v(" "),e._l(n.activities,(function(n,r){return t("b-collapse",{key:r,staticClass:"card",attrs:{animation:"slide",open:e.isOpen===r,"aria-id":"contentIdForA11y5-"+r},on:{open:function(t){e.isOpen=r}},scopedSlots:e._u([{key:"trigger",fn:function(i){return[t("div",{staticClass:"card-header",attrs:{role:"button","aria-controls":"contentIdForA11y5-"+r,"aria-expanded":i.open}},[t("p",{staticClass:"card-header-title"},[e._v("\n                                "+e._s(n.amount)+"\n                            ")]),e._v(" "),t("p",{staticClass:"card-header-title"},[e._v("\n                                "+e._s(n.info)+"\n                            ")]),e._v(" "),t("a",{staticClass:"card-header-icon"},[t("b-icon",{attrs:{icon:i.open?"menu-down":"menu-up"}})],1)])]}}],null,!0)})}))],2)])])})),0)}),[],!1,null,"5ce171f2",null).exports},900:(e,t,n)=>{function r(e,t,n,r,i,a,o,s){var c,l="function"==typeof e?e.options:e;if(t&&(l.render=t,l.staticRenderFns=n,l._compiled=!0),r&&(l.functional=!0),a&&(l._scopeId="data-v-"+a),o?(c=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),i&&i.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(o)},l._ssrRegister=c):i&&(c=s?function(){i.call(this,(l.functional?this.parent:this).$root.$options.shadowRoot)}:i),c)if(l.functional){l._injectStyles=c;var u=l.render;l.render=function(e,t){return c.call(t),u(e,t)}}else{var d=l.beforeCreate;l.beforeCreate=d?[].concat(d,c):[c]}return{exports:e,options:l}}n.d(t,{Z:()=>r})}}]);