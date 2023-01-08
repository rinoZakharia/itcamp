webpackHotUpdate("static\\development\\pages\\index.js",{

/***/ "./components/MediaPartner.js":
/*!************************************!*\
  !*** ./components/MediaPartner.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _config_config__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../config/config */ "./config/config.js");
var _this = undefined,
    _jsxFileName = "C:\\Users\\Novandi\\Downloads\\fasilkomfestdashboard-master\\components\\MediaPartner.js";

var __jsx = react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement;



var MediaPartner = function MediaPartner() {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_0__["useState"])([]),
      dataMP = _useState[0],
      setDataMP = _useState[1];

  Object(react__WEBPACK_IMPORTED_MODULE_0__["useEffect"])(function () {
    var url = _config_config__WEBPACK_IMPORTED_MODULE_1__["baseURL"] + "api/medpart";
    fetch(url).then(function (response) {
      response.json().then(function (data) {
        setDataMP(data);
      });
    });
  }, []);
  return __jsx("div", {
    className: "brand-one my-5 py-5",
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 15,
      columnNumber: 5
    }
  }, __jsx("div", {
    className: "container",
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 16,
      columnNumber: 7
    }
  }, __jsx("div", {
    className: "block-title text-center",
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 17,
      columnNumber: 9
    }
  }, __jsx("h2", {
    className: "block-title__title",
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 18,
      columnNumber: 11
    }
  }, __jsx("span", {
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 19,
      columnNumber: 13
    }
  }, " Media Partner "), " "), " "), " ", __jsx("div", {
    className: "row justify-content-center medpart",
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 22,
      columnNumber: 9
    }
  }, " ", dataMP.map(function (item, index) {
    return __jsx("div", {
      key: index,
      className: "item  col-md-2 col-3 text-center d-flex align-items-center ",
      __self: _this,
      __source: {
        fileName: _jsxFileName,
        lineNumber: 26,
        columnNumber: 15
      }
    }, __jsx("img", {
      className: "img-fluid w-100  my-3",
      src: _config_config__WEBPACK_IMPORTED_MODULE_1__["baseURL"] + "uploads/media/" + item.gambarMed,
      alt: item.namaMed,
      __self: _this,
      __source: {
        fileName: _jsxFileName,
        lineNumber: 27,
        columnNumber: 17
      }
    }));
  }), " "), " "), " ");
};

/* harmony default export */ __webpack_exports__["default"] = (MediaPartner);

/***/ })

})
//# sourceMappingURL=index.js.1e86f516b50c13c041f8.hot-update.js.map