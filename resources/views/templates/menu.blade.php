<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="acceso" >Acceso</a>
        </li>
  
          <li class="nav-item">
          <a class="nav-link"  href="entrada" data-toggle="" data-target="">Entrada</a>
        </li>

        <li class="nav-item">
          <a class="nav-link"  href="salida" data-toggle="" data-target="">Salida</a>
        </li>

          <li class="nav-item">
          <a class="nav-link"  href="entrcom" data-toggle="" data-target="">Comandantes</a>
        </li>

          <li class="nav-item">
          <a class="nav-link"  href="observaciones" data-toggle="" data-target="">Observaciones</a>
        </li>

        <li class="nav-item">
          <a class="nav-link"  href="consulta" data-toggle="" data-target="">Consulta</a>
        </li>

        <li class="nav-item">
          <a class="nav-link"  href="visitantes" data-toggle="" data-target="">Visitantes</a>
        </li>

        <li class="nav-item">
          <a class="nav-link"  href="proveedores" data-toggle="" data-target="">Proveedores</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link"  href="vehiculos" data-toggle="" data-target="">Consulta Vehiculos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link"  href="Empleados" data-toggle="" data-target="">Consulta Empleados</a>
        </li>
        
          
        </li>
      </ul>
    </div>
  </div>
  <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
</nav>
</nav>


<!-------------------------------------------------- Modal Registro --------------------------------------->
