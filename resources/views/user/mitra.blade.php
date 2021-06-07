@extends('user.template')
@section('content')

<section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
          <div class="col-lg-3 sidebar">
              <div class="sidebar-wrap bg-light ftco-animate">
                  <h3 class="heading mb-4">Cari kota</h3>
                  <form action="/kota-cari" method="GET">
                      <div class="fields">
                    <div class="form-group">
                      <input type="text" class="form-control" name="cari" placeholder="City" value="{{ old('cari') }}">
                    </div>
                    <div class="form-group">
                      <input type="submit" value="CARI" class="btn btn-primary py-3 px-5">
                    </div>
                  </div>
              </form>
                
    
              </div>
        </div>
          
        <div class="col-lg-9">
            <div class="row">
                @foreach($pitch as $p)
                <div class="col-md-4 ftco-animate">
                          <div class="destination">
                            <img width="200px" src="{{ asset('images/sarana/') }}/{{$p->image}}" class="img img-2 d-flex justify-content-center align-items-center" heigth="100px">
                              </a>
                              <div class="text p-3">
                                  <div class="d-flex">
                                        <div class="one">
                                            <h3><a href="hotel-single.html">{{ $p->name }}</a></h3>
                                        </div>
                                  </div>
                                  <hr>
                                  <p class="bottom-area d-flex"> 
                                      <span class="ml-auto"><a href="{{ route('front.detail',$p->id) }}">Pesan Sekarang</a></span>
                                  </p>
                              </div>
                          </div>
                      </div>
                      @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                  <div class="block-27">
                    <ul>
                      <li><a href="#">&lt;</a></li>
                      <li class="active"><span>1</span></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">&gt;</a></li>
                    </ul>
                  </div>
                </div>
              </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->
@endsection