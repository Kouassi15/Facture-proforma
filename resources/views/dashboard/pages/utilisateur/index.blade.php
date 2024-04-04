@extends('dashboard.layout.app')
@section('content')
<style>
    tr{
        color: black !important;
    }
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Clients</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Listes</a></li>
                </ol>
                
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Ajouter un utilisateur</a>
            </div>
        </div>
        <!-- row -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste des clients</h4>
                        <!-- <a href="{{ route('client.create') }}" class="btn btn-success">Ajouter</a> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Noms</th>
                                        <th scope="col">Prénoms</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contacts</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($secretaires as $secretaire)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $secretaire->firstname }}</td>
                                        <td>{{ $secretaire->lastname }}</td>
                                        <td>{{ $secretaire->user->email }}</td>
                                        <td>{{ $secretaire->contact  }}</td>
                                        <td>
                                            <form action="{{ route('users.delete', $secretaire->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span style="color:black">
                                                    <a href="{{ route('users.show', $secretaire->id) }}" class="mr-4 btn btn-primary"
                                                        data-toggle="tooltip" data-placement="top" title="Voir"><i
                                                            class="fa fa-eye color-muted"></i>Voir</a>
                                                    <a href="{{ route('users.edit', $secretaire->id) }}" class="mr-4 btn btn-success"
                                                        data-toggle="tooltip" data-placement="top" title="Éditer"><i
                                                            class="fa fa-pencil color-muted"></i>Modifier</a>
                                                    <a href="#"
                                                        onclick="event.preventDefault(); document.getElementById('delete-users-{{ $secretaire->id }}').submit();"
                                                        class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                                        title="Supprimer"><i class="fa fa-close color-danger"></i>Supprimer</a>
                                                </span>
                                            </form>
                                            <form id="delete-users-{{ $secretaire->id }}"
                                                action="{{ route('users.delete', $secretaire->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
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
    </div>
</div>
@endsection