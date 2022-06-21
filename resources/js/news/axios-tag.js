import axios from "axios";

window.onload = function loadPage() {
// console.log('data-11:');
    fetchNews();
};

let lastPage = null;

async function fetchNews(page = 1) {
    var currentLocation = window.location;
    var host = window.location.origin;
    let pathArr = currentLocation.pathname.split('/');
    let tagName = pathArr.pop();
    let url;

    if (pathArr.length > 1) {
        url = host + `/api/news/tag/${tagName}?page=${page}`
    } else {
        url = `api/news?page=${page}`
    }
// console.log('url:',url);

    await axios.get(url)
        .then(res => {

            formatNewsList(res.data.data);
            lastPage = res.data.last_page;
        })
}

let contentNews = document.querySelector('.news__wrap');

function formatNewsList(data) {
    var host = window.location.origin;
    data.forEach(news => {
       let date = formatDate(news.created_at)
        contentNews.innerHTML +=
            `<div class="news__item">
                <div class="news__data"> ${date}</div>
                <a href="news/${news.slug}" class="news__t">${news.title}</a>
                <p>${news.description}</p>
                <div class="d-flex justify-content-end">
                    <a href="${host}/news/${news.slug}" class="btn btn-light">Подробнее</a>
                </div>
            </div>`
    });
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

let loadCount = 2;
let loadMoreButton = document.getElementById('loadMoreButton');

function getMore() {
    if (loadCount <= lastPage) {
        fetchNews(loadCount)
        loadCount++
    } else {
        loadCount = 2;
        loadMoreButton.remove();
    }
}

loadMoreButton.addEventListener('click', getMore)
