<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\ups;
use App\Models\User;
use App\Models\Jenis;
use App\Models\Divisi;
use App\Models\Lokasi;
use App\Models\history;
use App\Models\Printer;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use GrahamCampbell\ResultType\Success;

class InventoryController extends Controller
{

        public function InventarisAll(){
            $inventory = Inventory::all();
            return view('Backend.InventoryAll',compact('inventory'));
        }

        public function index_json(Request $request){
            $data = Inventory::all();
            if ($request->ajax()) {
                $data = Inventory::all();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user.name', function($inventaris) {
                        return $inventaris->user->name;
                    })
                    ->addColumn('divisi.nama', function($inventaris) {
                        return $inventaris->user->Divisi->nama;
                    })
                    ->addColumn('lokasi.nama', function($inventaris) {
                        return $inventaris->user->Lokasi->nama;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('notes.show',$row->id).'" class="edit btn btn-primary btn-sm">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('Backend.index');
        }

        public function InventarisAdd(){
            // $divisi = Divisi::all();
            $user = user::with('divisi','lokasi')->get();
            // $lokasi = Lokasi::all();
            // $jenis = Jenis::all();
            return view('Backend.inventoryAdd',compact('user'));
        }

        public function InventarisStore(Request $request ){

            // Ambil nilai tanggal dari input form
            $tanggal = $request->input('tanggal');

            // Konversi tanggal menjadi objek Carbon
            $carbonDate = Carbon::createFromFormat('d M, Y', $tanggal);

            // Format ulang tanggal menjadi 'Y-m-d'
            $formattedDate = $carbonDate->format('Y-m-d');
            // ]);

            $inventory = new inventory();
            $inventory->user_id= $request->user_id;
            $inventory->jenis= $request->jenis;
            $inventory->hostname= $request->hostname;
            $inventory->merk= $request->merk;
            $inventory->Processor= $request->Processor;
            $inventory->ram= $request->ram;
            $inventory->grafik= $request->grafik;
            $inventory->ssd= $request->ssd;
            $inventory->os= $request->os;
            $inventory->Office= $request->Office;
            $inventory->akunOffice= $request->akunOffice;
            $inventory->hardisk= $request->hardisk;
            $inventory->legalos= $request->legalos;
            $inventory->internet= $request->internet;
            $inventory->ipaddress= $request->ipaddress;
            $inventory->amp= $request->amp;
            $inventory->umbrella= $request->umbrella;
            $inventory->anydeskid= $request->anydeskid;
            $inventory->tanggal= $request->$formattedDate;
            $inventory->created_by= Auth::user()->id;
            $inventory->created_at= Carbon::now();
            $inventory->save();

            $notification = array (
                'message' => 'Inventory Insert Successfully',
                'alert-type' => 'success',
            );
            // return view('Backend.InventoryAll',compact('inventory', 'notification'));
            return redirect()->route('index_json')->with($notification);
        }

        public function InventarisEdit($id){
            $inventaris = Inventory::findOrFail($id);
            $user = user::all();
            return view('Backend.inventoryEdit',compact('inventaris','user'));
        }

        public function index2(){
            $inventory = Inventory::all();
            return view('Backend.InventoryAll',compact('inventory'));
        }

        public function json(){
            return DataTables::of(Inventory::limit(10))->make(true);
        }

        public function InventarisUpdate(Request $request,$id){

            //validasi inputan dari form
            $this->validate($request, [
                'user_id' => 'required',
                'jenis' => 'required',
                'hostname' => 'required',
                'os' => 'required',
                'merk' => 'required',
                'Office' => 'required',
                'Processor' => 'required',
                'akunOffice' => 'required',
                'ram' => 'required',
                'ssd' => 'required',
                'grafik' => 'required',
                'legalos' => 'required',
                'hardisk' => 'required',
                'internet' => 'required',
                'amp' => 'required',
                'umbrella' => 'required',
                'ipaddress' => 'required',
                'anydeskid' => 'required',
            ]);

            //mengambil data inventaris dari database
            $inventaris = Inventory::findOrFail($id);

            //mengupdate data inventaris dengan data baru dari inputan form
            $inventaris->user_id = $request->user_id;
            $inventaris->jenis= $request->jenis;
            $inventaris->hostname = $request->hostname;
            $inventaris->os = $request->os;
            $inventaris->merk = $request->merk;
            $inventaris->Office = $request->Office;
            $inventaris->Processor = $request->Processor;
            $inventaris->akunOffice = $request->akunOffice;
            $inventaris->ram = $request->ram;
            $inventaris->ssd = $request->ssd;
            $inventaris->grafik = $request->grafik;
            $inventaris->legalos = $request->legalos;
            $inventaris->hardisk = $request->hardisk;
            $inventaris->internet = $request->internet;
            $inventaris->amp = $request->amp;
            $inventaris->umbrella = $request->umbrella;
            $inventaris->ipaddress = $request->ipaddress;
            $inventaris->anydeskid = $request->anydeskid;

            //jika kolom tidak diubah, maka ambil nilai dari database sebelumnya
            if (!$inventaris->isDirty('user_id')) {
                $inventaris->user_id = $inventaris->getOriginal('user_id');
            }

            //simpan perubahan data pada inventaris
            $inventaris->save();

            //set notifikasi untuk ditampilkan pada halaman selanjutnya
            $notification = array(
                'message' => 'Inventaris Updated Successfully',
                'alert-type' => 'success'
            );

            //kembalikan user ke halaman inventaris dengan notifikasi
            return redirect()->route('index_json');
        }


        public function InventarisDelete($id){
            Inventory::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Inventory Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }


        public function InventarisDetails($id){
            $inventaris = Inventory::findOrFail($id);
            $user = user::all();
            $history = history::where('inventory_id',$id)->get();

            return view('Backend.inventoryDetails',compact('inventaris','user','history'));
        }

         //Printer Controller

        public function json_printer(){
            return DataTables::of(Printer::limit(10))->make(true);
        }

        public function index_printer(Request $request){
            $data = Printer::all();
            if ($request->ajax()) {
                $data = Printer::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user.name', function($users) {
                        return $users->user->name;
                    })
                    ->addColumn('jenis.nama', function($inventaris) {
                        return $inventaris->jenis->nama;
                    })
                    ->editColumn("created_at",function($data){
                        return date("m/d/Y",strtotime($data->created_at));
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('notes.show',$row->id).'" class="edit btn btn-primary btn-sm">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('Backend.Peripheral.printer',compact('data'));
        }

        public function add_printer(){
            $printer = Printer::all();
            $users = user::all();
            $jenis = jenis::all();
            return view('Backend.Peripheral.printerAdd',compact('printer','jenis','users'));
        }

        public function printerAll(){
          $printer = Printer::all();
          return view('Backend.Peripheral.printer',compact('printer'));
        }

        public function store_printer(Request $request){

            // Ambil nilai tanggal dari input form
            $tanggal = $request->input('tanggal');

            // Konversi tanggal menjadi objek Carbon
            $carbonDate = Carbon::createFromFormat('d M, Y', $tanggal);

            // Format ulang tanggal menjadi 'Y-m-d'
            $formattedDate = $carbonDate->format('Y-m-d');

            // Simpan data printer
            $printer = new Printer();
            $printer->user_id = $request->user_id;
            $printer->jenis_id = $request->jenis_id;
            $printer->merk = $request->merk;
            $printer->tanggal = $formattedDate;
            $printer->save();

            $notification = array (
                'message' => 'Printer Insert Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('index_printer')->with($notification);
        }

        public function edit_printer($id){
            $printer = Printer::findOrFail($id);
            $users = user::all();
            $jenis = Jenis::all();
            return view('Backend.Peripheral.editPrinter',compact('printer','users','jenis'));
        }

        public function update_printer(Request $request){
            $id = $request->id;
            // @dd($request);
            $formattedTanggal = date('Y-m-d', strtotime($request->tanggal));

            printer::findOrFail($id)->update([
                'user_id' => $request->user_id,
                'jenis_id' => $request->jenis_id,
                'merk' => $request->merk,
                'tanggal' => $formattedTanggal,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Printer Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('index_printer')->with($notification);
        }

        public function delete_printer($id){
            Printer::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Printer Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

        public function details_printer($id){
            $printer = Printer::findOrFail($id);
            $users = user::all();
            $jenis = Jenis::all();
            // $history = history::where('inventory_id',$id)->get();

            return view('Backend.Peripheral.details_printer',compact('printer','users','jenis'));
        }

        //Ups Controller

        public function json_ups(){
            return DataTables::of(ups::limit(10))->make(true);
        }

        public function index_ups(Request $request){
            $data = ups::all();
            if ($request->ajax()) {
                $data = ups::latest()->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user.name', function($users) {
                        return $users->user->name;
                    })
                    ->addColumn('jenis.nama', function($inventaris) {
                        return $inventaris->jenis->nama;
                    })
                    ->editColumn("created_at",function($data){
                        return date("m/d/Y",strtotime($data->created_at));
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('notes.show',$row->id).'" class="edit btn btn-primary btn-sm">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('Backend.Peripheral.ups',compact('data'));
        }

        public function add_ups(){
            $ups = ups::all();
            $users = user::all();
            $jenis = jenis::all();
            return view('Backend.Peripheral.upsAdd',compact('ups','jenis','users'));
        }

        public function upsAll(){
          $ups = ups::all();
          return view('Backend.Peripheral.ups',compact('ups'));
        }

        public function store_ups(Request $request){

            // Ambil nilai tanggal dari input form
            $tanggal = $request->input('tanggal');

            // Konversi tanggal menjadi objek Carbon
            $carbonDate = Carbon::createFromFormat('d M, Y', $tanggal);

            // Format ulang tanggal menjadi 'Y-m-d'
            $formattedDate = $carbonDate->format('Y-m-d');

            // Simpan data ups
            $ups = new ups();
            $ups->user_id = $request->user_id;
            $ups->jenis_id = $request->jenis_id;
            $ups->merk = $request->merk;
            $ups->tanggal = $formattedDate;
            $ups->save();

            $notification = array (
                'message' => 'ups Insert Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('index_ups')->with($notification);
        }

        public function edit_ups($id){
            $ups = ups::findOrFail($id);
            $users = user::all();
            $jenis = Jenis::all();
            return view('Backend.Peripheral.editups',compact('ups','users','jenis'));
        }

        public function update_ups(Request $request){
            $id = $request->id;
            // @dd($request);
            $formattedTanggal = date('Y-m-d', strtotime($request->tanggal));

            ups::findOrFail($id)->update([
                'user_id' => $request->user_id,
                'jenis_id' => $request->jenis_id,
                'merk' => $request->merk,
                'tanggal' => $formattedTanggal,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'ups Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('index_ups')->with($notification);
        }

        public function delete_ups($id){
            ups::findOrFail($id)->delete();

            $notification = array(
                'message' => 'ups Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

        public function details_ups($id){
            $ups = Ups::findOrFail($id);
            $users = User::all();
            $jenis = Jenis::all();

            // Mendapatkan jenis yang diinputkan pada UPS
            $jenisId = $ups->jenis_id;

            // Mendapatkan history berdasarkan jenis
            $history = History::where('jenis_id', $id)
                ->whereHas('jenis', function ($query) use ($jenisId) {
                    $query->where('jenis_id', $jenisId);
                })
                ->get();

            return view('Backend.Peripheral.details_ups', compact('ups', 'users', 'jenis', 'history'));
        }

}