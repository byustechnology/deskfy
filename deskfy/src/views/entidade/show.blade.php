@section('title', $entidade->titulo . ' - Entidades')
<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-entidade-show', $entidade)">
        {{ $entidade->titulo }}

        <x-slot name="actions">
            <a href="{{ url($entidade->path() . '/edit') }}" class="btn btn-primary btn-lg">Editar</a>
        </x-slot>
    </x-breath>

    <x-breath::card title="Informações da entidade">

        <div class="row">
            <div class="col-lg-9"><x-breath::attribute title="Título" :value="$entidade->titulo"/></div>
            <div class="col-lg-3"><x-breath::attribute title="Código" :value="$entidade->codigo"/></div>
        </div>
        
        <div class="row">
            <div class="col-lg-2"><x-breath::attribute title="CEP" :value="$entidade->cep"/></div>
            <div class="col-lg-5"><x-breath::attribute title="Endereço" :value="$entidade->endereco"/></div>
            <div class="col-lg-2"><x-breath::attribute title="Número" :value="$entidade->numero"/></div>
            <div class="col-lg-3"><x-breath::attribute title="Bairro" :value="$entidade->bairro"/></div>
        </div>

        <div class="row">
            <div class="col-lg-4"><x-breath::attribute title="Cidade" :value="$entidade->cidade"/></div>
            <div class="col-lg-2"><x-breath::attribute title="Estado" :value="$entidade->estado"/></div>
            <div class="col-lg"><x-breath::attribute title="Complemento" :value="$entidade->complemento"/></div>
        </div>
        <div class="row">
            <div class="col-lg-2"><x-breath::attribute title="Tipo" :value="Deskfy\Models\Entidade::TIPOS[$entidade->tipo]"/></div>
            <div class="col-lg-4"><x-breath::attribute title="Responsável" :value="$entidade->responsavel"/></div>
        </div>
    </x-breath>

    <x-breath::card title="Informações adicionais">
        <x-breath::attribute title="Observações" :value="$entidade->observacao"/>
    </x-breath>

    <div class="row">
        <div class="col-lg-4">
            <x-breath::card title="Telefone">
                <x-slot name="actions">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#m-telefone" class="btn btn-primary btn-sm">Adicionar telefone</a>
                </x-slot>

                <x-breath::table :resource="$entidade->telefones" class="table-borderless table-striped">
                    <x-slot name="header">
                        <tr>
                            <th>Telefone</th>
                            <th class="text-center"><i class="fas fa-bars fa-fw fa-sm"></i></th>
                        </tr>
                    </x-slot>

                    <x-slot name="body">
                        @foreach($entidade->telefones as $telefone)
                            <tr>
                                <td>
                                    <strong>{{ $telefone->valor }}</strong><br>
                                    <small class="text-muted">{{ $telefone->observacao }}</small>
                                </td>
                                <x-breath::table-action>
                                    {!! Form::open(['url' => $telefone->path(), 'method' => 'delete']) !!}
                                        <button type="submit" class="btn btn-link btn-sm text-danger"><i class="far fa-trash-alt fa-fw"></i></button>
                                    {!! Form::close() !!}
                                </x-breath>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-breath>
            </x-breath>
        </div>
        <div class="col-lg-4">
            <x-breath::card title="E-mail">
                <x-slot name="actions">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#m-email" class="btn btn-primary btn-sm">Adicionar e-mail</a>
                </x-slot>

                <x-breath::table :resource="$entidade->emails" class="table-borderless table-striped">
                    <x-slot name="header">
                        <tr>
                            <th>E-mail</th>
                            <th class="text-center"><i class="fas fa-bars fa-fw fa-sm"></i></th>
                        </tr>
                    </x-slot>

                    <x-slot name="body">
                        @foreach($entidade->emails as $email)
                            <tr>
                                <td>
                                    <a href="mailto:{{ $email->valor }}"><strong>{{ $email->valor }}</strong></a><br>
                                    <small class="text-muted">{{ $email->observacao }}</small>
                                </td>
                                <x-breath::table-action>
                                    {!! Form::open(['url' => $email->path(), 'method' => 'delete']) !!}
                                        <button type="submit" class="btn btn-link btn-sm text-danger"><i class="far fa-trash-alt fa-fw"></i></button>
                                    {!! Form::close() !!}
                                </x-breath>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-breath>
            </x-breath>
        </div>
    </div>
</x-breath>

@include('deskfy::entidade.partials.email.create')
@include('deskfy::entidade.partials.telefone.create')