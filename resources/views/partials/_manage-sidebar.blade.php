<div class="side-menu col-3">
    <aside class="card">
        <div class="list-group list-group-flush">
            <label class="list-group-label disabled">المستخدمين</label>
                <a class="indent-list-group-item list-group-item list-group-item-action {{ Request::is('manage/users') ? "active" : "" }}" href="{{ route('users.index') }}"><i class="fa fa-users fa-fw fa-lg ml-3"></i> إدارة المستخدمين</a>
                <a class="indent-list-group-item list-group-item list-group-item-action" href=""><i class="fa fa-sitemap fa-fw fa-lg ml-3"></i> الأدوار والسماحيات</a>
            <label class="list-group-label disabled">المقالات</label>
                <a class="indent-list-group-item list-group-item list-group-item-action {{ Request::is('manage/posts') ? "active" : "" }}" href="{{ route('posts.index') }}"><i class="fa fa-file-text-o fa-fw fa-lg ml-3"></i> إدارة المقالات</a>
                <a class="indent-list-group-item list-group-item list-group-item-action {{ Request::is('manage/posts/create') ? "active" : "" }}" href="{{ route('posts.create') }}"><i class="fa fa-plus fa-fw fa-lg ml-3"></i> إنشاء مقال جديد</a>
            <a class="list-group-item list-group-item-action {{ Request::is('manage/categories') ? "active" : "" }}" href="{{ route('categories.index') }}"><i class="fa fa-list fa-fw fa-lg ml-2"></i> الأقسام</a>
            <a class="list-group-item list-group-item-action {{ Request::is('manage/tags') ? "active" : "" }}" href="{{ route('tags.index') }}"><i class="fa fa-tags fa-fw fa-lg ml-2"></i> الوسوم</a>
        </div>
    </aside>
</div>