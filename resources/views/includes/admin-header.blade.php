<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand {{ Request::is('admin') ? 'active' : '' }} " href="{{ route('admin.index') }}">Dashboard</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li {{ Request::is('admin/blog/post*') ? 'class=active' : '' }} ><a href="{{ route('admin.blog.post.index') }}">Posts</a></li>
                    <li {{ Request::is('admin/blog/category*') || Request::is('admin/blog/categori*') ? 'class=active' : '' }}><a href="{{ route('admin.blog.category.index') }}">Categories</a></li>
                    <li {{ Request::is('admin/contact/*') ? 'class=active' : '' }}><a href="{{ route('admin.contact.index') }}">Contact Messages</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>