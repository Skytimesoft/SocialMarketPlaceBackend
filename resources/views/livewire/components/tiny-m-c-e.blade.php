<div>

    <div class="flex flex-col space-y-10">
        <div wire:ignore>
            <textarea wire:model="data" class="min-h-fit h-48 " name="data" id="tinymce-data"></textarea>
        </div>
        <div class="d-flex justify-content-end mt-1">
            <button onclick="window.location.reload();" class="btn btn-primary btn-square w-20 me-1">
                <p class="small mb-0">
                    refresh
                </p>
            </button>
            <button wire:click="syncData" class="btn btn-success btn-square w-20">
                <p class="small mb-0">
                    save {{ $inputName }}
                </p>
            </button>
        </div>
    </div>

</div>

@push('scripts')
<script>
    tinymce.init({
        selector: '#tinymce-data',
        menubar: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
                @this.set('data', editor.getContent());
            });
        }
    });
</script>
@endpush
