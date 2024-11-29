@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-2/5 shadow-xl mx-auto my-auto">
        <div class="card-body">
            <div class="mb-4 text-sm base-content">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                {{-- turvalisuse jaoks laraveli kõikidel post formide puhul vaja see @ csrf panna, muidu error 419 --}}
                </label>
                <div class="flex justify-end mt-4">
                    <x-primary-button>
                        {{ __('Confirm') }}
                    </x-primary-button>
                </div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Password?</span>
                    </div>
                    <input type="password" name="password" placeholder="password"
                        class="input input-bordered w-full @error('password') input-error @enderror" />
                    <div class="label">
                        @error('password')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>
                <div class="flex justify-between">
                    <a class="link link-primary" href="{{ route('password.request') }}">Forgorrrrr?</a>
                    <input type="submit" class="btn btn-primary" value="Log In">
                </div>

            </form>
        </div>

    </div>
@endsection
