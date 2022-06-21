<div class="modal-wrap">
    <div class="modal-form bigModal-form">
        <div class="title text-center">Редактирование категории</div>
        <form class="box-form js-validate p-3" id="edit-form" method="POST" action="{{ route('admin.updateReportCategory') }}">
            @method('PATCH')
            @csrf
            <input type="hidden"  name='id' id='id' value="">
            <div class="mx-auto mt-4">
                <div class="form-group">
                    <label class="control-label" for="slug">Слаг <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="slug" id="slug"
                           value="{{ old('slug') }}"
                           data-pristine-required-message="Поле должно быть заполнено" required="">
                </div>
            </div>
            <div class="mx-auto mt-4">
                <div class="form-group">
                    <label class="control-label" for="name">Наименование <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="name" id="name"
                           value="{{ old('name') }}"
                           data-pristine-required-message="Поле должно быть заполнено" required="">
                </div>
            </div>
            <div class="mx-auto mt-4">
                <div class="form-control">
                    <label class="control-label" >Категория <span
                            class="text-danger">*</span></label>
                    <select class="control-label" name="parentCategoryId">
                        <option id="categoryId"></option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @foreach ($category->childrenCategories as $childCategory)
                                @php $seporator = ''; @endphp
                                @include('layouts.admin.report.report-subcategories-options', ['child_category' => $childCategory, 'seporator' => $seporator])
                                @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-center mb-2">
            <button class="btn btn-primary mx-2" id="submit" type="submit" form="edit-form">Сохранить</button>
            <button class="btn btn-danger mx-2" id="closeModal">Отменить</button>
        </div>
    </div>
</div>
