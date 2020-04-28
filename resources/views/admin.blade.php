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


            <form  action="/admin/razdels" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>

                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
                <br><br>

                <table class="table table-striped task-table">
                    <tbody>

                    <?php
                    $razdels = DB::table('razdels')->get();?>
                    @foreach ($razdels as $razdel)

                        <tr>

                        <td>{{ $razdel ->title}}</td>
                            <td>
                                <form action="{{url('admin/razdels/'.$razdel->id)}}" method="GET">
                                    @csrf

                                    <button class="btn btn-outline-primary" title="РЕДАКТИРОВАТЬ">РЕДАКТИРОВАТЬ</button>
                                </form>
                            </td>
                            <td>
                                <form action="admin/razdels/{{ $razdel->id }}" method="POST" >
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-outline-danger" title="УДАЛИТЬ">УДАЛИТЬ</button>

                                </form>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

                    <br><br>
                        <input class="form-control" type="text" placeholder="Название" id="search-text" onkeyup="tableSearch()">
                    <table class="table table-striped" id="info-table">
                        <thead>
                        <tr>
                            <td>Название</td>
                            <td>Дата</td>
                        </tr>




                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td class="table-text">
                                    {{$event->name}}
                                </td>
                                <td class="table-text">
                                    {{$event->date}}
                                </td>
                                <td>
                                    <form action="{{url('/admin/events/'.$event->id)}}" method="GET">
                                        @csrf
                                        <button class="btn">Выбрать</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function tableSearch() {
        var phrase = document.getElementById('search-text');
        var table = document.getElementById('info-table');
        var regPhrase = new RegExp(phrase.value, 'i');
        var flag = false;
        for (var i = 1; i < table.rows.length; i++) {
            flag = false;
            for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
                flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
                if (flag) break;
            }
            if (flag) {
                table.rows[i].style.display = "";
            } else {
                table.rows[i].style.display = "none";
            }

        }
    }
</script>

@endsection

