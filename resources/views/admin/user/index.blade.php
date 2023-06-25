@extends('front.master')
@section('content')
    <head>
        <style type="text/css">
            .table_t{
                margin:auto;
                width: 100%;
                margin-top: 20px;

            }
        </style>
    </head>
    <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <strong>Başarılı!</strong>
                    {{session()->get('message')}}
                </div>
            @endif
            <li class="col-2 width-right nav-item dropdown d-none d-lg-block">
                <a href="{{route('users.create')}}" type="button" class="nav-link btn btn-success create-new-button">+ Yeni Kasiyer Ekle</a>
            </li>
            <br>
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 grid-margin">
                                <h4 class="card-title">Kasiyer Listesi</h4>
                                <table class="table_t">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>İsim</th>
                                        <th>Email</th>
                                        <th>Telefon Numarası</th>
                                        <th>Rol</th>
                                        <th>İşlem</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($user as $key=>$user)
                                        <tr>
                                            <td>
                                                {{$key+1}}
                                            </td>

                                            <td>
                                                {{$user->name}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                                @if    ($user->is_admin==1)         Admin
                                                @else
                                                    Kasiyer
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="mdi mdi-account-edit badge badge-outline-success">
                                                </a>
                                                <a  href="" onclick="return confirm('Silmek istediğinizden emin misiniz?')" class="mdi mdi-delete badge badge-outline-danger">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

