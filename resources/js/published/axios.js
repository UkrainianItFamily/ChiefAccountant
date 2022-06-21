import axios from "axios";

window.onload = async function loadPage() {
    await checkUrl();
    await fetchPublishes(0);
};

function checkUrl() {
    let baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;

    if (baseUrl.slice(-1) == '/') {
        do {
            baseUrl = baseUrl.substring(0, baseUrl.length - 1);
        }
        while (baseUrl.slice(-1) == '/')
        let newUrl = baseUrl;
        history.pushState(null, null, newUrl);
    }
}

async function fetchPublishes(offset) {
    await axios.get(`api/published-on-site/${offset}`)
        .then(res => {
            if (Object.keys(res.data).length > 0) {
                formatPublishesList(res.data);
            } else {
                removeButton();
            }
        })
}

let content = document.querySelector('.news__wrap');

function formatPublishesList(data) {
    for (const [date, post] of Object.entries(data)) {
        let formatedDate = formatDate(date)
        let dateDiv = document.getElementById(`${date}`);

        if (!dateDiv) {
            content.innerHTML +=
                `<div class="news__item">
                     <div class="news__data">${formatedDate}</div>
                     <div id="${date}"></div>
                </div>`


            let postDetails = document.getElementById(`${date}`);

            Object.values(post).map(function (postInfo) {

                postDetails.innerHTML +=
                    `<a href="${postInfo.link}" class="news__t">${postInfo.description}</a>`
            })
        } else {
            let postDetails = document.getElementById(`${date}`);

            Object.values(post).map(function (postInfo) {

                postDetails.innerHTML +=
                    `<a href="${postInfo.link}" class="news__t">${postInfo.description}</a>`
            })
        }
    }
}

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

function removeButton() {
    let loadMoreButton = document.getElementById('loadMoreButton');
    loadMoreButton.remove();
}

loadMoreButton.addEventListener('click', getMore)
