webpackHotUpdate("static\\development\\pages\\index.js",{

/***/ "./pages/index.js":
/*!************************!*\
  !*** ./pages/index.js ***!
  \************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _components_Layout__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/Layout */ "./components/Layout.js");
/* harmony import */ var _components_Navigation__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../components/Navigation */ "./components/Navigation.js");
/* harmony import */ var _components_Footer__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../components/Footer */ "./components/Footer.js");
/* harmony import */ var _components_Banner__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../components/Banner */ "./components/Banner.js");
/* harmony import */ var _components_Events__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../components/Events */ "./components/Events.js");
/* harmony import */ var _components_Video__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../components/Video */ "./components/Video.js");
/* harmony import */ var _components_MediaPartner__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../components/MediaPartner */ "./components/MediaPartner.js");
/* harmony import */ var _components_InformationHeader__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../components/InformationHeader */ "./components/InformationHeader.js");
/* harmony import */ var _components_Subscribe__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../components/Subscribe */ "./components/Subscribe.js");
/* harmony import */ var _public_assets_data_index_json__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../public/assets/data/index.json */ "./public/assets/data/index.json");
var _public_assets_data_index_json__WEBPACK_IMPORTED_MODULE_11___namespace = /*#__PURE__*/__webpack_require__.t(/*! ../public/assets/data/index.json */ "./public/assets/data/index.json", 1);
/* harmony import */ var _public_assets_data_cso_json__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ../public/assets/data/cso.json */ "./public/assets/data/cso.json");
var _public_assets_data_cso_json__WEBPACK_IMPORTED_MODULE_12___namespace = /*#__PURE__*/__webpack_require__.t(/*! ../public/assets/data/cso.json */ "./public/assets/data/cso.json", 1);
/* harmony import */ var _components_Header__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ../components/Header */ "./components/Header.js");
/* harmony import */ var _components_Sponsor__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ../components/Sponsor */ "./components/Sponsor.js");
/* harmony import */ var _components_Timeline__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ../components/Timeline */ "./components/Timeline.js");
/* harmony import */ var _components_Faq__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ../components/Faq */ "./components/Faq.js");
/* harmony import */ var _components_Curicullum__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ../components/Curicullum */ "./components/Curicullum.js");
/* harmony import */ var _components_InformationDetail__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ../components/InformationDetail */ "./components/InformationDetail.js");
/* harmony import */ var _config_config__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ../config/config */ "./config/config.js");


var _this = undefined,
    _jsxFileName = "C:\\Users\\Novandi\\Downloads\\fasilkomfestdashboard-master\\pages\\index.js";


var __jsx = react__WEBPACK_IMPORTED_MODULE_1___default.a.createElement;



















var HomePage = function HomePage() {
  var getSponsor = function getSponsor() {
    var data;
    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.async(function getSponsor$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            _context.next = 2;
            return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.awrap(fetch("".concat(_config_config__WEBPACK_IMPORTED_MODULE_19__["baseURL"], "api/sponsor")));

          case 2:
            data = _context.sent;

          case 3:
          case "end":
            return _context.stop();
        }
      }
    }, null, null, null, Promise);
  };

  return __jsx(_components_Layout__WEBPACK_IMPORTED_MODULE_2__["default"], {
    pageTitle: "ITCamp",
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 29,
      columnNumber: 14
    }
  }, __jsx(_components_Header__WEBPACK_IMPORTED_MODULE_13__["default"], {
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 31,
      columnNumber: 9
    }
  }), __jsx(_components_Navigation__WEBPACK_IMPORTED_MODULE_3__["default"], {
    competition: _public_assets_data_index_json__WEBPACK_IMPORTED_MODULE_11__["competition"],
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 33,
      columnNumber: 9
    }
  }), " ", __jsx(_components_Banner__WEBPACK_IMPORTED_MODULE_5__["default"], {
    header: _public_assets_data_index_json__WEBPACK_IMPORTED_MODULE_11__["header"],
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 35,
      columnNumber: 12
    }
  }), " ", __jsx(_components_InformationHeader__WEBPACK_IMPORTED_MODULE_9__["default"], {
    data: _public_assets_data_cso_json__WEBPACK_IMPORTED_MODULE_12__,
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 37,
      columnNumber: 12
    }
  }), " ", __jsx(_components_InformationDetail__WEBPACK_IMPORTED_MODULE_18__["default"], {
    data: _public_assets_data_cso_json__WEBPACK_IMPORTED_MODULE_12__,
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 39,
      columnNumber: 12
    }
  }), " ", __jsx(_components_Video__WEBPACK_IMPORTED_MODULE_7__["default"], {
    data: _public_assets_data_index_json__WEBPACK_IMPORTED_MODULE_11__["video"],
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 41,
      columnNumber: 12
    }
  }), "  ", __jsx(_components_Timeline__WEBPACK_IMPORTED_MODULE_15__["default"], {
    data: _public_assets_data_cso_json__WEBPACK_IMPORTED_MODULE_12__,
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 43,
      columnNumber: 13
    }
  }), "  ", __jsx(_components_Curicullum__WEBPACK_IMPORTED_MODULE_17__["default"], {
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 45,
      columnNumber: 13
    }
  }), __jsx(_components_Faq__WEBPACK_IMPORTED_MODULE_16__["default"], {
    data: _public_assets_data_cso_json__WEBPACK_IMPORTED_MODULE_12__,
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 47,
      columnNumber: 9
    }
  }), " ", __jsx(_components_Sponsor__WEBPACK_IMPORTED_MODULE_14__["default"], {
    sponsors: _public_assets_data_index_json__WEBPACK_IMPORTED_MODULE_11__["sponsor"],
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 49,
      columnNumber: 12
    }
  }), " ", __jsx(_components_MediaPartner__WEBPACK_IMPORTED_MODULE_8__["default"], {
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 51,
      columnNumber: 12
    }
  }), __jsx(_components_Footer__WEBPACK_IMPORTED_MODULE_4__["default"], {
    __self: _this,
    __source: {
      fileName: _jsxFileName,
      lineNumber: 53,
      columnNumber: 9
    }
  }));
};

/* harmony default export */ __webpack_exports__["default"] = (HomePage);

/***/ })

})
//# sourceMappingURL=index.js.f59deef1a2cbc280b00c.hot-update.js.map