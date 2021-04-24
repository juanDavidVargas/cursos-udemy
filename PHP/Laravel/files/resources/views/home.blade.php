@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subir archivos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('user.files.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="files[]" multiple class="form-control" required>

                        <button class="btn btn-primary float-right mt-4" type="submit">Subir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
