<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Printer;
use App\Models\Jenis;
use App\Models\Divisi;
use App\Models\Lokasi;
use App\Models\history;
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
                    ->addColumn('jenis.nama', function($inventaris) {
                        return $inventaris->jenis->nama;
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
            $jenis = Jenis::all();
            return view('Backend.inventoryAdd',compact('jenis','user'));
        }

        public function InventarisStore(Request $request ){
            $inventory = inventory::insert([
                'user_id' => $request->user_id,
                'jenis_id' => $request->jenis_id,
                'hostname' => $request->hostname,
                'merk' => $request->merk,
                'Processor' => $request->Processor,
                'ram' => $request->ram,
                'grafik' => $request->grafik,
                'ssd' => $request->ssd,
                'os' => $request->os,
                'Office' => $request->Office,
                'akunOffice' => $request->akunOffice,
                'hardisk' => $request->hardisk,
                'legalos' => $request->legalos,
                'internet' => $request->internet,
                'ipaddress' => $request->ipaddress,
                'amp' => $request->amp,
                'umbrella' => $request->umbrella,
                'anydeskid' => $request->anydeskid,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);
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
            $jenis = Jenis::all();
            return view('Backend.inventoryEdit',compact('inventaris','jenis','user'));
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
                'jenis_id' => 'required',
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
            $inventaris->jenis_id = $request->jenis_id;
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
        $jenis = Jenis::all();
        $history = history::where('inventory_id',$id)->get();

        return view('Backend.inventoryDetails',compact('inventaris','user','jenis','history'));
         }

        // //  public function printer(){
        // //     $printer = printer::all();
        // //     return view('Backend.Peripheral.printer',compact('printer'));
        // //  }

        // public function printer_json(){
        //     return DataTables::of(Printer::limit(10))->make(true);
        // }
        // public function index_printer(Request $request){
        //     $printer = Printer::all();
        //     if ($request->ajax()) {
        //         $printer = Printer::latest()->get();
        //         return DataTables::of($printer)
        //             ->addIndexColumn()
        //             ->addColumn('user.name', function($printer) {
        //                 return $printer->user->name;
        //             })
        //             ->addColumn('jenis.nama', function($inventaris) {
        //                 return $inventaris->jenis->nama;
        //             })
        //             ->editColumn("created_at",function($printer){
        //                 return date("m/d/Y",strtotime($printer->created_at));
        //             })
        //             ->addColumn('action', function($row){
        //                 $btn = '<a href="'.route('printer.show',$row->id).'" class="edit btn btn-primary btn-sm">View</a>';
        //                 return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        //     }
        //     return view('Backend.Peripheral.printer',compact('printer'));
        // }

        //  public function add_printer(Request $request){
        //      $user = user::all();
        //      $jenis = Jenis::all();
        //     return view('Backend.Peripheral.printerAdd',compact('jenis','user'));
        //  }

        //  public function printerStore(Request $request){
        //     $printer = Printer::insert([
        //         'deskripsi' => $request->deskripsi,
        //         'created_at' =>Carbon::now(),
        //     ]);
        //     $notification = array (
        //         'message' => 'printer Insert Successfully',
        //         'alert-type' => 'success',
        //     );
        //     return redirect()->route('printer-json')->with($notification);
        // }

        // public function printerEdit($id){
        //     $printer = Printer::findOrFail($id);
        //     return view('Backend.printer.printerEdit',compact('printer'));
        // }

        // public function printerUpdate(Request $request){
        //     $id = $request->id;
        //     // @dd($request);
        //     Printer::findOrFail($id)->update([
        //         'deskripsi' => $request->deskripsi,
        //         'updated_at' => Carbon::now(),
        //     ]);
        //     $notification = array(
        //         'message' => 'Printer Updated Successfully',
        //         'alert-type' => 'success'
        //     );
        //     return redirect()->route('printer-json')->with($notification);
        // }

        //Printer

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

        // public function finish($id){

        //     $notes = notes::findOrFail($id);

        //     if($notes->save()){

        //         notes::findOrFail($id)->update([
        //             'status' => '1',
        //         ]);

        //         // Update status pada database
        //     $notes = notes::findOrFail($id);
        //     $notes->status = 1;
        //     $notes->save();

        //          $notification = array(
        //     'message' => 'Status Approved Successfully',
        //     'alert-type' => 'success'
        //       );
        // return redirect()->route('notes-json')->with($notification);

        //     }

        // }// End Method


}