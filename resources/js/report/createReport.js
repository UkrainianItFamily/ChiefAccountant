import axios from "axios";

let appsWindow = document.querySelector('#appsWindow');
let showAppsWindowBtn = document.querySelector('#openAppsWindow')

showAppsWindowBtn.onclick = function () {
    appsWindow.style.display = 'block';

    fetchDocuments();

    appsWindow.querySelectorAll('#closeModal').forEach(btn => {
        btn.onclick = function () {
            appsWindow.style.display = 'none';
        }
    });
}

function fetchDocuments(page = 1) {
    axios.post(`/api/apps?page=${page}`)
        .then(res => {
            formatList(res.data)
        })
}

function formatList(data) {
    let list = appsWindow.querySelector('#list');
    let paginateListBlock = appsWindow.querySelector('#paginateList');

    if (appsWindow.querySelector('#modalErrMsg')) {
        appsWindow.querySelector('#modalErrMsg').remove();
    }

    while (list.firstChild) {
        list.removeChild(list.firstChild)
    }

    while (paginateListBlock.firstChild) {
        paginateListBlock.removeChild(paginateListBlock.firstChild)

    }

    data.data.forEach(post => {
        list.innerHTML += `
                <li style="cursor: pointer" class="list-item my-2 p-2 border-botom" data-id="${post.id}" data-type="${post.type}" data-title="${post.title}">
                    <span>${post.title}</span>
                </li>
            `;
    });

    for (let i = 1; i < (data.links.length - 1); i++) {

        if (data.links[i].label == data.current_page) {
            paginateListBlock.innerHTML += `
                <li style="cursor: pointer; color: #a52834" class="mx-2" class='paginateLink' data-page='${data.links[i].label}'>
                    <span>${data.links[i].label}</span>
                </li>
            `;
        } else {
            paginateListBlock.innerHTML += `
                <li style="cursor: pointer" class="mx-2" class='paginateLink' data-page='${data.links[i].label}'>
                    <span>${data.links[i].label}</span>
                </li>
            `;
        }
    }

    appsWindow.querySelector('#paginateList').onclick = function (event) {
        let paginateListItem = event.target.closest('li');
        let pageNumber = paginateListItem.dataset['page'];

        fetchDocuments(pageNumber);
    }

    list.onclick = function (event) {
        let appsListItem = event.target.closest('li');

        if (appsWindow.querySelector('#msg').firstChild) {
            hideMsg();
        }

        document.querySelector('#apps').querySelectorAll('li').forEach(app => {
            if (app.id == appsListItem.dataset['id']) {
                generateError('Уже есть в списке прикреплённых');
                app.remove();
            }
        })

        document.querySelector('#apps').innerHTML += `
            <li class="my-2 p-2 appListItem" id="${appsListItem.dataset['id']}">
                <input type="checkbox"
                    name="appsIdArray[]"
                    value="${appsListItem.dataset['id']}"
                    hidden
                    checked
                >
                    <span>${appsListItem.dataset['title']}</span>
                    <span class="mx-4" id="deleteApp" style="cursor: pointer;">X</span>
            </li>
        `;

        generateSuccessMsg('Добавлено')
    }
}

document.querySelector('#apps').onclick = function (event) {
    let deleteBtn = event.target.closest('#deleteApp');
    let li = deleteBtn.closest('.appListItem');
    li.remove()
}

function hideMsg() {
    appsWindow.querySelector('#msg').classList.remove();
    appsWindow.querySelector('#msg').style.display = 'none';
    appsWindow.querySelector('#msg').removeChild(appsWindow.querySelector('#msg').firstChild);
}

function generateError(message) {
    let msgSpan = document.createElement('span');

    msgSpan.innerHTML = message;
    appsWindow.querySelector('#msg').appendChild(msgSpan);
    appsWindow.querySelector('#msg').classList.add('alert-danger');
    appsWindow.querySelector('#msg').style.display = 'block'
}

function generateSuccessMsg(message) {
    let msgSpan = document.createElement('span');

    msgSpan.innerHTML = message;
    appsWindow.querySelector('#msg').appendChild(msgSpan);
    appsWindow.querySelector('#msg').classList.add('alert-success');
    appsWindow.querySelector('#msg').style.display = 'block'

    setTimeout(hideMsg, 500)
}
