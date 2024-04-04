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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Factures</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Details</a></li>
                </ol>
                
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <a href="{{ route('facture.index') }}" class="btn btn-primary">Listes</a>
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
                                        <th scope="col">Nom client</th>
                                        <th scope="col">N° facture</th>
                                        <th scope="col">N° Proforma</th>
                                        <th scope="col">Objet</th>
                                        <th scope="col">Montant HT</th>
                                        <th scope="col">TVA</th>
                                        <th scope="col">Remise</th>
                                        <th scope="col">Montant net</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $facture->client->nom }}</td>
                                        <td>{{ $facture->numero }}</td>
                                        <td>{{ $facture->numero_proforma }}</td>
                                        <td>{{ $facture->objet }}</td>
                                        <td>{{ $facture->montant_HT }}</td>
                                        <td>{{ $facture->TVA }}</td>
                                        <td>{{ $facture->remise }}</td>
                                        <td>{{ $facture->montant_net }}</td>
                                        <td>{{ $facture->date }}</td>
                                    </tr>
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