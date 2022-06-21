/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/modalWindows.js ***!
  \**************************************/
(function () {
  if (document.querySelector('#openModal')) {
    var modalWindow = document.querySelector('#modalWindow');
    var openModalBtn = document.querySelector('#openModal');
    openModalBtn.addEventListener('click', function () {
      modalWindow.style.display = 'block';
      modalWindow.querySelectorAll('#closeModal').forEach(function (closeModalBtn) {
        closeModalBtn.onclick = function () {
          modalWindow.style.display = 'none';
        };
      });
    });
  }
})();

(function () {
  if (document.querySelectorAll('.edit-column')) {
    var editBtns = document.querySelectorAll('.edit-column');
    editBtns.forEach(function (editBtn) {
      editBtn.onclick = function (event) {
        var editModal = document.querySelector('#editModalWindow');
        editModal.style.display = 'block';
        var itemDataNameArray = Object.keys(editBtn.dataset);
        itemDataNameArray.forEach(function (dataName) {
          editModal.querySelector('#' + dataName).value = editBtn.dataset[dataName];
        });
        var closeBtn = document.querySelector('#closeEditModal');

        closeBtn.onclick = function () {
          editModal.style.display = 'none';
        };
      };
    });
  }
})();
/******/ })()
;