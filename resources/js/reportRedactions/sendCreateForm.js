import axios from "axios";

document.querySelector('#add-form').addEventListener('submit', async function (event) {
    event.preventDefault();
    sendForm(document.querySelector('#add-form'));
});

async function sendForm(form) {
    let date = form.querySelector('#date').value;
    let title = form.querySelector('#title').value;
    let description = form.querySelector('#description').value;
    let id;

    if (form.querySelector('#id')) {
        id = form.querySelector('#id').value;

        await axios.patch('/api/reports/redactions', {
            id: id,
            date: date,
            title: title,
            description: description,
        })
            .then(res => {
                formatRedactionsList(res.data);
                clearModal(form);
            })
            .catch(err => console.log(err))
    } else {
        await axios.post('/api/reports/redactions', {
            date: date,
            title: title,
            description: description,
        })
            .then(res => {
                formatRedactionsList(res.data);
                clearModal(form);
            })
            .catch(err => console.log(err))
    }
}

document.querySelector('#redactionsList').onclick = function (event) {
    let deleteBtn = event.target.closest('#deleteRedaction');
    let li = event.target.closest('.redactionListItem');

    if (deleteBtn) {
        let deleteCheckBox = document.createElement('input');
        deleteCheckBox.name = 'deleteRedactionsIdArray[]';
        deleteCheckBox.value = li.querySelector('input').value;
        deleteCheckBox.hidden = true;
        document.querySelector('form').appendChild(deleteCheckBox);
        li.remove()
    } else {
        let redactionId = li.querySelector('input').value;

        fetchRedaction(redactionId);
    }
}

function clearModal() {
    let modalWindow = document.querySelector('#modalWindow');
    let editorWindow = modalWindow.querySelector('.ck-editor__editable_inline');
    while (editorWindow.firstChild) {
        editorWindow.removeChild(editorWindow.firstChild)
    }

    let inputs = modalWindow.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = '';
    });

    modalWindow.style.display = 'none';
}

function formatRedactionsList(redaction) {
    let listBlock = document.querySelector('#redactionsList')
    listBlock.querySelectorAll('li').forEach(item => {
        if(item.querySelector('input').value == redaction.id) {
            item.remove();
        }
    })
    listBlock.innerHTML +=
        `
            <li class="redactionListItem">
                <input type="checkbox" name="redactionsIdArray[]" value="${redaction.id}" hidden checked>
                <span id="redaction" style="cursor: pointer; color: #0d6efd">${redaction.date}</span>
                <span class="mx-4" id="deleteRedaction" style="cursor: pointer;">X</span>
            </li>
        `
}

document.querySelector('#edit-form').addEventListener('submit', async function (event) {
    event.preventDefault();
    sendForm(document.querySelector('#edit-form'));
    document.querySelector('#editRedactionWindow').style.display = 'none'
});

async function fetchRedaction(redactionId) {
    await axios.get('/api/reports/redactions/' + redactionId)
        .then(res => {
            let editModalWindow = document.querySelector('#editRedactionWindow');
            editModalWindow.querySelector('#id').value = res.data.id;
            editModalWindow.querySelector('#date').value = res.data.date;
            editModalWindow.querySelector('#title').value = res.data.title;
            description.setData(res.data.description);

            editModalWindow.style.display = 'block'

            editModalWindow.querySelectorAll('#closeEditRedactionModal').forEach(closeBtn => {
                closeBtn.onclick = function () {
                    editModalWindow.style.display = 'none'
                }
            })
        })
        .catch(err => console.log(err))
}
