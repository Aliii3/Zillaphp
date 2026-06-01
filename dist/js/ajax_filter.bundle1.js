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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/scripts/widgets/ajax_filter.js":
/*!********************************************!*\
  !*** ./src/scripts/widgets/ajax_filter.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $(document).ready(function () {
    $('.cat-list_item').on('click', function (e) {
      e.preventDefault();
      $('.cat-list_item').removeClass('active');
      $(this).addClass('active');
      var category = $(this).data('slug');
      var year = $('#year_filter').val();
      var month = $('#month_filter').val();
      $.ajax({
        url: data.ajax_url,
        type: 'POST',
        dataType: 'html',
        data: {
          action: 'filter_reports',
          category: category,
          year: year,
          month: month
        },
        success: function success(response) {
          var data_parsed = JSON.parse(response);
          $('.reports_data').html(data_parsed.data);
          $('.custom_pagination .container').html(data_parsed.pagination);
        }
      });
    });
    $('#year_filter, #month_filter').on('change', function (e) {
      e.preventDefault();
      var category = $('.cat-list_item.active').data('slug');
      var year = $('#year_filter').val();
      var month = $('#month_filter').val();
      console.log(year);
      $.ajax({
        url: data.ajax_url,
        type: 'POST',
        dataType: 'html',
        data: {
          action: 'filter_reports',
          category: category,
          year: year,
          month: month
        },
        success: function success(response) {
          console.log(response);
          var data_parsed = JSON.parse(response);
          $('.reports_data').html(data_parsed.data);
          $('.custom_pagination .container').html(data_parsed.pagination);
        }
      });
    }); // insights

    $('.cat-list_item_insight').on('click', function (e) {
      e.preventDefault();
      $('.cat-list_item_insight').removeClass('active');
      $(this).addClass('active');
      var category = $(this).data('slug');
      var year = $('#year_filter_insights').val();
      var month = $('#month_filter_insights').val();
	  console.log(year);
      $.ajax({
        url: data.ajax_url,
        type: 'POST',
        dataType: 'html',
        data: {
          action: 'filter_insights',
          category: category,
          year: year,
          month: month
        },
        success: function success(response) {
          var data_parsed = JSON.parse(response);
          $('.reports_data').html(data_parsed.data);
          $('.custom_pagination .container').html(data_parsed.pagination);
        }
      });
    });
	
    $('#year_filter_insights, #month_filter_insights').on('change', function (e) {
      e.preventDefault();
      var category = $('.cat-list_item_insight.active').data('slug');
      var year = $('#year_filter_insights').val();
      var month = $('#month_filter_insights').val();
	  console.log(year);
      $.ajax({
        url: data.ajax_url,
        type: 'POST',
        dataType: 'html',
        data: {
          action: 'filter_insights',
          category: category,
          year: year,
          month: month
        },
        success: function success(response) {
          var data_parsed = JSON.parse(response);
          $('.reports_data').html(data_parsed.data);
          $('.custom_pagination .container').html(data_parsed.pagination);
        }
      });
    });

  $('#year_filter_blogs, #month_filter_blogs').on('change', function (e) {
      e.preventDefault();
      var category = $('.cat-list_item_insight.active').data('slug');
      var year = $('#year_filter_blogs').val();
      var month = $('#month_filter_blogs').val();
	  console.log(year);
      $.ajax({
        url: data.ajax_url,
        type: 'POST',
        dataType: 'html',
        data: {
          action: 'filter_blogs',
          category: category,
          year: year,
          month: month
        },
        success: function success(response) {
          var data_parsed = JSON.parse(response);
          $('.reports_data').html(data_parsed.data);
          $('.custom_pagination .container').html(data_parsed.pagination);
        }
      });
    });
    /**
     * DOMSUbtreeModifieed is Deprecated
     * Potential Error need to be Modifeied and replaced with MutationObserve
     */

    /* insights pagination ajax */

    $('.custom_pagination').on('DOMSubtreeModified', function () {
      $('.ajax_pagination li a').on('click', function (e) {
        console.log($(this));
        e.preventDefault(); // don't trigger page reload

        if ($(this).hasClass('current')) {
          e.preventDefault();
          return; // don't do anything if click on current page
        } // get current page data


        var current_page_data = $('.ajax_pagination li .current').html(); // replace default first page with link default is li>span

        $('.ajax_pagination li .current').parent().html("<a href=\"".concat(data.ajax_url, "/page/").concat(current_page_data, "\">").concat(current_page_data, "</a>")); // add current class to the current pagination link

        $(this).addClass('current');
        var requested_page_arr = $(this).attr('href').split('/');
        var requested_page_num = requested_page_arr[requested_page_arr.length - 2];
        var category = $('.cat-list_item_insight.active').data('slug');
        var year = $('#year_filter_insights').val();
        var month = $('#month_filter_insights').val();
        $.ajax({
          url: data.ajax_url,
          type: 'POST',
          dataType: 'html',
          data: {
            action: 'ajax_pagination',
            category: category,
            year: year,
            month: month,
            page: requested_page_num,
            posts_per_page: 6
          },
          success: function success(response) {
            var data_parsed = JSON.parse(response);
            $('.reports_data').html(data_parsed.data);
            $('.custom_pagination .container').html(data_parsed.pagination);
          }
        });
      });
    });
    /* Reports */

    $('.custom_pagination').on('DOMSubtreeModified', function () {
      $('.ajax_pagination_reports li a').on('click', function (e) {
        e.preventDefault(); // don't trigger page reload

        if ($(this).hasClass('current')) {
          return; // don't do anything if click on current page
        } // get current page data


        var current_page_data = $('.ajax_pagination_reports li .current').html(); // replace default first page with link default is li>span

        $('.ajax_pagination_reports li .current').parent().html("<a href=\"".concat(data.ajax_url, "/page/").concat(current_page_data, "\">").concat(current_page_data, "</a>")); // add current class to the current pagination link

        $(this).addClass('current');
        var requested_page_arr = $(this).attr('href').split('/');
        var requested_page_num = requested_page_arr[requested_page_arr.length - 2]; // get filter data

        var category = $('.cat-list_item.active').data('slug');
        var year = $('#year_filter').val();
        var month = $('#month_filter').val(); // make ajax request

        $.ajax({
          url: data.ajax_url,
          type: 'POST',
          dataType: 'html',
          data: {
            action: 'ajax_pagination_reports',
            category: category,
            year: year,
            month: month,
            page: requested_page_num,
            posts_per_page: 6
          },
          success: function success(response) {
            var data_parsed = JSON.parse(response);
            $('.reports_data').html(data_parsed.data);
            $('.custom_pagination .container').html(data_parsed.pagination);
          }
        });
      });
    });
  });
})(jQuery);

/***/ }),

/***/ 1:
/*!**************************************************!*\
  !*** multi ./src/scripts/widgets/ajax_filter.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Dev\xampp\htdocs\webkeyz\zilla-multiples\wp-content\themes\zilla-multiples\src\scripts\widgets\ajax_filter.js */"./src/scripts/widgets/ajax_filter.js");


/***/ })

/******/ });
//# sourceMappingURL=ajax_filter.bundle.js.map