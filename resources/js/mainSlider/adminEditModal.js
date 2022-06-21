(function () {
    let editBtns = document.querySelectorAll('.edit-column');

    editBtns.forEach(editBtn => {
        editBtn.onclick = function (event) {
            let editModal = document.querySelector('#editModalWindow');

            editModal.style.display = 'block';

            let button = event.target.closest('#editBtn');
            let itemDataArray = [
                'id',
                'title',
                'link',
                'description',
                'position'
            ];

            itemDataArray.forEach(dataName => {
                editModal.querySelector('#' + dataName).value = button.dataset[dataName];
            })

            let closeBtn = document.querySelector('#closeEditModal')

            closeBtn.onclick = function () {
                editModal.style.display = 'none';
            }
        }
    })
})();
