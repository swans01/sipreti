<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\DataHamaPeriode;
use App\DataHamaHarian;

class DataController extends Controller{
    public function tampilDataPeriode(){
        $DataHama = DataHamaPeriode::all();
        $columns = Schema::getColumnListing('hamaperiode');
        return view('dataHama', ['DataHama' => $DataHama, 'columns' => $columns]);
        
    }

    public function tampilDataHarian(){
        $DataHama = DataHamaHarian::all();
        $columns = Schema::getColumnListing('hamaharian');
        return view('dataHama', ['DataHama' => $DataHama, 'columns' => $columns]);
        
    }

    public function postInputPeriode(Request $request){

        $data = new DataHamaPeriode();
        $data["Carcospora sp"] = $request['Carcospora'];
        $data["Cnaphacrosis sp"] = $request['Cnaphacrosis'];
        $data["Helminthosporium sp"] = $request['Helminthosporium'];
        $data["Lalat Bibit"] = $request['Lalat'];
        $data["Nympulla sp"] = $request['Nympulla'];
        $data["Penggerek Batang"] = $request['Penggerek'];
        $data["Pitopthora sp"] = $request['Pitopthora'];
        $data["Pirycularia sp"] = $request['Pirycularia'];
        $data["Plutella sp"] = $request['Plutella'];
        $data["Thrips sp"] = $request['Thrips'];
        $data["Tikus"] = $request['Tikus'];
        $data["Tungro"] = $request['Tungro'];
        $data["WBC"] = $request['WBC'];
        $data["Xanthomas sp"] = $request['Xanthomas'];
        $data["Suhu Rata Rata"] = $request['Suhu'];
        $data["Kelembapan"] = $request['Kelembapan'];
        $data["Curah Hujan"] = $request['Curah'];

        $data->save();

        return redirect()->back()->with(['hasil' => 'Data Berhasil Diinputkan']);

    }

    public function postInputHarian(Request $request){

        $data = new DataHamaHarian();
        $data["Carcospora sp"] = $request['Carcospora'];
        $data["Cnaphacrosis sp"] = $request['Cnaphacrosis'];
        $data["Helminthosporium sp"] = $request['Helminthosporium'];
        $data["Lalat Bibit"] = $request['Lalat'];
        $data["Nympulla sp"] = $request['Nympulla'];
        $data["Penggerek Batang"] = $request['Penggerek'];
        $data["Pitopthora sp"] = $request['Pitopthora'];
        $data["Pirycularia sp"] = $request['Pirycularia'];
        $data["Plutella sp"] = $request['Plutella'];
        $data["Thrips sp"] = $request['Thrips'];
        $data["Tikus"] = $request['Tikus'];
        $data["Tungro"] = $request['Tungro'];
        $data["WBC"] = $request['WBC'];
        $data["Xanthomas sp"] = $request['Xanthomas'];
        $data["Suhu Rata Rata"] = $request['Suhu'];
        $data["Kelembapan"] = $request['Kelembapan'];
        $data["Curah Hujan"] = $request['Curah'];

        $data->save();

        return redirect()->back()->with(['hasil' => 'Data Berhasil Diinputkan']);

    }
}
?>