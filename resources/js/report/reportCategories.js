import axios from "axios";

document.querySelector('#mainCategoryList').onclick = function (event) {
    if(event.target.closest('input')) {
        if (event.target.closest('li').querySelector('ul').classList.contains('d-none')) {
            event.target.closest('li').querySelector('ul').classList.toggle('d-none')
        } else {
            event.target.closest('li').querySelector('ul').classList.add('d-none')
        }
    }

    if(event.target.closest('span')) {
        let categoryId = event.target.closest('span').dataset['id'];
        axios.get(`/api/report-categories/${categoryId}`)
            .then(res => {
                console.log(res)
                let editWindow = document.querySelector('#editWindow');
                editWindow.querySelector('#id').value = res.data.id;
                editWindow.querySelector('#slug').value = res.data.slug;
                editWindow.querySelector('#name').value = res.data.name;
                editWindow.querySelector('#categoryId').value = res.data.report_category_id;
                document.querySelector('#editWindow').style.display = 'block';

                editWindow.querySelector('#closeModal').onclick = function (){
                    editWindow.style.display = 'none';
                }
            })
    }
}
