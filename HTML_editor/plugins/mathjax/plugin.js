/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
var mathJaxDefaultConfig = {
  showMathMenu: false,
  showMathMenuMSIE: false,
  TeX: {
    extensions: ["cancel.js"]
  },
  messageStyle: "none",
  asciimath2jax: { ignoreClass: ".*", processClass: 'AM' },
  tex2jax: { ignoreClass: ".*", processClass: 'AM', inlineMath: [['$$', '$$']], displayMath: [['$$$', '$$$']] },
  "HTML-CSS": {
    availableFonts: ["STIX"],
    preferredFont: "STIX",
    webFont: "STIX-Web",
    imageFont: null
  },
  AsciiMath: {
    decimalsignAlternative: ","
  }
};
var mathJaxDefaultSymbol = [{ input: "strike", tag: "menclose", output: "strike", atname: "notation", atval: "horizontalstrike", tex: "sout", ttype: "UNARY" }, { input: "rlarw", tag: "mo", output: "\u21C4", tex: "\\rightleftarrows", ttype: "CONST" }, { input: "permille", tag: "mo", output: "\u2030", tex: "text{\\textperthousand}", ttype: "CONST" }, { input: "nwarr", tag: "mo", output: "\u2196", tex: "nwarr;", ttype: "CONST" }, { input: "nearr", tag: "mo", output: "\u2197", tex: "nearr;", ttype: "CONST" }, { input: "searr", tag: "mo", output: "\u2198", tex: "searr;", ttype: "CONST" }, { input: "swarr", tag: "mo", output: "\u2199", tex: "swarr;", ttype: "CONST" }, { input: "+-", tag: "mo", output: "\xB1", tex: "plusmn;", ttype: "CONST" }, { input: "mcirc", tag: "mo", output: "\u26AA", ttype: "CONST" }, { input: "mdiamond", tag: "mo", output: "\u2B26", ttype: "CONST" }];
var mathJaxDefaultUrl = 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-MML-AM_HTMLorMML';

var addMathJaxScript = function addMathJaxScript(document, mathJaxCustomUrl, mathJaxCustomConfig, mathJaxCustomSymbol) {
  var mathJaxUrl = mathJaxCustomUrl || mathJaxDefaultUrl;
  var mathJaxConfig = mathJaxCustomConfig || mathJaxDefaultConfig;
  var mathJaxSymbol = mathJaxCustomSymbol || mathJaxDefaultSymbol;
  var head = document.head;
  var script = document.createElement('script');
  script.type = 'text/x-mathjax-config';
  script.text = "\n    MathJax.Hub.Register.StartupHook(\"AsciiMath Jax Config\",() => {\n      const mathJaxSymbol = " + JSON.stringify(mathJaxSymbol) + ";\n      var AM = MathJax.InputJax.AsciiMath.AM;\n      const symbols = [];\n      for(i = 0; i < mathJaxSymbol.length; ++i) {\n        const symbol = mathJaxSymbol[i];\n        symbol.ttype = AM.TOKEN[symbol.ttype];\n        symbols.push(symbol);\n      };\n      AM.symbols.push(...symbols);\n    });\n    MathJax.Hub.Config(" + JSON.stringify(mathJaxConfig) + ");\n  ";
  head.appendChild(script);

  var script2 = document.createElement('script');
  script2.type = 'text/javascript';
  script2.src = mathJaxUrl;
  script2.defer = true;
  head.appendChild(script2);
};

var stopPropagating = function stopPropagating(event) {
  if (event.stopPropagation) {
    event.stopPropagation();
    event.preventDefault();
  } else {
    event.cancelBubble = true;
    event.returnValue = false;
  }
};

var plugin = function plugin(editor) {
  var lastAMnode = void 0,
      copyMode = void 0,
      toggleMathButton = void 0,
      subscript = void 0,
      superscript = void 0,
      disableSubSup = void 0,
      runMathJax = void 0;
  editor.addCommand('toggleMathJax', function () {
    copyMode = !copyMode;
    toggleMathButton.active(copyMode);
    editor.undoManager.ignore(function () {
      if (copyMode) {
        editor.execCommand('removeMathJax');
      } else {
        editor.execCommand('runMathJax', editor.editorContainer.id);
      }
    });
  });
  editor.addCommand('runMathJax', function (element) {
    var MathJax = editor.contentWindow.MathJax;
    if (typeof element !== 'string' && !editor.getBody().contains(element)) {
      return;
    }
    runMathJax = true;
    MathJax.Hub.Queue(["Typeset", MathJax.Hub, element]);
  });
  editor.addCommand('removeMathJax', function () {
    var MathJax = editor.contentWindow.MathJax;
    if (!MathJax) {
      return;
    }
    var allJax = MathJax.Hub.getAllJax();
    for (var i = 0, m = allJax.length; i < m; i++) {
      var jax = allJax[i];
      var jaxNode = editor.dom.get(jax.inputID);
      if (jaxNode) {
        var mathNode = jaxNode.parentNode;
        var plainText = removeJax(jax.originalText, jax.inputJax);
        mathNode.innerHTML = plainText;
      }
    }

    editor.dom.remove('MathJax_Message');
    var hidden = editor.dom.get('MathJax_Hidden');
    var fonts = editor.dom.get('MathJax_Font_Test');
    editor.dom.remove(hidden ? hidden.parentNode : '');
    editor.dom.remove(fonts ? fonts.parentNode : '');
  });
  var removeMathJax = function removeMathJax() {
    var MathJax = editor.contentWindow.MathJax;
    if (!MathJax) {
      return;
    }
    var allJax = MathJax.Hub.getAllJax();
    var fakeDom = editor.getDoc().cloneNode(true);
    for (var i = 0, m = allJax.length; i < m; i++) {
      var jax = allJax[i];
      var jaxNode = fakeDom.getElementById(jax.inputID);
      if (jaxNode) {
        var mathNode = jaxNode.parentNode;
        var plainText = removeJax(jax.originalText, jax.inputJax);
        mathNode.innerHTML = plainText;
      }
    }

    var MJMessage = fakeDom.getElementById('MathJax_Message');
    MJMessage && MJMessage.parentNode.removeChild(MJMessage);
    editor.dom.remove('MathJax_Message');
    var hidden = fakeDom.getElementById('MathJax_Hidden');
    var fonts = fakeDom.getElementById('MathJax_Font_Test');
    if (hidden) {
      var hiddenParent = hidden.parentNode;
      hiddenParent.parentNode.removeChild(hiddenParent);
    }
    if (fonts) {
      var fontsParent = fonts.parentNode;
      fontsParent.parentNode.removeChild(fontsParent);
    }
    return fakeDom.body.innerHTML;
  };

  var getAllJax = function getAllJax(element) {
    var MathJax = editor.contentWindow.MathJax;
    var allJax = MathJax.Hub.getAllJax(element);
    return allJax;
  };
  var removeJax = function removeJax(originalText, inputType) {
    if (inputType === 'AsciiMath') {
      return ("`" + originalText + "`").split('<').join('< ');
    }
    if (inputType === 'TeX') {
      return "$$" + originalText + "$$";
    }
  };
  var wrapWithAM = function wrapWithAM() {
    var content = editor.selection.getContent();
    var entity = "<span class=\"AM\">`" + content + "<span id=\"customBookmark\"></span>`</span>&nbsp;";

    editor.selection.setContent(entity);
    editor.selection.setCursorLocation(editor.dom.get('customBookmark'));
    editor.dom.remove('customBookmark');
    return editor.selection.getNode();
  };
  var setCursorAfter = function setCursorAfter(element) {
    if (!element) {
      return;
    }
    if (!element.parentNode) {
      return;
    }
    element.insertAdjacentHTML('afterEnd', '<span id="customBookmark2"></span>&nbsp;');
    var customBookMark = editor.dom.get('customBookmark2');
    var idx = Array.prototype.indexOf.call(customBookMark.parentNode.childNodes, customBookMark) + 2;
    editor.selection.setCursorLocation(customBookMark.parentNode, idx);
    editor.dom.remove('customBookmark2');
  };
  var exitAMmode = function exitAMmode() {
    if (lastAMnode) {
      var element = lastAMnode;
      lastAMnode = null;
      if (!copyMode) {
        var callback = function callback() {
          return editor.execCommand('runMathJax', element);
        };
        editor.contentWindow.MathJax.Hub.Queue(callback);
      }
      return true;
    }
    return false;
  };
  var testAMclass = function testAMclass(element) {
    return element.className == 'AM';
  };
  editor.on('init', function (args) {
    addMathJaxScript(args.target.dom.doc, editor.getParam('mathjaxUrl'), editor.getParam('mathjaxConfig'), editor.getParam('mathjaxExtraSymbol'));
  });
  editor.on('keypress', function (event) {
    if (event.key == '`') {
      if (lastAMnode == null) {
        lastAMnode = wrapWithAM();
      } else if (editor.selection.getNode() == lastAMnode) {
        var element = lastAMnode;
        exitAMmode();
        setCursorAfter(element);
      }
      stopPropagating(event);
    }
  });
  editor.on('keydown', function (event) {
    if (event.keyCode == 13 || event.keyCode == 10) {
      if (exitAMmode()) {
        setCursorAfter(lastAMnode);
        event.stopPropagation();
        event.preventDefault();
      }
    }
  });
  editor.on('nodechange', function (event, sumting) {
    if (runMathJax) {
      runMathJax = false;
      return;
    }
    var element = event.element;
    var mathNode = testAMclass(element) ? element : editor.dom.getParent(element, testAMclass);
    disableSubSup = mathNode !== null;
    subscript.disabled(disableSubSup);
    superscript.disabled(disableSubSup);
    if (mathNode) {
      var allJax = getAllJax(mathNode);
      if (allJax.length) {
        var jax = allJax[0];
        var plainText = removeJax(jax.originalText, jax.inputJax);
        mathNode.innerHTML = plainText;
      }
      if (lastAMnode !== mathNode) {
        exitAMmode();
        // setCursorAfter(mathNode);
        lastAMnode = mathNode;
      }
    } else if (lastAMnode) {
      if (lastAMnode.innerHTML.match(/`(&nbsp;|\s|\u00a0|&#160;)*`/) || lastAMnode.innerHTML.match(/^(&nbsp;|\s|\u00a0|&#160;)*$/)) {
        var p = lastAMnode.parentNode;
        p.removeChild(lastAMnode);
      }
      exitAMmode();
    }
  });
  editor.on('Copy', function (e) {
    copyMode = true;
    toggleMathButton.active(copyMode);
    editor.execCommand('removeMathJax');
  });
  editor.on('Undo', function (e) {
    copyMode = true;
    toggleMathButton.active(copyMode);
  });
  // FIXING UNDO BUG
  editor.on('BeforeAddUndo', function (e) {
    e.level.content = removeMathJax();
  });
  editor.on('PreProcess', function () {
    editor.undoManager.ignore(function () {
      copyMode = true;
      toggleMathButton.active(copyMode);
      editor.execCommand('removeMathJax');
    });
  });

  // Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceAsciimath');
  editor.addCommand('mceAsciimath', function (value) {
    if (lastAMnode == null) {
      lastAMnode = wrapWithAM();
    }
    if (value) {
      editor.selection.setContent(value);
    }
  });
  var url = editor.getParam("document_base_url") + 'plugins/mathjax';

  editor.addCommand('mceAsciimathDlg', function () {
    editor.windowManager.open({
      file: url + '/amcharmap.htm',
      width: 1000,
      height: 400,
      inline: 1,
      title: 'Math symbols'
    });
  });

  editor.addButton('asciimath', {
    tooltip: 'Add New Math',
    cmd: 'mceAsciimath',
    image: url + '/img/ed_mathformula2.gif'
  });

  editor.addButton('toggleMath', {
    tooltip: 'Copy math  (alt+m)',
    cmd: 'toggleMathJax',
    icon: 'copy',
    onpostrender: function onpostrender() {
      toggleMathButton = this;
    }
  });

  editor.addButton('asciimathcharmap', {
    tooltip: 'Math Symbols',
    cmd: 'mceAsciimathDlg',
    image: url + '/img/ed_mathformula.gif'
  });

  editor.shortcuts.add('alt+m', 'same action as copy math button', 'toggleMathJax');
  editor.shortcuts.add('alt+b', 'same action as superscript button', function () {
    return !disableSubSup && editor.execCommand('superscript');
  });
  editor.shortcuts.add('alt+n', 'same action as subscript button', function () {
    return !disableSubSup && editor.execCommand('subscript');
  });

  editor.addButton('subscript', {
    cmd: "Subscript",
    icon: "subscript",
    onPostRender: function onPostRender() {
      subscript = this;
    },
    tooltip: "Subscript (alt+n)"
  });

  editor.addButton('superscript', {
    cmd: "Superscript",
    icon: "superscript",
    onPostRender: function onPostRender() {
      superscript = this;
    },
    tooltip: "Superscript (alt+b)"
  });
};

exports.default = plugin;

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _plugin = __webpack_require__(0);

var _plugin2 = _interopRequireDefault(_plugin);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

tinymce.PluginManager.add('mathjax', _plugin2.default);

/***/ })
/******/ ]);