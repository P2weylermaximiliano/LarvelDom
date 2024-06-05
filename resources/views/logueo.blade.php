<!DOCTYPE html>
<html>
<head>
    <title>Logs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
       
        <h2>Logs</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Acción</th>
                    <th>IP</th>
                    <th>Navegador</th>
                    <th>Nombre del Usuario</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>{{ $log->accion }}</td>
                        <td>{{ $log->ip }}</td>
                        <td>{{ $log->navegador }}</td>
                        <td>{{ $log->nombre }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
   
</body>
</html>
