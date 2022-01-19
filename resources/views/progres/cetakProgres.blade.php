<!DOCTYPE html>
<html>
    <head>
        <title>Ceta Data Progres</title>
        <style>

            * {
                font-family: Arial, Helvetica, sans-serif;
            }

            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
                color: inherit;
                font-size: 1.5rem;
            }
            
            .pr-5, .px-5 {
                padding-right: 3rem !important;
            }

            table {
                border-collapse: collapse;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
                background-color: transparent;
            }

            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
                text-align: left;
                font-size: 16px;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .table tbody + tbody {
                border-top: 2px solid #dee2e6;
            }

            .table {
                border-collapse: collapse !important;
            }
            
            .table td,
            .table th {
                background-color: #ffffff !important;
            }

            .table-bordered {
                border: 1px solid #dee2e6;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #dee2e6;
            }

            .table-bordered thead th,
            .table-bordered thead td {
                border-bottom-width: 2px;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #dee2e6 !important;
            }
        </style>
    </head>

    <body>
        <center>
            <h2>DATA PROGRES</h2>
            <h3>MONITORING TINDAK LANJUT FDT RCFA</h3>
        </center>
        <br>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama FDT</th>
                    <th>Nama PIC</th>
                    <th>Progres</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($progres as $key => $data)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $data->fdt->nama_fdt }}</td>
                        <td>{{ $data->pic->nama }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>{{ $data->tanggal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>