@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Поздравляем</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Название</td>
                                    <td>Дата</td>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->date}}</td>
                                <td><form action="{{ $data->id }}/update" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <select> <?php
                                            $users = DB::table('users')->get();
                                            foreach ($users as $user) {
                                            ?>
                                            <option value="<?php $user->id ?>" name="manager" id="manager">
                                            <?php
                                            echo $user ->name;
                                                }
                                            ?></select>
                                        <button class="btn btn-primary">Изменить</button>
                                    </form></td>
                            </tr>



                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
