<div class="modal-wrap">
    <div class="modal-form bigModal-form">
        <div class="title text-center">Редактирование категории</div>
        <form class="box-form js-validate p-3" id="add-form" method="POST" action="{{ route('admin.saveReportCategory') }}">
            @csrf
            <div class="mx-auto mt-4">
                <div class="form-group">
                    <label class="control-label" for="name">Наименование <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="name" id="name"
                           value=""
                           data-pristine-required-message="Поле должно быть заполнено" required="">
                </div>
            </div>
            <div class="mx-auto mt-4">
                <div class="form-control">
                    <label class="control-label" >Категория <span
                            class="text-danger">*</span></label>
                    <select class="control-label" name="parentCategoryId">
                        <option value="2"></option>
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
            <button class="btn btn-primary mx-2" id="submit" type="submit" form="add-form">Сохранить</button>
            <button class="btn btn-danger mx-2" id="closeModal">Отменить</button>
        </div>
    </div>
</div>
