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
                    </div>
                    <form action="{{ route('facture.search') }}" method="GET">
                    <div class="row m-5">
                     <div class="form-group col-md-4">
                     <label class="client_id">Client</label>
                     <select id="client_id"
                     class="form-control"
                      name="client_id" placeholder="Nom" value="{{ old('client_id')}}">
                     <option selected disabled value>Selectionner...</option>
                     @foreach ($clients as $client)
                       <option value="{{ $client->id }}">{{ $client->nom }}</option>
                       @endforeach
                      </select>
                     </div>
                     <div class="form-group col-md-2">
                     <label class="numero_proforma">Numero proforma</label>
                      <input type="text" class="form-control" id="numero_proforma" name="numero_proforma"
                       placeholder="Numero facture" value="{{ old('numero_proforma')}}">                   
                     </div>
                     <div class="form-group col-md-2">
                        <label for="start_date">Date de début:</label>
                        <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="end_date">Date de fin:</label>
                        <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                     <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-info mt-4">Recherche</button>
                     </div>
                    </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom client</th>
                                        <th scope="col">N° facture</th>
                                        <th scope="col">N° proforam</th>
                                        <th scope="col">Objet</th>
                                        <th scope="col">Montant HT</th>
                                        <th scope="col">TVA</th>
                                        <th scope="col">Remise</th>
                                        <th scope="col">Montant net</th>
                                        <th width="20px">Date</th>
                                        <!-- <th scope="col">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($factures as $facture )
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $facture->client->nom }}</td>
                                        <td>{{ $facture->numero }}</td>
                                        <td>{{ $facture->numero_proforma }}</td>
                                        <td >{{ $facture->objet }}</td>
                                        <td>{{ $facture->montant_HT }}</td>
                                        <td>{{ $facture->TVA }}</td>
                                        <td>{{ $facture->remise }}</td>
                                        <td>{{ $facture->montant_net }}</td>
                                        <td>{{ $facture->date }}</td>
                                        <!-- <td>
                                            <form action="{{ route('facture.delete', $facture->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span>
                                                <a href="{{ route('facture.show',$facture->id)}}" class="mr-4 btn btn-primary "
                                                        data-toggle="tooltip" data-placement="top" title="Voir"><i
                                                            class="fa fa-eye color muted"></i>Voir</a>
                                                 <a href="{{ route('facture.generate-pdf',$facture->id) }}" target="_blank" class=" mr-4 btn btn-dark m-2"
                                                 data-toggle="tooltip" data-placement="top" title="Imprimer"><i
                                                            class=""></i>Imprimer facture</a>
                                                    <a href="{{ route('facture.edit', $facture->id)}}" class="mr-4 btn btn-success  m-2"
                                                        data-toggle="tooltip" data-placement="top" title="Éditer"><i
                                                            class=" "></i>modifier</a>
                                                            <a href="{{ route('facture.generatefacture-pdf',$facture->id) }}" target="_blank" class="btn btn-info m-2" data-toggle="tooltip" data-placement="top" title="Facture définitive">Facture définitive</a>
                                                    <a href="#"
                                                        onclick="event.preventDefault(); document.getElementById('delete-facture-{{ $facture->id }}').submit();"
                                                        class="btn btn-danger m-2" data-toggle="tooltip" data-placement="top"
                                                        title="Supprimer"><i class=" "></i>Supprimer</a>
                                                </span> 
                                            </form>
                                             <form id="delete-facture-{{ $facture->id }}"
                                                action="{{ route('facture.delete', $facture->id)}}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form> 
                                        </td> -->
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