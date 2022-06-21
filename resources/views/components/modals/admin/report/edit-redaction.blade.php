<div class="modal-wrap">
    <div class="modal-form bigModal-form">
        <div class="title text-center" style="position: relative">Редактирвоать редакцию
            <span id="closeEditRedactionModal" style="position: absolute; right: 10px; font-size: 24px; cursor: pointer">X</span>
        </div>
        <div id="msgBlock"></div>
        <form class="box-form js-validate p-3" id="edit-form" method="POST">
            @csrf
            <meta name="csrf-token" id="_token" content="{{ csrf_token() }}">
            <input type="text" name="id" hidden id="id">
            <div class="mx-auto mt-4">
                <div class="form-group">
                    <label class="control-label" for="date">Дата: <span
                            class="text-danger">*</span></label>
                    <input type="date" name="date" class="form-control" id="date" required>
                </div>
            </div>
            <div class="mx-auto mt-4">
                <div class="form-group">
                    <label class="control-label" for="title">Заголовок <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="title" id="title"
                           value="{{ old('title') }}"
                           data-pristine-required-message="Поле должно быть заполнено" required="">
                </div>
            </div>
            <div class="mx-auto mt-4">
                <div class="form-group">
                    <label class="control-label" for="description">Содержание <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control editor" type="text" name="description" id="description"
                              rows="4">{!! old('description') !!}</textarea>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-center mb-2">
            <button class="btn btn-primary mx-2" id="submit" type="submit" form="edit-form">Сохранить</button>
            <button class="btn btn-danger mx-2" id="closeEditRedactionModal">Отменить</button>
        </div>
    </div>
</div>
