@extends('layouts.manage')

@section('title', '- {{ $role->display_name }}')

@section('content')

<h1>
    تعديل الدور
</h1>

<hr>
<form action="{{ route('roles.update', $role->id) }}" method="POST" novalidate>
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">

        <div class="col-6">
            <div class="form-group">
                <label for="name">الصلاحية <small class="text-secondary">لا يمكن تغيير هذه القيمة</small></label>
                <input type="text" name="name" id="name" value="{{ $role->name }}" class="form-control" disabled>
            </div>

            <div class="form-group">
                <label for="display_name">الاسم المرئي</label>
                <input type="text" name="display_name" id="display_name" value="{{ $role->display_name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">الوصف</label>
                <textarea name="description" id="description" class="form-control" style="min-height: 200px">{{ $role->description }}</textarea>
            </div>
        </div>

        <div class="col-6">
            <div class="card mb-3">
                <h4 class="card-header">
                    الصلاحيات
                </h4>
                <div class="card-body">
                    @foreach($permissions as $per)
                    <div class="form-check">
                        <input v-model="selectedPermissions" class="form-check-input" type="checkbox" name="permissions[]" :value="{{ $per->id }}" id="{{ $per->id }}">
                        <label class="form-check-label" for="{{ $per->id }}">
                        {{ $per->display_name }} 
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="col-6">
        <button type="submit" class="btn btn-success">حفظ</button>
    </div>
</form>

@endsection

@section('scripts')
<script>
new Vue({
    el: '#vueApp',
    data: {
        selectedPermissions: {!! $role->permissions->pluck("id") !!}
    },
    methods: {

    }
});
</script>
@endsection