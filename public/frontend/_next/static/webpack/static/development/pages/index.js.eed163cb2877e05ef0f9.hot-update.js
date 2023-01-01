webpackHotUpdate("static\\development\\pages\\index.js",{

/***/ "./components/Sponsor.js":
/*!*******************************!*\
  !*** ./components/Sponsor.js ***!
  \*******************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _config_config__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../config/config */ "./config/config.js");
var _this = undefined,
    _jsxFileName = "C:\\Users\\Novandi\\Downloads\\fasilkomfestdashboard-master\\components\\Sponsor.js";

var __jsx = react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement;



var Sponsor = function Sponsor(prop) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_0__["useState"])([]),
      sponsor = _useState[0],
      setSponsor = _useState[1];

  Object(react__WEBPACK_IMPORTED_MODULE_0__["useEffect"])(function () {
    prop.sponsors.then(function (data) {
      setSponsor(data);
    }); // const url = baseURL+"api/sponsor"
    // fetch(url).then((response)=>{
    //     response.json().then((data)=>{
    //         setSponsor(data)
    //     })
    // })        
  }, []);
  return __jsx("section", {
    id: "sponsor",
    className: "brand-one my-5 py-5",
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 17,
      columnNumber: 5
    }
  }, __jsx("div", {
    className: "container",
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 18,
      columnNumber: 7
    }
  }, __jsx("div", {
    className: "block-title text-center pt-5 mt-3",
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 19,
      columnNumber: 9
    }
  }, __jsx("h2", {
    className: "block-title__title",
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 20,
      columnNumber: 11
    }
  }, __jsx("span", {
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 21,
      columnNumber: 13
    }
  }, "Sponsor"))), __jsx("div", {
    className: "row justify-content-center medpart",
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 24,
      columnNumber: 9
    }
  }, sponsor.map(function (item, index) {
    return __jsx("div", {
      className: item.ukuranSponsor + " item  text-center d-flex align-items-center justify-content-center item-sponsor",
      __self: _this,
      __source: {
        fileName: _jsxFileName,
        lineNumber: 27,
        columnNumber: 15
      }
    }, __jsx("a", {
      className: "text-center",
      href: item.link,
      __self: _this,
      __source: {
        fileName: _jsxFileName,
        lineNumber: 32,
        columnNumber: 17
      }
    }, __jsx("img", {
      className: "img-fluid w-100  my-1",
      src: _config_config__WEBPACK_IMPORTED_MODULE_1__["baseURL"] + "uploads/sponsor/" + item.gambarSponsor,
      alt: item.nama_sponsor,
      __self: _this,
      __source: {
        fileName: _jsxFileName,
        lineNumber: 33,
        columnNumber: 19
      }
    })));
  }))));
};

/* harmony default export */ __webpack_exports__["default"] = (Sponsor);

/***/ })

})
//# sourceMappingURL=index.js.eed163cb2877e05ef0f9.hot-update.js.map