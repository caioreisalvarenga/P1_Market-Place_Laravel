<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <div>
        <nav class="red">
            <div class="nav-wrapper container">
              <a href="{{ route('site.index') }}" class="brand-logo center">Market Place</a>
              <ul id="nav-mobile" class="left">
                <li><a href="{{ route('site.index') }}">Home</a></li>
                <li>
                  <a class="dropdown-trigger" href="#" data-target="dropdown-categories">
                    Categorias
                    <i class="material-icons right">arrow_drop_down</i>
                  </a>
                  <ul id="dropdown-categories" class="dropdown-content">
                    @if(isset($categoriasMenu))
                        @foreach ($categoriasMenu as $categoria)
                            <li><a href="{{route('site.categoria', ['id' => $categoria->id])}}">{{$categoria->nome}}</a></li>                        
                        @endforeach
                    @endif
                  </ul>                  
                </li>                
                <li><a href="{{ route('site.carrinho') }}">Carrinho <span class="badge white">{{\Cart::getContent()->count()}}</span></a></li>
              </ul>

              @auth
              <ul id="nav-mobile" class="right">
                <li>
                  <a href="{{route('admin.dashboard')}}">
                    Olá {{ auth()->user()->firstName }}
                  </a>
                </li>
                <li>
                  <a href="{{route('login.logout')}}">
                    Sair
                  </a>
                </li>
              </ul>
              @else
              <ul id="nav-mobile" class="right">
                <li>
                  <a href="{{route('login.form')}}">
                    Login
                    <i class="material-icons right">lock</i>
                  </a>
                </li>
              </ul>
              @endauth
              
             

            </div>
          </nav>
    </div>

    @yield('conteudo')

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
       document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems, {
          coverTrigger: false,
          constrainWidth: false
        });
      });
    </script>
</body>
</html>
