<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Administrator</h3>
    <ul class="nav side-menu">
      <li><a href="/homeadmin"><i class="fa fa-laptop"></i> Dashboard </a></li>
      @permission('user-*')
      <li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('user.index') }}">Data User</a></li>
          @permission('user-create')
          <li><a href="{{ route('user.create') }}">Tambah User</a></li>
          @endpermission
        </ul>
      </li>
      @endpermission
      @permission('article-*','category-*')
      <li><a><i class="fa fa-file-o"></i> Artikel <span class="fa fa-chevron-down"></span></a>
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
      @permission('setting-edit')
      <li><a href="{{ route('setting.index') }}"><i class="fa fa-cog"></i> Setting Perusahaan </a></li>
      @endpermission
    </ul>
  </div>
  <div class="menu_section">
    <h3>Futsal Management</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-soccer-ball-o"></i> Lapangan <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('sarana.index') }}">Data Lapangan</a></li>
          <li><a href="{{ route('sarana.create') }}">Tambah Lapangan</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-sticky-note-o"></i> Booking<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('booking.index') }}">Data Transaksi Booking</a></li>
          <li><a href="{{ route('payment.index') }}">Validasi Pembayaran</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-money"></i> Kas<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('cash.index') }}">Data Transaksi</a></li>
          <li><a href="{{ route('cash.create') }}">Tambah Transaksi</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-file"></i> Report<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('report.payment') }}">Report Pembayaran</a></li>
          <li><a href="{{ route('report.laba') }}">Report Laba Rugi</a></li>
        </ul>
      </li>
    </ul>
  </div>

</div>
<!-- /sidebar menu -->