<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <!-- Sidebar -->
     <div class="sidebar">
        <h2 class="text-white">Home</h2>
        <a th:href="@{/app}">Inicio</a>
        <a th:href="@{/app/doctores}">Doctores</a>
        <a th:href="@{/app/pacientes}">Pacientes</a>
        <a th:href="@{/app/citas}">Citas</a>
        <a th:href="@{/app/account/auth/profile}">Mi Perfil</a>
    </div>
</body>
</html>