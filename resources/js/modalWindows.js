(function () {
    let modalWindow = document.querySelector('#modalWindow');
    let openModalBtn = document.querySelector('#openModal');
    let closeModalBtn = document.querySelector('#closeModal');
    openModalBtn.addEventListener('click', function () {
        modalWindow.style.display = 'block';
    });

    closeModalBtn.addEventListener('click', function () {
        modalWindow.style.display = 'none';
    });
})();

(function () {
    let editBtns = document.querySelectorAll('.edit-column');

    editBtns.forEach(editBtn => {
        editBtn.onclick = function (event) {
            let editModal = document.querySelector('#editModalWindow');

            editModal.style.display = 'block';

            Object.keys(editBtn.dataset).forEach(dataName => {
                editModal.querySelector('#' + dataName).value = editBtn.dataset[dataName];
            })

            let closeBtn = document.querySelector('#closeEditModal')

            closeBtn.onclick = function () {
                editModal.style.display = 'none';
            }
        }
    })
})();
