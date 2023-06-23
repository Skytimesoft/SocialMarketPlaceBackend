<div >

    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Profile Information') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xl mt-2">
    @if($alert)
        @livewire('components.alert', ['type' => $alertType, 'message' => $alertMessage])
    @endif
    </div>

    <div class="page-body">
        <div class="container-xl d-inline-flex justify-content-around flex-wrap align-content-around">
            <div class="col-lg-7 col-md-7 mb-3">
                <form wire:submit.prevent="submit" class="card" autocomplete="off">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Basic Information') }}</h3>
                        @hasrole('Admin')
                        <span class="badge badge-outline text-red mx-2">Admin</span>
                        @endhasrole
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">{{ __('Name') }}</label>
                            <input wire:model="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" required>
                            @error('name')
                            <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">{{ __('Email address') }}</label>
                            <input wire:model="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-4 col-md-4">
                <form wire:submit.prevent="submitNewPassword" class="card" autocomplete="off">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">{{ __('New password') }}</label>
                            <input wire:model="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('New password') }}">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">{{ __('New password confirmation') }}</label>
                            <input wire:model="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('New password confirmation') }}" autocomplete="new-password">
                            @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
