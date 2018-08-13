@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Room Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/rooms') }}" aria-label="{{ __('Room Form') }}">
                        @csrf

                        <!-- mengambil kandungan rooms/form.blade.php
                         dan memasukkannya disini -->
                        @include('rooms.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
    <script>
        //script 1
    </script> 
@endpush

@push('scripts')
    <script>
        //script 2
    </script> 
@endpush
