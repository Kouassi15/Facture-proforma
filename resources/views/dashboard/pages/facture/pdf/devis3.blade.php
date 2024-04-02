<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FACTURE</title>
</head>

@if($facture->client->nom == "Ministere de l'environnement")
<body class="bg-image">
    <div>
        <div class="header__section">
            <div style="text-align: center; color:rgba(1, 57, 136, 0.811); font-weight: bold;">
                <h1>{{$facture->editeur->libelle}}</h1>
                <h5 style="color: rgba( 0, 0, 0, 1 ); font-weight: bold; margin-top: -5px; text-align: center">Siège: II Plateaux Tél:00225 22415280/ Cél:00225 07522642 / Email:gumalogistique@gmail.com<br/> FOURNITURES DE BUREAUX-MATERIEL ET INFORMATUQUE - ENTRETIEN ET REPARATION VEHICULES - TRAVAUX DE BATIMENT & DIVERS - MATERIEL AGRICOLE & ENGIENS - REPROFILAGE DES ROUTES - ETUDES ET FORMATION</h5> 
            </div>
            <hr>

            <div>
                <div>
                    <h2 style="color: rgb(40, 51, 201)">FACTURE PROFORMA : {{ $facture->numero }}</h2>
                    <div class="section-content">
                <div style="float: right;margin-top : -50px;">
                    <p>Abidjan. Le {{ date('d/m/Y') }}. </p>
				 </div>
			  </div>
				  <h5>Client: {{ $facture->client->nom }}</h5>
                    @if ($facture->client_id != null) 
                    <h5 style="margin-top: -15px">Contact : {{ $facture->client->contact }}</h5>
                    @endif
				    <p>Objet : {{ $facture->objet }}</p>
				  <p>Immatriculation : {{ $facture->immatriculation }}</p>
                    <p>Marque : {{ $facture->marque }}</p>
                </div>
			   
                <div >
                    <p style="float: right;margin-top: -15px">Date : {{ $facture->date }}</p>
                </div>
            </div>
            <!-- <h3 style="text-align: center; color:rgba(3, 9, 16, 0.811); font-weight: bold; text-decoration: underline;">{{ $facture->ligne }}</h3> -->
        </div>

        <div style="margin-top: 30px;">
            <table class="table table-striped table-hover" style="border: none">
                <thead style="border-radius: 30px">
                    <tr style="background-color: rgb(45, 143, 219); color: white">
                        <th>Designations</th>
                        <th>Quantitée(e)</th>
                        <th>Prix unitaire</th>
                         <th>Montant total</th>
                        <th>TOTAL (FCFA)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facture->devis as $item) 
                        
                            <tr>
                                <td style="color: rgb(124, 1, 34); margin-bottom: 10px;" colspan="4">{{ $item->titre }}</td>
                                <td style="color: rgb(124, 1, 34); vertical-align: middle;">{{ number_format($item->montant_total, 0, ',', ' ') }}</td>
                            </tr>
                        @foreach ($item->factureitem as $key => $element) 
                            <tr style="margin-top: 30px">
                                <td>{{ $element->designation }} </td>
                                <td>{{ $element->quantite }}</td>
                                <td>{{ number_format($element->prix_unit, 0, ',', ' ') }}</td>
                                <td>{{ number_format($element->montant_total, 0, ',', ' ') }}</td>
                                <td>{{ $element->unit }}</td>
                            </tr>
                            
                        @endforeach
                        <br/>
                    @endforeach
                    <br/>
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="4">MONTANT HT</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->montant_HT, 0, ',', ' ') }}</td>
                    </tr>
                   
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="4">REMISE</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->remise, 0, ',', ' ') }}</td>
                    </tr>
                   
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="4">TVA 18%</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->TVA, 0, ',', ' ') }}</td>
                    </tr>
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="4">MONTANT NET à Payer TTC</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->montant_net, 0, ',', ' ') }}</td>
                    </tr>
                </tbody>
            </table>
            <br /><br />
            <div class="section-content">
                <div style="float: right;margin-right : 50px;">
				  <p style=" margin-bottom: 10px; "><u>Cachet/Signature</u>. </p>
                </div>
                <br />
			  
            </div>
        </div>
        
    </div>
  <br/><br/>
       
    <div class="footer">
        <hr />
        DOMICILIATION BANCAIRE : BIAO-CI-N° DE COMPTE0223 50252530 / TRESOR N° de compte : A 6500 01001 10267530008 / BNI AGENCE 2 PLATEAUX N° compte:003205010056 <br/>
        <!-- <span>Location et vente de véhicules / Rénovation bâtiment / Gestion immobilière / Décoration intérieure / Assurances </span> <br/> -->
        <span>Siège : II Plateaux- Tél.+225 22415280-Cél+225 07522642 / 07-07-92-31-92 /01 BP2568 Abidjan / E-mail : <a href="mailto:guma1@aviso.ci">guma1@aviso.ci</a></span>
    </div>
</body>
@endif

@if($facture->client->nom == 'Particulier')
<body class="bg-image">
    <div>
        <div class="header__section">
            <div style="text-align: center; color:rgba(1, 57, 136, 0.811); font-weight: bold;">
                <h1>{{$facture->editeur->libelle}}</h1>
                <h5 style="color: rgba(0, 0, 0, 1); font-weight: bold; margin-top: -5px; text-align: center">Siège: II Plateaux Tél:00225 22415280/ Cél:00225 07522642 / Email:gumalogistique@gmail.com<br/> FOURNITURES DE BUREAUX-MATERIEL ET INFORMATUQUE - ENTRETIEN ET REPARATION VEHICULES - TRAVAUX DE BATIMENT & DIVERS - MATERIEL AGRICOLE & ENGIENS - REPROFILAGE DES ROUTES - ETUDES ET FORMATION</h5> 
            </div>
            <hr>
            <div>
			  <h3 style="text-align: center; color:rgba(3, 9, 16, 0.811); font-weight: bold; text-decoration: underline;">N° Proforma : {{ $facture->numero_proforma }}</h3> 
                <div>
                    <h5>Client: {{ $facture->client->nom }}</h5>
                    @if ($facture->client_id != null) 
                    <h5 style="margin-top: -15px">Contact : {{ $facture->client->contact }}</h5>
                    @endif
				    <p>Objet : {{ $facture->objet }}</p>
				  <p>Immatriculation : {{ $facture->immatriculation }}</p>
                    <p>Marque : {{ $facture->marque }}</p>
                </div>
                <div style="float: right;  margin-top: -50px">
                    <p style="margin-top: -50px">Date : {{ $facture->date }}</p>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px;">
            <table class="table table-striped table-hover" style="border: none">
                <thead style="border-radius: 30px">
                    <tr style="background-color: rgb(45, 143, 219); color: white">
                        <th>Designations</th>
                        <th>Quantitée(e)</th>
                        <th>Prix unitaire</th>
                         <th>Montant total</th>
                        <th>TOTAL (FCFA)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facture->devis as $item) 
                        
                            <tr>
                                <td style="color: rgb(124, 1, 34); margin-bottom: 10px;" colspan="4">{{ $item->titre }}</td>
                                <td style="color: rgb(124, 1, 34); vertical-align: middle;">{{ number_format($item->montant_total, 0, ',', ' ') }}</td>
                            </tr>
                        @foreach ($item->factureitem as $key => $element) 
                            <tr style="margin-top: 30px">
                                <td>{{ $element->designation }} </td>
                                <td>{{ $element->quantite }}</td>
                                <td>{{ number_format($element->prix_unit, 0, ',', ' ') }}</td>
                                <td>{{ number_format($element->montant_total, 0, ',', ' ') }}</td>
                                <td>{{ $element->unit }}</td>
                            </tr>
                            
                        @endforeach
                        <br/>
                    @endforeach
                    <br/>
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="4">MONTANT HT</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->montant_HT, 0, ',', ' ') }}</td>
                    </tr>
                    
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="4">REMISE</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->remise, 0, ',', ' ') }}</td>
                    </tr>
                   
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="4">TVA 18%</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->TVA, 0, ',', ' ') }}</td>
                    </tr>
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="4">MONTANT NET à Payer TTC</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->montant_net, 0, ',', ' ') }}</td>
                    </tr>
                </tbody>
            </table>
            <br /><br />
            <div class="section-content">
                <div style="float: right;margin-right : 50px;">
                    <p><u>La Comptabilité</u></p>
                    <p>Fait le {{ date('d/m/Y') }}. </p>
                </div>
                <br />
            </div>
        </div>
        
    </div>
       
    <div class="footer">
        <hr />
        DOMICILIATION BANCAIRE : BIAO-CI-N° DE COMPTE0223 50252530 / TRESOR N° de compte : A 6500 01001 10267530008 / BNI AGENCE 2 PLATEAUX N° compte:003205010056 <br/>
        <!-- <span>Location et vente de véhicules / Rénovation bâtiment / Gestion immobilière / Décoration intérieure / Assurances </span> <br/> -->
        <span>Siège : II Plateaux- Tél.+225 22415280-Cél+225 07522642 / 07-07-92-31-92 /01 BP2568 Abidjan / E-mail : <a href="mailto:guma1@aviso.ci">guma1@aviso.ci</a></span>
    </div>
</body>
@endif

@if($facture->client->nom == "Presidence de republique de cote d'ivoire")
<body class="bg-image">
    <div>
        <div class="header__section">
            <div style="text-align: center; color:rgba(1, 57, 136, 0.811); font-weight: bold;">
                <h1>{{$facture->editeur->libelle}}</h1>
                <h5 style="color: rgba(0, 0, 0, 1); font-weight: bold; margin-top: -5px; text-align: center">Siège: II Plateaux Tél:00225 22415280/ Cél:00225 07522642 / Email:gumalogistique@gmail.com<br/> FOURNITURES DE BUREAUX-MATERIEL ET INFORMATUQUE - ENTRETIEN ET REPARATION VEHICULES - TRAVAUX DE BATIMENT & DIVERS - MATERIEL AGRICOLE & ENGIENS - REPROFILAGE DES ROUTES - ETUDES ET FORMATION</h5> 
            </div>
            <hr>
            
            <div>
                 <h3 style="text-align: center; color:rgba(3, 9, 16, 0.811); font-weight: bold; text-decoration: underline;">N°Proforma :{{ $facture->numero_proforma }}</h3> 
                <div>
                    <!-- <h2 style="color: rgb(40, 51, 201)">FACTURE PROFORMA : {{ $facture->numero }}</h2> -->
                    <h5>Client: {{ $facture->client->nom }}</h5>
                    @if ($facture->client_id != null) 
                    <h5 style="margin-top: -15px">Contact : {{ $facture->client->contact }}</h5>
                    @endif
				   <p>Objet : {{ $facture->objet }}</p>
                    <p>Immatriculation : {{ $facture->immatriculation }}</p>
                    <p>Marque : {{ $facture->marque }}</p>
                </div>
                <div style="float: right;  margin-top: -95px">
                    <p style="margin-top: -15px">Date : {{ $facture->date }}</p>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px;">
            <table class="table table-striped table-hover" style="border: none">
                <thead style="border-radius: 30px">
                    <tr style="background-color: rgb(45, 143, 219); color: white;">
                    <th colspan="6"style="text-align: center">Châssis</th>
                    </tr>
				    @foreach ($facture->devis as $item)
				  <tr>
					<td colspan="3"><u>Incidents</u>:<br> {{ isset($facture->incident) ? $facture->incident : '' }}</td>
					<td colspan="3"><u>Commentaires</u>:<br> {{ isset($facture->commentaire) ? $facture->commentaire : '' }}</td>
				  </tr>
				   @endforeach
                    <tr style="background-color: rgb(45, 143, 219); color: white">
                        <th>Designations</th>
                        <th>Quantitée(e)</th>
                        <th>Remise(%)</th>
                        <th>Prix unitaire</th>
                         <th>Montant total</th>
                        <th>TOTAL (FCFA)</th>
                    </tr>
                </thead>
                <tbody>
				  
                      @foreach ($facture->devis as $item)
						  
                            <tr>
                                <td style="color: rgb(124, 1, 34); margin-bottom: 10px;"colspan="5">{{ $item->titre }}</td>
                                <td style="color: rgb(124, 1, 34); vertical-align: middle;">{{ number_format($item->montant_total, 0, ',', ' ') }}</td>
                            </tr>
                        @foreach ($item->factureitem as $key => $element) 
                             
                            <tr style="margin-top: 30px">
                                <td>{{ $element->designation }} </td>
                                <td>{{ $element->quantite }}</td>
							    <td>{{ number_format($element->remise, 0, ',', ' ') }}</td>
                                <td>{{ number_format($element->prix_unit, 0, ',', ' ') }}</td>
                                <td>{{ number_format($element->montant_total, 0, ',', ' ') }}</td>
                                <td>{{ $element->unit }}</td>
                            </tr>
                            
                        @endforeach
                        <br/>
                      @endforeach
                    <br/>
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="5">MONTANT HT</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->montant_HT, 0, ',', ' ') }}</td>
                    </tr>
                    
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="5">REMISE</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->remise, 0, ',', ' ') }}</td>
                    </tr>
                   
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="5">TVA 18%</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->TVA, 0, ',', ' ') }}</td>
                    </tr>
                    <tr>
                        <td style="color: rgb(190, 7, 40); margin-bottom: 10px; font-weight: bold" colspan="5">MONTANT NET à Payer TTC</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->montant_net, 0, ',', ' ') }}</td>
                    </tr>
                </tbody>
            </table>
            <br /><br />
            <div class="section-content">
                <div style="float: right;margin-right : 50px;">
                    <p><u>La Comptabilité</u></p>
                    <p>Fait le {{ date('d/m/Y') }}. </p>
                </div>
                <br />
            </div>
        </div>
        
    </div>
       
  <div class="footer">
        <hr />
        DOMICILIATION BANCAIRE : BIAO-CI-N° DE COMPTE0223 50252530 / TRESOR N° de compte : A 6500 01001 10267530008 / BNI AGENCE 2 PLATEAUX N° compte:003205010056 <br/>
        <!-- <span>Location et vente de véhicules / Rénovation bâtiment / Gestion immobilière / Décoration intérieure / Assurances </span> <br/> -->
        <span>Siège : II Plateaux- Tél.+225 22415280-Cél+225 07522642 / 07-07-92-31-92 /01 BP2568 Abidjan / E-mail : <a href="mailto:guma1@aviso.ci">guma1@aviso.ci</a></span>
    </div>
</body>
@endif

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .bg-image {
        position: relative;
    }
    
    .bg-image::before {
        content: "";
        position: absolute;
        top: 0;
        width: 100% auto;
        /* left: 90;
        right: 90; */
        bottom: 0;
        /* background-image: url("{{asset('assets/images/img.png')}}");  */
        opacity: 0.1; 
        pointer-events: none; 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        
    }


    h1 {
        text-align: center;
        margin-bottom: 10px;
    }

    .section {
        margin-bottom: 10px;
    }

    .section-content {
        padding: 10px;

    }

    .section-content p {
        margin: 0;
    }

    .header__section {
        position: relative;
    }

    img {
        width: 100px;
    }

    h1 {
        text-transform: uppercase;
        font-size: 28px;
    }

    .footer {
        position: fixed;
        bottom: 20px;
        left: 0px;
        right: 0px;
        height: 60px;
        color: rgb(9, 9, 9);
        text-align: center;
        font-size: 14px;
        line-height: 20px;
    }
    .footer .company-name{
         font-weight: bold   
    }

    .content {
        margin-bottom: 30px;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: left;
        padding: 6px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    ul {
        list-style-type: none;
        /* Remove bullets */
        padding: 0;
        /* Remove padding */
        margin: 0;
        /* Remove margins */
    }

    ul li {
        border: 1px solid #ebf6f4;
        /* Add a thin border to each list item */
        margin-top: -1px;
        /* Prevent double borders */
        background-color: #fbfffe;
        /* Add a grey background color */
        padding: 12px;
        /* Add some padding */
    }

    .badge-price {
        background-color: rgb(37, 128, 254);
        color: white;
        padding: 4px 8px;
        text-align: center;
        border-radius: 5px;
    }

    .badge-name {
        background-color: rgb(224, 63, 141);
        color: white;
        padding: 4px 8px;
        text-align: center;
        border-radius: 5px;
    }

    .badge-status {
        background-color: rgb(7, 241, 225);
        color: white;
        padding: 4px 8px;
        text-align: center;
        border-radius: 5px;
    }

    .badge-encours {
        background-color: rgb(255, 120, 24);
        color: white;
        padding: 4px 8px;
        text-align: center;
        border-radius: 5px;
    }
</style>
