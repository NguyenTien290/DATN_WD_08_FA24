<aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
    <div class="logo">
        <a href="#">
            <img src="/assets/admin/images/icon/logo-white.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar2">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="/assets/admin/images/icon/avatar-big-01.jpg" alt="John Doe" />
            </div>
            <h4 class="name">john doe</h4>
            <a href="#">Sign out</a>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Quản lý
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('admin.post.index') }}">
                                <i class="fas fa-file-text"></i>Bài viết</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.category.index') }}">
                                <i class="fas fa-list-ul"></i>Danh mục</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.user.index') }}">
                                <i class="fas fa-users"></i>Tài khoản</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.orders.index') }}">
                                <i class="fas fa-shopping-basket"></i>Đơn hàng</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.voucher.index') }}">
                                <i class="fa fa-tags"></i>Mã giảm giá</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reviews.index') }}">
                                <i class="fa fa-tags"></i>Đánh giá</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.slider.index') }}">
                                <i class="far fa-window-restore"></i>Slider</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.images.index') }}">
                                <i class="far fa-window-restore"></i>Ảnh trưng bày sản phẩm</a>
                        </li>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-inbox"></i>Sản phẩm
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('admin.products.index') }}">
                                <i class="fas fa-table"></i>Quản lý sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products.variants.index') }}">
                                <i class="fas fa-cog "></i>Sản phẩm biến thể</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products.variants.getAllAttribute') }}">
                                <i class="fas fa-code-fork"></i>Thuộc tính biến thể</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-archive"></i>Tồn kho</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>