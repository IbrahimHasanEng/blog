<div class="side-menu col-2">
    <aside class="card">
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action {{ Request::is('manage/users') ? "active" : "" }}" href="{{ route('users.index') }}">إدارة المستخدمين</a>
            <a class="list-group-item list-group-item-action" href="">الأدوار والسماحيات</a>
            <label class="list-group-label disabled">المقالات</label>
                <a class="indent-list-group-item list-group-item list-group-item-action {{ Request::is('manage/posts') ? "active" : "" }}" href="{{ route('posts.index') }}">إدارة المقالات</a>
                <a class="indent-list-group-item list-group-item list-group-item-action {{ Request::is('manage/posts/create') ? "active" : "" }}" href="{{ route('posts.create') }}">إنشاء مقال جديد</a>
            <a class="list-group-item list-group-item-action {{ Request::is('manage/categories') ? "active" : "" }}" href="{{ route('categories.index') }}">الأقسام</a>
            <a class="list-group-item list-group-item-action {{ Request::is('manage/tags') ? "active" : "" }}" href="{{ route('tags.index') }}">الوسوم</a>
        </div>
    </aside>
</div>