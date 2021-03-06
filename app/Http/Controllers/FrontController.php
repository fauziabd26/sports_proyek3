<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sports;
use App\Article;
use App\Pitch;
use App\PitchPrice;
use DB;
use Yajra\Datatables\Datatables;
use Validator;
use App\Booking;
use App\BookingDetail;
use App\Payment;
use App\Coupon;
use App\Mitra;
use Auth;


class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Home";

        $data['last_articles'] = Article::limit(4)->get();
        $data['articles'] = DB::table('article as a')
            ->join('article_category as ac', 'ac.id', '=', 'a.article_category_id')
            ->join('user as u', 'u.id', '=', 'a.user_id')
            ->select('a.title', 'ac.name', 'u.fullname', 'a.content', 'a.created_at', 'a.content')
            ->where('a.isactive', '1')
            ->paginate(5);

        $pitch = DB::table('pitch')
            ->join('sports', 'sports.id_sports', '=', 'pitch.id_sports')
            ->select('sports.*', 'pitch.*')
            ->get();
        $sports = Sports::all();
        return view('frontend.template',compact('pitch','sports'))->with($data);
    }
    public function homeuser()
    {
        $data['title'] = "Home";

        $data['last_articles'] = Article::limit(4)->get();
        $pitch = Pitch::all();
        $sports = Sports::all();
        $mitra = Mitra::all();
        $data['pitches'] = DB::table('pitch as p')->join(DB::raw('(select pitch_id, min(price) as price from pitch_price group by pitch_id) as pp'),'pp.pitch_id','=','p.id')
                            ->select('p.id','p.name','p.image','pp.price')->get();
        return view('user.home',compact('pitch','sports','mitra'))->with($data);
    }

    public function mitra()
    {
        $data['title'] = "Home";

        $data['last_articles'] = Article::limit(4)->get();
        $data['articles'] = DB::table('article as a')
            ->join('article_category as ac', 'ac.id', '=', 'a.article_category_id')
            ->join('user as u', 'u.id', '=', 'a.user_id')
            ->select('a.title', 'ac.name', 'u.fullname', 'a.content', 'a.created_at', 'a.content')
            ->where('a.isactive', '1')
            ->paginate(5);

        $pitch = DB::table('pitch')
            ->join('sports', 'sports.id_sports', '=', 'pitch.id_sports')
            ->join('user', 'user.id', '=', 'pitch.user_id')
            ->select('sports.*', 'pitch.*','user.*')
            ->where('pitch.id','14')
            ->get();
        $sports = Sports::all();
        return view('user.mitra',compact('pitch','sports'))->with($data);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$mitra = DB::table('mitra')
		->where('kota','like',"%".$cari."%")
		->paginate();

        $pitch = Pitch::all();
        	// mengirim data mitra ke view index
            return view('user.homecari',compact('mitra','pitch'));
 
	}
    public function login()
    {
        $data['last_articles'] = Article::limit(4)->get();
        $data['articles'] = DB::table('article as a')
            ->join('article_category as ac', 'ac.id', '=', 'a.article_category_id')
            ->join('user as u', 'u.id', '=', 'a.user_id')
            ->select('a.title', 'ac.name', 'u.fullname', 'a.content', 'a.created_at', 'a.content')
            ->where('a.isactive', '1')
            ->paginate(5);

        $pitch = DB::table('pitch')
            ->join('sports', 'sports.id_sports', '=', 'pitch.id_sports')
            ->select('sports.*', 'pitch.*')
            ->get();
        $sports = Sports::all();
        return view('frontend.template',compact('pitch','sports'))->with($data);
        
    }

    public function register()
    {
        $data['title'] = "Daftar Member Baru";

        $data['last_articles'] = Article::limit(4)->get();
        $pitch = Pitch::all();
        $sports = Sports::all();
        return view('frontend.register',compact('pitch','sports'))->with($data);
    }

    public function about()
    {
        $data['title'] = "Tentang Kami";

        $data['last_articles'] = Article::limit(4)->get();
        $pitch = Pitch::all();
        $sports = Sports::all();
        return view('frontend.about',compact('pitch','sports'))->with($data);
        
    }

    public function news()
    {
        $data['title'] = "Berita";

        $data['last_articles'] = Article::limit(4)->get();
        $data['articles'] = DB::table('article as a')
            ->join('article_category as ac', 'ac.id', '=', 'a.article_category_id')
            ->join('user as u', 'u.id', '=', 'a.user_id')
            ->select('a.title', 'ac.name', 'u.fullname', 'a.content', 'a.created_at', 'a.content')
            ->where('a.isactive', '1')
            ->paginate(5);

        $pitch = Pitch::all();
        $sports = Sports::all();
        return view('frontend.news',compact('pitch','sports'))->with($data);
    }

    public function detail($id)
    {
        $data['title'] = "";
        $data['pitch'] = Pitch::where('id', $id)->first();
        if (count($data['pitch']) > 0) {
            $data['title'] = $data['pitch']->name;
        } else {
            $data['title'] = "Lapangan tidak ditemukan";
        }

        $data['last_articles'] = Article::limit(4)->get();
        return view('user.detail')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function timesheet($id, $date)
    {
        $date = date('Y-m-d', strtotime($date));
        $sqlorder = "select m.user_id, d.time_number from booking_detail d inner join booking m on m.id = d.booking_id where d.date = '$date' and m.pitch_id = '$id' ";
        $timesheets = DB::table('pitch_price as p')
            ->leftJoin(DB::raw('(' . $sqlorder . ') as o'), 'o.time_number', '=', 'p.time_number')
            ->select('p.time_number', 'p.price', 'o.user_id')
            ->where('p.pitch_id', $id);
        return Datatables::of($timesheets)
            ->editColumn('time_number', function ($timesheet) {
                $html = strval($timesheet->time_number) . ":00";
                if (intval($timesheet->time_number) < 10) {
                    $html = "0" . $html;
                }
                return $html;
            })
            ->editColumn('price', function ($timesheet) {
                $html = number_format(floatval($timesheet->price));
                return $html;
            })
            ->editColumn('user_id', function ($timesheet) {
                $html = "";
                if ($timesheet->user_id == "") {
                    if (Auth::check() && Auth::user()->role == 'member') {
                        $html = "<button class='btn btn-success btn-xs btn-add'><i class='fa fa-plus-circle'></i> Pesan</button>";
                    } else {
                        $html = "<span class='text text-warning'>Harap Login</span>";
                    }
                } else {
                    $html = "<span class='text text-danger'>Dibooking</span>";
                }
                return $html;
            })
            ->setRowId('time_number')
            ->make(true);
    }

    public function checkout(Request $request)
    {
        $data['response_status'] = 0;
        $data['response_message'] = "Data tidak diisi dengan lengkap";

        if (Auth::check() && Auth::user()->role == 'member') {
            $validator = Validator::make($request->all(), [
                'pitch_id' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'time_number' => 'required',
                'date' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()->with($data);
            } else {

                DB::beginTransaction();

                $idmax  = 0;
                $maxtrans = Booking::whereYear('created_at', '=', date("Y"))->orderBy('created_at', 'desc')->first();
                if (count($maxtrans)) {
                    $no_trans = $maxtrans->notrans;
                    $arrnotrans = explode("/", $no_trans);
                    $idmax = $arrnotrans[2];
                }
                $idmax++;
                $newnotrans = strval($idmax);
                if (strlen($newnotrans) < 4) {
                    for ($i = 0; $i < 4 - strlen(strval($idmax)); $i++) {
                        $newnotrans = "0" . strval($newnotrans);
                    }
                }
                $newnotrans = "SPORTS/" . $newnotrans . "/" . date("Y");

                $booking = new Booking();
                $booking->notrans = $newnotrans;
                $booking->pitch_id = $request->pitch_id;
                $booking->name = $request->name;
                $booking->phone = $request->phone;
                $booking->user_id = Auth::user()->id;
                $booking->save();

                $arrtime = $request->time_number;
                $arrdate = $request->date;

                if (count($arrtime) > 0) {
                    for ($i = 0; $i < count($arrtime); $i++) {
                        $olddata = DB::table('booking as m')->join('booking_detail as d', 'm.id', 'd.booking_id')
                            ->where('d.date', date("Y-m-d", strtotime($arrdate[$i])))
                            ->where('d.time_number', intval($arrtime[$i]))
                            ->where('m.pitch_id', $request->pitch_id)->select('m.notrans')->first();
                        if (count($olddata) == 0) {
                            $dataprice = PitchPrice::where('pitch_id', $request->pitch_id)->where('time_number', intval($arrtime[$i]))->first();

                            $bookingdetail = new BookingDetail();
                            $bookingdetail->booking_id = $booking->id;
                            $bookingdetail->date = date("Y-m-d", strtotime($arrdate[$i]));
                            $bookingdetail->time_number = intval($arrtime[$i]);
                            $bookingdetail->price = $dataprice->price;
                            $bookingdetail->coupon_id = 0;
                            $bookingdetail->save();

                            $data['response_status'] = 1;
                            $data['response_message'] = "Jadwal berhasil dibooking";
                        } else {
                            $data['response_status'] = 0;
                            $data['response_message'] = "Maaf jadwal telah dibooking";
                            return redirect()->back()->with($data);
                        }
                    }
                } else {
                    $data['response_status'] = 0;
                    $data['response_message'] = "Tidak ada booking list";
                    return redirect()->back()->with($data);
                }

                if ($data['response_status'] == 1) {
                    DB::commit();
                    return redirect()->route('front.detail_order', ['id' => $booking->id]);
                } else {
                    DB::rollback();
                    return redirect()->back()->with($data);
                }
            }
        } else {
            return redirect()->route('front.login');
        }
    }

    public function order()
    {
        if (Auth::check() && Auth::user()->role == 'member') {
            $data['title'] = "Booking Saya";

            $data['last_articles'] = Article::limit(4)->get();

            $sql = "select booking_id, sum(price) as price, count(booking_id) as time_count from booking_detail group by booking_id ";
            $sqlpayment = "select booking_id, sum(amount) as total_payment from payment where status = '1' group by booking_id ";
            $data['bookings'] = DB::table('booking as b')
                ->join(DB::raw('(' . $sql . ') as d '), 'd.booking_id', '=', 'b.id')
                ->leftJoin(DB::raw('(' . $sqlpayment . ') as py '), 'py.booking_id', '=', 'b.id')
                ->leftJoin('user as u', 'u.id', '=', 'b.user_id')
                ->where('user_id', Auth::user()->id)
                ->select('b.notrans', 'b.name', 'b.phone', 'd.price', 'total_payment', 'd.time_count', 'b.created_at', 'u.username', 'b.id')->paginate(10);

            return view('user.order')->with($data);
        } else {
            return redirect()->route('front.login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_order($id)
    {
        $data['title'] = "Detail Booking";

       $data['last_articles'] = Article::limit(4)->get();

        $data['booking'] = Booking::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if (count($data['booking']) > 0) {
            $data['booking_detail'] = BookingDetail::where('booking_id', $id)->get();
            $data['booking_total'] = BookingDetail::where('booking_id', $id)->sum('price');
            $data['booking_count'] = BookingDetail::where('booking_id', $id)->count();
            $data['count_coupon'] = DB::table('coupon as c')->leftJoin('payment as p', 'c.id', '=', 'p.coupon_id')
                ->where('p.coupon_id', null)->count();

            $data['payment_total'] = Payment::where('booking_id', $id)->sum('amount');
            $data['count_transfer'] =  Payment::where('booking_id', $id)->where('type', 'transfer')->count();

            $data['payments'] = DB::table('payment as p')
                ->leftJoin('user as u', 'u.id', '=', 'p.user_id')
                ->leftJoin('user as c', 'c.id', '=', 'p.confirmer_id')
                ->select('p.date', 'p.type', 'p.status', 'p.account_name', 'p.amount', 'p.created_at', 'u.username', 'c.username', 'p.id', 'p.booking_id')
                ->where('booking_id', $id)->get();
            $data['payment_total_confirm'] = Payment::where('booking_id', $id)->where('status', '1')->sum('amount');
        } else {
            return redirect()->route('front.home');
        }


        return view('frontend.order_detail')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        if (Auth::check() && Auth::user()->role == 'member') {
            $validator = Validator::make($request->all(), [
                'booking_id' => 'required',
                'type' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()->with($data);
            } else {
                if ($request->type == "transfer") {
                    $payment = new Payment();
                    $payment->type = $request->type;
                    $payment->booking_id = $request->booking_id;
                    $payment->date = date("Y-m-d", strtotime($request->date));
                    $payment->account_name = $request->account_name;
                    $payment->user_id = Auth::user()->id;
                    $payment->status = 0;
                    $payment->coupon_id = 0;
                    $payment->amount = $request->amount;
                    $payment->save();
                } elseif ($request->type == "coupon") {
                    $dataprices = DB::table('booking_detail')->select('price')
                        ->where('booking_id', $request->booking_id)
                        ->limit($request->total_coupon)
                        ->orderBy('date', 'desc')->orderBy('time_number', 'desc')->get();
                    $coupons = DB::table('coupon as c')->leftJoin('payment as p', 'c.id', '=', 'p.coupon_id')
                        ->where('p.coupon_id', null)->select('c.id')
                        ->limit($request->total_coupon)->orderBy('c.id', 'asc')->get();
                    for ($i = 0; $i < $request->total_coupon; $i++) {
                        $payment = new Payment();
                        $payment->type = $request->type;
                        $payment->booking_id = $request->booking_id;
                        $payment->date = date("Y-m-d");
                        $payment->account_name = Auth::user()->fullname;
                        $payment->user_id = Auth::user()->id;
                        $payment->confirmer_id = Auth::user()->id;
                        $payment->status = 1;
                        $payment->coupon_id = $coupons[$i]->id;
                        $payment->amount = $dataprices[$i]->price;
                        $payment->save();
                    }
                }
                return redirect()->route('front.detail_order', $request->booking_id);
            }
        } else {
            return redirect()->route('front.login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
