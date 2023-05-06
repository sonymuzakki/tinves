<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
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
                $data = Inventory::latest()->get();
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
                // 'lokasi_id' => $request->lokasi_id,
                // 'divisi_id' => $request->divisi_id,
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

}