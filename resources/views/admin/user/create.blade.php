@extends('front.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                        <div class="col-4 col-sm-3 col-xl-2">
                        </div>
                        <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
                      <span>
                      </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Kasiyer  Ekle</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <form action="{{route('users.store',$user->id)}}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="">İsim</label>
                                            <input type="text" name="name" id="" value="{{$user->name}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" id="" value="{{$user->email}}"  class="form-control">
                                            <div class="form-group">
                                                <label for="">Telefon Numarası</label>
                                                <input type="text" name="phone" id="" value="{{$user->phone}}"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Şifre</label>
                                                <input type="password" name="password" id="" value="{{$user->password}}" class="form-control">
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
                                            <button type="submit" class="btn btn-primary">Kasiyeri Ekle</button>
                                        </div>
                                    </form>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
