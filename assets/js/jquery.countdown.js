!function(e){e.JQPlugin.createPlugin({name:"countdown",defaultOptions:{until:null,since:null,timezone:null,serverSync:null,format:"dHMS",layout:"",compact:!1,padZeroes:!1,significant:0,description:"",expiryUrl:"",expiryText:"",alwaysExpire:!1,onExpiry:null,onTick:null,tickInterval:1},regionalOptions:{"":{labels:["Years","Months","Weeks","Days","Hours","Minutes","Seconds"],labels1:["Year","Month","Week","Day","Hour","Minute","Second"],compactLabels:["y","m","w","d"],whichLabels:null,digits:["0","1","2","3","4","5","6","7","8","9"],timeSeparator:":",isRTL:!1}},_getters:["getTimes"],_rtlClass:"countdown-rtl",_sectionClass:"countdown-section",_amountClass:"countdown-amount",_periodClass:"countdown-period",_rowClass:"countdown-row",_holdingClass:"countdown-holding",_showClass:"countdown-show",_descrClass:"countdown-descr",_timerElems:[],_init:function(){var t=this;this._super(),this._serverSyncs=[];var i="function"==typeof Date.now?Date.now:function(){return(new Date).getTime()},n=window.performance&&"function"==typeof window.performance.now;var s=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||null,o=0;!s||e.noRequestAnimationFrame?(e.noRequestAnimationFrame=null,setInterval(function(){t._updateElems()},980)):(o=window.animationStartTime||window.webkitAnimationStartTime||window.mozAnimationStartTime||window.oAnimationStartTime||window.msAnimationStartTime||i(),s(function e(a){var r=a<1e12?n?performance.now()+performance.timing.navigationStart:i():a||i();r-o>=1e3&&(t._updateElems(),o=r),s(e)}))},UTCDate:function(e,t,i,n,s,o,a,r){"object"==typeof t&&t.constructor==Date&&(r=t.getMilliseconds(),a=t.getSeconds(),o=t.getMinutes(),s=t.getHours(),n=t.getDate(),i=t.getMonth(),t=t.getFullYear());var l=new Date;return l.setUTCFullYear(t),l.setUTCDate(1),l.setUTCMonth(i||0),l.setUTCDate(n||1),l.setUTCHours(s||0),l.setUTCMinutes((o||0)-(Math.abs(e)<30?60*e:e)),l.setUTCSeconds(a||0),l.setUTCMilliseconds(r||0),l},periodsToSeconds:function(e){return 31557600*e[0]+2629800*e[1]+604800*e[2]+86400*e[3]+3600*e[4]+60*e[5]+e[6]},_instSettings:function(e,t){return{_periods:[0,0,0,0,0,0,0]}},_addElem:function(e){this._hasElem(e)||this._timerElems.push(e)},_hasElem:function(t){return e.inArray(t,this._timerElems)>-1},_removeElem:function(t){this._timerElems=e.map(this._timerElems,function(e){return e==t?null:e})},_updateElems:function(){for(var e=this._timerElems.length-1;e>=0;e--)this._updateCountdown(this._timerElems[e])},_optionsChanged:function(t,i,n){n.layout&&(n.layout=n.layout.replace(/&lt;/g,"<").replace(/&gt;/g,">")),this._resetExtraLabels(i.options,n);var s=i.options.timezone!=n.timezone;e.extend(i.options,n),this._adjustSettings(t,i,null!=n.until||null!=n.since||s);var o=new Date;(i._since&&i._since<o||i._until&&i._until>o)&&this._addElem(t[0]),this._updateCountdown(t,i)},_updateCountdown:function(t,i){if(t=t.jquery?t:e(t),i=i||this._getInst(t)){if(t.html(this._generateHTML(i)).toggleClass(this._rtlClass,i.options.isRTL),e.isFunction(i.options.onTick)){var n="lap"!=i._hold?i._periods:this._calculatePeriods(i,i._show,i.options.significant,new Date);1!=i.options.tickInterval&&this.periodsToSeconds(n)%i.options.tickInterval!=0||i.options.onTick.apply(t[0],[n])}if("pause"!=i._hold&&(i._since?i._now.getTime()<i._since.getTime():i._now.getTime()>=i._until.getTime())&&!i._expiring){if(i._expiring=!0,this._hasElem(t[0])||i.options.alwaysExpire){if(this._removeElem(t[0]),e.isFunction(i.options.onExpiry)&&i.options.onExpiry.apply(t[0],[]),i.options.expiryText){var s=i.options.layout;i.options.layout=i.options.expiryText,this._updateCountdown(t[0],i),i.options.layout=s}i.options.expiryUrl&&(window.location=i.options.expiryUrl)}i._expiring=!1}else"pause"==i._hold&&this._removeElem(t[0])}},_resetExtraLabels:function(e,t){for(var i in t)i.match(/[Ll]abels[02-9]|compactLabels1/)&&(e[i]=t[i]);for(var i in e)i.match(/[Ll]abels[02-9]|compactLabels1/)&&void 0===t[i]&&(e[i]=null)},_adjustSettings:function(t,i,n){for(var s,o=0,a=null,r=0;r<this._serverSyncs.length;r++)if(this._serverSyncs[r][0]==i.options.serverSync){a=this._serverSyncs[r][1];break}if(null!=a)o=i.options.serverSync?a:0,s=new Date;else{var l=e.isFunction(i.options.serverSync)?i.options.serverSync.apply(t[0],[]):null;s=new Date,o=l?s.getTime()-l.getTime():0,this._serverSyncs.push([i.options.serverSync,o])}var _=i.options.timezone;_=null==_?-s.getTimezoneOffset():_,(n||!n&&null==i._until&&null==i._since)&&(i._since=i.options.since,null!=i._since&&(i._since=this.UTCDate(_,this._determineTime(i._since,null)),i._since&&o&&i._since.setMilliseconds(i._since.getMilliseconds()+o)),i._until=this.UTCDate(_,this._determineTime(i.options.until,s)),o&&i._until.setMilliseconds(i._until.getMilliseconds()+o)),i._show=this._determineShow(i)},_preDestroy:function(e,t){this._removeElem(e[0]),e.empty()},pause:function(e){this._hold(e,"pause")},lap:function(e){this._hold(e,"lap")},resume:function(e){this._hold(e,null)},toggle:function(t){this[(e.data(t,this.name)||{})._hold?"resume":"pause"](t)},toggleLap:function(t){this[(e.data(t,this.name)||{})._hold?"resume":"lap"](t)},_hold:function(t,i){var n=e.data(t,this.name);if(n){if("pause"==n._hold&&!i){n._periods=n._savePeriods;var s=n._since?"-":"+";n[n._since?"_since":"_until"]=this._determineTime(s+n._periods[0]+"y"+s+n._periods[1]+"o"+s+n._periods[2]+"w"+s+n._periods[3]+"d"+s+n._periods[4]+"h"+s+n._periods[5]+"m"+s+n._periods[6]+"s"),this._addElem(t)}n._hold=i,n._savePeriods="pause"==i?n._periods:null,e.data(t,this.name,n),this._updateCountdown(t,n)}},getTimes:function(t){var i=e.data(t,this.name);return i?"pause"==i._hold?i._savePeriods:i._hold?this._calculatePeriods(i,i._show,i.options.significant,new Date):i._periods:null},_determineTime:function(e,t){var i=this,n=null==e?t:"string"==typeof e?function(e){e=e.toLowerCase();for(var t=new Date,n=t.getFullYear(),s=t.getMonth(),o=t.getDate(),a=t.getHours(),r=t.getMinutes(),l=t.getSeconds(),_=/([+-]?[0-9]+)\s*(s|m|h|d|w|o|y)?/g,p=_.exec(e);p;){switch(p[2]||"s"){case"s":l+=parseInt(p[1],10);break;case"m":r+=parseInt(p[1],10);break;case"h":a+=parseInt(p[1],10);break;case"d":o+=parseInt(p[1],10);break;case"w":o+=7*parseInt(p[1],10);break;case"o":s+=parseInt(p[1],10),o=Math.min(o,i._getDaysInMonth(n,s));break;case"y":n+=parseInt(p[1],10),o=Math.min(o,i._getDaysInMonth(n,s))}p=_.exec(e)}return new Date(n,s,o,a,r,l,0)}(e):"number"==typeof e?function(e){var t=new Date;return t.setTime(t.getTime()+1e3*e),t}(e):e;return n&&n.setMilliseconds(0),n},_getDaysInMonth:function(e,t){return 32-new Date(e,t,32).getDate()},_normalLabels:function(e){return e},_generateHTML:function(t){var i=this;t._periods=t._hold?t._periods:this._calculatePeriods(t,t._show,t.options.significant,new Date);for(var n=!1,s=0,o=t.options.significant,a=e.extend({},t._show),r=0;r<=6;r++)n|="?"==t._show[r]&&t._periods[r]>0,a[r]="?"!=t._show[r]||n?t._show[r]:null,s+=a[r]?1:0,o-=t._periods[r]>0?1:0;var l=[!1,!1,!1,!1,!1,!1,!1];for(r=6;r>=0;r--)t._show[r]&&(t._periods[r]?l[r]=!0:(l[r]=o>0,o--));var _=t.options.compact?t.options.compactLabels:t.options.labels,p=t.options.whichLabels||this._normalLabels,u=function(e){var n=t.options["compactLabels"+p(t._periods[e])];return a[e]?i._translateDigits(t,t._periods[e])+(n?n[e]:_[e])+" ":""},c=t.options.padZeroes?2:1,d=function(e){var n=t.options["labels"+p(t._periods[e])];return!t.options.significant&&a[e]||t.options.significant&&l[e]?'<span class="'+i._sectionClass+'"><span class="'+i._amountClass+'">'+i._minDigits(t,t._periods[e],c)+'</span><span class="'+i._periodClass+'">'+(n?n[e]:_[e])+"</span></span>":""};return t.options.layout?this._buildLayout(t,a,t.options.layout,t.options.compact,t.options.significant,l):(t.options.compact?'<span class="'+this._rowClass+" "+this._amountClass+(t._hold?" "+this._holdingClass:"")+'">'+u(0)+u(1)+u(2)+u(3)+(a[4]?this._minDigits(t,t._periods[4],2):"")+(a[5]?(a[4]?t.options.timeSeparator:"")+this._minDigits(t,t._periods[5],2):"")+(a[6]?(a[4]||a[5]?t.options.timeSeparator:"")+this._minDigits(t,t._periods[6],2):""):'<span class="'+this._rowClass+" "+this._showClass+(t.options.significant||s)+(t._hold?" "+this._holdingClass:"")+'">'+d(0)+d(1)+d(2)+d(3)+d(4)+d(5)+d(6))+"</span>"+(t.options.description?'<span class="'+this._rowClass+" "+this._descrClass+'">'+t.options.description+"</span>":"")},_buildLayout:function(t,i,n,s,o,a){for(var r=t.options[s?"compactLabels":"labels"],l=t.options.whichLabels||this._normalLabels,_=function(e){return(t.options[(s?"compactLabels":"labels")+l(t._periods[e])]||r)[e]},p=function(e,i){return t.options.digits[Math.floor(e/i)%10]},u={desc:t.options.description,sep:t.options.timeSeparator,yl:_(0),yn:this._minDigits(t,t._periods[0],1),ynn:this._minDigits(t,t._periods[0],2),ynnn:this._minDigits(t,t._periods[0],3),y1:p(t._periods[0],1),y10:p(t._periods[0],10),y100:p(t._periods[0],100),y1000:p(t._periods[0],1e3),ol:_(1),on:this._minDigits(t,t._periods[1],1),onn:this._minDigits(t,t._periods[1],2),onnn:this._minDigits(t,t._periods[1],3),o1:p(t._periods[1],1),o10:p(t._periods[1],10),o100:p(t._periods[1],100),o1000:p(t._periods[1],1e3),wl:_(2),wn:this._minDigits(t,t._periods[2],1),wnn:this._minDigits(t,t._periods[2],2),wnnn:this._minDigits(t,t._periods[2],3),w1:p(t._periods[2],1),w10:p(t._periods[2],10),w100:p(t._periods[2],100),w1000:p(t._periods[2],1e3),dl:_(3),dn:this._minDigits(t,t._periods[3],1),dnn:this._minDigits(t,t._periods[3],2),dnnn:this._minDigits(t,t._periods[3],3),d1:p(t._periods[3],1),d10:p(t._periods[3],10),d100:p(t._periods[3],100),d1000:p(t._periods[3],1e3),hl:_(4),hn:this._minDigits(t,t._periods[4],1),hnn:this._minDigits(t,t._periods[4],2),hnnn:this._minDigits(t,t._periods[4],3),h1:p(t._periods[4],1),h10:p(t._periods[4],10),h100:p(t._periods[4],100),h1000:p(t._periods[4],1e3),ml:_(5),mn:this._minDigits(t,t._periods[5],1),mnn:this._minDigits(t,t._periods[5],2),mnnn:this._minDigits(t,t._periods[5],3),m1:p(t._periods[5],1),m10:p(t._periods[5],10),m100:p(t._periods[5],100),m1000:p(t._periods[5],1e3),sl:_(6),sn:this._minDigits(t,t._periods[6],1),snn:this._minDigits(t,t._periods[6],2),snnn:this._minDigits(t,t._periods[6],3),s1:p(t._periods[6],1),s10:p(t._periods[6],10),s100:p(t._periods[6],100),s1000:p(t._periods[6],1e3)},c=n,d=0;d<=6;d++){var h="yowdhms".charAt(d),m=new RegExp("\\{"+h+"<\\}([\\s\\S]*)\\{"+h+">\\}","g");c=c.replace(m,!o&&i[d]||o&&a[d]?"$1":"")}return e.each(u,function(e,t){var i=new RegExp("\\{"+e+"\\}","g");c=c.replace(i,t)}),c},_minDigits:function(e,t,i){return(t=""+t).length>=i?this._translateDigits(e,t):(t="0000000000"+t,this._translateDigits(e,t.substr(t.length-i)))},_translateDigits:function(e,t){return(""+t).replace(/[0-9]/g,function(t){return e.options.digits[t]})},_determineShow:function(e){var t=e.options.format,i=[];return i[0]=t.match("y")?"?":t.match("Y")?"!":null,i[1]=t.match("o")?"?":t.match("O")?"!":null,i[2]=t.match("w")?"?":t.match("W")?"!":null,i[3]=t.match("d")?"?":t.match("D")?"!":null,i[4]=t.match("h")?"?":t.match("H")?"!":null,i[5]=t.match("m")?"?":t.match("M")?"!":null,i[6]=t.match("s")?"?":t.match("S")?"!":null,i},_calculatePeriods:function(e,t,i,n){e._now=n,e._now.setMilliseconds(0);var s=new Date(e._now.getTime());e._since?n.getTime()<e._since.getTime()?e._now=n=s:n=e._since:(s.setTime(e._until.getTime()),n.getTime()>e._until.getTime()&&(e._now=n=s));var o=[0,0,0,0,0,0,0];if(t[0]||t[1]){var a=this._getDaysInMonth(n.getFullYear(),n.getMonth()),r=this._getDaysInMonth(s.getFullYear(),s.getMonth()),l=s.getDate()==n.getDate()||s.getDate()>=Math.min(a,r)&&n.getDate()>=Math.min(a,r),_=function(e){return 60*(60*e.getHours()+e.getMinutes())+e.getSeconds()},p=Math.max(0,12*(s.getFullYear()-n.getFullYear())+s.getMonth()-n.getMonth()+(s.getDate()<n.getDate()&&!l||l&&_(s)<_(n)?-1:0));o[0]=t[0]?Math.floor(p/12):0,o[1]=t[1]?p-12*o[0]:0;var u=(n=new Date(n.getTime())).getDate()==a,c=this._getDaysInMonth(n.getFullYear()+o[0],n.getMonth()+o[1]);n.getDate()>c&&n.setDate(c),n.setFullYear(n.getFullYear()+o[0]),n.setMonth(n.getMonth()+o[1]),u&&n.setDate(c)}var d=Math.floor((s.getTime()-n.getTime())/1e3),h=function(e,i){o[e]=t[e]?Math.floor(d/i):0,d-=o[e]*i};if(h(2,604800),h(3,86400),h(4,3600),h(5,60),h(6,1),d>0&&!e._since)for(var m=[1,12,4.3482,7,24,60,60],g=6,w=1,f=6;f>=0;f--)t[f]&&(o[g]>=w&&(o[g]=0,d=1),d>0&&(o[f]++,d=0,g=f,w=1)),w*=m[f];if(i)for(f=0;f<=6;f++)i&&o[f]?i--:i||(o[f]=0);return o}})}(jQuery);