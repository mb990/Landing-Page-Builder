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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/drag&drop.js":
/*!***********************************!*\
  !*** ./resources/js/drag&drop.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.selectElement = function (event) {
  var target = $(event.target);

  if (target.is('.btn')) {
    return;
  }

  if (target.is('.custom-control-label')) {
    return;
  }

  if (target.is('.ico')) {
    return;
  }

  if (target.is('.img-fluid')) {
    return;
  }

  if (target.is('.js-close-preview')) {
    return;
  }

  $(".js-added-element").addClass("moving-element");
  $(".js-added-element").children().addClass("d-none"); // $(".ui-state-default").prepend("<p class='js-moving'>Test</p>");

  if ($(".js-added-element").has(".js-footer-var")) {
    $(".js-footer-var").prepend("<p class='js-moving'>Footer</p>");
  }

  if ($(".js-added-element").has(".js-gallery-var")) {
    $(".js-gallery-var").prepend("<p class='js-moving'>Gallery</p>");
  }

  if ($(".js-added-element").has(".js-content1-var")) {
    $(".js-content1-var").prepend("<p class='js-moving'>General content #1</p>");
  }

  if ($(".js-added-element").has(".js-content2-var")) {
    $(".js-content2-var").prepend("<p class='js-moving'>General content #2</p>");
  }

  if ($(".js-added-element").has(".js-content3-var")) {
    $(".js-content3-var").prepend("<p class='js-moving'>General content #3</p>");
  }

  if ($(".js-added-element").has(".js-hero-var")) {
    $(".js-hero-var").prepend("<p class='js-moving'>Hero section</p>");
  }

  if ($(".js-added-element").has(".js-newsletter-var")) {
    $(".js-newsletter-var").prepend("<p class='js-moving'>Newsletter</p>");
  }

  if ($(".js-added-element").has(".js-pricing-var")) {
    $(".js-pricing-var").prepend("<p class='js-moving'>Pricing plans</p>");
  }

  if ($(".js-added-element").has(".js-testimonial-var")) {
    $(".js-testimonial-var").prepend("<p class='js-moving'>Testimonial</p>");
  }

  if ($(".js-added-element").has(".js-top-menu-var")) {
    $(".js-top-menu-var").prepend("<p class='js-moving'>Top menu</p>");
  }

  $(".js-save-new-order").removeClass('d-none');
};

window.dropElement = function () {
  $(".js-added-element").removeClass("moving-element");
  $(".js-added-element").children().removeClass("d-none");
  $(".js-moving").remove();
  $('.js-added-element').each(function (index, value) {
    console.log("div".concat(index, ": ").concat(this.id));
    var x = index + 1;
    $(this).attr("data-order", x);
  });
};

/***/ }),

/***/ 2:
/*!*****************************************!*\
  !*** multi ./resources/js/drag&drop.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\xampp\htdocs\landing-page-builder-2\resources\js\drag&drop.js */"./resources/js/drag&drop.js");


/***/ })

/******/ });