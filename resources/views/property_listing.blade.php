<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Property Details List View</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
        
    </head>
    <body>
        
        <div class="container">
            <h2>Property Details List View</h2>
            <table class="table table-striped table-bordered" style="width:100%" id="list_view">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>House ID</th>
                        <th>Property Address</th>
                        <th>Task ID</th>
                        <th>Task Title</th>
                        <th>Updated Timestamp</th>
                    </tr>
                </thead>
                <tbody class="result">

                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function() {

                function getdata(){
                    $.get( "/api/getProperty", function( data ) {
                        var htmlrows = '';
                        $.each(data, function( index, value ) {
                            htmlrows = htmlrows + '<tr><td>'+index+'</td>'+
                                    '<td>'+value.house_id+'</td>'+
                                    '<td>'+ value.street+','+ value.city+','+ value.state+','+ value.country+','+ value.zip+'</td>'+
                                    '<td>'+value.id+'</td>'+
                                    '<td>'+value.title+'</td>'+
                                    '<td>'+value.updated_at+'</td> </tr>';
                        });
                        $( ".result" ).html( htmlrows );

                        var table = $('#list_view').DataTable( {
                            "lengthChange": false,
                            "pageLength": 5,
                            "responsive": true
                        });
                        alert( "Load was performed." );
                    });
                }
                getdata();
            } );
        </script>
    </body>
</html>
