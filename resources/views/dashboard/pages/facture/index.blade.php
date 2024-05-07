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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm">
                                <thead class="box">
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th width="130px">Nom client</th>
                                        <th width="120px">N° facture</th>
                                        <th width="130px">N° proforma</th>
                                        <th scope="col">Objet</th>
                                        <th width="130px">Montant HT</th>
                                        <th scope="col">TVA</th>
                                        <th scope="col">Remise</th>
                                        <th width="130px">Montant net</th>
                                        <th width="110px">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($factures as $facture )
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $facture->client->nom ?? null }}</td>
                                        <td>{{ $facture->numero }}</td>
                                        <td>{{ $facture->numero_proforma }}</td>
                                        <td>{{ $facture->objet }}</td>
                                        <td>{{ $facture->montant_HT }}</td>
                                        <td>{{ $facture->TVA }}</td>
                                        <td>{{ $facture->remise }}</td>
                                        <td>{{ $facture->montant_net }}</td>
                                        <td>{{ $facture->date }}</td>
                                        <td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <form action="{{ route('facture.delete', $facture->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span style="display:flex">
                                                <a href="{{ route('facture.show',$facture->id)}}" class="mr-4 btn btn-primary m-2"
                                                        data-toggle="tooltip" data-placement="top" title="Voir"><i
                                                            class="fa fa-eye color-muted"></i></a>
                                                <a href="{{ route('facture.generate-pdf',$facture->id) }}" target="_blank" class=" mr-4 btn btn-dark m-2"
                                                 data-toggle="tooltip" data-placement="top" title="Imprimer"><i
                                                            class="fa fa-print color-muted"></i></a>
                                                    <a href="{{ route('facture.edit', $facture->id)}}" class="mr-4 btn btn-success m-2 "
                                                        data-toggle="tooltip" data-placement="top" title="Modifier"><i
                                                            class="fa fa-pencil color-muted "></i></a>
                                                            <!-- <a href="{{ route('facture.generatefacture-pdf',$facture->id) }}" target="_blank" class="btn btn-info m-2" data-toggle="tooltip" data-placement="top" title="Facture définitive">Facture définitive</a> -->
                                                    <a href="#"
                                                        onclick="event.preventDefault(); document.getElementById('delete-facture-{{ $facture->id }}').submit();"
                                                        class="btn btn-danger m-2" data-toggle="tooltip" data-placement="top"
                                                        title="Supprimer"><i class="fa fa-close color-muted "></i></a>
                                                </span>
                                            </form>
                                            <form id="delete-facture-{{ $facture->id }}"
                                                action="{{ route('facture.delete', $facture->id)}}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
											</div>
										</div>
									</td>
                                        <!-- <td>
                                            <form action="{{ route('facture.delete', $facture->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span style="display:flex">
                                                <a href="{{ route('facture.show',$facture->id)}}" class="mr-4 btn btn-primary m-2"
                                                        data-toggle="tooltip" data-placement="top" title="Voir"><i
                                                            class=" "></i>Voir</a>
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