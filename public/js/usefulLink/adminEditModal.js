/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/js/usefulLink/adminEditModal.js ***!
  \***************************************************/
(function () {
  var editBtns = document.querySelectorAll('.edit-column');
  editBtns.forEach(function (editBtn) {
    editBtn.onclick = function (event) {
      var editModal = document.querySelector('#editModalWindow');
      editModal.style.display = 'block';
      var button = event.target.closest('#editBtn');
      var itemId = button.dataset['id'];
      var itemTitle = button.dataset['title'];
      var itemLink = button.dataset['link'];
      editModal.querySelector('#id').value = itemId;
      editModal.querySelector('#title').value = itemTitle;
      editModal.querySelector('#link').value = itemLink;
      var closeBtn = document.querySelector('#closeEditModal');

      closeBtn.onclick = function () {
        editModal.style.display = 'none';
      };
    };
  });
})();
/******/ })()
;