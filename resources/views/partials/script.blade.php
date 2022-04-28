<!-- jQuery -->
<script src="{{ url('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Data Tables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ url('template/dist/js/adminlte.min.js') }}"></script>


<script>

    $(document).ready(function() {
        $('#tbl_harga').DataTable( {
            "columnDefs": [
                { "className": "dt-center", "targets": "_all" },
                { "width": "7%", "targets": 0 },
                { "width": "3%", "targets": 3 }
            ],
            "scrollX": true,
            title: 'Harga Material',

            dom: 'Bfrtip',
            buttons: {
                buttons: [
                    { extend: 'excel', messageTop: 'PT. Riau Samudra Mandiri', title: 'Harga Material', footer: true,  className: 'btn btn-success',
                    exportOptions: {
                        columns: [ 0, 1, 2 ]
                    }
                }
            ],
            dom: {
                button: {
                    className: 'btn'
                }
            }
            }
        } );
        $('#tbl_pekerjaan').DataTable( {
            // columnDefs: [ {
            //     targets: [ 0 ],
            //     orderData: [ 0, 1 ]
            // }, {
            //     targets: [ 1 ],
            //     orderData: [ 1, 0 ]
            // }, {
            //     targets: [ 4 ],
            //     orderData: [ 4, 0 ]
            // },  ]
        } );
        $('#tbl_monitoring').DataTable({
            // columnDefs: [ {
            //     targets: [ 0 ],
            //     orderData: [ 0, 1 ]
            // }, {
            //     targets: [ 1 ],
            //     orderData: [ 1, 0 ]
            // }, {
            //     targets: [ 2 ],
            //     orderData: [ 2, 0 ]
            // },  ]
        })

        $('#tbl_mdu_pln').DataTable( {
            // columnDefs: [ {
            //     targets: [ 0 ],
            //     orderData: [ 0, 1 ]
            // }, {
            //     orderData: [ 1, 0 ]
            // }, {
            //     targets: [ 4 ],
            //     orderData: [ 4, 0 ]
            // },  ]
        } );

        $('#tbl_non_mdu_tiang_besi').DataTable( {


        //     "footerCallback": function ( row, data, start, end, display ) {
        //     var api = this.api(), data;

        //     // converting to interger to find total
        //     var intVal = function ( i ) {
        //         return typeof i === 'string' ?
        //             i.replace(/[\$,]/g, '')*1 :
        //             typeof i === 'number' ?
        //                 i : 0;
        //     };

        //     // computing column Total of the complete result
        //     var m1Total = api
        //         .column( 1 )
        //         .data()
        //         .reduce( function (a, b) {
        //             return intVal(a) + intVal(b);
        //         }, 0 );

	    //     var m2Total = api
        //         .column( 2 )
        //         .data()
        //         .reduce( function (a, b) {
        //             return intVal(a) + intVal(b);
        //         }, 0 );

        //     var m3Total = api
        //         .column( 3 )
        //         .data()
        //         .reduce( function (a, b) {
        //             return intVal(a) + intVal(b);
        //         }, 0 );

	    //     var m4Total = api
        //         .column( 4 )
        //         .data()
        //         .reduce( function (a, b) {
        //             return intVal(a) + intVal(b);
        //         }, 0 );

	    //     var m5Total = api
        //         .column( 5 )
        //         .data()
        //         .reduce( function (a, b) {
        //             return intVal(a) + intVal(b);
        //         }, 0 );


        //     // Update footer by showing the total with the reference of the column index
	    //     $( api.column( 0 ).footer() ).html('Total');
        //     $( api.column( 1 ).footer() ).html(m1Total);
        //     $( api.column( 2 ).footer() ).html(m2Total);
        //     $( api.column( 3 ).footer() ).html(m3Total);
        //     $( api.column( 4 ).footer() ).html(m4Total);
        //     $( api.column( 5 ).footer() ).html(m5Total);

        // },

        "scrollX": true,
            title: 'Non MDU Tiang Besi',

            dom: 'Bfrtip',
            buttons: {
                buttons: [
                    { extend: 'excel', messageTop: 'PT. Riau Samudra Mandiri', title: 'Non MDU Tiang Besi', footer: true,  className: 'btn btn-success',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16 ]
                    }
                }
            ],
            dom: {
                button: {
                    className: 'btn'
                }
            }
            }
        } );

        $('#tbl_non_mdu_tiang_beton').DataTable( {
            "scrollX": true
        } );

        $('#tbl_mdu_pln_gardu').DataTable( {
        } );

        $('#tbl_non_mdu_gardu').DataTable( {
            "scrollX": true
        } );

    } );

    // buttons: {
            //     buttons: [
            //     {
            //         extend: 'excelHtml5',
            //         exportOptions: {
            //             columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16 ]
            //         }
            //     },
            //     ]
            // }

</script>


