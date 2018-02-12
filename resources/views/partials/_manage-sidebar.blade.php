<div class="side-menu col-lg-3 col-12">
    <aside class="card">
        <div class="list-group list-group-flush">
            <h6 class="list-group-label disabled my-1">المستخدمين</h6>
                <a class="indent-list-group-item list-group-item list-group-item-action {{ Request::is('manage/users') ? "active" : "" }}" href="{{ route('users.index') }}"><i class="fa fa-users fa-fw fa-lg ml-3"></i> إدارة المستخدمين</a>
                <h6 class="list-group-label disabled my-1">الأدوار والصلاحيات</h6>
                <a class="indent-list-group-item list-group-item list-group-item-action {{ Request::is('manage/roles') ? "active" : "" }}" href="{{ route('roles.index') }}"><i class="fa fa-sitemap fa-fw fa-lg ml-3"></i> إدارة الأدوار</a>
                <a class="indent-list-group-item list-group-item list-group-item-action {{ Request::is('manage/permissions') ? "active" : "" }}" href="{{ route('permissions.index') }}"><i class="fa fa-list-ol fa-fw fa-lg ml-3"></i> إدارة الصلاحيات</a>
                <a class="indent-list-group-item list-group-item list-group-item-action {{ Request::is('manage/permissions/create') ? "active" : "" }}" href="{{ route('permissions.create') }}"><i class="fa fa-plus fa-fw fa-lg ml-3"></i> إنشاء صلاحية جديدة</a>
            <h6 class="list-group-label disabled my-1">المقالات</h6>
                <a class="indent-list-group-item list-group-item list-group-item-action {{ Request::is('manage/posts') ? "active" : "" }}" href="{{ route('posts.index') }}"><i class="fa fa-file-text-o fa-fw fa-lg ml-3"></i> إدارة المقالات</a>
                <a class="indent-list-group-item list-group-item list-group-item-action {{ Request::is('manage/posts/create') ? "active" : "" }}" href="{{ route('posts.create') }}"><i class="fa fa-plus fa-fw fa-lg ml-3"></i> إنشاء مقال جديد</a>
            <a class="list-group-item list-group-item-action {{ Request::is('manage/categories') ? "active" : "" }}" href="{{ route('categories.index') }}"><i class="fa fa-list fa-fw fa-lg ml-2"></i> الأقسام</a>
            <a class="list-group-item list-group-item-action {{ Request::is('manage/tags') ? "active" : "" }}" href="{{ route('tags.index') }}"><i class="fa fa-tags fa-fw fa-lg ml-2"></i> الوسوم</a>
        </div>
    </aside>
</div>