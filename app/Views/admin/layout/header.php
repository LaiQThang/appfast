<header class="dash-toolbar">
    <a href="javascript::void()" class="menu-toggle">
        <i class="fas fa-bars"></i>
    </a>
    <a href="javascript::void()" class="searchbox-toggle">
        <i class="fas fa-search"></i>
    </a>
    <form class="searchbox" action="javascript::void()">
        <a href="javascript::void()" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
        <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
        <input type="text" class="searchbox-input" placeholder="Nhập thông tin tìm kiếm">
    </form>
    <div class="tools">
        <a href="https://www.youtube.com/channel/UCwBHZqLqgZUTWLLaQLfoJ1g?sub_confirmation=1" target="_blank" class="tools-item">
            <i class="fab fa-youtube"></i>
        </a>
        <a href="javascript::void()" class="tools-item">
            <i class="fas fa-bell"></i>
            <i class="tools-item-count">4</i>
        </a>
        <div class="dropdown tools-item">
            <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item" href="javascript::void()"><?= session()->get('user_login') ? session()->get('user_login')['name'] : '' ?></a>
                <a class="dropdown-item" href="admin/logout">Logout</a>
            </div>
        </div>
    </div>
</header>