/**
 * ----------------------------------------------------------------------
 * Copyright (C) 2008 by Khaled Al-Shamaa.
 * http://www.ar-php.org
 * ----------------------------------------------------------------------
 * LICENSE

 * This program is open source product; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License (GPL)
 * as published by the Free Software Foundation; either version 3
 * of the License, or (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * To read the license please visit http://www.gnu.org/copyleft/gpl.html
 * ----------------------------------------------------------------------
 * Filename: editor_plugin.js
 * Original  Author(s): Khaled Al-Sham'aa <khaled.alshamaa@gmail.com>
 * Purpose:  ArPHP TinyMCE plugin
 * ----------------------------------------------------------------------
 */

(function() {
	tinymce.create('tinymce.plugins.ArabicPlugin', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
			var t = this;

			t.url = url;
			t.editor = ed;
    
			///////////////////////////////////////////////////////////
      // Register the command so that it can be invoked by using 
      // tinyMCE.activeEditor.execCommand('mceArDate');
			ed.addCommand('mceArDate', function() {
          _sndInsertReq('date');
			});

			// Register ardate button
			ed.addButton('ardate', {
				title : 'Insert date in Arabic',
				cmd : 'mceArDate',
				image : url + '/img/a_calendar.gif'
			});
    
			///////////////////////////////////////////////////////////
			// Register the command so that it can be invoked by using 
      // tinyMCE.activeEditor.execCommand('mceHijri');
			ed.addCommand('mceHijri', function() {
          _sndInsertReq('hijri');
			});

			// Register hijri button
			ed.addButton('hijri', {
				title : 'Insert Hijri date',
				cmd : 'mceHijri',
				image : url + '/img/h_calendar.gif'
			});
    
			///////////////////////////////////////////////////////////
			// Register the command so that it can be invoked by using 
      // tinyMCE.activeEditor.execCommand('mceArNumber');
			ed.addCommand('mceArNumber', function() {
          _sndReplaceReq('number', t.editor.selection.getContent({format : 'text'}));
			});

			// Register arnumber button
			ed.addButton('arnumber', {
				title : 'Spell numbers in Arabic idiom',
				cmd : 'mceArNumber',
				image : url + '/img/numbers.gif'
			});
    
			///////////////////////////////////////////////////////////
			// Register the command so that it can be invoked by using 
      // tinyMCE.activeEditor.execCommand('mceArKeyboard');
			ed.addCommand('mceArKeyboard', function() {
          _sndReplaceReq('keyboard', t.editor.selection.getContent({format : 'text'}));
			});

			// Register arkeyboard button
			ed.addButton('arkeyboard', {
				title : 'Convert keyboard language',
				cmd : 'mceArKeyboard',
				image : url + '/img/keyboard.gif'
			});
    
			///////////////////////////////////////////////////////////
			// Register the command so that it can be invoked by using 
      // tinyMCE.activeEditor.execCommand('mceEnTerms');
			ed.addCommand('mceEnTerms', function() {
          _sndReplaceReq('en_terms', t.editor.selection.getContent({format : 'text'}));
			});

			// Register enterms button
			ed.addButton('enterms', {
				title : 'Transliterate English words in Arabic',
				cmd : 'mceEnTerms',
				image : url + '/img/terms.gif'
			});

			///////////////////////////////////////////////////////////
			// Register the command so that it can be invoked by using 
      // tinyMCE.activeEditor.execCommand('mceArStandard');
			ed.addCommand('mceArStandard', function() {
          _sndReplaceReq('standard', t.editor.selection.getContent({format : 'text'}));
			});

			// Register arnumber button
			ed.addButton('arstandard', {
				title : 'Standarize Arabic text',
				cmd : 'mceArStandard',
				image : url + '/img/ruler.gif'
			});
    
		
  		// Internal functions
      function _createRequestObject() {
          var ro;
          var browser = navigator.appName;
          if(browser == "Microsoft Internet Explorer"){
              ro = new ActiveXObject("Microsoft.XMLHTTP");
          }else{
              ro = new XMLHttpRequest();
          }
          return ro;
      }
      
      var http = _createRequestObject();
      var err = '<br /><center><b><font color=red size=3 face="Times">ArPHP plugin needs PHP</font></b>';
      err = err + '<br /><font size=2 face="Verdana">For more information please visit <br />';
      err = err + '<a href="http://www.ar-php.org/tinymce.php">http://www.ar-php.org/tinymce.php</a>';
      err = err + '</font></center><br />';
            
      function _sndReplaceReq(action, param) {
          http.open('get', url + '/rpc.php?action='+action+'&param='+param);
          http.onreadystatechange = _handleReplaceResponse;
          http.send(null);
      }
      
      function _handleReplaceResponse() {
          if(http.readyState == 4){
              var response = http.responseText;

              if (response.substring(0,5) != '<?php') {
                  t.editor.execCommand('mceReplaceContent',false,response);
              }else{
                  t.editor.execCommand('mceInsertContent',false,err);                  
              }
          }
      }
      
      function _sndInsertReq(action) {
          http.open('get', url + '/rpc.php?action='+action);
          http.onreadystatechange = _handleInsertResponse;
          http.send(null);
      }
      
      function _handleInsertResponse() {
          if(http.readyState == 4){
              var response = http.responseText;
              
              if (response.substring(0,5) != '<?php') {
                  t.editor.execCommand('mceInsertContent',false,response);
              }else{
                  t.editor.execCommand('mceInsertContent',false,err);                  
              }
          }
      }
		},

		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
				longname : 'ArPHP',
				author : 'Khaled Al-Shamaa',
				authorurl : 'http://www.ar-php.org',
				infourl : 'http://www.ar-php.org/tinymce.php',
				version : "2.0"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('arphp', tinymce.plugins.ArabicPlugin);
})();
