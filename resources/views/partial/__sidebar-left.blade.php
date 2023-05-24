<div class="col-lg-3">
    <div class="sidebar-menu-wrap">
        <div class="sidemenu-wrap d-flex justify-content-between align-items-center">
            <h3>Pify Sidebar Menu</h3>
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="ri-menu-line"></i>
            </button>
        </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="left-sidebar">
                    <nav class="sidebar-nav" data-simplebar>
                        <ul id="sidebar-menu" class="sidebar-menu">
                            <x-link.sidebar routes="/" name="home"/>
                            <x-link.sidebar routes="/unanswered" name="unanswered"/>
                            <x-link.sidebar routes="/tags" name="tags"/>
                            <x-link.sidebar routes="/topics" name="topics"/>
                            <x-link.sidebar routes="/faq" name="faq"/>
                            <x-link.sidebar routes="/users" name="users"/>
                            <x-link.sidebar routes="/about" name="about"/>
                            <x-link.sidebar routes="/contact" name="contact"/>
                            @if(auth()->check())
                                <h5 class="mt-3 mb-2">Welcome {{ auth()->user()->username }}</h5>
                                <x-link.sidebar routes="/profile" name="profile"/>
                                <x-link.sidebar routes="/profile/{{ auth()->user()->username }}/edit" name="edit profile"/>
                                <x-link.sidebar routes="/question/create" name="ask queston"/>
                                <x-link.sidebar routes="/myfollowing" name="my following"/>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
