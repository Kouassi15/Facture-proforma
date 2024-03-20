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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Factures</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Listes</a></li>
                </ol>
                
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ route('facture.create') }}" class="btn btn-primary">Ajouter une facture</a>
            </div>
        </div>
        <!-- row -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste des factures</h4>
                        <!-- <a href="{{ route('client.create') }}" class="btn btn-success">Ajouter</a> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom client</th>
                                        <th scope="col">Numero</th>
                                        <th scope="col">Objet</th>
                                        <!-- <th scope="col">Ligne</th>
                                        <th scope="col">Lieu</th> -->
                                        <th scope="col">Montant HT</th>
                                        <th scope="col">TVA</th>
                                        <th scope="col">Remise</th>
                                        <th scope="col">Montant net</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($factures as $facture )
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $facture->client->nom }}</td>
                                        <td>{{ $facture->numero }}</td>
                                        <td>{{ $facture->objet }}</td>
                                        <!-- <td>{{ $facture->ligne }}</td>
                                        <td>{{ $facture->lieu }}</td> -->
                                        <td>{{ $facture->montant_HT }}</td>
                                        <td>{{ $facture->TVA }}</td>
                                        <td>{{ $facture->remise }}</td>
                                        <td>{{ $facture->montant_net }}</td>
                                        <td>{{ $facture->date }}</td>
                                        <td>
                                            <form action="{{ route('facture.delete', $facture->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span>
                                                    <a href="{{ route('facture.generate-pdf',$facture->id)}}" class="mr-4"
                                                        data-toggle="tooltip" data-placement="top" title="Voir"><i
                                                            class="fa fa-eye color-muted"></i></a>
                                                    <a href="{{ route('facture.edit', $facture->id)}}" class="mr-4"
                                                        data-toggle="tooltip" data-placement="top" title="Éditer"><i
                                                            class="fa fa-pencil color-muted"></i></a>
                                                    <a href="#"
                                                        onclick="event.preventDefault(); document.getElementById('delete-facture-{{ $facture->id }}').submit();"
                                                        class="btn-delete" data-toggle="tooltip" data-placement="top"
                                                        title="Supprimer"><i class="fa fa-close color-danger"></i></a>
                                                </span>
                                            </form>
                                            <form id="delete-facture-{{ $facture->id }}"
                                                action="{{ route('facture.delete', $facture->id)}}" method="POST"
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