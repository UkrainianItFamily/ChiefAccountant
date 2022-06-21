"use strict";
import axios from "axios";

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

let categoriesLIst = document.querySelector('#categoriesList');

categoriesLIst.onclick = async function (event) {

    let category = event.target.closest('#category');
    let file = event.target.closest('#file');

    if (category) {
        await checkPath(category);
        await formatPage(event.target);
    }

    if (file) {
        await checkPath(file);
        await formatDetailPage(event.target);
    }
}

let pathArray = window.location.pathname.split('/');

window.onload = async function preparationPage() {
    await checkUrl()
    await loadPage()
    console.log('preparationPage!');
}

async function loadPage() {
    if (pathArray.length > 2) {
        for (let i = 2; i < pathArray.length; i++) {
            let target = document.querySelector("." + `${pathArray[i]}`)
            let category = target.closest('#category')

            if (category) {
                document.querySelector('#item1').innerHTML = ''
                await formatPage(target)
            } else {
                await formatDetailPage(target)
                break;
            }
        }
    }
}

async function formatPage(target) {

    let category = target.closest('#category');
    let catSlug = category.dataset['slug'];

    await axios.get(`/api/report/categories/${catSlug}`)
        .then(res => {
            return formatSubList(res.data);
        })

    function formatSubList(data) {

        let closestParent = target.closest('.tree__item');
        let index = Number(category.dataset['index']) + 1;

        if (closestParent.classList.contains('active')) {
            closestParent.classList.remove('active');
        } else {
            if(closestParent.closest('.active')) {
                let allActiveSubcategories = closestParent.closest('.active').querySelectorAll('.active');
                allActiveSubcategories.forEach(category => {
                    category.classList.remove('active')
                })
            } else {
                let allActiveCategories = document.querySelectorAll('.active');
                allActiveCategories.forEach(category => {
                    category.classList.remove('active')
                })
            }

            closestParent.classList.add('active');
        }

        if (data['categoriesList'].length !== 0) {
            data['categoriesList'].forEach(subCategory => {
                let subList = document.querySelector("#subCategoryList-" + `${subCategory.report_category_id}`);
                let subItem = document.querySelector("#subCategoryList-" + `${subCategory.id}`);

                if (!subItem) {
                    subList.innerHTML +=
                        `
                            <li>
                                <div class="tree__item">
                                    <div class="tree__item__wrap tree__for" id="category" data-for="0" data-index="${index}" data-slug="${subCategory.slug}">
                                        <i class="far fa-plus-square"></i>
                                        <i class="far fa-minus-square"></i><span class="${subCategory.slug}">${subCategory.name}</span>
                                    </div>
                                    <ul id="subCategoryList-${subCategory.id}"></ul>
                                </div>
                            </li>
                        `
                }
            });
        }

        data['reportsList'].forEach(report => {
            let subList = document.querySelector("#subCategoryList-" + `${report.category_id}`);
            let subItem = document.querySelector(".report" + `${report.id}`);

            if (!subItem) {
                subList.innerHTML +=
                    `
                        <li class="tree__item tree__item2 report" id="file" data-slug="${report.slug}" data-index="${index}">
                            <div class="tree__item__wrap tree__for" data-for="0" data-slug="${report.slug}">
                                <i class="fas fa-file"></i>
                                <span class="${report.slug}">
                                    ${report.title}
                                </span>
                            </div>
                        </li>
                    `
            }
        });
    }
}

async function formatDetailPage(target) {
    let file = target.closest('#file');
    let reportSlug = file.dataset['slug'];

    let fileDate = Date.parse(pathArray[pathArray.length - 1]);
    let queryApiUrl;

    if((fileDate > 0) && !isNaN(fileDate)){
        fileDate = pathArray[pathArray.length - 1];
        queryApiUrl = `/api/report/${reportSlug}/${fileDate}`;
    } else {
        queryApiUrl = `/api/report/${reportSlug}`;
    }

    await axios.get(queryApiUrl)
        .then(res => {
            return formatReport(res.data);
        })
        .catch(err => {
            console.log(err)
        })

    function formatReport(report) {
        let parent = document.querySelector('#item1');
        parent.innerHTML = '';
        parent.innerHTML =
            `
                <div class="otchet__wrap detailItem"></div>
                    <div class="otchet__name">${report.title}</div>
                    <div class="otchet__data">${report.date}</div>
                    <div class="js-tabs">
                        <ul class="js-tabs__header tabs__list">
                            <li class="tab tab_item is-active">Текст</li>
                            <li class="tab tab_item redactions_tab">Редакции</li>
                            <li class="tab tab_item apps_tab">Приложения</li>
                            <li class="tab relations_tab">Нет связей</li>
                        </ul>
                        <div class="tabs__container">
                            <div class="js-tabs__content is-active" id="tabs1">
                                <button type="button" class="doc-text" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                </button>
                                <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-full">
                                        <div class="modal-content">
                                            <div class="modal-fix-close" data-bs-dismiss="modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2>${report.title}</h2>
                                <p>${report.description}</p>
                            </div>
                            <div class="js-tabs__content" id="tabs2"></div>
                            <div class="js-tabs__content" id="tabs3"></div>
                            <div class="js-tabs__content" id="tabs4"></div>
                        </div>
                    </div>
                </div>
            `
        let redactionsTab = document.querySelector('.redactions_tab');

        if(Object.keys(report.redactionsCollection) <= 1) {
            redactionsTab.innerHTML = `Нет редакций`;
            redactionsTab.classList.remove('tab_item')
        } else {
            let count = 1;

            report.redactionsCollection.forEach(redaction => {
                document.querySelector('#tabs2').innerHTML += `
                <li class="list-group-item">
                    <span>${count}. </span>
                    <a href="${window.location.href + '/' + redaction.date}"> ${redaction.date}</a>
                </li>
            `;
                count++;
            })
        }

        let appsTab = document.querySelector('.apps_tab');

        if(!report.appsCollection || Object.keys(report.appsCollection) <= 1) {
            appsTab.innerHTML = `Нет приложений`;
            appsTab.classList.remove('tab_item')
        } else {
            let count = 1;

            report.appsCollection.forEach(app => {
                document.querySelector('#tabs3').innerHTML += `
                    <li class="list-group-item" data-slug="${app.slug}">
                        <span style="cursor: pointer">${count}. ${app.title}</span>
                    </li>
                `;
                count++;
            })
            document.querySelector('#tabs3').onclick = function (event) {
                let appSlug = event.target.closest('.list-group-item').dataset['slug']
                gotoApp(appSlug);
            }

            let relationsTab = document.querySelector('.relations_tab');
            relationsTab.innerHTML = `Нет связей`;
        }

        let tabs = function() {
            function d(e) {
                return Array.prototype.slice.call(e)
            }
            d(document.querySelectorAll("ul.tabs__list > .tab_item")).forEach(function(e) {
                e.addEventListener("click", function() {
                    ! function(e) {
                        let t, c = e.parentNode,
                            i = c.closest('.js-tabs'),
                            a = i.querySelector(".tabs__container"),
                            n = d(c.children),
                            r = d(a.children),
                            s = n.indexOf(e),
                            l = i.querySelectorAll(".is-active");
                        if (t = "is-active", !(-1 < " ".concat(e.className, " ").indexOf(" ".concat(t, " ")))) {
                            for (let o = 0; o < l.length; o++) l[o].classList.remove("is-active");
                            e.classList.add("is-active"), r[s].classList.add("is-active")
                        }
                    }(e)
                })
            })
        }();

        function gotoApp(appSlug){
            axios.get(`/api/report/${appSlug}`)
                .then(res => {
                    return location.pathname = 'report' + res.data.url
                })
                .catch(err => {
                    console.log(err)
                })
        }
    }
}

function checkPath(category) {
    let arrayLenght = pathArray.length;
    let slug = category.dataset['slug'];
    let index = Number(category.dataset['index']);

    if(pathArray[index] !== slug) {
        pathArray[index] = slug;
    }

    pathArray.splice(index + 1, arrayLenght);

    let newPathname = "";
    for (let i = 1; i < pathArray.length; i++) {
        newPathname += "/";
        newPathname += pathArray[i];
    }

    let newUrl = window.location.protocol + "//" + window.location.host + newPathname;
    history.pushState(null, null, newUrl);
}

