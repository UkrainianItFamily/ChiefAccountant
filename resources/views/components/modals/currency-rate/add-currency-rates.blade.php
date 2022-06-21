<div>
    <div class="modal-wrap">
        <div class="modal-form">
            <div class="arhiv__item__top">Добавить курс валют</div>
            <div class="arhiv__item__bot d-flex flex-column align-content-center">
                <form class="form-today2" method="POST" id="add-form" action="{{ route('admin.currencySave') }}">
                    @csrf
                    <label for="date">
                        Укажите дату:
                        <span class="text-danger">*</span>
                    </label>
                    <input class="form-control" type="date"
                           name="date" id="date" value="" required>
                    <label for="usd">
                        USD
                        <span class="text-danger">*</span>
                    </label>
                    <input class="form-control" step=".001" type="number"
                           name="usd" id="usd" value="" required>
                    <label for="rub">
                        RUB
                        <span class="text-danger">*</span>
                    </label>
                    <input class="form-control" step=".001" type="number"
                           name="rub" id="rub" value="" required>
                    <label for="eur">
                        EUR
                        <span class="text-danger">*</span>
                    </label>
                    <input class="form-control" step=".001" type="number"
                           name="eur" id="eur" value="" required>
                </form>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary" type="submit" form="add-form">Добавить</button>
                    <button class="btn btn-danger" id="closeModal">Отменить</button>
                </div>
            </div>
        </div>
    </div>
</div>
