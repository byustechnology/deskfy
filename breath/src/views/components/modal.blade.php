<div class="modal fade" id="{{ $id }}" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      {{ $slot }}

    </div>
  </div>
</div>