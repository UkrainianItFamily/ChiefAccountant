import axios from "axios";

const monthSelect = document.getElementById('month')
const yearSelect = document.getElementById('year')

window.onload = function () {
    let dateNow = new Date();
    let month = monthSelect.value = dateNow.getMonth() + 1;
    let year = yearSelect.value;
    fetchCurrencys(year, month)
}

let ratesList = document.querySelector('.arhiv__wrap')

async function fetchCurrencys(year, month) {
    await axios.get(`/api/currency-archive/${year}/${month}`)
        .then(response => {
            formatedList(Object.values(response.data))
        })
        .catch(error => {
            console.log(error.message)
        });
}

function formatedList(dataCurrencys) {

    if (ratesList.innerHTML) {
        while (ratesList.firstChild) {
            ratesList.removeChild(ratesList.firstChild);
        }
    }

    if (dataCurrencys) {
        dataCurrencys.reverse();
        return dataCurrencys.forEach(rate => {
            ratesList.innerHTML +=
                `
                    <div class="arhiv__item">
                    <div class="arhiv__item__top">${rate.date}</div>
                    <div class="arhiv__item__bot">
                        <div>USD<span>${rate.usdRate}</span></div>
                        <div>RUB<span>${rate.rubRate}</span></div>
                        <div>EUR<span>${rate.eurRate}</span></div>
                    </div>
                `
        });
    }
}

yearSelect.addEventListener('change', function () {
    fetchCurrencys(yearSelect.value, monthSelect.value);
})

monthSelect.addEventListener('change', function () {
    fetchCurrencys(yearSelect.value, monthSelect.value);
})
