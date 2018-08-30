<?php
use App\DataHamaHarian;
$DataHama = DataHamaHarian::count();

if($DataHama > 70){
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
          <title>Sistem Pakar</title>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
          <link href="{{ ('css/signin.css') }}" rel="stylesheet">
         
  </head>
  <body >
  @if (Session::has('hasil'))
  <script type="text/javascript">
      $(window).on('load',function(){
          $('#hasilModal').modal('show');
      });
  </script>
  @endif
  
  <form class="form-signin" action="{{ route('hitungHarian') }}">     
        <h2 class="text-center" class="mb-3 font-weight-normal">Masukkan Data Yang Diperlukan</h2>
        <label class="font-weight-bold" for="inputSuhu" >Suhu Rata-Rata : </label>
        <input type="number" id="inputSuhu" name="inputSuhu" class="form-control" placeholder="Suhu Rata-Rata" required autofocus>
        <label class="font-weight-bold" for="inputCurah" >Curah Hujan : </label>
        <input type="number" id="inputCurah" name="inputCurah" class="form-control" placeholder="Curah Hujan" required>
        <label class="font-weight-bold" for="inputKelembapan" >Kelembapan Rata-Rata : </label>
        <input type="number" id="inputKelembapan" name="inputKelembapan" class="form-control" placeholder="Kelembapan Rata-Rata" required>
        <div class="form-group">
        <label class="font-weight-bold" for="hama">Pilih Hama Yang Ingin Diprediksi</label>
        <select class="form-control font-weight-bold" id="hama" name="hama">
          <option class="font-weight-bold" value="Carcospora sp">Carcospora sp</option>
          <option class="font-weight-bold" value="Cnaphacrosis sp">Cnaphacrosis sp</option>
          <option class="font-weight-bold" value="Helminthosporium sp">Helminthosporium sp</option>
          <option class="font-weight-bold" value="Lalat Bibit">Lalat Bibit</option>
          <option class="font-weight-bold" value="Nympulla sp">Nympulla sp</option>
          <option class="font-weight-bold" value="Penggerek Batang">Penggerek Batang</option>
          <option class="font-weight-bold" value="Pitopthora sp">Pitopthora sp</option>
          <option class="font-weight-bold" value="Pirycularia sp">Pirycularia sp</option>
          <option class="font-weight-bold" value="Plutella sp">Plutella sp</option>
          <option class="font-weight-bold" value="Thrips sp">Thrips sp</option>
          <option class="font-weight-bold" value="Tikus">Tikus</option>
          <option class="font-weight-bold" value="Tungro">Tungro</option>
          <option class="font-weight-bold" value="WBC">WBC</option>
          <option class="font-weight-bold" value="Xanthomas sp">Xanthomas sp</option>
        </select>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Hitung</button><br>
        <a class="btn btn-warning btn-xl js-scroll-trigger" href="{{ route('login') }}" >Kembali</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
      </form>
      
  <!-- Modal -->
  <div class="modal fade" id="hasilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 style="text-align:center;" class="modal-title" id="exampleModalLabel">Hasil Prediksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <h4 style="text-align:center;">Hama : {{Session::get('hama')}}</h4>
        <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Suhu Rata-Rata</th>
        <th scope="col">Curah Hujan</th>
        <th scope="col">Kelembapan Rata-Rata</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{Session::get('suhu')}}</td>
        <td>{{Session::get('curah')}}</td>
        <td>{{Session::get('kelembapan')}}</td>
      </tr>    
    </tbody>
  </table>
  <h6 style="text-align:center;">Berdasarkan Data Yang Dimasukkan Prediksi Serangan Hama Yang Akan Terjadi Adalah Seluas :</h6>
  <h3 class="bg-success font-weight-bold" style="text-align:center;">{{Session::get('hasil')}} Hektar<h3>
  <img class="center" src="{{ ('img/hama/'. Session::get('hama').'.jpg') }}"  style="width:300px;height:300px;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div
  
      
  </body>
  </html>
<?php
}else{
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
          <title>Sistem Pakar</title>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
          <link href="{{ ('css/signin.css') }}" rel="stylesheet">
         
  </head>
  <body >
  
  <form class="form-signin" action="">     
        <h2 style="color:blue" class="text-center" class="mb-3 font-weight-normal">Fitur Prediksi Harian Belum Tersedia Saat Ini</h2>
        <h3 class="text-center" class="mb-3 font-weight-normal">Mohon Maaf Atas Ketidaknyamanannya</h3>
        <h5 class="text-center" class="mb-3 font-weight-normal">Dikarenakan Keterbatasan Data,Fitur Ini Akan Terbuka Otomatis Ketika Data Sudah Terpenuhi</h5>
        
      </form>      
  </body>
  </html>

<?php

}
?>
