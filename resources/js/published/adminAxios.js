import axios from "axios";

window.onload = async function loadPage() {
    return await fetchPublishes(0);
};

async function fetchPublishes(offset) {
    await axios.get(`/api/administrator/published-on-site/${offset}`)
        .then(res => {
            if (Object.keys(res.data).length > 0) {
                return formatPublishesList(res.data);
            } else {
                return removeButton();
            }
        })
}

let content = document.querySelector('.news__item');

function formatDate(date) {
    date = new Date(date);
    let options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        timezone: 'UTC',
    }

    return date.toLocaleString('ru', options);
}

let offset = 0;

function getMore() {
    offset = offset + 15;

    return fetchPublishes(offset)
}

loadMoreButton.addEventListener('click', getMore)

function removeButton() {
    let loadMoreButton = document.getElementById('loadMoreButton');

    return loadMoreButton.remove();
}

function formatPublishesList(data) {
    for (const [date, post] of Object.entries(data)) {
        let formatedDate = formatDate(date)
        let dateDiv = document.getElementById(`${date}`);
        if (!dateDiv) {
            content.innerHTML +=
                `<div>${formatedDate}</div>
                <table class="table table-bordered" id="${date}">
                    <tr>
                        <th width="2%"></th>
                        <th width="40%">Заголовок</th>
                        <th width="40%">Ссылка</th>
                        <th width="2%">Редактировать</th>
                        <th width="2%">Удалить</th>
                    </tr>
                </table>`


            let postDetails = document.getElementById(`${date}`);

            Object.values(post).map(function (postInfo) {
                postDetails.innerHTML +=
                    `<tr>
                        <td>
                            <input type="checkbox" name="publishesItem" id="checkbox" value="${postInfo.id}">
                        </td>
                        <td>
                            <a class="news__t" href="/administrator/published-on-site/${postInfo.id}/edit">${postInfo.description}</a>
                        </td>
                        <td>
                            <a class="news__t" href="">${postInfo.link}</a>
                        </td>
                        <td class="text-center">
                            <a href="">
                                <a href="/administrator/published-on-site/${postInfo.id}/edit"><i class="far fa-edit"></i></a>
                            </a>
                        </td>
                        <td class="text-center">
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent" id="delBtn" data-id="${postInfo.id}">
                                <i class="far fa-trash-alt text-danger deleteBtn" ></i>
                            </button>
                        </td>
                    </tr>`;
            })
        } else {
            let postDetails = document.getElementById(`${date}`);
            Object.values(post).map(function (postInfo) {
                postDetails.innerHTML +=
                    `<tr>
                        <td>
                            <input type="checkbox" id="checkbox" name="publishesItem" value="${postInfo.id}">
                        </td>
                        <td>
                            <a class="news__t" href="/administrator/published-on-site/${postInfo.id}/edit">${postInfo.description}</a>
                        </td>
                        <td>
                            <a class="news__t" href="">${postInfo.link}</a>
                        </td>
                        <td class="text-center">
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent" id="editBtn">
                                <a href="/administrator/published-on-site/${postInfo.id}/edit"><i class="far fa-edit"></i></a>
                            </button>
                        </td>
                        <td class="text-center">
                           <button type="submit" class="m-0 p-0 border-0 bg-transparent" id="delBtn" data-id="${postInfo.id}">
                                <i class="far fa-trash-alt text-danger deleteBtn" ></i>
                            </button>
                        </td>
                    </tr>`
            })
        }
    }

    let checkAll = document.querySelector('#selectAll');
    let checkboxes = document.getElementsByName('publishesItem');

    checkAll.onclick = function () {
        Object.values(checkboxes).map(function (checkbox) {
            if (checkAll.checked) {
                return checkbox.checked = true;
            } else
                return checkbox.checked = false;
        });
    }

    let checkedItems = [];

    function checkToggle(id) {
        let issetID = checkedItems.indexOf(id);
        if (issetID !== -1) {
            checkedItems.splice(issetID, 1);
        } else {
            checkedItems.push(id);
        }

        return checkedItems;
    }

    document.querySelector('#delCheckedBtn').onclick = function () {
        if (checkedItems.length !== 0 && confirm('Подтвердите удаление')) {
            checkedItems.map(async function (itemId) {
                return await axios.get(`/api/published-on-site/${itemId}/delete`)
                    .then(window.location.reload())
                    .catch(err => {
                        console.log(err.message)
                    })

            })
        }
    }

    document.querySelector('table').onclick = async function (event) {
        let delBtn = event.target.closest('#delBtn')
        if (delBtn) {
            if (confirm('Подтвердите удаление')) {
                return await axios.get(`/api/published-on-site/${delBtn.dataset.id}/delete`)
                    .then(window.location.reload())
                    .catch(err => {
                        console.log(err.message)
                    })
            }
        }

        let checkBox = event.target.closest('#checkbox')
        if (checkBox) {
            if (checkboxes.length === checkedItems.length) {
                checkAll.checked = true;
            } else {
                checkAll.checked = false;
            }

            return checkToggle(checkBox.value)
        }
    }
}
