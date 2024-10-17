@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-2/5 shadow-xl mx-auto">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                {{-- turvalisuse jaoks laraveli kõikidel post formide puhul vaja see @ csrf panna, muidu error 419 --}}
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Name?</span>
                    </div>
                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"
                        class="input input-bordered w-full @error('password') input-error @enderror" />
                    <div class="label">
                        @error('name')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Email?</span>
                    </div>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                        class="input input-bordered w-full @error('password') input-error @enderror" />
                    <div class="label">
                        @error('email')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>
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
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Password? Confirm</span>
                    </div>
                    <input type="password" name="password-confirmation" placeholder="password confirm"
                        class="input input-bordered w-full @error('password') input-error @enderror" />
                    <div class="label">
                        @error('password-confirmation')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                        {{-- <span class="label-text-alt">Bottom Left label</span> --}}
                    </div>
                </label>
                <div class="flex justify-between">
                    <a class="link link-primary" href="{{ route('login') }}">Already have an account?</a>
                    <input type="submit" class="btn btn-primary" value="Register">
                </div>

            </form>
        </div>

    </div>
@endsection
