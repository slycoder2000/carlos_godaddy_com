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
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/custom/calculator.js":
/*!*******************************************!*\
  !*** ./resources/js/custom/calculator.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var syncAllCheckBoxes = function syncAllCheckBoxes() {\n  var items = document.getElementsByName('acs');\n  var selectedItems = '';\n\n  for (var i = 0; i < items.length; i++) {\n    //if (items[i].type == 'checkbox' && items[i].checked == true)\n    if (items[i].checked != app.lineitems[i].calc) app.lineitems[i].calc = items[i].checked; //selectedItems += items[i].checked + ' ' + app.lineitems[i].calc + '\\n';\n  } //alert(selectedItems);\n\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvY3VzdG9tL2NhbGN1bGF0b3IuanM/MTNiNSJdLCJuYW1lcyI6WyJzeW5jQWxsQ2hlY2tCb3hlcyIsIml0ZW1zIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50c0J5TmFtZSIsInNlbGVjdGVkSXRlbXMiLCJpIiwibGVuZ3RoIiwiY2hlY2tlZCIsImFwcCIsImxpbmVpdGVtcyIsImNhbGMiXSwibWFwcGluZ3MiOiJBQUFBLElBQUlBLGlCQUFpQixHQUFHLFNBQXBCQSxpQkFBb0IsR0FBTTtBQUM3QixNQUFJQyxLQUFLLEdBQUdDLFFBQVEsQ0FBQ0MsaUJBQVQsQ0FBMkIsS0FBM0IsQ0FBWjtBQUNBLE1BQUlDLGFBQWEsR0FBRyxFQUFwQjs7QUFDQSxPQUFLLElBQUlDLENBQUMsR0FBRyxDQUFiLEVBQWdCQSxDQUFDLEdBQUdKLEtBQUssQ0FBQ0ssTUFBMUIsRUFBa0NELENBQUMsRUFBbkMsRUFBdUM7QUFDdEM7QUFDQSxRQUFJSixLQUFLLENBQUNJLENBQUQsQ0FBTCxDQUFTRSxPQUFULElBQW9CQyxHQUFHLENBQUNDLFNBQUosQ0FBY0osQ0FBZCxFQUFpQkssSUFBekMsRUFBK0NGLEdBQUcsQ0FBQ0MsU0FBSixDQUFjSixDQUFkLEVBQWlCSyxJQUFqQixHQUF3QlQsS0FBSyxDQUFDSSxDQUFELENBQUwsQ0FBU0UsT0FBakMsQ0FGVCxDQUd0QztBQUNBLEdBUDRCLENBUTdCOztBQUNBLENBVEQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvY3VzdG9tL2NhbGN1bGF0b3IuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJsZXQgc3luY0FsbENoZWNrQm94ZXMgPSAoKSA9PiB7XG5cdHZhciBpdGVtcyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlOYW1lKCdhY3MnKTtcblx0dmFyIHNlbGVjdGVkSXRlbXMgPSAnJztcblx0Zm9yICh2YXIgaSA9IDA7IGkgPCBpdGVtcy5sZW5ndGg7IGkrKykge1xuXHRcdC8vaWYgKGl0ZW1zW2ldLnR5cGUgPT0gJ2NoZWNrYm94JyAmJiBpdGVtc1tpXS5jaGVja2VkID09IHRydWUpXG5cdFx0aWYgKGl0ZW1zW2ldLmNoZWNrZWQgIT0gYXBwLmxpbmVpdGVtc1tpXS5jYWxjKSBhcHAubGluZWl0ZW1zW2ldLmNhbGMgPSBpdGVtc1tpXS5jaGVja2VkO1xuXHRcdC8vc2VsZWN0ZWRJdGVtcyArPSBpdGVtc1tpXS5jaGVja2VkICsgJyAnICsgYXBwLmxpbmVpdGVtc1tpXS5jYWxjICsgJ1xcbic7XG5cdH1cblx0Ly9hbGVydChzZWxlY3RlZEl0ZW1zKTtcbn07XG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/custom/calculator.js\n");

/***/ }),

/***/ "./resources/sass/_custom.scss":
/*!*************************************!*\
  !*** ./resources/sass/_custom.scss ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc2Fzcy9fY3VzdG9tLnNjc3M/N2Q1ZiJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSIsImZpbGUiOiIuL3Jlc291cmNlcy9zYXNzL19jdXN0b20uc2Nzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/sass/_custom.scss\n");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc2Fzcy9hcHAuc2Nzcz8yZGY4Il0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL3Nhc3MvYXBwLnNjc3MuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyByZW1vdmVkIGJ5IGV4dHJhY3QtdGV4dC13ZWJwYWNrLXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/sass/app.scss\n");

/***/ }),

/***/ 0:
/*!*********************************************************************************************************!*\
  !*** multi ./resources/js/custom/calculator.js ./resources/sass/_custom.scss ./resources/sass/app.scss ***!
  \*********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\wamp64\www\slycoder02\resources\js\custom\calculator.js */"./resources/js/custom/calculator.js");
__webpack_require__(/*! C:\wamp64\www\slycoder02\resources\sass\_custom.scss */"./resources/sass/_custom.scss");
module.exports = __webpack_require__(/*! C:\wamp64\www\slycoder02\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });