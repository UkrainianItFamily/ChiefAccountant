<div class="modal-wrap">
    <div class="modal-form">
        <div class="title text-center">
            Создание записи
        </div>
        <form class="box-form js-validate p-3" id="add-form" method="POST" action="{{ route('admin.mainSliderSaveSlide') }}">
            @csrf
            <div class="mx-auto mt-2">
                <div class="form-group">
                    <label class="control-label" for="title">Заголовок <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control"
                              type="text"
                              name="title"
                              id="title"
                              data-pristine-required-message="Поле должно быть заполнено"
                              required=""
                              minlength="3"
                              data-pristine-minlength-message="Минимальное количество символов 3"
                              maxlength="150"
                              data-pristine-minlength-message="Максимальное количество символов 150"
                    >{{ old('title')}}</textarea>
                </div>
            </div>
            <div class="mx-auto mt-4">
                <div class="form-group">
                    <label class="control-label" for="description">Кратское описание <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control"
                              type="description"
                              name="description"
                              id="description"
                              data-pristine-required-message="Поле должно быть заполнено"
                              required=""
                              minlength="10"
                              data-pristine-minlength-message="Минимальное количество символов 10"
                              maxlength="350"
                              data-pristine-minlength-message="Максимальное количество символов 350"
                    >{{ old('description')}}</textarea>
                </div>
            </div>
            <div class="mx-auto mt-4">
                <div class="form-group">
                    <label class="control-label" for="position">Расположение в очереди </label>
                    <select name="position" id="position" class="form-select">
                        <option value="0">Скрыт</option>
                        @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="mx-auto mt-4">
                <div class="form-group">
                    <label class="control-label" for="link">Ссылка</label>
                    <textarea class="form-control"
                              type="text"
                              name="link"
                              id="link"
                              minlength="10"
                              data-pristine-minlength-message="Минимальное количество символов 10"
                    >{{ old('link')}}</textarea>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-center mb-2">
            <button class="btn btn-primary mx-2" type="submit" form="add-form">Добавить</button>
            <button class="btn btn-danger mx-2" id="closeModal">Отменить</button>
        </div>
    </div>
</div>
