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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/scripts/widgets/form/form_indicator.js":
/*!****************************************************!*\
  !*** ./src/scripts/widgets/form/form_indicator.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $(document).ready(function () {
    /**
     * scroll to specific section
     * 100px are reserved for 'navbar' height
     * @param {string} element_id target section id
     */
    function scroll_to_section(element_id) {
      var elem = document.getElementById(element_id); // elem.scrollIntoView();

      var offsetTopValue = elem.getBoundingClientRect().top + window.scrollY - 100;
      $('html, body').animate({
        scrollTop: offsetTopValue
      }, 'slow');
    }

    var navigation_list = document.querySelectorAll('aside.form_indicator ul li');

    if (navigation_list) {
      //---Check the visible section
      var checkVisibleSection = function checkVisibleSection() {
        var minor = window.innerHeight,
            section = null; //---Select the section closest to the top

        [].forEach.call(sections, function (item) {
          var offset = item.getBoundingClientRect(); // if ((Math.abs(offset.top) - 100) < minor) {

          if (Math.abs(offset.top) < minor) {
            minor = Math.abs(offset.top);
            section = item;
          }
        }); //---If the section exists

        if (section) {
          var index = section.id,
              link = $("li[data-section='" + index + "']"); //---If the link is not already active

          if (!link.hasClass("active")) {
            //---Remove the active class
            $("li.active").removeClass("active"); //---Add the active class

            link.addClass("active");
          }
        }
      };

      var navigation_list_array = Array.from(navigation_list);
      navigation_list_array.map(function (element) {
        element.addEventListener('click', function () {
          // find current active link and remove active class from it
          navigation_list_array.find(function (active_link) {
            active_link.classList.remove('active');
          }); // add active class to target link

          element.classList.add('active');
          var target_section = element.getAttribute('data-section'); // scroll to the target section

          scroll_to_section(target_section);
        });
      }); // scroll handler

      var delay = null;
      var sections = $('.card');
      $(document).on("scroll", function () {
        if (!isNaN(delay)) {
          clearTimeout(delay);
        }

        delay = setTimeout(checkVisibleSection, 100);
      });
    } // let card_headers = $('.card-header');
    // $.each(card_headers, function(index, element){
    // 	$(element).on('click', function(){
    // 		// Wait 1 second after open/collapse the card
    // 		setTimeout(()=>{
    // 			let element_id = $(element).parent().attr('id');
    // 			let elem = document.getElementById(element_id);
    // 			let offsetTopValue = elem.getBoundingClientRect().top + window.scrollY - 150;
    // 			$('html, body').animate({
    // 				scrollTop: offsetTopValue,
    // 			}, 'slow');
    // 		}, 350)
    // 	})
    // })


    document.addEventListener('wpcf7invalid', function (event) {
      $('.wpcf7-response-output').removeClass('alert-success');
      $('.wpcf7-response-output').addClass('alert-danger');
      $('#submit').attr('disabled', false);
    }, false);
    document.addEventListener('wpcf7spam', function (event) {
      $('.wpcf7-response-output').removeClass('alert-danger alert-success');
      $('.wpcf7-response-output').addClass('alert-warning');
      $('#submit').attr('disabled', false);
    }, false);
    document.addEventListener('wpcf7mailfailed', function (event) {
      $('.wpcf7-response-output').removeClass('alert-danger alert-success');
      $('.wpcf7-response-output').addClass('alert-warning');
      $('#submit').attr('disabled', false);
    }, false);
    document.addEventListener('wpcf7mailsent', function (event) {
      $('.wpcf7-response-output').removeClass('alert-danger');
      $('.wpcf7-response-output').addClass('alert-success');
      $('.file_input').removeClass('has_file').find('.file_input_name').html("<span>No File Chosen</span>").css({
        justifyContent: 'center',
        zIndex: 0
      });
      $('#submit').attr('disabled', false);
    }, false);
    $('.wpcf7-form').on('submit', function () {
      $('#submit').attr('disabled', true);
    });
  });
})(jQuery);

/***/ }),

/***/ 7:
/*!**********************************************************!*\
  !*** multi ./src/scripts/widgets/form/form_indicator.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Dev\xampp\htdocs\webkeyz\zilla-multiples\wp-content\themes\zilla-multiples\src\scripts\widgets\form\form_indicator.js */"./src/scripts/widgets/form/form_indicator.js");


/***/ })

/******/ });
//# sourceMappingURL=form_indicator.bundle.js.map