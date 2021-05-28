<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Administrator</h3>
    <ul class="nav side-menu">
      <li><a href="{{ route('dashboard') }}"> Dashboard </a></li>
      @permission('user-*')
      <li><a> User <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('user.index') }}">Data User</a></li>
          @permission('user-create')
          <li><a href="{{ route('user.create') }}">Tambah User</a></li>
          
        </ul>
        <li><a href="{{ route('mitra-super') }}"> Kelola Mitra </a></li>
        @endpermission
        <li><a href="{{ route('sports') }}">Kelola olahraga</a></li>
      </li>
      @endpermission
    </ul>
  </div>
  <div class="menu_section">
    <h3>Admin Management</h3>
    <ul class="nav side-menu">
      <li><a> Sarana <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('pitch.index') }}">Data Sarana</a></li>
        </ul>
      </li>
      <li><a> Booking<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('booking.index') }}">Data Transaksi Booking</a></li>
          <li><a href="{{ route('payment.index') }}">Validasi Pembayaran</a></li>
        </ul>
      </li>
      @permission('article-*','category-*')
      <li><a> Artikel <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          @permission('article-*')
          <li><a href="{{ route('article.index') }}">Data Artikel</a></li>
          @endpermission
          @permission('article-create')
          <li><a href="{{ route('article.create') }}">Tambah Artikel</a></li>
          @endpermission
          @permission('category-*')
          <li><a href="{{ route('article_category.index') }}">Kategori Artikel</a></li>
          @endpermission
        </ul>
      </li>
      @endpermission
      <li><a href="{{ route('mitra') }}"> Kelola Mitra </a></li>
    </ul>
  </div>

</div>
<!-- /sidebar menu -->