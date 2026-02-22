<nav>
    <div class="contained">
        <a href="{{URL('index')}}" class="logo fc-primary ff-damion row flex-alig-center">
            <span class="fs-h2">Siscon</span>
        </a>
        <input type="checkbox" name="tablet-mobile-menu" class="tab-mob-menu" aria-label="Menu principal">
        <div class="navigation-container">
            <a href="{{URL('index')}}" class="{{ Request::is('/') || Request::is('index') ? 'nav-link-active' : '' }}" {!! Request::is('/') || Request::is('index') ? 'aria-current="page"' : '' !!}>Home</a>
            <a href="{{URL('about')}}" class="{{ Request::is('about*') ? 'nav-link-active' : '' }}" {!! Request::is('about*') ? 'aria-current="page"' : '' !!}>Sobre nós</a>
            <a href="{{URL('service')}}" class="{{ Request::is('service*') ? 'nav-link-active' : '' }}" {!! Request::is('service*') ? 'aria-current="page"' : '' !!}>Serviços</a>
            <!-- <a href="{{URL('industries')}}">Industries</a>
                <a href="{{URL('blog/blog')}}">Blog</a>
                <a href="{{URL('career/career')}}">Career</a> -->
            <a href="{{URL('contact')}}" class="btn-bg1 border-round {{ Request::is('contact*') ? 'nav-link-active' : '' }}" {!! Request::is('contact*') ? 'aria-current="page"' : '' !!}>Fale conosco</a>
        </div>
    </div>
</nav>
