/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/js/mainSlider/adminEditModal.js ***!
  \***************************************************/
(function () {
  var editBtns = document.querySelectorAll('.edit-column');
  editBtns.forEach(function (editBtn) {
    editBtn.onclick = function (event) {
      var editModal = document.querySelector('#editModalWindow');
      editModal.style.display = 'block';
      var button = event.target.closest('#editBtn');
      var itemDataArray = ['id', 'title', 'link', 'description', 'position'];
      itemDataArray.forEach(function (dataName) {
        editModal.querySelector('#' + dataName).value = button.dataset[dataName];
      });
      var closeBtn = document.querySelector('#closeEditModal');

      closeBtn.onclick = function () {
        editModal.style.display = 'none';
      };
    };
  });
})();
/******/ })()
;