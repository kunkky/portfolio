
              <h6 class="text-capitalize">
                          {{ __('Update Password') }}

            </h6>
            <em>
            {{ __('Ensure your account is using a long, random password to stay secure.') }}

            </em>
            <br>
                <!--- form--->
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="current_password" class="form-control-label" :value="__('Current Password')" />{{__('Current Password')}}</label>
                                    <input id="current_password" name="current_password" type="password" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-danger" />

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-control-label" :value="__('New Password')">{{ __('New Password')}}</label>
                                    <input id="password" name="password" type="password" class="form-control" :value="old('email', $user->email)" required autofocus autocomplete="new-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-control-label" :value="__('Confirm Password')">{{ __('Confirm Password')}}</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required autofocus autocomplete="new-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

                                </div>
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
            </div>
          </div>


