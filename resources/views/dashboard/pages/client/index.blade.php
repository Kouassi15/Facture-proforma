@extends('dashboard.layout.app')
@section('content')
<style>
    td{
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
            <a href="{{ route('client.create') }}" class="btn btn-primary">Ajouter un client</a>
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
                                        <th scope="col">Contacts</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $client->nom }}</td>
                                        <td>{{ $client->prenom }}</td>
                                        <td>{{ $client->contact }}</td>
                                        <td>
                                            <form action="{{ route('client.delete', $client->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span>
                                                    <a href="{{ route('client.show', $client->id) }}" class="mr-4"
                                                        data-toggle="tooltip" data-placement="top" title="Voir"><i
                                                            class="fa fa-eye color-muted"></i></a>
                                                    <a href="{{ route('client.edit', $client->id) }}" class="mr-4"
                                                        data-toggle="tooltip" data-placement="top" title="Éditer"><i
                                                            class="fa fa-pencil color-muted"></i></a>
                                                    <a href="#"
                                                        onclick="event.preventDefault(); document.getElementById('delete-client-{{ $client->id }}').submit();"
                                                        class="btn-delete" data-toggle="tooltip" data-placement="top"
                                                        title="Supprimer"><i class="fa fa-close color-danger"></i></a>
                                                </span>
                                            </form>
                                            <form id="delete-client-{{ $client->id }}"
                                                action="{{ route('client.delete', $client->id) }}" method="POST"
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