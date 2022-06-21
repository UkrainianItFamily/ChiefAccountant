/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************************!*\
  !*** ./resources/js/ckeditor/textareaToCkeditor.js ***!
  \*****************************************************/
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var MyUploadAdapter = /*#__PURE__*/function () {
  function MyUploadAdapter(loader) {
    _classCallCheck(this, MyUploadAdapter);

    this.loader = loader;
  }

  _createClass(MyUploadAdapter, [{
    key: "upload",
    value: function upload() {
      var _this = this;

      return this.loader.file.then(function (file) {
        return new Promise(function (resolve, reject) {
          _this._initRequest();

          _this._initListeners(resolve, reject, file);

          _this._sendRequest(file);
        });
      });
    }
  }, {
    key: "abort",
    value: function abort() {
      if (this.xhr) {
        this.xhr.abort();
      }
    }
  }, {
    key: "_initRequest",
    value: function _initRequest() {
      var xhr = this.xhr = new XMLHttpRequest();
      xhr.open('POST', '/api/upload-images', true);
      xhr.setRequestHeader('x-csrf-token', document.querySelector('#_token').content);
      xhr.responseType = 'json';
    }
  }, {
    key: "_initListeners",
    value: function _initListeners(resolve, reject, file) {
      var xhr = this.xhr;
      var loader = this.loader;
      var genericErrorText = "Couldn't upload file: ".concat(file.name, ".");
      xhr.addEventListener('error', function () {
        return reject(genericErrorText);
      });
      xhr.addEventListener('abort', function () {
        return reject();
      });
      xhr.addEventListener('load', function () {
        var response = xhr.response;

        if (!response || response.error) {
          return reject(response && response.error ? response.error.message : genericErrorText);
        }

        resolve({
          "default": response.url
        });
      });

      if (xhr.upload) {
        xhr.upload.addEventListener('progress', function (evt) {
          if (evt.lengthComputable) {
            loader.uploadTotal = evt.total;
            loader.uploaded = evt.loaded;
          }
        });
      }
    }
  }, {
    key: "_sendRequest",
    value: function _sendRequest(file) {
      var data = new FormData();
      data.append('upload', file);
      this.xhr.send(data);
    }
  }]);

  return MyUploadAdapter;
}();

function SimpleUploadAdapterPlugin(editor) {
  editor.plugins.get('FileRepository').createUploadAdapter = function (loader) {
    return new MyUploadAdapter(loader);
  };
}

var description;
document.querySelectorAll('.editor').forEach(function (input) {
  ClassicEditor.create(input, {
    extraPlugins: [SimpleUploadAdapterPlugin]
  }).then(function (editor) {
    window.description = editor;
  })["catch"](function (error) {
    console.error(error);
  });
});
/******/ })()
;