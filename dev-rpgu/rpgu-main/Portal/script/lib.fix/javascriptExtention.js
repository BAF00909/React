(function(){var window=this||(0,eval)('this');var String=window.String;String.prototype.format=String.prototype.printf=function(){var args=arguments;return this.replace(/\{\{|\}\}|\{(\d+)\}/g,function(m,n){if(m==="{{"){return"{";}if(m==="}}"){return"}";}return args[n];});};String.prototype.replaceNewLinesToBr=function(){return this.replace(/(?:\r\n|\r|\n)/g,'<br>');};if(!String.prototype.contains){String.prototype.contains=function(){return String.prototype.indexOf.apply(this,arguments)!==-1;};}if(typeof String.prototype.startsWith!='function'){String.prototype.startsWith=function(str){return this.slice(0,str.length)===str;};}if(typeof String.prototype.endsWith!='function'){String.prototype.endsWith=function(str){return this.slice(-str.length)===str;};}var Array=window.Array;Array.prototype.removeByValue=function(val){for(var i=0;i<this.length;i++){if(this[i]===val){this.splice(i,1);i--;}}return this;};if(typeof window.define==="function"&&window.define.amd){window.define('javascriptExtention',[],function(){return window;});}}());