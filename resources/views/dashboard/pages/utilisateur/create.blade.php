@extends('dashboard.layout.app')
@section('content')

 <div class="content-body">
            <div class="container-fluid ">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Clients</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter un nouveau utilisateur</a></li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Ajouter un utilisateur</a>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <!--  -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ajouter un nouveau utilisateur</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('users.store')}}">
                                      @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="name">Nom</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nom" value="{{ old('name')}}">
                                            @error('name')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="prenon">Prénom</label>
                                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="Prénom(s)" value="{{ old('prenom')}}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="email">Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email')}}">
                                                @error('email')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="password">Mot de passe</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" value="{{ old('password')}}">
                                                @error('password')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="contact">Contact</label>
                                                <input type="number" class="form-control @error('contact') is-invalid @enderror" name="contact" placeholder="Contact" value="{{ old('contact')}}">
                                                @error('contact')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                            
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

@endsection