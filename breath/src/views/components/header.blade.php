<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url(config('deskfy.path')) }}">{{ config('app.name') }}</a>
    <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTop">
      <i class="fas fa-bars fa-fw"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarTop">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="{{ route('deskfy') }}">Dashboard</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" data-bs-toggle="dropdown">Entidades</a>
          <ul class="dropdown-menu shadow">

            {!! Form::open(['url' => config('deskfy.path') . '/entidade', 'method' => 'get', 'class' => 'px-2']) !!}
              {!! Form::text('keyword', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Buscar...', 'autocomplete' => 'off']) !!}
              {!! Form::hidden('campo', 'auto') !!}
            {!! Form::close() !!}
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ url(config('deskfy.path') . '/entidade/create') }}">Cadastrar</a></li>
            <li><a class="dropdown-item" href="{{ url(config('deskfy.path') . '/entidade') }}">Listar entidades</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" data-bs-toggle="dropdown">Cobranças</a>
          <ul class="dropdown-menu shadow">

            {!! Form::open(['url' => config('deskfy.path') . '/cobranca', 'method' => 'get', 'class' => 'px-2']) !!}
              {!! Form::text('keyword', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Buscar...', 'autocomplete' => 'off']) !!}
              {!! Form::hidden('campo', 'auto') !!}
            {!! Form::close() !!}
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ url(config('deskfy.path') . '/cobranca/create') }}">Cadastrar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ url(config('deskfy.path') . '/cobranca?status=abertas') }}">Em aberto</a></li>
            <li><a class="dropdown-item" href="{{ url(config('deskfy.path') . '/cobranca?status=pagas') }}">Pagas</a></li>
            <li><a class="dropdown-item" href="{{ url(config('deskfy.path') . '/cobranca?status=vencidas') }}">Vencidas</a></li>
            <li><a class="dropdown-item" href="{{ url(config('deskfy.path') . '/cobranca?status=abertas&data=vence_em&inicio=' . today()->format('Y-m-d') . '&termino=' . today()->addDays(15)->format('Y-m-d')) }}">A vencer (15 dias)</a></li>
            <li><a class="dropdown-item" href="{{ url(config('deskfy.path') . '/cobranca') }}">Listar todas</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ url(config('deskfy.path') . '/empresa') }}">Empresa</a></li>
      </ul>
    </div>
  </div>
</nav>