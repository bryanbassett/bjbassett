/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./mailgo');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//import example-component from './components/ExampleComponent.vue';
var x = Vue.component('modalpopper', require('./components/ExampleComponent.vue').default);
var z = Vue.component('items', require('./components/ItemsComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
var app = new Vue({
    el: '#wrapper',
    components: { 'modalpopper': x },
    methods:{
        update () {

        },
        test () {
            $("a.badge.badge-light").click(function(e) {
                e.preventDefault();
                let g = $(this).attr("href");
                g = g.split("/")[2];
                app.$refs.mp.modalPop('/popEditItem/'+g);

            });
        }
    },
    mounted() {
        this.test();
    },
});
$(window).on('load', function () {
    $('a').tooltip();
});


$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
$(".menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
!function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e():"function"==typeof define&&define.amd?define("lazy-line-painter",[],e):"object"==typeof exports?exports["lazy-line-painter"]=e():t["lazy-line-painter"]=e()}(window,function(){return function(t){var e={};function i(n){if(e[n])return e[n].exports;var s=e[n]={i:n,l:!1,exports:{}};return t[n].call(s.exports,s,s.exports,i),s.l=!0,s.exports}return i.m=t,i.c=e,i.d=function(t,e,n){i.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},i.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var s in t)i.d(n,s,function(e){return t[e]}.bind(null,s));return n},i.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="",i(i.s=2)}([function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var n={easeLinear:function(t){return t},easeInQuad:function(t){return t*t},easeOutQuad:function(t){return t*(2-t)},easeInOutQuad:function(t){return(t*=2)<1?.5*t*t:-.5*(--t*(t-2)-1)},easeInCubic:function(t){return t*t*t},easeOutCubic:function(t){return--t*t*t+1},easeInOutCubic:function(t){return(t*=2)<1?.5*t*t*t:.5*((t-=2)*t*t+2)},easeInQuart:function(t){return t*t*t*t},easeOutQuart:function(t){return 1- --t*t*t*t},easeInOutQuart:function(t){return(t*=2)<1?.5*t*t*t*t:-.5*((t-=2)*t*t*t-2)},easeInQuint:function(t){return t*t*t*t*t},easeOutQuint:function(t){return--t*t*t*t*t+1},easeInOutQuint:function(t){return(t*=2)<1?.5*t*t*t*t*t:.5*((t-=2)*t*t*t*t+2)},easeInSine:function(t){return 1-Math.cos(t*Math.PI/2)},easeOutSine:function(t){return Math.sin(t*Math.PI/2)},easeInOutSine:function(t){return.5*(1-Math.cos(Math.PI*t))},easeInExpo:function(t){return 0===t?0:Math.pow(1024,t-1)},easeOutExpo:function(t){return 1===t?t:1-Math.pow(2,-10*t)},easeInOutExpo:function(t){return 0===t?0:1===t?1:(t*=2)<1?.5*Math.pow(1024,t-1):.5*(2-Math.pow(2,-10*(t-1)))},easeInCirc:function(t){return 1-Math.sqrt(1-t*t)},easeOutCirc:function(t){return Math.sqrt(1- --t*t)},easeInOutCirc:function(t){return(t*=2)<1?-.5*(Math.sqrt(1-t*t)-1):.5*(Math.sqrt(1-(t-=2)*t)+1)},easeInBounce:function(t){return 1-this.easeOutBounce(1-t)},easeOutBounce:function(t){return t<1/2.75?7.5625*t*t:t<2/2.75?7.5625*(t-=1.5/2.75)*t+.75:t<2.5/2.75?7.5625*(t-=2.25/2.75)*t+.9375:7.5625*(t-=2.625/2.75)*t+.984375},easeInOutBounce:function(t){return t<.5?.5*this.easeInBounce(2*t):.5*this.easeOutBounce(2*t-1)+.5}};e.default=n,t.exports=e.default},function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var n={on:function(t,e){this._eventEmitterCallbacks=this._eventEmitterCallbacks||{},this._eventEmitterCallbacks[t]=this._eventEmitterCallbacks[t]||[],this._eventEmitterCallbacks[t].push(e)}};n.addListener=n.on,n.off=function(t,e){if(this._eventEmitterCallbacks=this._eventEmitterCallbacks||{},t in this._eventEmitterCallbacks){var i=this._eventEmitterCallbacks[t].indexOf(e);i<0||this._eventEmitterCallbacks[t].splice(i,1)}},n.removeListener=n.off,n.emit=function(t,e){if(this._eventEmitterCallbacks=this._eventEmitterCallbacks||{},t in this._eventEmitterCallbacks){var i=!0,n=!1,s=void 0;try{for(var r,a=this._eventEmitterCallbacks[t][Symbol.iterator]();!(i=(r=a.next()).done);i=!0){var o=r.value;if("function"!=typeof o)return;o(e)}}catch(t){n=!0,s=t}finally{try{i||null==a.return||a.return()}finally{if(n)throw s}}}},n.trigger=n.emit;var s=n;e.default=s,t.exports=e.default},function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var n=r(i(1)),s=r(i(0));function r(t){return t&&t.__esModule?t:{default:t}}function a(t,e){for(var i=0;i<e.length;i++){var n=e[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(t,n.key,n)}}var o=function(){function t(e,i){var s=this;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),function(t,e,i){e in t?Object.defineProperty(t,e,{value:i,enumerable:!0,configurable:!0,writable:!0}):t[e]=i}(this,"_onVisibilityChange",function(){document.hidden?s.pause():s.resume()}),this.el=e,this.el.classList.add("lazy-line-painter"),this.config=Object.assign({strokeWidth:null,strokeDash:null,strokeColor:null,strokeOverColor:null,strokeCap:null,strokeJoin:null,strokeOpacity:null,delay:0,ease:null,drawSequential:!1,speedMultiplier:1,reverse:!1,paused:!1,progress:0,repeat:0,longestDuration:0,log:!0,offset:this.el.getBoundingClientRect()},i,{}),Object.assign(this,n.default,{}),this.__raf=null,this.__paths=[],this._generatePaths(),this._parseDataAttrs(),this._updateDuration(),this._setupPaths(),document.addEventListener("visibilitychange",this._onVisibilityChange)}return function(t,e,i){e&&a(t.prototype,e),i&&a(t,i)}(t,[{key:"_generatePaths",value:function(){var t;t=Boolean(this.el.dataset.llpComposed)?this.el.querySelectorAll("[data-llp-id]"):this._uncomposed();for(var e=0;e<t.length;e++){var i={el:t[e]};this.__paths.push(i)}}},{key:"_uncomposed",value:function(){var t,e=this.el.querySelectorAll("path, polygon, circle, ellipse, polyline, line, rect");for(t=0;t<e.length;t++){var i=this.el.id.replace(/ /g,"");i=(i=i.replace(".","")).replace("-",""),e[t].dataset.llpId=i+"-"+t,e[t].dataset.llpDuration||(e[t].dataset.llpDuration=1e3),e[t].dataset.llpDuration||(e[t].dataset.llpDelay=0)}return this.config.log&&console.log(""),e}},{key:"paint",value:function(t){Object.assign(this.config,t),this._updateDuration(),this.erase(),this._paint(),this.emit("start")}},{key:"pause",value:function(){this.config&&(this.config.paused=!0),cancelAnimationFrame(this.__raf),this.emit("pause")}},{key:"resume",value:function(){var t=this;this.config&&this.config.paused&&(requestAnimationFrame(function(){t.adjustStartTime()}),this.config.paused=!1,this.emit("resume"))}},{key:"erase",value:function(){this.config.startTime=null,this.config.elapsedTime=null,cancelAnimationFrame(this.__raf),this.config.onStrokeCompleteDone=!1,this.config.paused=!1;for(var t=0;t<this.__paths.length;t++){var e=this.__paths[t];e.el.style.strokeDashoffset=e.length,e.onStrokeCompleteDone=!1,e.onStrokeStartDone=!1}this.emit("erase")}},{key:"destroy",value:function(){this.config=null,this.el.remove(),this.el=null}},{key:"set",value:function(t,e){switch(t){case"progress":this._setProgress(e);break;case"delay":this._setDelay(e);break;case"reverse":this._setReverse(e);break;case"ease":this._setEase(e);break;case"repeat":this._setRepeat(e);break;default:this.config.log&&console.log("property "+t+" can not be set")}}},{key:"_setRepeat",value:function(t){this.config.repeat=t}},{key:"_setEase",value:function(t){this.config.ease=t}},{key:"_setProgress",value:function(t){this.pause(),this.config.progress=this._getProgress(t,this.config.ease),this._updatePaths(),this.config.elapsedTime=this.config.progress*this.config.totalDuration}},{key:"_setDelay",value:function(t){this.config.delay=t,this._updateDuration()}},{key:"_setReverse",value:function(t){this.config.reverse=t,this._updateDuration()}},{key:"_updateDuration",value:function(){var t=this._getTotalDuration(),e=this._getLongestDuration();this.config.totalDuration=this.config.drawSequential?t:e,this.config.totalDuration+=this.config.delay,this._calcPathDurations()}},{key:"_calcPathDurations",value:function(){for(var t=0;t<this.__paths.length;t++){var e=this.__paths[t],i=void 0;e.progress=0,i=this.config.reverse?this.config.drawSequential?0:this.config.totalDuration-(e.delay+e.duration):this.config.drawSequential?0:this.config.delay+e.delay,e.startTime=i,e.startProgress=e.startTime/this.config.totalDuration,e.durationProgress=e.duration/this.config.totalDuration}}},{key:"get",value:function(){return this.config}},{key:"resize",value:function(){this.config.offset=this.el.getBoundingClientRect();for(var t=0;t<this.__paths.length;t++){var e=this.__paths[t];e.el.getBoundingClientRect(),e.positions=this._getPathPoints(e.el,e.length),this._updatePosition(e)}}},{key:"_parseDataAttrs",value:function(){for(var t=0;t<this.__paths.length;t++){var e=this.__paths[t];e.id=e.el.dataset.llpId,e.delay=Number(e.el.dataset.llpDelay)||0,e.duration=Number(e.el.dataset.llpDuration)||0,e.reverse=Boolean(e.el.dataset.llpReverse)||!1,e.ease=Number(e.el.dataset.llpEase)||null,e.strokeDash=e.el.dataset.llpStrokeDash||null,e.delay*=this.config.speedMultiplier,e.duration*=this.config.speedMultiplier,this._setStyleAttrs(e)}}},{key:"_setStyleAttrs",value:function(t){t.strokeColor=t.el.dataset.llpStrokeColor||this.config.strokeColor,t.strokeColor&&(t.el.style.stroke=t.strokeColor),t.strokeOpacity=t.el.dataset.llpStrokeOpacity||this.config.strokeOpacity,t.strokeOpacity&&(t.el.style.strokeOpacity=t.strokeOpacity),t.strokeWidth=t.el.dataset.llpStrokeWidth||this.config.strokeWidth,t.strokeWidth&&(t.el.style.strokeWidth=t.strokeWidth),t.strokeCap=t.el.dataset.llpStrokeCap||this.config.strokeCap,t.strokeCap&&(t.el.style.strokeLinecap=t.strokeCap),t.strokeJoin=t.el.dataset.llpStrokeJoin||this.config.strokeJoin,t.strokeJoin&&(t.el.style.strokeLinejoin=t.strokeJoin)}},{key:"_setupPaths",value:function(){for(var t=0;t<this.__paths.length;t++){var e=this.__paths[t];e.index=t,e.length=this._getPathLength(e.el),e.positions=this._getPathPoints(e.el,e.length),e.el.style.strokeDasharray=this._getStrokeDashArray(e,e.length),e.el.style.strokeDashoffset=e.length,e.onStrokeStartDone=!1,e.onStrokeCompleteDone=!1}}},{key:"adjustStartTime",value:function(){var t=this,e=performance.now();this.config.startTime=e-this.config.elapsedTime,requestAnimationFrame(function(){t._paint()})}},{key:"_paint",value:function(){var t=this;if(this.config){this.config.startTime||(this.config.startTime=performance.now()),this.emit("update");var e=performance.now();this.config.elapsedTime=e-this.config.startTime,this.config.linearProgress=this.config.elapsedTime/this.config.totalDuration,this.config.progress=this._getProgress(this.config.linearProgress,this.config.ease),this._updatePaths(),this.config.linearProgress>=0&&this.config.linearProgress<=1?this.__raf=requestAnimationFrame(function(){t._paint()}):this.config.repeat>0?(this.config.repeat--,this.paint()):-1===this.config.repeat?this.paint():this.emit("complete")}}},{key:"_updatePaths",value:function(){for(var t=0;t<this.__paths.length;t++){var e=this.__paths[t],i=this._getElapsedProgress(e);e.progress=this._getProgress(i,e.ease),this._setLine(e),this._updatePosition(e),this._updateStrokeCallbacks(e)}}},{key:"_getElapsedProgress",value:function(t){var e;return this.config.progress>=t.startProgress&&this.config.progress<=t.startProgress+t.durationProgress?e=(this.config.progress-t.startProgress)/t.durationProgress:this.config.progress>=t.startProgress+t.durationProgress?e=1:this.config.progress<=t.startProgress&&(e=0),e}},{key:"_getProgress",value:function(t,e){var i=t;return e&&(i=s.default[e](t)),i}},{key:"_setLine",value:function(t){var e=t.el,i=t.progress*t.length;t.reverse?e.style.strokeDashoffset=-t.length+i:this.config.reverse?e.style.strokeDashoffset=-t.length+i:e.style.strokeDashoffset=t.length-i}},{key:"_updateStrokeCallbacks",value:function(t){1===t.progress?t.onStrokeCompleteDone||(t.onStrokeCompleteDone=!0,this.emit("complete:"+t.id,t),this.emit("complete:all",t)):t.progress>1e-5&&(t.onStrokeStartDone||(this.emit("start:"+t.id,t),this.emit("start:all",t),t.onStrokeStartDone=!0),this.emit("update:"+t.id,t),this.emit("update:all",t))}},{key:"_updatePosition",value:function(t){var e=Math.round(t.progress*(t.length-1)),i=t.positions[e];i&&(t.position={x:this.config.offset.left+i.x,y:this.config.offset.top+i.y})}},{key:"_getTotalDuration",value:function(){for(var t=0,e=this.__paths,i=0;i<e.length;i++){var n=e[i].delay||0;t+=e[i].duration+n}return t}},{key:"_getLongestDuration",value:function(){for(var t=0,e=this.__paths,i=0;i<e.length;i++){var n=e[i].delay+e[i].duration;n>t&&(t=n)}return t}},{key:"_getPathLength",value:function(t){return this._getTotalLength(t)}},{key:"_getDistance",value:function(t,e){return Math.sqrt(Math.pow(e.x-t.x,2)+Math.pow(e.y-t.y,2))}},{key:"_getCircleLength",value:function(t){return 2*Math.PI*t.getAttribute("r")}},{key:"_getEllipseLength",value:function(t){var e=parseInt(t.getAttribute("rx"),1),i=parseInt(t.getAttribute("ry"),1),n=Math.pow(e-i,2)/Math.pow(e+i,2);return Math.PI*(e+i)*(1+3*n/Math.sqrt(4-3*n))}},{key:"_getRectLength",value:function(t){return 2*t.getAttribute("width")+2*t.getAttribute("height")}},{key:"_getLineLength",value:function(t){return this._getDistance({x:t.getAttribute("x1"),y:t.getAttribute("y1")},{x:t.getAttribute("x2"),y:t.getAttribute("y2")})}},{key:"_getPolylineLength",value:function(t){for(var e,i=t.points,n=0,s=0;s<i.numberOfItems;s++){var r=i.getItem(s);s>0&&(n+=this._getDistance(e,r)),e=r}return n}},{key:"_getPolygonLength",value:function(t){var e=t.points;return this._getPolylineLength(t)+this._getDistance(e.getItem(e.numberOfItems-1),e.getItem(0))}},{key:"_getTotalLength",value:function(t){var e;switch(t.tagName.toLowerCase()){case"circle":e=this._getCircleLength(t);break;case"rect":e=this._getRectLength(t);break;case"line":e=this._getLineLength(t);break;case"polyline":e=this._getPolylineLength(t);break;case"polygon":e=this._getPolygonLength(t);break;default:e=t.getTotalLength()}return e}},{key:"_getPathPoints",value:function(t,e){for(var i=[],n=0;n<e;n++){var s=t.getPointAtLength(n);i.push({x:s.x,y:s.y})}return i}},{key:"_getStrokeDashArray",value:function(t,e){return t.strokeDash?this._getStrokeDashString(t.strokeDash,e):this.config.strokeDash?this._getStrokeDashString(this.config.strokeDash,e):e+" "+e}},{key:"_getStrokeDashString",value:function(t,e){for(var i,n,s="",r=t.split(","),a=0,o=r.length-1;o>=0;o--)a+=Number(r[o]);n=e-(i=Math.floor(e/a))*a;for(var l=0;l<i;l++)s+=t+", ";return(s+n+", "+(e+2)).split(",").join("px,")+"px"}}]),t}();window.LazyLinePainter=o;var l=o;e.default=l,t.exports=e.default}])});

$(function(ready){
    if ($('#category').length) {
        $("#category").change(function(){
            $('.itemForm').html('');
            $.ajax({
                url: "/field/get_by_category?cat_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('.itemForm').html(data.html);
                }
            });
        });
    }
    if ($('#visibility').length) {
        $("#visibility").change(function(){
            $.ajax({
                url: "/setting/change?setting_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    location.reload();
                }
            });
        });
    }


});
(function(){

    document.onreadystatechange = () => {

        if (document.readyState === 'complete' && $('#bjb').length) {
            let el = document.querySelector('#bjb');
            let myAnimation = new LazyLinePainter(el, {"ease":"easeLinear","duration":2000,"strokeWidth":1.2,"strokeOpacity":1,"strokeColor":"#C0382B","strokeCap":"square","delay":2850});
            myAnimation.paint();
        }
    }

})();
