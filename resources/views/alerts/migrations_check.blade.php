@if (!\Schema::hasTable((new \App\Models\User)->getTable()))
    <div class="alert alert-danger fade show" role="alert">
        {{ __('Você não executou as migrações e os seeders! As informações de login não estarão disponíveis!') }}
    </div>
@endif