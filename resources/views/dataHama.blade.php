
@include('admin')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Data Hama</h2>
                                <div class="table-responsive table-data table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                @foreach($columns as $column)
                                                <th>{{ ($column) }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($DataHama as $data)
                                                <tr>
                                                @foreach($columns as $column)
                                                <td>{{ $data->$column }}</td>
                                                @endforeach 
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <div class="row">
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

