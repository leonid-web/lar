@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Поздравляем</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вы вошли как админ {{Auth::user()->name}} {{Auth::user()->name}}
                </div>

            <form  action="/admin/razdels" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>

                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
