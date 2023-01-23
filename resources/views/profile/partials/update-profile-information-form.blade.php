          <div class="card z-index-2">
            <div class="card-header pb-0 pt-3 bg-transparent">

              <h6 class="text-capitalize">            {{ __('Profile Information') }}
            </h6>
            <em>{{ __("Update your account's profile information and email address.") }}</em>
            </div>
                <!--- form--->
            <div class="card-body">
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf</form>
                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-control-label" :value="__('Name')" />{{ __('Name')}}</label>
                                    <input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="text-danger" />

                                    </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-control-label" :value="__('Email')">{{ __('Email')}}</label>
                                    <input id="name" name="name" type="email" class="form-control" :value="old('email', $user->email)" required autofocus autocomplete="email" />
                                    <x-input-error :messages="$errors->get('email')" class="text-danger" />

                                    </div>
                                </div>

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="col-12 alert alert-warning  text-white w-100">
                                                        {{ __('Your email address is unverified.') }}

                            </div>
                            <div>
                                <button class="btn btn-primary">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </div>

                            @if (session('status') === 'verification-link-sent')
                                <div class="alert alert-success text-white w-100">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </div>
                            @endif
                            @endif
                        </div>

                        <div class="col-md-6">
                            <button class="btn btn-primary">
                                {{ __('Save') }}
                            </button>

                            @if (session('status') === 'profile-updated')
                                <div class="alert alert-success text-white w-100">{{ __('Saved.') }}</div>
                            @endif
                        </div>
                    </form>

