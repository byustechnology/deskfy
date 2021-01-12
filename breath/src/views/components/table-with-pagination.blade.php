<x-breath::table :resource="$resource" class="table-borderless table-striped table-hover">

    @if (isset($header))
        <x-slot name="header">
            {{ $header }}
        </x-slot>
    @endif

    @if (isset($body))
        <x-slot name="body">
            {{ $body }}
        </x-slot>
    @endif

    @if (isset($footer))
        <x-slot name="footer">
            {{ $footer }}
        </x-slot>
    @endif
</x-breath>

<div class="breath-pagination">
    {!! $resource->links() !!}
</div>