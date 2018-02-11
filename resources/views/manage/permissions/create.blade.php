@extends('layouts.manage')

@section('title', ' - إنشاء صلاحيات جديدة')

@section('content')

    <div class="control-group">
        <div class="form-check form-check-inline">
            <input v-model="permissionType" class="form-check-input" type="radio" name="permissionType" id="simplePermission" value="simple" checked>
            <label class="form-check-label" for="simplePermission">
                صلاحية واحدة
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input v-model="permissionType" class="form-check-input" type="radio" name="permissionType" id="crudPerminssion" value="crud">
            <label class="form-check-label" for="crudPerminssion">
                صلاحية متقدمة
            </label>
        </div>
    </div>
<form id="simple" v-if="permissionType == 'simple'" action="{{ route('permissions.create') }}" method="POST" novalidate>
        {{ csrf_field() }}
    <div class='form-group'>
        <label for="name">الصلاحية</label>
        <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="اكتب اسم الصلاحية باللغة الإنكليزية">
        @if($errors->has('name'))
            <div class="text-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="display_name">الاسم المرئي</label>
        <input type="text" id="display_name" class="form-control" name="display_name" value="{{ old('display_name') }}" placeholder="اكتب اسم الصلاحية المرئي باللغة العربية">
        @if($errors->has('display_name'))
            <div class="text-danger">
                <strong>{{ $errors->first('display_name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="description">الشرح</label>
        <input type="text" id="description" class="form-control" name="description" value="{{ old('description') }}" placeholder="اكتب شرح الصلاحية">
        @if($errors->has('description'))
            <div class="text-danger">
                <strong>{{ $errors->first('description') }}</strong>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">إنشاء</button>
</form>


<form id="crud" v-if="permissionType == 'crud'" action="{{ route('permissions.create') }}" method="POST" novalidate>
        {{ csrf_field() }}
    <div class='form-group'>
        <label for="name">المورد المرغوب إضافة صلاحيات له</label>
        <input v-model="resource" type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="اكتب اسم المورد الذي ترغب بإضافة صلاحيات له باللغة الإنكليزية">
    </div>
    <div class="form-group">
        <label for="display_name">اسم المورد باللغة العربية</label>
        <input v-model="resourceInArabic" type="text" id="display_name" class="form-control" name="display_name" value="{{ old('display_name') }}" placeholder="اكتب اسم المورد باللغة العربية">
    </div>
    <div class="row">
        <div class="col-2">
            <div class="form-check">
                <input v-model="crudType" class="form-check-input" type="checkbox" name="crud_type[]" value="create" id="create">
                <label class="form-check-label" for="create">
                    إنشاء
                </label>
            </div>
            <div class="form-check">
                <input v-model="crudType" class="form-check-input" type="checkbox" name="crud_type[]" value="read" id="read">
                <label class="form-check-label" for="read">
                    قراءة
                </label>
            </div>
            <div class="form-check">
                <input v-model="crudType" class="form-check-input" type="checkbox" name="crud_type[]" value="update" id="update">
                <label class="form-check-label" for="update">
                    تعديل
                </label>
            </div>
            <div class="form-check">
                <input v-model="crudType" class="form-check-input" type="checkbox" name="crud_type[]" value="delete" id="delete">
                <label class="form-check-label" for="delete">
                    حذف
                </label>
            </div>
        </div>
        <div class="col-10">
            <table class="table" v-if="crudType.length > 0">
                <thead>
                    <tr>
                        <th scope="col">الصلاحية</th>
                        <th scope="col">الاسم المرئي</th>
                        <th scope="col">الشرح</th>
                    </tr>
                </thead>
                <tbody v-show="resource.length > 3 || resourceInArabic.length > 3">
                    <tr v-if="inArray('create')">
                        <td><span v-show="resource.length > 3">create-@{{ resource }}</span></td>
                        <td><span v-show="resourceInArabic.length > 3">إنشاء @{{ resourceInArabic }}</span></td>
                        <td><span v-show="resourceInArabic.length > 3">تعطي هذه الصلاحية المستخدمين القدرة على إنشاء @{{ resourceInArabic }}</span></td>
                    </tr>
                    <tr v-if="inArray('read')">
                        <td><span v-show="resource.length > 3">read-@{{ resource }}</span></td>
                        <td><span v-show="resourceInArabic.length > 3">قراءة @{{ resourceInArabic }}</span></td>
                        <td><span v-show="resourceInArabic.length > 3">تعطي هذه الصلاحية المستخدمين القدرة على قراءة @{{ resourceInArabic }}</span></td>
                    </tr>
                    <tr v-if="inArray('update')">
                        <td><span v-show="resource.length > 3">update-@{{ resource }}</span></td>
                        <td><span v-show="resourceInArabic.length > 3">تعديل @{{ resourceInArabic }}</span></td>
                        <td><span v-show="resourceInArabic.length > 3">تعطي هذه الصلاحية المستخدمين القدرة على تعديل @{{ resourceInArabic }}</span></td>
                    </tr>
                    <tr v-if="inArray('delete')">
                        <td><span v-show="resource.length > 3">delete-@{{ resource }}</span></td>
                        <td><span v-show="resourceInArabic.length > 3">حذف @{{ resourceInArabic }}</span></td>
                        <td><span v-show="resourceInArabic.length > 3">تعطي هذه الصلاحية المستخدمين القدرة على حذف @{{ resourceInArabic }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">إنشاء</button>
</form>
@endsection
                