<div class="container my-5">
    <div class="row">
        <div class="col-lg-2">
            <small class="text-muted">
                {{ date('Y') }} - {{ config('app.name') }}, sistema simples de cobrança desenvolvido por <strong>Pedro Roccon</strong>. Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
            </small>
        </div>

        <div class="offset-lg-1 col-lg-3">
            <h4 class="h6 fw-bold">Cobranças</h4>
            <ul class="list-unstyled">
                <li><a href="{{ url(config('deskfy.path') . '/cobranca') }}">Listar todas</a></li>
                <li><a href="{{ url(config('deskfy.path') . '/cobranca/create') }}">Adicionar</a></li>
                <li><a href="{{ url(config('deskfy.path') . '/cobranca?status=abertas') }}">Em aberto</a></li>
                <li><a href="{{ url(config('deskfy.path') . '/cobranca?status=pagas') }}">Pagas</a></li>
                <li><a href="{{ url(config('deskfy.path') . '/cobranca?status=vencidas') }}">Vencidas</a></li>
                <li><a href="{{ url(config('deskfy.path') . '/cobranca?status=abertas&data=vence_em&inicio=' . today()->format('Y-m-d') . '&termino=' . today()->addDays(15)->format('Y-m-d')) }}">A vencer (15 dias)</a></li>
            </ul>
        </div>
        <div class="col-lg-3">
            <h4 class="h6 fw-bold">Entidades</h4>
            <ul class="list-unstyled">
                <li><a href="{{ url(config('deskfy.path') . '/entidade') }}">Listar todas</a></li>
                <li><a href="{{ url(config('deskfy.path') . '/entidade/create') }}">Adicionar</a></li>
            </ul>
        </div>
    </div>
</div>