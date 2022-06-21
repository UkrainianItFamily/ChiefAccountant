<div class="modal-wrap">
    <div class="modal-form">
        <div class="title text-center">
            Создание записи
        </div>
        <form class="box-form js-validate p-3" id="add-form" method="POST" action="{{ route('admin.helpSave') }}">
            @csrf
            <div class="mx-auto mt-2">
                <div class="form-group">
                    <label class="control-label" for="title">Раздел<span
                            class="text-danger">*</span></label>
                   <select class="mx-2" name="categoryId" id="categoryId">
                       <option></option>
                       @foreach($categories as $category)
                           <option value="{{ $category->id }}">{{$category->title}}</option>
                       @endforeach
                   </select>
                </div>
            </div>
            <div class="mx-auto mt-4">
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
                    <label class="control-label" for="description">Содержание <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control"
                              type="text"
                              name="description"
                              id="description"
                              data-pristine-required-message="Поле должно быть заполнено"
                              required=""
                              rows="5"
                              minlength="10"
                              data-pristine-minlength-message="Минимальное количество символов 10"
                    >{{ old('description') }}</textarea>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-center mb-2">
            <button class="btn btn-primary mx-2" type="submit" form="add-form">Добавить</button>
            <button class="btn btn-danger mx-2" id="closeModal">Отменить</button>
        </div>
    </div>
</div>
