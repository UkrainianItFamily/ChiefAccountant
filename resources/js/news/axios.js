import axios from "axios";

window.onload = function loadPage() {
    fetchNews();
};

let lastPage = null;

async function fetchNews(page = 1) {
    await axios.get(`api/news?page=${page}`)
        .then(res => {
            formatNewsList(res.data.data);
            lastPage = res.data.last_page;
        })
}

let contentNews = document.querySelector('.news__wrap');

function formatNewsList(data) {
    data.forEach(news => {
       let date = formatDate(news.created_at)
        contentNews.innerHTML +=
            `<div class="news__item">
                <div class="news__data"> ${date}</div>
                <a href="news/${news.slug}" class="news__t">${news.title}</a>
                <p>${news.description}</p>
                <div class="d-flex justify-content-end">
                    <a href="news/${news.slug}" class="btn btn-light">Подробнее</a>
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
