<div class="breath-param">
	<span class="title">{{ $title }}</span>
	<span class="value">{{ $prepend }}{!! number_format($value, $decimal, ',', '.') ?? '<span class="text-muted">Não informado(a)</span>' !!}{{ $append }}</span>
</div>
