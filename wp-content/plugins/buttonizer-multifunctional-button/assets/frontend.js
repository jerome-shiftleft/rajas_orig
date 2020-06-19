/*!
 * 
 * This file is part of the Buttonizer plugin that is downloadable through Wordpress.org,
 * please do not redistribute this plugin or the files without any written permission of the author.
 * 
 * If you need support, contact us at support@buttonizer.pro or visit our community website
 * https://community.buttonizer.pro/
 * 
 * Buttonizer is Freemium software. The free version (build) does not contain premium functionality.
 * 
 * (C) 2017-2020 Buttonizer
 * 
 */
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
/******/ 	return __webpack_require__(__webpack_require__.s = 877);
/******/ })
/************************************************************************/
/******/ ({

/***/ 1250:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 875:
/***/ (function(module, exports) {

/**
 * Exit intent
 */

/***/ }),

/***/ 876:
/***/ (function(module, exports) {

/**
 * Show on scroll
 */

/***/ }),

/***/ 877:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./src/js/frontend/Group/Button/Button.js
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Button = /*#__PURE__*/function () {
  function Button(groupObject, data) {
    _classCallCheck(this, Button);

    this.group = groupObject;
    this.data = data;
    this.icon = data.icon.buttonIcon;
    this.show_mobile = data.device.show_mobile;
    this.show_desktop = data.device.show_desktop;
    this.style = "";
    this.button;
    this.init(); // Creates random string for this button

    this.unique = "buttonizer-button-" + Array.apply(0, Array(15)).map(function () {
      return function (charset) {
        return charset.charAt(Math.floor(Math.random() * charset.length));
      }("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789");
    }).join("");
  }
  /**
   * Initialize Button
   */


  _createClass(Button, [{
    key: "init",
    value: function init() {// Nothing to do
    }
  }, {
    key: "build",
    value: function build() {
      var _this = this;

      var button = document.createElement("a");
      button.className = "buttonizer-button";
      button.setAttribute("data-buttonizer", this.unique);

      if (this.data.action.type === "url" || this.data.action.type === "poptin") {
        button.href = this.data.action.action; // If open new tab = true, use target=_blank

        if (this.data.action.type === "url" && this.data.action.action_new_tab === true) {
          button.target = "_blank";
        }
      } else {
        button.href = "javascript:void(0)";
      } // If action is Elementor popup, add attribute


      if (this.data.action.type === "elementor_popup" || this.data.action.type === "popup_maker") {
        button.href = "#" + this.data.action.action;
      } // Check if set to mobile or desktop only
      // Just show on mobile phones


      if (this.show_mobile === true && this.show_desktop === false) {
        this.group.mobileButtonCount++;
        button.className += " button-mobile-" + this.group.mobileButtonCount + " button-hide-desktop";
      } // Just show on desktop
      else if (this.show_mobile === false && this.show_desktop === true) {
          this.group.desktopButtonCount++;
          button.className += " button-desktop-" + this.group.desktopButtonCount + " button-hide-mobile";
        } // Do not show the button
        else if (this.show_mobile === false && this.show_desktop === false) {
            button.className += " button-hide-desktop button-hide-mobile";
          } // Show on all devices
          else {
              this.group.mobileButtonCount++;
              this.group.desktopButtonCount++;
              button.className += " button-mobile-" + this.group.mobileButtonCount + " button-desktop-" + this.group.desktopButtonCount;
            } // Check which setting Show label is on desktop, then add class


      if (this.data.label.show_label_desktop === "hover") {
        button.className += " show-label-desktop-hover";
      } else if (this.data.label.show_label_desktop === "hide") {
        button.className += " label-desktop-hidden";
      } // Check which setting Show label is on mobile, then add class


      if (this.data.label.show_label_mobile === "hide") {
        button.className += " label-mobile-hidden";
      } // If button action type is facebook messenger chat, add necessary elements


      if (this.data.action.type === "messenger_chat") {
        this.addMessengerWindow();
      } // Add button label


      if (this.data.label.label.length > 0) {
        var label = document.createElement("div");
        label.className = "buttonizer-label";
        label.innerText = this.data.label.label;
        button.appendChild(label);
      } else if (this.data.label.label === "" && this.group.data.styling.menu.style === "rectangle") {
        var _label = document.createElement("div");

        _label.className = "buttonizer-label";
        _label.innerText = this.data.name + "'s label";
        button.appendChild(_label);
      }

      var icon;

      (function () {
        icon = document.createElement("i");
        icon.className = _typeof(_this.icon) !== undefined ? _this.icon : "fa fa-user";
        button.appendChild(icon);
      })();

      button.addEventListener("click", function (e) {
        return _this.onButtonClick(e);
      }); // Generate style for this button

      this.generateStyle();
      this.button = button;
      return this.button;
    }
    /**
     *
     * @param e
     */

  }, {
    key: "onButtonClick",
    value: function onButtonClick() {
      // Track event
      window.Buttonizer.googleAnalyticsEvent({
        type: "button-click",
        groupName: this.group.data.name,
        buttonName: this.data.name
      });

      if (this.data.action.type === "url" || this.data.action.type === "poptin") {
        return;
      } else if (this.data.action.type === "phone") {
        document.location.href = "tel:".concat(this.data.action.action);
        return;
      } else if (this.data.action.type === "mail") {
        var mail = "mailto:".concat(this.data.action.action);
        document.location.href = mail;
        return;
      } else if (this.data.action.type === "backtotop") {
        jQuery("html, body").animate({
          scrollTop: 0
        }, 750);
        return;
      } else if (this.data.action.type === "gobackpage") {
        window.history.back();
        return;
      } else if (this.data.action.type === "socialsharing") {
        if (this.data.action.action === "facebook") {
          window.open("http://www.facebook.com/sharer.php?u=" + document.location.href + "&t=" + document.title + "", "popupFacebook", "width=610, height=480, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0");
          return false;
        } else if (this.data.action.action === "twitter") {
          window.open("https://twitter.com/intent/tweet?text=" + encodeURI(document.title) + " Hey! Check out this link:" + "&url=" + document.location.href + "", "popupTwitter", "width=610, height=480, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0");
          return false;
        } else if (this.data.action.action === "whatsapp") {
          window.open("https://api.whatsapp.com/send?text=" + encodeURI(document.title + " Hey! Check out this link:" + document.location.href));
        } else if (this.data.action.action === "linkedin") {
          window.open("http://www.linkedin.com/shareArticle?mini=true&url=" + document.location.href + "&title=" + encodeURI(document.title) + "&summary=" + encodeURI(document.title) + "", "popupLinkedIn", "width=610, height=480, resizable=0, toolbar=0, menubar=0, status=0, location=0, scrollbars=0");
          return false;
        } else if (this.data.action.action === "pinterest") {
          window.open("http://pinterest.com/pin/create/button/?url=".concat(document.location.href));
          return false;
        } else if (this.data.action.action === "mail") {
          window.location.href = "mailto:?subject=" + encodeURI(document.title.replace(/&/g, "").trim()) + "&body= Hey! Check out this link: " + encodeURI(document.location.href.replace(/&/g, "").trim());
        } // New actions
        else if (this.data.action.action === "reddit") {
            var reddit = "https://www.reddit.com/submit?url=".concat(encodeURI("Hey! Check out this link: " + document.location.href), "&title=").concat(encodeURI(document.title));
            window.open(reddit);
            return false;
          } else if (this.data.action.action === "tumblr") {
            window.open("https://www.tumblr.com/widgets/share/tool?shareSource=legacy&canonicalUrl=".concat(encodeURI(document.location.href), "&posttype=link"));
            return false;
          } else if (this.data.action.action === "digg") {
            window.open("http://digg.com/submit?url=".concat(encodeURI(document.location.href)));
            return false;
          } else if (this.data.action.action === "weibo") {
            window.open("http://service.weibo.com/share/share.php?url=".concat(encodeURI(document.location.href), "&title=").concat(encodeURI(document.title), "&pic=https://plus.google.com/_/favicon?domain=").concat(document.location.origin));
            return false;
          } else if (this.data.action.action === "vk") {
            window.open("https://vk.com/share.php?url=".concat(encodeURI(document.location.href), "&title=").concat(encodeURI(document.title), "&comment=Hey%20Check%20this%20out!"));
            return false;
          } else if (this.data.action.action === "ok") {
            window.open("https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&st.shareUrl=".concat(encodeURI(document.location.href)));
            return false;
          } else if (this.data.action.action === "xing") {
            window.open("https://www.xing.com/spi/shares/new?url=".concat(encodeURI(document.location.href)));
            return false;
          } else if (this.data.action.action === "blogger") {
            window.open("https://www.blogger.com/blog-this.g?u=".concat(encodeURI(document.location.href), "&n=").concat(encodeURI(document.title), "&t=Check%20this%20out!"));
            return false;
          } else if (this.data.action.action === "flipboard") {
            window.open("https://share.flipboard.com/bookmarklet/popout?v=2&title=".concat(encodeURI(document.title), "&url=").concat(encodeURI(document.location.href)));
            return false;
          } else if (this.data.action.action === "sms") {
            window.open("sms:?body=".concat(encodeURI(document.title + "Hey! Check out this link: " + document.location.href)));
            return false;
          }

        return;
      } else if (this.data.action.type === "whatsapp_pro" || this.data.action.type === "whatsapp") {
        var whatsapp = "https://api.whatsapp.com/send?phone=".concat(this.data.action.action);
        window.open(whatsapp);
        return;
      } else if (this.data.action.type === "skype") {
        /* Social Media actions */
        document.location.href = "skype:".concat(this.data.action.action, "?chat");
        return;
      } else if (this.data.action.type === "messenger") {
        window.open(this.data.action.action);
        return;
      } else if (this.data.action.type === "sms") {
        var sms = "sms:".concat(this.data.action.action);
        document.location.href = sms;
        return;
      } else if (this.data.action.type === "telegram") {
        window.open("https://telegram.me/".concat(this.data.action.action));
        return;
      } else if (this.data.action.type === "facebook") {
        window.open("https://www.facebook.com/".concat(this.data.action.action));
        return;
      } else if (this.data.action.type === "instagram") {
        window.open("https://www.instagram.com/".concat(this.data.action.action));
        return;
      } else if (this.data.action.type === "line") {
        window.open("https://line.me/R/ti/p/".concat(this.data.action.action));
        return;
      } else if (this.data.action.type === "twitter") {
        window.open("https://twitter.com/".concat(this.data.action.action));
        return;
      } else if (this.data.action.type === "twitter_dm") {
        var dms = "https://twitter.com/messages/compose?recipient_id=".concat(this.data.action.action);
        window.open(dms);
        return;
      } else if (this.data.action.type === "snapchat") {
        window.open("https://www.snapchat.com/add/".concat(this.data.action.action));
        return;
      } else if (this.data.action.type === "linkedin") {
        window.open("https://www.linkedin.com/".concat(this.data.action.action));
        return;
      } else if (this.data.action.type === "viber") {
        document.location.href = "viber://chat?number=".concat(this.data.action.action);
        return;
      } else if (this.data.action.type === "vk") {
        window.open("https://vk.me/".concat(this.data.action.action));
        return;
      } else if (this.data.action.type === "popup_maker") {
        return;
      } else if (this.data.action.type === "elementor_popup") {
        return;
      } else if (this.data.action.type === "popups") {
        var remove = this.data.action.action; // is NaN

        if (isNaN(remove)) {
          remove = remove.replace(/\D/g, "");
        } // Show popup


        window.SPU.show(remove);
        return;
      } else if (this.data.action.type === "waze") {
        document.location.href = this.data.action.action;
        return;
      } else if (this.data.action.type === "wechat") {
        document.location.href = "weixin://dl/chat?".concat(this.data.action.action);
        return;
      } else if (this.data.action.type === "clipboard") {
        this.copyClipboard();
        return;
      } else if (this.data.action.type === "print") {
        window.print();
        return;
      } else if (this.data.action.type === "messenger_chat") {
        if (typeof window.Buttonizer.initializedFacebookChat !== "undefined" && document.querySelectorAll(".fb-customerchat").length > 0) {
          if (document.querySelector(".fb-customerchat").querySelector("iframe").style.maxHeight === "0px") {
            FB.CustomerChat.showDialog();
          } else if (document.querySelector(".fb-customerchat").querySelector("iframe").style.maxHeight === "100%") {
            FB.CustomerChat.hideDialog();
          }
        } else {
          if (window.Buttonizer.previewInitialized) {
            window.Buttonizer.messageButtonizerAdminEditor("warning", "Facebook Messenger button is not found, it may be blocked or this domain is not allowed to load the Facebook widget.");
          } else {
            alert("Sorry, we were unable to open Facebook Messenger! Check the console for more information.");
          }
        }

        return;
      }

      console.error("Buttonizer: Error! Unknown button action!");
    }
  }, {
    key: "generateStyle",
    value: function generateStyle() {
      if (!this.data.styling.main_style) {
        if (this.data.styling.label.size !== "12px" || this.data.styling.label.radius !== "3px") {
          var size;
          var radius;

          if (this.data.styling.label.size === "px") {
            size = this.group.data.styling.label.size === "px" ? "12px" : this.group.data.styling.label.size;
          } else {
            size = this.data.styling.label.size;
          }

          if (this.data.styling.label.radius === "px") {
            radius = this.group.data.styling.label.radius === "px" ? "3px" : this.group.data.styling.label.radius;
          } else {
            radius = this.data.styling.label.radius;
          }

          this.group.stylesheet += "\n                  [data-buttonizer=\"".concat(this.group.unique, "\"] [data-buttonizer=\"").concat(this.unique, "\"] .buttonizer-label {\n                      font-size: ").concat(size, ";\n                      border-radius: ").concat(radius, ";\n                      -moz-border-radius: ").concat(radius, ";\n                      -webkit-border-radius: ").concat(radius, ";\n                  }\n              ");
        }

        if (this.data.styling.button) {
          var extraStyle = "";

          if (this.data.styling.button.radius !== "%") {
            extraStyle += "\n                  border-radius: ".concat(this.data.styling.button.radius, ";\n                  ");
          } else {
            extraStyle += "\n                  border-radius: 50%;\n                  ";
          }

          this.group.stylesheet += "\n              [data-buttonizer=\"".concat(this.group.unique, "\"] [data-buttonizer=\"").concat(this.unique, "\"] {\n                  background-color: ").concat(this.data.styling.button.color, ";\n                  ").concat(this.data.styling.button.color.substr(-2) === "00" ? "box-shadow: none;" : "", ";\n                  ").concat(extraStyle, "\n              }\n              \n              [data-buttonizer=\"").concat(this.group.unique, "\"] [data-buttonizer=\"").concat(this.unique, "\"]:hover {\n                  background-color: ").concat(this.data.styling.button.interaction, "\n              }\n              \n              [data-buttonizer=\"").concat(this.group.unique, "\"] [data-buttonizer=\"").concat(this.unique, "\"] .buttonizer-label {\n                  background-color: ").concat(this.data.styling.label.background, ";\n                  color: ").concat(this.data.styling.label.text, " !important;\n              }");
        }

        if (this.data.styling.button) {
          this.group.stylesheet += "\n              [data-buttonizer=\"".concat(this.group.unique, "\"].attention-animation-true.buttonizer-animation-pulse.buttonizer-desktop-has-1.buttonizer-mobile-has-1 [data-buttonizer=\"").concat(this.unique, "\"]:before, \n              [data-buttonizer=\"").concat(this.group.unique, "\"].attention-animation-true.buttonizer-animation-pulse.buttonizer-desktop-has-1.buttonizer-mobile-has-1 [data-buttonizer=\"").concat(this.unique, "\"]:after {\n                  background-color: ").concat(this.data.styling.button.color, ";\n              }\n          ");
        }

        this.group.stylesheet += "\n        [data-buttonizer=\"".concat(this.group.unique, "\"] [data-buttonizer=\"").concat(this.unique, "\"] i {\n            color: ").concat(this.data.styling.icon.color, ";\n        }\n        \n        [data-buttonizer=\"").concat(this.group.unique, "\"] [data-buttonizer=\"").concat(this.unique, "\"]:hover i{\n          color: ").concat(this.data.styling.icon.interaction, ";\n\n          transition: all 0.2s ease-in-out;\n          -moz-transition: all 0.2s ease-in-out;\n          -webkit-transition: all 0.2s ease-in-out;\n          -o-transition: all 0.2s ease-in-out;\n        }\n      ");
      }

      this.group.stylesheet += "\n        [data-buttonizer=\"".concat(this.group.unique, "\"] [data-buttonizer=\"").concat(this.unique, "\"] i {\n            font-size: ").concat(this.data.styling.icon.size, ";\n\n            transition: all 0.2s ease-in-out;\n            -moz-transition: all 0.2s ease-in-out;\n            -webkit-transition: all 0.2s ease-in-out;\n            -o-transition: all 0.2s ease-in-out;\n        }\n        ");
    }
    /**
     * Got a request to destroy this button
     * Try to remove as much references as possible
     */

  }, {
    key: "destroy",
    value: function destroy() {
      this.button.remove(); // Remove object

      this.group.removeButton(this); // Remove button from group

      this.group = null; // Remove group reference

      this.data = null; // Remove data reference

      this.button = null; // Remove button reference

      delete this;
    } // Messenger

  }, {
    key: "addMessengerWindow",
    value: function addMessengerWindow() {
      if (typeof window.Buttonizer.initializedFacebookChat !== "undefined") {
        // Already done
        return;
      }

      window.Buttonizer.initializedFacebookChat = this.data.action.action === "" ? undefined : this.data.action.action; // Initialize first

      window.fbAsyncInit = function () {
        FB.init({
          xfbml: true,
          version: "v3.3"
        });
      }; // Add script


      var fbMessengerScript = document.createElement("script");
      fbMessengerScript.innerHTML = "\n             (function(d, s, id) {\n              var js, fjs = d.getElementsByTagName(s)[0];\n              if (d.getElementById(id)) return;\n              js = d.createElement(s); js.id = id;\n              js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';\n              fjs.parentNode.insertBefore(js, fjs);\n            }(document, 'script', 'facebook-jssdk'));";
      document.head.appendChild(fbMessengerScript);
    }
  }, {
    key: "copyClipboard",
    value: function copyClipboard() {
      var dummy = document.createElement("input"),
          text = window.location.href;
      document.body.appendChild(dummy);
      dummy.value = text;
      dummy.select();
      document.execCommand("copy");
      document.body.removeChild(dummy);
      var label = document.createElement("div");
      label.className = "buttonizer-label buttonizer-label-popup";
      label.innerText = "Copied!";
      this.button.appendChild(label);
      setTimeout(function () {
        label.remove();
      }, 2000);
    }
  }]);

  return Button;
}();


// CONCATENATED MODULE: ./src/js/frontend/Group/Group.js
function _createForOfIteratorHelper(o) { if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (o = _unsupportedIterableToArray(o))) { var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var it, normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(n); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function Group_typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { Group_typeof = function _typeof(obj) { return typeof obj; }; } else { Group_typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return Group_typeof(obj); }

function Group_classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function Group_defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function Group_createClass(Constructor, protoProps, staticProps) { if (protoProps) Group_defineProperties(Constructor.prototype, protoProps); if (staticProps) Group_defineProperties(Constructor, staticProps); return Constructor; }



var Group_Group = /*#__PURE__*/function () {
  function Group(data, index) {
    Group_classCallCheck(this, Group);

    this.data = data;
    this.groupIndex = index;
    this.buttons = []; // Default parameters

    this.isBuild = false;
    this.opened = false; // Exit intent

    this.usesExitIntent = false;
    this.exitIntentExecuted = false;
    this.usesOnSroll = false;
    this.show_mobile = this.data.device.show_mobile;
    this.show_desktop = this.data.device.show_desktop;
    this.single_button_mode = this.data.single_button_mode;
    this.element = null; // Menu styling

    this.groupStyle = this.data.styling.menu.style;
    this.groupAnimation = this.data.styling.menu.animation;
    this.stylesheet = "";
    this.mobileButtonCount = 0;
    this.desktopButtonCount = 0; // Creates random string for this group

    this.unique = "buttonizer-" + Array.apply(0, Array(15)).map(function () {
      return function (charset) {
        return charset.charAt(Math.floor(Math.random() * charset.length));
      }("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789");
    }).join(""); // Initialize group

    this.init();
  }
  /**
   * Initialize group
   */


  Group_createClass(Group, [{
    key: "init",
    value: function init() {
      // Create buttons
      for (var i = 0; i < this.data.buttons.length; i++) {
        var button = new Button(this, this.data.buttons[i]);
        this.buttons.push(button);
      } // Build group


      this.build(); // Animate main button

      this.animate();
    }
    /**
     * Build group
     */

  }, {
    key: "build",
    value: function build() {
      var _this = this;

      // No buttons
      if (this.isBuild === true || this.buttons.length === 0) {
        console.error("Buttonizer: Cannot create group: No buttons or already build");
        return;
      } // ${this.data.position.right <= 50 ? 'right' : 'left'}: ${this.data.position.right <= 50 ? this.data.position.right : (100 - this.data.position.right)}%;
      // ${this.data.position.bottom <= 50 ? 'bottom' : 'top'}: ${this.data.position.bottom <= 50 ? this.data.position.bottom : (100 - this.data.position.bottom)}%;
      // Quick fix for migration mistake


      if (this.groupStyle === "fade-left-to-right") {
        this.groupStyle = "faded";
      }

      var group = document.createElement("div");
      group.className = "buttonizer buttonizer-group buttonizer-style-".concat(this.groupStyle, " buttonizer-animation-").concat(this.groupAnimation, " ").concat(this.data.position.bottom <= 50 ? "bottom" : "top", " ").concat(this.data.position.right <= 50 ? "right" : "left");
      group.setAttribute("data-buttonizer", this.unique); // Check if set to mobile or desktop only

      if (this.show_mobile === true && this.show_desktop === false) {
        group.className += " button-mobile-only";
      } else if (this.show_mobile === false && this.show_desktop === true) {
        group.className += " button-desktop-only";
      } else if (this.show_mobile === false && this.show_desktop === false) {
        group.className += " button-hide";
      } // Do we need to make a array of buttons?


      if (this.buttons.length > 1) {
        group.classList.add("buttonizer-is-menu"); //check Always open

        if (this.data.openedByDefault === true) {
          if (!document.cookie.match("buttonizer_open=")) {
            setTimeout(function () {
              group.classList.add("opened");
            }, 100);
            this.opened = !this.opened;
          } else if (document.cookie.match("buttonizer_open=closed")) {} else if (document.cookie.match("buttonizer_open=opened")) {
            group.classList.add("opened");
            this.opened = true;
          }
        } // When in preview modus and button was opened


        if (buttonizer_ajax.in_preview === "1" && document.cookie.match("buttonizer_preview_" + this.groupIndex + "=opened")) {
          this.opened = true;
          group.classList.add("opened");
        }

        if (this.data.styling.menu.style === "square" || this.data.styling.menu.style === "rectangle") {
          group.classList.add("opened");
        } // Button list


        var buttonList = document.createElement("div");
        buttonList.className = "buttonizer-button-list"; // Create group button

        var mainButton = document.createElement("a");
        mainButton.href = "javascript:void(0)";
        mainButton.className = "buttonizer-button buttonizer-head"; // Check which setting Show label is on (desktop), then add class... or not...

        if (this.data.label.show_label_desktop === "hover") {
          mainButton.className += " show-label-desktop-hover";
        } else if (this.data.label.show_label_desktop === "hide") {
          mainButton.className += " label-desktop-hidden";
        } // Check which setting Show label is on (mobile), then add class... or not...


        if (this.data.label.show_label_mobile === "hide") {
          mainButton.className += " label-mobile-hidden";
        } // If label is empty, don't add label.


        var mainButtonLabel = "<div class=\"buttonizer-label\">".concat(this.data.label.groupLabel, "</div>");
        var mainButtonIcon;
        mainButtonIcon = "<i class=\"".concat(Group_typeof(this.data.icon.groupIcon) !== undefined ? this.data.icon.groupIcon : "fa fa-plus", "\"></i>");

        if (this.data.label.groupLabel.length <= 0) {
          mainButton.innerHTML = mainButtonIcon;
        } else {
          mainButton.innerHTML = mainButtonLabel + mainButtonIcon;
        }

        mainButton.addEventListener("click", function (e) {
          return _this.toggleMenu(e);
        });
        group.appendChild(buttonList);
        group.appendChild(mainButton); // Add all buttons to page

        for (var i = 0; i < this.buttons.length; i++) {
          // check if a buttons is using messenger, add messenger widget.
          if (this.buttons[i].data.action.type === "messenger_chat") {
            var messengerDiv = document.createElement("div");
            messengerDiv.className = "fb-customerchat buttonizer-facebook-messenger-overwrite-".concat(this.unique);
            messengerDiv.setAttribute("page-id", "".concat(this.buttons[i].data.action.action));
            messengerDiv.setAttribute("greeting_dialog_display", "hide");
            group.appendChild(messengerDiv);
          }

          buttonList.appendChild(this.buttons[i].build()); // Build button
        }
      } else {
        group.appendChild(this.buttons[0].build()); // Build button
        // check if a button is using messenger, add messenger widget.

        if (this.buttons[0].data.action.type === "messenger_chat") {
          var _messengerDiv = document.createElement("div");

          _messengerDiv.className = "fb-customerchat buttonizer-facebook-messenger-overwrite-".concat(this.unique);

          _messengerDiv.setAttribute("page-id", "".concat(this.buttons[0].data.action.action));

          _messengerDiv.setAttribute("greeting_dialog_display", "hide");

          group.appendChild(_messengerDiv);
        }
      }

      group.className += " buttonizer-desktop-has-".concat(this.desktopButtonCount, " buttonizer-mobile-has-").concat(this.mobileButtonCount); // Write group

      this.element = group; // Register element

      document.body.appendChild(this.element); // Write group to body

      this.isBuild = true;
      this.writeCSS();

      if (this.data.styling.menu.style === "rectangle") {
        this.maxLabelWidth(group, "rectangle");
      }
    }
    /**
     * Toggle
     * @param e
     */

  }, {
    key: "toggleMenu",
    value: function toggleMenu(e) {
      e.preventDefault(); // Track event

      window.Buttonizer.googleAnalyticsEvent({
        type: "group-open-close",
        name: this.data.name,
        interaction: this.opened ? "close" : "open"
      }); // Update

      if (this.opened) {
        this.element.classList.remove("opened");
      } else {
        this.element.classList.add("opened");
      } // Update opened to opposite


      this.opened = !this.opened; // Set cookie closed-opened

      if (this.data.openedByDefault === true) {
        if (!document.cookie.match("buttonizer_open=")) {
          document.cookie = "buttonizer_open=closed";
        } else if (document.cookie.match("buttonizer_open=closed")) {
          document.cookie = "buttonizer_open=opened";
        } else if (document.cookie.match("buttonizer_open=opened")) {
          document.cookie = "buttonizer_open=closed";
        }
      } // Toggle preview status


      if (buttonizer_ajax.in_preview === "1") {
        this.togglePreviewOpened();
      }
    }
    /**
     * Toggle preview opened
     */

  }, {
    key: "togglePreviewOpened",
    value: function togglePreviewOpened() {
      if (this.opened) {
        document.cookie = "buttonizer_preview_" + this.groupIndex + "=opened";
      } else {
        document.cookie = "buttonizer_preview_" + this.groupIndex + "=closed";
      }
    }
  }, {
    key: "writeCSS",
    value: function writeCSS() {
      var stylesheet = document.createElement("style");
      stylesheet.id = this.unique;
      var css = "            \n            [data-buttonizer=\"".concat(this.unique, "\"] {\n                ").concat(this.data.position.right <= 50 ? "right" : "left", ": ").concat(this.data.position.right <= 50 ? this.data.position.right : 100 - this.data.position.right, "%;\n                ").concat(this.data.position.bottom <= 50 ? "bottom" : "top", ": ").concat(this.data.position.bottom <= 50 ? this.data.position.bottom : 100 - this.data.position.bottom, "%;\n            }\n            \n            [data-buttonizer=\"").concat(this.unique, "\"] .buttonizer-button {\n                background-color: ").concat(this.data.styling.button.color, ";\n                color: ").concat(this.data.styling.icon.color, ";\n                border-radius: ").concat(this.data.styling.button.radius, ";\n                ").concat(this.data.styling.button.color.replace(/\D/g, "").substr(-1) === "0" ? "box-shadow: none;" : "", "\n            }\n            \n            [data-buttonizer=\"").concat(this.unique, "\"] .buttonizer-button:hover {\n                background-color: ").concat(this.data.styling.button.interaction, ";\n                color: ").concat(this.data.styling.icon.color, "\n            }\n            \n            [data-buttonizer=\"").concat(this.unique, "\"] .buttonizer-button .buttonizer-label {\n                background-color: ").concat(this.data.styling.label.background, ";\n                color: ").concat(this.data.styling.label.text, ";\n                font-size: ").concat(this.data.styling.label.size, ";\n                border-radius: ").concat(this.data.styling.label.radius, ";\n            }\n\n            [data-buttonizer=\"").concat(this.unique, "\"] .buttonizer-button i {\n                color: ").concat(this.data.styling.icon.color, ";\n                font-size: ").concat(this.data.styling.icon.size, ";\n            }\n\n            [data-buttonizer=\"").concat(this.unique, "\"] .buttonizer-button:hover i {\n                color: ").concat(this.data.styling.icon.interaction, ";\n            }\n            \n            [data-buttonizer=\"").concat(this.unique, "\"].attention-animation-true.buttonizer-animation-pulse .buttonizer-head:before, \n            [data-buttonizer=\"").concat(this.unique, "\"].attention-animation-true.buttonizer-animation-pulse .buttonizer-head:after {\n                background-color: ").concat(this.data.styling.button.color, ";\n            }\n        ");

      if (this.data.buttons.length === 1 && this.groupAnimation === "pulse") {
        css += "\n                [data-buttonizer=\"".concat(this.unique, "\"].attention-animation-true.buttonizer-animation-pulse > .buttonizer-button.button-desktop-1:before, \n                [data-buttonizer=\"").concat(this.unique, "\"].attention-animation-true.buttonizer-animation-pulse > .buttonizer-button.button-desktop-1:after {\n                    background-color: ").concat(this.data.styling.button.color, ";\n                }\n\n                [data-buttonizer=\"").concat(this.unique, "\"].attention-animation-true.buttonizer-animation-pulse > .buttonizer-button.button-mobile-1:before, \n                [data-buttonizer=\"").concat(this.unique, "\"].attention-animation-true.buttonizer-animation-pulse > .buttonizer-button.button-mobile-1:after {\n                    background-color: ").concat(this.data.styling.button.color, ";\n                }\n            ");
      }

      if (typeof window.Buttonizer.initializedFacebookChat !== "undefined") {
        css += "\n                .fb_dialog {\n                    display: none !important;\n                }\n\n                .buttonizer-facebook-messenger-overwrite-".concat(this.unique, " span iframe {\n                    ").concat(this.data.position.right <= 50 ? "right" : "left", ": ").concat(this.data.position.right <= 50 ? +this.data.position.right - 1 : 100 - this.data.position.right - 1, "% !important;\n                    ").concat(this.data.position.bottom <= 50 ? "bottom" : "top", ": ").concat(this.data.position.bottom <= 50 ? +this.data.position.bottom + 4 : 100 - this.data.position.bottom + 6, "% !important;\n                }\n\n                @media screen and (max-width: 769px){\n                    .buttonizer-facebook-messenger-overwrite-").concat(this.unique, " span iframe {\n                        ").concat(this.data.position.right <= 50 ? "right" : "left", ": ").concat(this.data.position.right <= 50 ? +this.data.position.right - 5 : 100 - this.data.position.right - 1, "% !important;\n                        ").concat(this.data.position.bottom <= 50 ? "bottom" : "top", ": ").concat(this.data.position.bottom <= 50 ? +this.data.position.bottom + 4 : 100 - this.data.position.bottom + 7, "% !important;\n    \n                    }\n                }\n\n                .buttonizer-facebook-messenger-overwrite-").concat(this.unique, " span .fb_customer_chat_bounce_in_v2 {\n                    animation-duration: 300ms;\n                    animation-name: fb_bounce_in_v3 !important;\n                    transition-timing-function: ease-in-out;   \n                }\n\n                .buttonizer-facebook-messenger-overwrite-").concat(this.unique, " span .fb_customer_chat_bounce_out_v2 {\n                    max-height: 0px !important;\n                }\n\n                @keyframes fb_bounce_in_v3 {\n                    0% {\n                        opacity: 0;\n                        transform: scale(0, 0);\n                        transform-origin: bottom;\n                    }\n                    50% {\n                        transform: scale(1.03, 1.03);\n                        transform-origin: bottom;\n                    }\n                    100% {\n                        opacity: 1;\n                        transform: scale(1, 1);\n                        transform-origin: bottom;\n                    }\n                }\n            ");
      }

      css += this.stylesheet;
      stylesheet.innerHTML = css;
      document.head.appendChild(stylesheet);
    }
    /**
     * Animate main button
     */

  }, {
    key: "animate",
    value: function animate() {
      var _this2 = this;

      if (this.element === null) return;

      if (this.groupAnimation !== "none") {
        if (!this.element.classList.contains("opened")) {
          this.element.classList.add("attention-animation-true");
          setTimeout(function () {
            if (_this2.element === null) return;

            _this2.element.classList.remove("attention-animation-true");
          }, 2000);
        }

        setTimeout(function () {
          return _this2.animate();
        }, 10000);
      }
    }
    /**
     * Set show after timeout
     */

    /**
     * Set show on scroll
     */

    /**
     * Got a request to destroy this group
     * Try to remove as much references as possible
     */

  }, {
    key: "destroy",
    value: function destroy() {
      // Destroy button objects
      for (var i = 0; i < this.buttons.length; i++) {
        this.buttons[i].destroy();
      } // Remove group


      this.element.remove();
      this.element = null; // Remove stylesheet

      document.getElementById(this.unique).remove(); // Goodbye cruel world

      window.Buttonizer.destroyGroup(this);
      delete this;
    }
    /**
     * Remove button from array
     *
     * @param button
     */

  }, {
    key: "removeButton",
    value: function removeButton(button) {
      var buttonIndex = this.buttons.indexOf(button);

      if (buttonIndex >= 0) {
        this.buttons.splice(buttonIndex, 1);
      }
    }
  }, {
    key: "maxLabelWidth",
    value: function maxLabelWidth(group, style) {
      // Calculate width
      var arr = [];

      var _iterator = _createForOfIteratorHelper(group.querySelectorAll(".buttonizer-label")),
          _step;

      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var labels = _step.value;
          arr.push(labels.offsetWidth);
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }

      var max = Math.max.apply(Math, arr); // Add style to stylesheet

      var css = "\n                [data-buttonizer=\"".concat(this.unique, "\"].buttonizer-style-").concat(style, " .buttonizer-button .buttonizer-label {\n                        min-width: ").concat(max, "px;\n                        text-align: ").concat(this.data.position.right <= 50 ? "right" : "left", ";\n                }\n            ");
      document.getElementById(this.unique).innerHTML += css;
    }
    /**
     * Exit intent
     */

  }]);

  return Group;
}();


// EXTERNAL MODULE: ./src/sass/frontend/frontend.scss
var frontend = __webpack_require__(1250);

// EXTERNAL MODULE: ./src/js/frontend/Utils/ExitIntent.js
var ExitIntent = __webpack_require__(875);

// EXTERNAL MODULE: ./src/js/frontend/Utils/OnScroll.js
var OnScroll = __webpack_require__(876);

// CONCATENATED MODULE: ./src/js/frontend/Buttonizer.js
function Buttonizer_typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { Buttonizer_typeof = function _typeof(obj) { return typeof obj; }; } else { Buttonizer_typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return Buttonizer_typeof(obj); }

function Buttonizer_classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function Buttonizer_defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function Buttonizer_createClass(Constructor, protoProps, staticProps) { if (protoProps) Buttonizer_defineProperties(Constructor.prototype, protoProps); if (staticProps) Buttonizer_defineProperties(Constructor, staticProps); return Constructor; }

 // Import Buttonizer Dashboard style





var Buttonizer_Buttonizer = /*#__PURE__*/function () {
  function Buttonizer() {
    Buttonizer_classCallCheck(this, Buttonizer);

    this.firstTimeInitialize = true;
    this.write = HTMLElement;
    this.previewInitialized = false;
    this.settingsLoading = false;
    this.isInPreviewContainer = false;
    this.premium = false;
    this.groups = [];
    this.exitIntent = null;
    this.onscroll = null;
    this.settings = {
      // Google analytics
      ga: null
    };

    if (buttonizer_ajax.in_preview) {
      var stylesheet = document.createElement("style");
      stylesheet.innerHTML = "html { margin-top: 0 !important; }";
      window.document.head.appendChild(stylesheet);
    }
  }
  /**
   * Get Buttonizer
   */


  Buttonizer_createClass(Buttonizer, [{
    key: "getSettings",
    value: function getSettings() {
      var _this = this;

      // Cool, we already have the data!
      if (typeof buttonizer_data !== "undefined") {
        this.init(buttonizer_data);
        return;
      } // Add current url


      buttonizer_ajax.current.url = document.location.href;
      this.settingsLoading = true;
      jQuery.ajax({
        url: buttonizer_ajax.ajaxurl + "?action=buttonizer",
        dataType: "json",
        data: {
          qpu: buttonizer_ajax.is_admin ? Date.now() : buttonizer_ajax.cache,
          preview: buttonizer_ajax.in_preview ? 1 : 0,
          data: buttonizer_ajax.current
        },
        method: "get",
        success: function success(data) {
          if (data.status === "success") {
            _this.init(data);
          } else {
            console.error("Buttonizer: Something went wrong! Buttonizer not loaded", data);
          }
        },
        error: function error(e) {
          _this.settingsLoading = false;
          console.error("Buttonizer: OH NO! ERROR: '" + e.statusText + "'. That's all we know... Please check your PHP logs or contact Buttonizer support if you need help.");
          console.error("Buttonizer: Visit our community on https://community.buttonizer.pro/");
        }
      });
    }
  }, {
    key: "init",
    value: function init(data) {
      var _this2 = this;

      // Listen to admin
      if (buttonizer_ajax.in_preview && !this.previewInitialized) {
        this.isInPreviewContainer = true;
        this.listenToPreview();

        window.onerror = function () {
          var err = arguments.length <= 4 ? undefined : arguments[4];

          _this2.messageButtonizerAdminEditor("error", {
            name: err.name,
            message: err.message,
            column: err.column,
            line: err.line,
            sourceURL: err.sourceURL,
            stack: err.stack
          });
        };
      }

      if (buttonizer_ajax.in_preview === "" && // See if buttonizer preview cookie exists
      document.cookie.indexOf("buttonizer_preview_") !== -1) {
        document.cookie = // Get full cookie name of buttonizer preview then expire.
        document.cookie.substring(document.cookie.indexOf("buttonizer_preview_")).substring(0, document.cookie.substring(document.cookie.indexOf("buttonizer_preview_")).indexOf("=")) + "=;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
      } // No buttons


      if (data.result.length > 0) {
        // // First visit
        // if (this.getCookie("buttonizer-first-visit") === "") {
        //   document.cookie = "buttonizer-first-visit=" + new Date().getTime();
        // }
        // Loop through the group(s)
        (function () {
          _this2.groups.push(new Group_Group(data.result[0], 0));
        })();

        if (this.firstTimeInitialize) {
          this.buttonizerInitialized();
        }
      } // Send message to admin panel


      if (buttonizer_ajax.in_preview && this.previewInitialized) {
        this.messageButtonizerAdminEditor("(re)loaded", true);
        this.messageButtonizerAdminEditor("warning", data.warning);
      }

      this.settingsLoading = false;
    }
    /**
     * Feature to message the admin buttonizer editor
     *
     * @param message
     */

  }, {
    key: "messageButtonizerAdminEditor",
    value: function messageButtonizerAdminEditor(type, message) {
      try {
        window.parent.postMessage({
          eventType: "buttonizer",
          messageType: type,
          message: message
        }, document.location.origin);
      } catch (e) {
        console.error("Buttonizer tried to warn you in the front-end editor. But the message didn't came through. Well. Doesn't matter, it's just an extra function. It's nice to have.");
        console.error(e);
      }
    }
    /**
     * Feature to receive messages from the admin buttonizer editor
     */

  }, {
    key: "listenToPreview",
    value: function listenToPreview() {
      var _this3 = this;

      this.previewInitialized = true;
      window.addEventListener("message", function (event) {
        if (!event.isTrusted || typeof event.data.eventType === "undefined" || event.data.eventType !== "buttonizer") return;
        console.log("[Buttonizer] Buttonizer preview - Data received:", event.data.messageType);

        if (buttonizer_ajax.in_preview && event.data.messageType === "preview-reload") {
          _this3.reload();
        }
      }, false);
    }
    /**
     * Reload Buttonizer
     */

  }, {
    key: "reload",
    value: function reload() {
      var _this4 = this;

      if (this.settingsLoading) {
        console.log("[Buttonizer] Request too quick, first finish the previous one");
        setTimeout(function () {
          return _this4.reload();
        }, 100);
        return;
      }

      this.settingsLoading = true;

      for (var i = 0; i < this.groups.length; i++) {
        this.groups[i].destroy();
      } // Todo: Try to find a better fix for this, why doesn't the group remove itself sometimes?


      var findButtonizer = document.querySelectorAll(".buttonizer-group");

      for (var b = 0; b < findButtonizer.length; b++) {
        findButtonizer[b].remove();
      }

      setTimeout(function () {
        _this4.groups = [];

        _this4.getSettings();
      }, 50);
    }
    /**
     * Google analytics event
     *
     * @param object
     */

  }, {
    key: "googleAnalyticsEvent",
    value: function googleAnalyticsEvent(object) {
      if (typeof ga === "function" || typeof gtag === "function" || Buttonizer_typeof(window.dataLayer) === "object" && typeof window.dataLayer.push === "function") {
        var actionData = {}; // Opening or closing a group

        if (object.type === "group-open-close") {
          actionData.groupName = object.name;
          actionData.action = object.interaction;
        } else if (object.type === "button-click") {
          actionData.groupName = object.groupName;
          actionData.action = "Clicked button: " + object.buttonName;
        } // Gtag support


        if ("gtag" in window && typeof gtag === "function") {
          // Work with Google Tag Manager
          gtag("event", "Buttonizer", {
            event_category: "Buttonizer group: " + actionData.groupName,
            event_action: actionData.action,
            event_label: document.title,
            page_url: document.location.href
          });
        } else if ("ga" in window) {
          try {
            // Fallback to tracker
            var tracker = ga.getAll()[0];

            if (tracker) {
              tracker.send("event", "Buttonizer group: " + actionData.groupName, actionData.action, document.title);
            } else {
              throw "No tracker found";
            }
          } catch (e) {
            console.error("Buttonizer Google Analytics: Last try to push to Google Analytics.");
            console.error("What does this mean?", "https://community.buttonizer.pro/knowledgebase/17"); // Fallback to old Google Analytics

            ga("send", "event", {
              eventCategory: "Buttonizer group: " + actionData.groupName,
              eventAction: actionData.action,
              eventLabel: document.title
            });
          }
        } else {
          console.error("Buttonizer Google Analytics: Unable to push data to Google Analytics");
          console.error("What does this mean?", "https://community.buttonizer.pro/knowledgebase/17");
        }
      }
    }
  }, {
    key: "getCookie",
    value: function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(";");

      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];

        while (c.charAt(0) == " ") {
          c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }

      return "";
    }
    /**
     * Remove button from array
     *
     * @param group
     */

  }, {
    key: "destroyGroup",
    value: function destroyGroup(group) {
      var groupIndex = this.groups.indexOf(group);

      if (groupIndex >= 0) {
        this.groups.splice(groupIndex, 1);
      }
    }
  }, {
    key: "hasPremium",
    value: function hasPremium() {
      return this.premium;
    }
    /**
     * Buttonizer is initialized, call function
     */

  }, {
    key: "buttonizerInitialized",
    value: function buttonizerInitialized() {
      // Execute only once
      if (!this.firstTimeInitialize) {
        return;
      } // Call function


      if (typeof window.buttonizerInitialized === "function") {
        window.buttonizerInitialized();
      } //If user is using Messenger and FB is not defined, call parse


      if (typeof FB === "undefined" && typeof this.initializedFacebookChat !== "undefined" && !this.isInPreviewContainer) {
        console.log("Facebook Messenger is still not initilized: RUN FB.XFBLM.PARSE");

        try {
          FB.XFBML.parse();
        } catch (err) {
          console.log("FB is not defined. \n        Is your site whitelisted correctly?\n        Is your Facebook Messenger ID correct?");
        }
      }

      this.firstTimeInitialize = false;
    }
    /**
     * Is in preview?
     *
     * @returns {boolean}
     */

  }, {
    key: "inPreview",
    value: function inPreview() {
      return this.isInPreviewContainer;
    }
    /**
     * Start exit intent and on scroll
     */

  }]);

  return Buttonizer;
}();

window.Buttonizer = new Buttonizer_Buttonizer();
window.Buttonizer.getSettings();

/***/ })

/******/ });