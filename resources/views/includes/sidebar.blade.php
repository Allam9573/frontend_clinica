<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
    
<input type="checkbox" id="check">
    <label for="check">
        <i class="bi bi-list" id="btn"></i>
        <i class="bi bi-x" id="cancel"></i>
    </label>
     <div class="sidebar">
        <header>Home</header>
        <ul>
            <li><a href="{{url('/')}}"><i class="bi bi-house">Inicio</i></a></li>
            <li><a href="{{url('/doctores')}}"><i class="bi bi-hospital">Doctores</i></a></li>                
            <li><a href="{{url('/pacientes')}}"><i class="bi bi-heart-pulse">Pacientes</i></a></li>
            <li><a href="{{url('/citas')}}"><i class="bi bi-clipboard2-pulse">Citas</i></a></li>
            <li><a >Mi Perfil</a></li>
        </ul>
    </div>
</body>
</html>