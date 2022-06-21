(function () {
    let editBtns = document.querySelectorAll('.edit-column');

    editBtns.forEach(editBtn => {
        editBtn.onclick = function (event) {
            let editModal = document.querySelector('#editModalWindow');

            editModal.style.display = 'block';

            let button = event.target.closest('#editBtn');

            let itemId = button.dataset['id'];
            let itemTitle = button.dataset['title'];
            let itemLink = button.dataset['link'];

            editModal.querySelector('#id').value = itemId;
            editModal.querySelector('#title').value = itemTitle;
            editModal.querySelector('#link').value = itemLink;

            let closeBtn = document.querySelector('#closeEditModal')

            closeBtn.onclick = function () {
                editModal.style.display = 'none';
            }
        }
    })
})();
