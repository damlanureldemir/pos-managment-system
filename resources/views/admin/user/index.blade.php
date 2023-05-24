
@extends('front.master')
@section('content')

    <div class="col-lg-12 grid-margin stretch-card" xmlns="http://www.w3.org/1999/html">
        <div class="card">
            <div class="card-body">
                <li class="col-2 width-right nav-item dropdown d-none d-lg-block">

                </li><br><br>
                <h4 class="card-title">Kasiyerler</h4>
                <div class="table-responsive">
                    <table class="table table-striped">

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
                    </table>

                    <tbody>
                    @foreach($users as $key=>$user)
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
                                @if      ($user->is_admin==1)         Admin
                                @else
                                    Kasiyer
                                @endif
                            </td>


                        <tr>
                            <div class ="btn-group">
                                <a href="#"class="btn btn-info btnt-sm " data-toggle="modal"
                                   data-target="#editUser"{{$user->id}}><i class="fa fa-edit">
                                    </i>Düzenle</a>
                                <a href="#"  data-toggle="modal" data-target=#deleteUser  class="btn btn-sm btn-danger">Sil</a>
                            </div>
                        </tr>
                        </tr>

                        <div class="modal right fade" id="editUser"{{$user->id}} data-backdrop="static"
                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="staticBackdropLabel">Kasiyeri Düzenle</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label>
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{$user->id}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('users.update',$user->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">İsim</label>
                                    <input type="text" name="name" id="" value="{{$user->name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="" value="{{$user->email}}" class="form-control">
                                </div>
                                {{--<div class="form-group">
                                    <label for="">Telefon Numarası</label>
                                    <input type="text" name="phone" id=""value="{{$user->phone}}"  class="form-control">
                                </div>--}}
                                <div class="form-group">
                                    <label for="">Şifre</label>
                                    <input type="password" name="password" id=""readonly value="{{$user->password}}" class="form-control">
                                </div>
                                {{--<div class="form-group">
                                    <label for="">Şifreyi Onayla</label>
                                    <input type="password" name="password" id="" class="form-control">
                                </div>--}}
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="is_admin" id="" class="form-control">
                                        <option value="1" @if($user->is_admin==1)
                                            selected
                                            @endif>Admin</option>
                                        <option value="2" @if($user->is_admin==2)
                                            selected
                                            @endif>Kasiyer</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-warning btn-block" type="submit">Güncelle</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal right fade" id="deleteUser"{{$user->id}} data-backdrop="static"
                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="staticBackdropLabel">Kasiyeri Sil</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label>
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{$user->id}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('users.delete',$user->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <p>   Silmek istediğinize emin misiniz {{$user->name}}?</p>
                                <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-danger">Sil</button>
                                </div>
                            </form>
                        </div>


                    </tbody>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="modal right fade" id="addUser"{{$user->id}} data-backdrop="static"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Kasiyeri Düzenle</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label>
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{$user->id}}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <form action="{{route('users.store',$user->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">İsim</label>
                    <input type="text" name="name" id="" value="{{$user->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" value="{{$user->email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Telefon Numarası</label>
                    <input type="text" name="phone" id=""value="{{$user->phone}}"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Şifre</label>
                    <input type="password" name="password" id=""value="{{$user->password}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Şifreyi Onayla</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="is_admin" id="" class="form-control">
                        <option value="1" @if($user->is_admin==1)
                            selected
                            @endif>Admin</option>
                        <option value="2" @if($user->is_admin==2)
                            selected
                            @endif>Kasiyer</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning btn-block" type="submit">Güncelle</button>

                </div>
            </form>
        </div>
@endsection
