<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
  
    @if(auth()->user()->isdefault=="1")
    <h3>Administrator</h3>
    <ul class="nav side-menu">
      @permission('user-*')
          <li><a href="{{ route('user.index') }}">Data User</a></li>
          @permission('user-create')
        <li><a href="{{ route('mitra-super') }}"> Kelola Mitra </a></li>
        @endpermission
        <li><a href="{{ route('sports') }}">Kelola olahraga</a></li>
        <li><a href="{{ route('article_category.index') }}">Kelola Kategori Artikel</a></li>
      @endpermission
    </ul>
  </div>
  
    @endif
  </div>
  
  <div class="menu_section">
    @if(auth()->user()->role=="calonadmin")  
  <h3>Admin Management</h3>
  
  <ul class="nav side-menu">
    <li><a href="{{ route('mitra') }}"> Kelola Mitra </a></li>
  </ul>
    @endif
  </div>
  <div class="menu_section">
  
    @if(auth()->user()->role=="admin")
    <h3>Admin Management</h3>
    <ul class="nav side-menu">
      <li><a> Sarana <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('pitch.admin.index') }}">Data Sarana</a></li>
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
          
          @endpermission
        </ul>
      </li>
      <li><a href="{{ route('mitra') }}"> Kelola Mitra </a></li>
      @endpermission
    </ul>
    @endif
  </div>
</div>
<!-- /sidebar menu -->