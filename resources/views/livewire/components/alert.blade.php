<div>
    @if ($type == 'success')
    <div class="alert alert-success alert-dismissible">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
            </div>
            <div>
                {{ $message }}
            </div>
          </div>
        <a wire:click="$set('closed', true)" class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
    @endif

    @if($type == 'danger')
    <div class="alert alert-danger" role="alert">
        This is a danger alert — <a href="#" class="alert-link">check it out</a>!
      </div>
    @endif
</div>
