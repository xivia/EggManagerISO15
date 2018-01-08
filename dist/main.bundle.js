webpackJsonp(["main"],{

/***/ "../../../../../src/$$_lazy_route_resource lazy recursive":
/***/ (function(module, exports) {

function webpackEmptyAsyncContext(req) {
	// Here Promise.resolve().then() is used instead of new Promise() to prevent
	// uncatched exception popping up in devtools
	return Promise.resolve().then(function() {
		throw new Error("Cannot find module '" + req + "'.");
	});
}
webpackEmptyAsyncContext.keys = function() { return []; };
webpackEmptyAsyncContext.resolve = webpackEmptyAsyncContext;
module.exports = webpackEmptyAsyncContext;
webpackEmptyAsyncContext.id = "../../../../../src/$$_lazy_route_resource lazy recursive";

/***/ }),

/***/ "../../../../../src/app/app.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/app.component.html":
/***/ (function(module, exports) {

module.exports = "<eier-liste></eier-liste>"

/***/ }),

/***/ "../../../../../src/app/app.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};

var AppComponent = (function () {
    function AppComponent() {
        this.title = 'app';
    }
    AppComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'app-root',
            template: __webpack_require__("../../../../../src/app/app.component.html"),
            styles: [__webpack_require__("../../../../../src/app/app.component.css")]
        })
    ], AppComponent);
    return AppComponent;
}());



/***/ }),

/***/ "../../../../../src/app/app.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_common_http__ = __webpack_require__("../../../common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__app_component__ = __webpack_require__("../../../../../src/app/app.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__eier_liste_eier_liste_component__ = __webpack_require__("../../../../../src/app/eier-liste/eier-liste.component.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};






var AppModule = (function () {
    function AppModule() {
    }
    AppModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["E" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_4__app_component__["a" /* AppComponent */],
                __WEBPACK_IMPORTED_MODULE_5__eier_liste_eier_liste_component__["a" /* EierListeComponent */]
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser__["a" /* BrowserModule */],
                __WEBPACK_IMPORTED_MODULE_2__angular_forms__["a" /* FormsModule */],
                __WEBPACK_IMPORTED_MODULE_3__angular_common_http__["b" /* HttpClientModule */]
            ],
            providers: [],
            bootstrap: [__WEBPACK_IMPORTED_MODULE_4__app_component__["a" /* AppComponent */]]
        })
    ], AppModule);
    return AppModule;
}());



/***/ }),

/***/ "../../../../../src/app/eier-liste/eier-liste.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "table {\r\n  width: 100%;\r\n  height: 100%;\r\n  text-align: center;\r\n}", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/eier-liste/eier-liste.component.html":
/***/ (function(module, exports) {

module.exports = "<input type=\"text\" [(ngModel)]=\"search\">\r\n<table>\r\n  <thead>\r\n    <tr>\r\n      <th (click)=\"orderList('id', 'number')\">ID&nbsp;<i class=\"fa fa-{{getIcon('id')}}\"></i></th>\r\n      <th (click)=\"orderList('name', 'string')\">Namen&nbsp;<i class=\"fa fa-{{getIcon('name')}}\"></i></th>\r\n      <th (click)=\"orderList('color', 'string')\">Farbe&nbsp;<i class=\"fa fa-{{getIcon('color')}}\"></i></th>\r\n      <th (click)=\"orderList('size', 'number')\">Grösse&nbsp;<i class=\"fa fa-{{getIcon('size')}}\"></i></th>\r\n      <th (click)=\"orderList('type', 'string')\">Typ&nbsp;<i class=\"fa fa-{{getIcon('type')}}\"></i></th>\r\n      <th (click)=\"orderList('weight', 'number')\">Gewicht&nbsp;<i class=\"fa fa-{{getIcon('weight')}}\"></i></th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr *ngFor=\"let ei of list\">\r\n      <td>{{ei.id}}</td>\r\n      <td>{{ei.name}}</td>\r\n      <td>{{ei.color}}</td>\r\n      <td>{{ei.size}}</td>\r\n      <td>{{ei.type}}</td>\r\n      <td>{{ei.weight}}</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n"

/***/ }),

/***/ "../../../../../src/app/eier-liste/eier-liste.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return EierListeComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_common_http__ = __webpack_require__("../../../common/esm5/http.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var ORDERS = {
    string: function (a, b) {
        return a.localeCompare(b);
    },
    number: function (a, b) {
        return parseInt(a) - parseInt(b);
    }
};
var order = function (field, type, array) {
    array.sort(function (a, b) {
        return ORDERS[type](a[field], b[field]);
    });
    return array;
};
var EierListeComponent = (function () {
    function EierListeComponent(http) {
        this.http = http;
        this.search = '';
        this.fullList = Array();
        this.order = { field: 'name', type: 'string', reversed: false };
    }
    EierListeComponent.prototype.orderList = function (field, type) {
        if (this.order.field == field) {
            this.order.reversed = !this.order.reversed;
        }
        else {
            this.order.reversed = false;
        }
        this.order.field = field;
        this.order.type = type;
    };
    EierListeComponent.prototype.searchFor = function (search) {
        this.search = search;
    };
    Object.defineProperty(EierListeComponent.prototype, "list", {
        get: function () {
            var _this = this;
            var returnAble = this.fullList.slice();
            returnAble = returnAble.filter(function (look) { return look.name.toLowerCase().indexOf(_this.search.toLowerCase()) != -1; });
            returnAble = order(this.order.field, this.order.type, returnAble);
            if (this.order.reversed)
                returnAble.reverse();
            return returnAble;
        },
        enumerable: true,
        configurable: true
    });
    EierListeComponent.prototype.getIcon = function (order) {
        if (order == this.order.field && !this.order.reversed) {
            return "long-arrow-down";
        }
        else if (order == this.order.field) {
            return "long-arrow-up";
        }
        else {
            return "arrows-v";
        }
    };
    EierListeComponent.prototype.ngOnInit = function () {
        var header = new __WEBPACK_IMPORTED_MODULE_1__angular_common_http__["c" /* HttpHeaders */]();
        header.set('Access-Control-Allow-Origin', 'true');
        this.http.get('http://localhost:8080/EggManagerISO15/api/egg.php', { headers: header }).subscribe(console.log);
        this.fullList = [];
        /*this.fullList = [
          {
            id: '1',
            name: 'Eiophor',
            color: 'wachsgrüün',
            size: 'medium',
            type: 'verdorben',
            weight: 23.83
          },
          {
            id: '2',
            name: 'Eiophortsch',
            color: 'wachsggelb',
            size: 'medium-small',
            type: 'auch verdorben',
            weight: 23.23
          },
          {
            id: '3',
            name: 'Naseböög',
            color: 'blauuuu',
            size: 'insane',
            type: 'gruusig',
            weight: 29.77
          },
          {
            id: '4',
            name: 'Janiggerere',
            color: 'grchüee',
            size: 'medium-small-big',
            type: 'nümme guet',
            weight: 22.21
          }
        ];*/
    };
    EierListeComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'eier-liste',
            template: __webpack_require__("../../../../../src/app/eier-liste/eier-liste.component.html"),
            styles: [__webpack_require__("../../../../../src/app/eier-liste/eier-liste.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_1__angular_common_http__["a" /* HttpClient */]])
    ], EierListeComponent);
    return EierListeComponent;
}());



/***/ }),

/***/ "../../../../../src/environments/environment.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return environment; });
// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `.angular-cli.json`.
var environment = {
    production: false
};


/***/ }),

/***/ "../../../../../src/main.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__ = __webpack_require__("../../../platform-browser-dynamic/esm5/platform-browser-dynamic.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__app_app_module__ = __webpack_require__("../../../../../src/app/app.module.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__environments_environment__ = __webpack_require__("../../../../../src/environments/environment.ts");




if (__WEBPACK_IMPORTED_MODULE_3__environments_environment__["a" /* environment */].production) {
    Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["_7" /* enableProdMode */])();
}
Object(__WEBPACK_IMPORTED_MODULE_1__angular_platform_browser_dynamic__["a" /* platformBrowserDynamic */])().bootstrapModule(__WEBPACK_IMPORTED_MODULE_2__app_app_module__["a" /* AppModule */])
    .catch(function (err) { return console.log(err); });


/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("../../../../../src/main.ts");


/***/ })

},[0]);
//# sourceMappingURL=main.bundle.js.map