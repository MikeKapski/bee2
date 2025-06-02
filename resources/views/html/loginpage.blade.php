@inject('Detect', 'App\Http\Controllers\DetectController')

@extends('layouts.login')

@section('content')


    <div class="flex-container-center mainpage_login">
        <div class="LoginPage">
            <h1>Авторизация</h1>
            <div class="LoginPageWrap">
                <div class="LoginPageGroup">
                    <label for="email">Email</label>
                    <input type="email" id="StandMail" name="email" required autofocus>
                </div>

                <div class="LoginPageGroup">
                    <label for="password">Пароль</label>
                    <input type="password" id="StandPwd" name="password" required>
                </div>

                <div class="LoginPageGroup mt-3">
                    <button id="MakeAuth" style="w-100">Войти</button>
                </div>
            </div>
        </div>
    </div>


@stop