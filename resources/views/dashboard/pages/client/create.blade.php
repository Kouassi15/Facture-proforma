@extends('dashboard.layout.app')
@section('content')

 <div class="content-body">
            <div class="container-fluid ">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Clients</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter un nouveau client</a></li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <a href="{{ route('client.create') }}" class="btn btn-primary">Ajouter un client</a>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <!--  -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ajouter un nouveau client</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('client.store')}}">
                                      @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="nom">Nom</label>
                                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Nom" value="{{ old('nom')}}">
                                            @error('nom')
                                            <span class="invalid-feedback mb-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="prenon">Prénom</label>
                                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="Prénom(s)" value="{{ old('prenom')}}">
                                                @error('prenom')
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
                                            <!-- <div class="form-group col-md-6">
                                                <label>City</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>State</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Zip</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">
                                                    Check me out
                                                </label>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

@endsection