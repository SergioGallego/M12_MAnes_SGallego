<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <img src='https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/cropped-logo_calafell_favorit_icon_2.png' width="10%">
      <a class="navbar-brand ml-5" href="{{route('menu')}}">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('alumnoIndex')}}">Alumnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('userIndex')}}">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('cicloIndex')}}">Ciclos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('moduloIndex')}}">Modulos</a>
          </li>
        </ul>
         <ul class="navbar-nav" style="display: block; margin-left: auto;">
            <div class="dropdown">

              <button class="btn dropdown-toggle" style="background-color: transparent; color: white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}}
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li class="nav-item">
                        <a class="btn" style="background-color: transparent" href="{{route('showUser', Auth::user()->id)}}">Editar usuario</a>
                <li class="nav-item">
                  <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                      {{ csrf_field() }}
                      <button type="submit" class="btn" style="display:inline;cursor:pointer;background-color: transparent">
                          Cerrar sesión
                      </button>
                  </form>
                </li>
              </div>
            </div>
        </ul>
      </div>
    </div>
  </nav>
