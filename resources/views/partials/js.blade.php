{{--BOOTSTRAP--}}
<script src="{{asset('jquery/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('fontawesome-free/js/all.min.js')}}"></script>
<script src="{{asset('jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('sb-admin2/js/sb-admin-2.min.js')}}"></script>

{{--DATATABLES--}}
<script src="{{asset('DataTables/datatables.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.4.2/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.4.2/js/buttons.dataTables.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.4.2/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.4.2/js/buttons.dataTables.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.4.2/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.4.2/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('DataTables/Buttons-2.4.2/js/buttons.print.min.js')}}"></script>
<script src="{{asset('DataTables/DataTables-1.13.8/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('DataTables/DataTables-1.13.8/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('DataTables/DataTables-1.13.8/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('DataTables/DateTime-1.5.1/js/dataTables.dateTime.min.js')}}"></script>
<script src="{{asset('DataTables/datatables.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            paging: false,
            "scrollX": true,
            "scrollY": 300,
            "scrollCollapse": true,
            "lengthMenu": [[10, 25, 50, 75, 100], [10, 25, 50, 75, 100]], // Set the page length menu options
            "dom": '<"row"<"col-md-6"B><"col-md-6"f>>rtip',
            "buttons": [
                {
                    "extend": 'copy',
                    "text": '<i class="fa fa-copy"></i>&nbsp;&nbsp;COPY',
                    "className": 'btn bg-light text-black',
                },
                {
                    "extend": 'excel',
                    "text": '<i class="fa fa-file-excel"></i>&nbsp;&nbsp;EXCEL',
                    "className": 'btn bg-success text-white',
                },
            ],
        });
    });


</script>

{{--SWEETALERT2--}}
<script src="{{asset('sweetalert2/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('sweetalert2/sweetalert2.min.js')}}"></script>
