/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./typescript/modules/Adapter/Adapter.ts":
/*!***********************************************!*\
  !*** ./typescript/modules/Adapter/Adapter.ts ***!
  \***********************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.Adapter = void 0;
__webpack_require__(/*! ../Crystalliser/Runtime */ "./typescript/modules/Crystalliser/Runtime.js");
var Adapter = /** @class */function () {
  function Adapter() {
    this.init();
  }
  Adapter.prototype.init = function () {};
  return Adapter;
}();
exports.Adapter = Adapter;

/***/ }),

/***/ "./typescript/modules/Crystalliser/Component/Component.js":
/*!****************************************************************!*\
  !*** ./typescript/modules/Crystalliser/Component/Component.js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   Component: () => (/* binding */ Component)
/* harmony export */ });
/* harmony import */ var _Tree__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Tree */ "./typescript/modules/Crystalliser/Component/Tree.js");
/* harmony import */ var _States_Acid4States__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../States/Acid4States */ "./typescript/modules/Crystalliser/States/Acid4States.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function ownKeys(e, r) { var t = Object.keys(e); if (Object.getOwnPropertySymbols) { var o = Object.getOwnPropertySymbols(e); r && (o = o.filter(function (r) { return Object.getOwnPropertyDescriptor(e, r).enumerable; })), t.push.apply(t, o); } return t; }
function _objectSpread(e) { for (var r = 1; r < arguments.length; r++) { var t = null != arguments[r] ? arguments[r] : {}; r % 2 ? ownKeys(Object(t), !0).forEach(function (r) { _defineProperty(e, r, t[r]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(t)) : ownKeys(Object(t)).forEach(function (r) { Object.defineProperty(e, r, Object.getOwnPropertyDescriptor(t, r)); }); } return e; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }


var safeTimeMeta = 0;
var Component = /*#__PURE__*/function () {
  // ms

  /**
   * Fake = true is for shadow components
   */
  function Component(rootHandler) {
    var fake = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
    _classCallCheck(this, Component);
    // Inner Components
    this.components = (0,_Tree__WEBPACK_IMPORTED_MODULE_0__.createComponentTree)(rootHandler);

    // Meta
    this.unique = rootHandler.getAttribute("unique");
    this.hash = rootHandler.getAttribute("hash");
    this.rootHandler = document.querySelector("sc-template-root[unique=\"".concat(this.unique, "\"]"));

    // Event listener timeout
    this.eventListenerTimeout = setTimeout(function () {
      return null;
    }, 0);

    // Setup component
    if (!fake) this.Setup();
  }

  /**
   * Set root handler
   */
  return _createClass(Component, [{
    key: "UpdateRootHandler",
    value: function UpdateRootHandler(rootHandler) {
      this.rootHandler = rootHandler;
    }

    /**
     * Setup event listeners
     */
  }, {
    key: "Setup",
    value: function Setup() {
      var _this = this;
      this.path = this.rootHandler.getAttribute("path");
      this.unique = this.rootHandler.getAttribute("unique");
      this.props = JSON.parse(this.rootHandler.querySelector("script[type=\"sapphire-component/meta\"][sapphire-mid=\"".concat(this.unique, "\"]")).innerHTML);
      this.rootHandler.querySelectorAll('*').forEach(function (element) {
        var isScoped = element.getAttribute("asc-scope") === _this.unique;
        if (!isScoped) {
          return;
        }
        element.getAttributeNames().forEach(function (attribute) {
          if (attribute.startsWith(Component.COMPONENT_EVENT_LISTENER_PREFIX)) {
            var event = attribute.replace(Component.COMPONENT_EVENT_LISTENER_PREFIX, '');
            var callbackString = element.getAttribute(attribute);
            clearTimeout(_this.timeout);
            if (callbackString === '') {
              /**
               * Callback by model
               */
              var model = element.getAttribute("-event:model");
              if (!model) return;
              element.addEventListener(event, function (event) {
                _this.timeout = setTimeout(function () {
                  return _this.UpdateState(model, _this.eventProcess(event));
                }, safeTimeMeta);
              });
            } else {
              /**
               * Callback by action
               */
              element.addEventListener(event, function (event) {
                _this.timeout = setTimeout(function () {
                  return _this.UpdateState(callbackString, _this.eventProcess(event));
                }, safeTimeMeta);
              });
            }
            element.removeAttribute(attribute);
          }
        });
      });
    }

    /**
     * Updates states and re-render via fetch to api
     */
  }, {
    key: "UpdateState",
    value: function UpdateState(use) {
      var _this2 = this;
      var event = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
      var eventPropsData = event === null ? {} : {
        event: event
      };
      fetch("/api/lmpd2m/render", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(_objectSpread({
          "path": this.path,
          "props": this.props,
          "use": use
        }, eventPropsData))
      }).then(function (res) {
        return res.text();
      }).then(function (res) {
        // Creates shadow DOM
        var shadowElement = document.createElement("shadow-div");
        shadowElement.innerHTML = res;

        // Get innerHTML of root
        var rootInnerHTML = shadowElement.querySelector('sc-template-root sc-template-root').innerHTML;
        var newUniqueId = shadowElement.querySelector('sc-template-root sc-template-root').getAttribute("unique");

        // Re-render
        _this2.rootHandler.innerHTML = rootInnerHTML;
        _this2.rootHandler.setAttribute("unique", newUniqueId);
        _this2.Setup();
        (0,_Tree__WEBPACK_IMPORTED_MODULE_0__.createComponentTree)(_this2.rootHandler);
        (0,_States_Acid4States__WEBPACK_IMPORTED_MODULE_1__.addStatesLayer)();
        (0,_States_Acid4States__WEBPACK_IMPORTED_MODULE_1__.refreshState)();
      });
    }
  }, {
    key: "eventProcess",
    value: function eventProcess(event) {
      return {
        event: event,
        targetHTML: event.target.outerHTML,
        targetProperties: {
          value: event.target.value,
          checked: event.target.checked,
          selected: event.target.selected
        }
      };
    }
  }]);
}();
_defineProperty(Component, "COMPONENT_EVENT_LISTENER_PREFIX", '@');
_defineProperty(Component, "EVENT_SAFE_TIME", safeTimeMeta);

/***/ }),

/***/ "./typescript/modules/Crystalliser/Component/Creates.js":
/*!**************************************************************!*\
  !*** ./typescript/modules/Crystalliser/Component/Creates.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   createComponentFromElement: () => (/* binding */ createComponentFromElement)
/* harmony export */ });
/* harmony import */ var _Component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Component */ "./typescript/modules/Crystalliser/Component/Component.js");

var createComponentFromElement = function createComponentFromElement() {
  var element = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  if (!element) return;
  var component = new _Component__WEBPACK_IMPORTED_MODULE_0__.Component(element);
  return component;
};

/***/ }),

/***/ "./typescript/modules/Crystalliser/Component/Tree.js":
/*!***********************************************************!*\
  !*** ./typescript/modules/Crystalliser/Component/Tree.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   createComponentTree: () => (/* binding */ createComponentTree)
/* harmony export */ });
/* harmony import */ var _Creates__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Creates */ "./typescript/modules/Crystalliser/Component/Creates.js");


/**
 * Creates tree of components
 */

var createComponentTree = function createComponentTree() {
  var root = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : document.documentElement;
  var treeBaseArray = [];
  var rootClone = root.cloneNode(true);
  while (rootClone.querySelector('sc-template-root')) {
    var real = rootClone.querySelector('sc-template-root');
    var clone = real.cloneNode(true);
    var instance = (0,_Creates__WEBPACK_IMPORTED_MODULE_0__.createComponentFromElement)(clone);
    treeBaseArray.push(instance);
    real.remove();
  }

  /**
   * Returns components
   */
  return treeBaseArray;
};

/***/ }),

/***/ "./typescript/modules/Crystalliser/Runtime.js":
/*!****************************************************!*\
  !*** ./typescript/modules/Crystalliser/Runtime.js ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Component_Tree_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Component/Tree.js */ "./typescript/modules/Crystalliser/Component/Tree.js");
/* harmony import */ var _States_Acid4States_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./States/Acid4States.js */ "./typescript/modules/Crystalliser/States/Acid4States.js");
/**
 * Sapphire Crystalliser
 * 
 * ================================================================================================================
 * 
 * SAPPHIRE Crystaliser v. 2.0.0
 * 
 *  1. What is Crystalliser?
 *      Crystalliser is main agent that makes Sapphire components reactive
 *      It is like a vue or react, but state is passed to backend.
 * 
 *  2. How to use it?
 *      Just inject it into website, sapphire will do the rest
 * 
 *  3. Extending sapphire?
 *      You can extend sapphire application via fragments
 *      npm i sapphire-fragments
 */



document.addEventListener('DOMContentLoaded', function () {
  var states = (0,_States_Acid4States_js__WEBPACK_IMPORTED_MODULE_1__.createAcid4States)();
  setTimeout(function () {
    window.crystallineTree = (0,_Component_Tree_js__WEBPACK_IMPORTED_MODULE_0__.createComponentTree)(document.documentElement);
  }, 150);
});

/***/ }),

/***/ "./typescript/modules/Crystalliser/States/Acid4States.js":
/*!***************************************************************!*\
  !*** ./typescript/modules/Crystalliser/States/Acid4States.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   Acid4StatesSymbol: () => (/* binding */ Acid4StatesSymbol),
/* harmony export */   MinimalTimeoutBeforeFocus: () => (/* binding */ MinimalTimeoutBeforeFocus),
/* harmony export */   addStatesLayer: () => (/* binding */ _addStatesLayer),
/* harmony export */   createAcid4States: () => (/* binding */ createAcid4States),
/* harmony export */   generateStates: () => (/* binding */ generateStates),
/* harmony export */   getAcid4FocusId: () => (/* binding */ getAcid4FocusId),
/* harmony export */   getAcid4Id: () => (/* binding */ getAcid4Id),
/* harmony export */   getAcid4States: () => (/* binding */ getAcid4States),
/* harmony export */   refreshState: () => (/* binding */ _refreshState),
/* harmony export */   setAcid4States: () => (/* binding */ setAcid4States),
/* harmony export */   stateElementBlur: () => (/* binding */ stateElementBlur),
/* harmony export */   stateElementClick: () => (/* binding */ stateElementClick),
/* harmony export */   stateElementFocus: () => (/* binding */ stateElementFocus),
/* harmony export */   stateElementInput: () => (/* binding */ stateElementInput),
/* harmony export */   stateElementSelect: () => (/* binding */ stateElementSelect)
/* harmony export */ });
var Acid4StatesSymbol = Symbol("Acid4States");
var MinimalTimeoutBeforeFocus = 1;
var getAcid4Id = function getAcid4Id(target) {
  return target.getAttribute("acid4");
};
var createAcid4States = function createAcid4States() {
  window[Acid4StatesSymbol] = window[Acid4StatesSymbol] || generateStates();
  _addStatesLayer();
};
var getAcid4States = function getAcid4States() {
  return window[Acid4StatesSymbol];
};
var setAcid4States = function setAcid4States(states) {
  window[Acid4StatesSymbol] = states;
};
var getAcid4FocusId = function getAcid4FocusId() {
  return getAcid4States().focus.id;
};
var generateStates = function generateStates() {
  return {
    focus: {
      id: null,
      selectionStart: null,
      selectionEnd: null
    },
    refreshState: function refreshState() {
      return _refreshState();
    },
    addStatesLayer: function addStatesLayer() {
      return _addStatesLayer();
    }
  };
};
var _refreshState = function _refreshState() {
  var acid4Element = document.querySelector("[acid4=\"".concat(getAcid4FocusId(), "\"]"));
  if (acid4Element) {
    var acid4State = getAcid4States();
    acid4Element.selectionStart = acid4State.focus.selectionStart;
    acid4Element.selectionEnd = acid4State.focus.selectionEnd;
    acid4Element.focus();
  }
};

var _addStatesLayer = function _addStatesLayer() {
  document.querySelectorAll("[acid4]").forEach(function (acid4Element) {
    acid4Element.removeEventListener('focus', stateElementFocus);
    acid4Element.removeEventListener('blur', stateElementBlur);
    acid4Element.removeEventListener('select', stateElementSelect);
    acid4Element.removeEventListener('click', stateElementClick);
    acid4Element.removeEventListener('input', stateElementInput);
    acid4Element.addEventListener('focus', stateElementFocus);
    acid4Element.addEventListener('blur', stateElementBlur);
    acid4Element.addEventListener('select', stateElementSelect);
    acid4Element.addEventListener('click', stateElementClick);
    acid4Element.addEventListener('input', stateElementInput);
  });
};

var stateElementFocus = function stateElementFocus($event) {
  setTimeout(function () {
    var state = getAcid4States();
    state.focus.id = getAcid4Id($event.target);
    setAcid4States(state);
  }, MinimalTimeoutBeforeFocus);
};
var stateElementBlur = function stateElementBlur($event) {
  var state = getAcid4States();
  if (document.querySelector("[acid4=\"".concat(state, "\"]"))) {
    state.focus.id = null;
    setAcid4States(state);
  }
};
var stateElementSelect = function stateElementSelect($event) {
  var state = getAcid4States();
  state.focus.selectionStart = $event.target.selectionStart;
  state.focus.selectionEnd = $event.target.selectionEnd;
  setAcid4States(state);
};
var stateElementClick = function stateElementClick($event) {
  var state = getAcid4States();
  state.focus.selectionStart = $event.target.selectionStart;
  state.focus.selectionEnd = $event.target.selectionEnd;
  setAcid4States(state);
};
var stateElementInput = function stateElementInput($event) {
  var state = getAcid4States();
  state.focus.selectionStart = $event.target.selectionStart;
  state.focus.selectionEnd = $event.target.selectionEnd;
  setAcid4States(state);
};

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
var exports = __webpack_exports__;
/*!*****************************!*\
  !*** ./typescript/index.ts ***!
  \*****************************/


Object.defineProperty(exports, "__esModule", ({
  value: true
}));
var Adapter_1 = __webpack_require__(/*! ./modules/Adapter/Adapter */ "./typescript/modules/Adapter/Adapter.ts");
document.addEventListener('DOMContentLoaded', function () {
  var adapter = new Adapter_1.Adapter();
  // @ts-ignore
  if (!window.adapter) {
    // @ts-ignore
    window.adapter = adapter;
  }
  console.log('[Sapphire] Adapter connected!');
});
})();

/******/ })()
;