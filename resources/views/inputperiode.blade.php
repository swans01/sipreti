@include('admin')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Input Data</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            @if (Session::has('hasil'))
                                            <h3 class=" bg-success text-center title-2">Data Berhasil Diinputkan</h3>
                                            @endif
                                            <h3 class="text-center title-2">Input Data Hama (Periode)</h3>
                                        </div>
                                        <form class="form-signin" action="{{ route('inputPeriode') }}" method="post">
                                        <a>Carcospora sp</a>                              
                                        <label class="sr-only">Carcospora sp</label>
                                        <input type="number" class="form-control" name="Carcospora" required autofocus>
                                        
                                        <a>Cnaphacrosis sp</a>                              
                                        <label class="sr-only">Cnaphacrosis sp</label>
                                        <input type="number" class="form-control" name="Cnaphacrosis" required autofocus>

                                        <a>Helminthosporium sp</a>                              
                                        <label class="sr-only">Helminthosporium sp</label>
                                        <input type="number" class="form-control" name="Helminthosporium" required autofocus>

                                         <a>Lalat Bibit</a>                              
                                        <label class="sr-only">Lalat Bibit</label>
                                        <input type="number" class="form-control" name="Lalat" required autofocus>
                                        
                                        <a>Nympulla sp</a>                              
                                        <label class="sr-only">Nympulla sp</label>
                                        <input type="number" class="form-control" name="Nympulla" required autofocus>
                                        
                                        <a>Penggerek Batang</a>                              
                                        <label class="sr-only">Penggerek Batang</label>
                                        <input type="number" class="form-control" name="Penggerek" required autofocus>
                                        
                                        <a>Pitopthora sp</a>                              
                                        <label class="sr-only">Pitopthora sp</label>
                                        <input type="number" class="form-control" name="Pitopthora" required autofocus>
                                        
                                        <a>Pirycularia sp</a>                              
                                        <label class="sr-only">Pirycularia sp</label>
                                        <input type="number" class="form-control" name="Pirycularia" required autofocus>
                                        
                                        <a>Plutella sp</a>                              
                                        <label class="sr-only">Plutella sp</label>
                                        <input type="number" class="form-control" name="Plutella" required autofocus>
                                        
                                        <a>Thrips sp</a>                              
                                        <label class="sr-only">Thrips sp</label>
                                        <input type="number" class="form-control" name="Thrips" required autofocus>
                                        
                                        <a>Tikus</a>                              
                                        <label class="sr-only">Tikus</label>
                                        <input type="number" class="form-control" name="Tikus" required autofocus>
                                        
                                        <a>Tungro</a>                              
                                        <label class="sr-only">Tungro</label>
                                        <input type="number" class="form-control" name="Tungro" required autofocus>
                                        
                                        <a>WBC</a>                              
                                        <label class="sr-only">WBC</label>
                                        <input type="number" class="form-control" name="WBC" required autofocus>
                                        
                                        <a>Xanthomas sp</a>                              
                                        <label class="sr-only">Xanthomas sp</label>
                                        <input type="number" class="form-control" name="Xanthomas" required autofocus>
                                        
                                        <a>Suhu Rata-Rata</a>                              
                                        <label class="sr-only">Suhu Rata-Rata</label>
                                        <input type="number" class="form-control" name="Suhu" required autofocus>
                                        
                                        <a>Curah Hujan</a>                              
                                        <label class="sr-only">Curah Hujan</label>
                                        <input type="number" class="form-control" name="Curah" required autofocus>
                                        
                                        <a>Kelembapan Rata-Rata</a>                              
                                        <label class="sr-only">Kelembapan Rata-Rata</label>
                                        <input type="number" class="form-control" name="Kelembapan" required autofocus>
                                        

                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Input</button>
                                        <p style="text-align:center;" class="mt-5 mb-3 text-muted">&copy; 2018</p>
                                        {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>© 2018</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

</body>

</html>