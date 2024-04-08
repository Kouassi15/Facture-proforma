<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FACTURE</title>
</head>

@if($facture->client->nom == "Ministère de l'environnement du développement durable et de la transition écologique")
<body class="bg-image">
    <div>
        <div class="header__section">
            <div style="text-align: center; margin-top: -60px;color:rgba(1, 57, 136, 0.811); font-weight: bold;">
                <h1>{{$facture->editeur->libelle}}</h1>
                <h5 style="color: rgba( 0, 0, 0, 1 ); font-weight: bold; margin-top: -10px; text-align: center; font-size:8px;">Siège: II Plateaux Tél:00225 22415280/ Cél:00225 07522642 / Email:gumalogistique@gmail.com<br/> FOURNITURES DE BUREAUX-MATERIEL ET INFORMATUQUE - ENTRETIEN ET REPARATION VEHICULES - TRAVAUX DE BATIMENT & DIVERS - MATERIEL AGRICOLE & ENGIENS - REPROFILAGE DES ROUTES - ETUDES ET FORMATION</h5> 
            </div>
            <hr>

            <div>
                <div>
                    <div class="section-content">
                   <div style="float: right;margin-top : -5px; font-size:65%;">
                    <p>Abidjan. Le {{ date('d/m/Y') }}. </p>
				 </div>
			     </div>
				  <h5>Client: {{ $facture->client->nom }}</h5>
                    @if ($facture->client_id != null) 
                    @endif
                    <h2 style="font-size:60%;">FACTURE PROFORMA : {{ $facture->numero }}</h2>
                    <!-- <h2 style="font-size:60%;">FACTURE PROFORMA : {{ $facture->code }}</h2> -->
				    <p style="font-size:60%;">Objet : {{ $facture->objet }}</p>
				  <p style="font-size:60%;">Immatriculation : {{ $facture->immatriculation }}</p>
                    <p style="font-size:60%;">Marque : {{ $facture->marque }}</p>
                </div>
                <div >
                    <p style="float: right;margin-top: -15px; font-size:60%;">Date : {{ $facture->date }}</p>
                </div>
            </div>
        </div>
        <div style="margin-top: 2%;">
            <table class="table table-striped table-hover" style="border: none">
                <thead style="border-radius: 5px">
                    <tr style="background-color: rgb(45, 143, 219); color: white; font-size:65%; height:10px">
                        <th width="60%">Designations</th>
                        <th>Quantités</th>
                        <th>Prix unitaire</th>
                         <th colspan="2">Total HT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facture->devis as $item) 
                        
                            <tr>
                                <td style="color: rgb(124, 1, 34);font-size:65%; margin-bottom: 2px;" colspan="5">{{ $item->titre }}</td>
                            </tr>
                        @foreach ($item->factureitem as $key => $element) 
                            <tr style="margin-top: 5px; font-size:65%;" >
                                <td width="60%">{{ $element->designation }} </td>
                                <td width="10%">{{ $element->quantite }}</td>
                                <td width="13%">{{ number_format($element->prix_unit, 0, ',', ' ') }}</td>
                                <td colspan="2">{{ number_format($element->montant_total, 0, ',', ' ') }}</td>
                            </tr>
                            
                        @endforeach
                        <br/>
                    @endforeach
                    <br/>
                    <tr style="font-size:65%;">
                        <td style="color: rgb(190, 7, 40); font-weight: bold;" colspan="4">Net à Payer HT</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->montant_HT, 0, ',', ' ') }}</td>
                    </tr>
                   
                    <tr style="font-size:65%;">
                        <td style="color: rgb(190, 7, 40); font-weight: bold" colspan="4">TVA 18%</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->TVA, 0, ',', ' ') }}</td>
                    </tr>
                    <tr style="font-size:65%;">
                        <td style="color: rgb(190, 7, 40); font-weight: bold" colspan="4"> NET à Payer TTC</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->montant_net, 0, ',', ' ') }}</td>
                    </tr>
                    <tr style="font-size:65%;">
					 <td style="margin-bottom: 0px; font-weight: bold" colspan="5">Arrêtée la presente Facture Proforma à la Somme de:<br>{{ $facture->montant_lettre}}</td>
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
  <br/>
       
    <div class="footer">
        <hr />
       <span style="font-size:8px;"> DOMICILIATION BANCAIRE : BIAO-CI-N° DE COMPTE0223 50252530 / TRESOR N° de compte : A 6500 01001 10267530008 / BNI AGENCE 2 PLATEAUX N° compte:003205010056</span> <br/>
        <span style="font-size:8px;">Siège : II Plateaux- Tél.+225 22415280-Cél+225 07522642 / 07-07-92-31-92 /01 BP2568 Abidjan / E-mail : <a href="mailto:guma1@aviso.ci">guma1@aviso.ci</a></span>
    </div>
</body>
@endif

@if($facture->client->typeclient->nom == 'Particulier')
<body class="bg-image">
    <div>
        <div class="header__section">
            <div style="text-align: center; color:rgba(1, 57, 136, 0.811);margin-top: -60px; font-weight: bold;">
                <h1>{{$facture->editeur->libelle}}</h1>
                <h5 style="color: rgba(0, 0, 0, 1); font-weight: bold; margin-top: -5px; text-align: center;font-size:8px;">Siège: II Plateaux Tél:00225 22415280/ Cél:00225 07522642 / Email:gumalogistique@gmail.com<br/> FOURNITURES DE BUREAUX-MATERIEL ET INFORMATUQUE - ENTRETIEN ET REPARATION VEHICULES - TRAVAUX DE BATIMENT & DIVERS - MATERIEL AGRICOLE & ENGIENS - REPROFILAGE DES ROUTES - ETUDES ET FORMATION</h5> 
            </div>
            <hr>
            <div>
			  <h3 style="text-align: left; color:rgba(3, 9, 16, 0.811); font-weight: bold; text-decoration: underline; font-size:80%">N° Proforma : {{ $facture->numero_proforma }}</h3> 
                <div>
                    <h5>Client: {{ $facture->client->typeclient->nom }}</h5>
                    @if ($facture->client_id != null) 
                    <!-- <h5 style="margin-top: -15px">Contact : {{ $facture->client->contact }}</h5> -->
                    @endif
				    <p style="font-size:65%;">Objet : {{ $facture->objet }}</p>
				  <p style="font-size:65%;">Immatriculation : {{ $facture->immatriculation }}</p>
                    <p style="font-size:65%;">Marque : {{ $facture->marque }}</p>
                </div>
                <div style="float: right;  margin-top: -50px">
                    <p style="margin-top: -50px; font-size:65%;">Date : {{ $facture->date }}</p>
                </div>
            </div>
        </div>

        <div style="margin-top: 2%;">
            <table class="table table-striped table-hover" style="border: none">
                <thead style="border-radius: 5px">
                    <tr style="background-color: rgb(45, 143, 219); color: white; font-size:65%; height:5px">
                        <th width="50%">Designations</th>
                        <th>Quantitée(e)</th>
                        <th>Prix unitaire</th>
                         <th colspan="2">Total HT</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facture->devis as $item) 
                    
                        @foreach ($item->factureitem as $key => $element) 
                            <tr style="margin-top: 10px; font-size:65%">
                                <td width="60%">{{ $element->designation }} </td>
                                <td width="10%">{{ $element->quantite }}</td>
                                <td width="15%">{{ number_format($element->prix_unit, 0, ',', ' ') }}</td>
                                <td colspan="2">{{ number_format($element->montant_total, 0, ',', ' ') }}</td>
                            </tr>
                        @endforeach
                        <br/>
                    @endforeach
                    <br/>
                    <tr style="font-size:65%;">
                        <td style="color: rgb(190, 7, 40);  font-weight: bold" colspan="4">MONTANT HT</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->montant_HT, 0, ',', ' ') }}</td>
                    </tr>
                    <tr style="font-size:65%;">
                        <td style="color: rgb(190, 7, 40);  font-weight: bold" colspan="4">TVA 18%</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->TVA, 0, ',', ' ') }}</td>
                    </tr>
                    <tr style="font-size:65%;">
                        <td style="color: rgb(190, 7, 40); font-weight: bold" colspan="4">MONTANT NET à Payer TTC</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->montant_net, 0, ',', ' ') }}</td>
                    </tr>
                    <tr style="font-size:65%;">
					 <td style="margin-bottom: 0px; font-weight: bold" colspan="5">Arrêtée la presente Facture Proforma à la Somme de:<br>{{ $facture->montant_lettre}}</td>
                    </tr>
                </tbody>
            </table>
            <br />
            <div class="section-content">
                <div style="float: right;margin-right : 50px;font-size:65%">
                    <p><u>La Comptabilité</u></p>
                    <p >Fait le {{ date('d/m/Y') }}. </p>
                </div>
                <br />
            </div>
        </div>
        
    </div>
    <br />
    <div class="footer">
        <hr />
        <p style="font-size:8px">DOMICILIATION BANCAIRE : BIAO-CI-N° DE COMPTE0223 50252530 / TRESOR N° de compte : A 6500 01001 10267530008 / BNI AGENCE 2 PLATEAUX N° compte:003205010056
        Siège : II Plateaux- Tél.+225 22415280-Cél+225 07522642 / 07-07-92-31-92 /01 BP2568 Abidjan / E-mail : <a href="mailto:guma1@aviso.ci">guma1@aviso.ci</a></p>
    </div>
</body>
@endif

@if($facture->client->nom == "Presidence de republique de cote d'ivoire")
<body class="bg-image">
    <div>
        <div class="header__section">
            <div style="text-align: center; color:rgba(1, 57, 136, 0.811); margin-top: -65px; font-weight: bold;">
                <h1>{{$facture->editeur->libelle}}</h1>
                <h5 style="color: rgba(0, 0, 0, 1); font-weight: bold; margin-top: -10px;  text-align: center ; font-size:8px;">Siège: II Plateaux Tél:00225 22415280/ Cél:00225 07522642 / Email:gumalogistique@gmail.com<br/> FOURNITURES DE BUREAUX-MATERIEL ET INFORMATUQUE - ENTRETIEN ET REPARATION VEHICULES - TRAVAUX DE BATIMENT & DIVERS - MATERIEL AGRICOLE & ENGIENS - REPROFILAGE DES ROUTES - ETUDES ET FORMATION</h5> 
            </div>
            <hr>
            <div>
                 <h3 style="text-align: left; color:rgba(3, 9, 16, 0.811); font-weight: bold; text-decoration: underline;font-size:80%">N°Proforma : {{ $facture->numero_proforma }} GMAIL 120122024 M1</h3> 
                <div>
                    <h5>Client: {{ $facture->client->nom }}</h5>
                    @if ($facture->client_id != null) 
                    @endif
				   <p style="font-size:65%">Objet : {{ $facture->objet }}</p>
                    <p style="font-size:65%">Immatriculation : {{ $facture->immatriculation }}</p>
                    <p style="font-size:65%">Marque : {{ $facture->marque }}</p>
                </div>
                <div >
                    <p style="float: right;  margin-top: -120px; font-size:65%">Date : {{ $facture->date }}</p>
                </div>
            </div>
        </div>
        <div style="margin-top: 2%;">
            <table class="table table-striped table-hover" style="border: none">
                <thead style="border-radius: 5%">
                    <tr style="background-color: rgb(45, 143, 219); color: white;font-size:65%; height:5px">
                    <th colspan="6"style="text-align: center">Châssis</th>
                    </tr>
				    @foreach ($facture->devis as $item)
				  <tr style="font-size:65%">
					<td><u>Incidents</u>:<br> {{ isset($facture->incident) ? $facture->incident : '' }}</td>
					<td colspan="5"><u>Commentaires</u>:<br> {{ isset($facture->commentaire) ? $facture->commentaire : '' }}</td>
				  </tr>
				   @endforeach
                    <tr style="background-color: rgb(45, 143, 219); color: white; font-size:65%; height:5px">
                        <th width="50%">Designations</th>
                        <th >Quantités</th>
                        <th>Remise(%)</th>
                        <th >Prix unitaire</th>
                         <th colspan="2">Total HT (FCFA)</th>
                    </tr>
                </thead>
                <tbody>
				  
                      @foreach ($facture->devis as $item)

                        @foreach ($item->factureitem as $key => $element) 
                             
                            <tr style="margin-top: 2px; font-size:50%">
                                <td width="55%">{{ $element->designation }} </td>
                                <td width="5%">{{ $element->quantite }}</td>
							    <td width="5%">{{ number_format($element->remise, 0, ',', ' ') }}</td>
                                <td width="12%">{{ number_format($element->prix_unit, 0, ',', ' ') }}</td>
                                <td colspan="2">{{ number_format($element->montant_total, 0, ',', ' ') }}</td>
                            </tr>
                        @endforeach
                        <br/>
                      @endforeach
                    <tr style="font-size:65%;">
                        <td style="color: rgb(190, 7, 40); font-weight: bold" colspan="5">TOTAL HT</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold;">{{ number_format($facture->montant_HT, 0, ',', ' ') }}</td>
                    </tr>
                    
                    <tr style="white;font-size:65%;">
                        <td style="color: rgb(190, 7, 40); font-weight: bold" colspan="5">REMISE</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->remise, 0, ',', ' ') }}</td>
                    </tr>
                   
                    <tr style="white;font-size:65%;">
                        <td style="color: rgb(190, 7, 40);  font-weight: bold" colspan="5">TVA 18%</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->TVA, 0, ',', ' ') }}</td>
                    </tr>
                    <tr style="white;font-size:65%;">
                        <td style="color: rgb(190, 7, 40);  font-weight: bold" colspan="5">MONTANT NET à Payer TTC</td>
                        <td style="color: rgb(190, 7, 40); vertical-align: middle; font-weight: bold">{{ number_format($facture->montant_net, 0, ',', ' ') }}</td>
                    </tr>
                    <tr style="white;font-size:65%;">
					 <td style="margin-bottom: 0px; font-weight: bold" colspan="6">Arrêtée la presente Facture Proforma à la Somme de:<br>{{ $facture->montant_lettre}}</td>
                        
                    </tr>
                </tbody>
            </table>
            <br />
            <div class="section-content">
                <div style="float: right;margin-bottom : 50px;font-size:65%">
                    <p><u>La Comptabilité</u></p>
                    <p>Fait le {{ date('d/m/Y') }}. </p>
                </div>
                <br />
            </div>
        </div>
        
    </div>
    <br />
  <div class="footer" style="text-align:center">
        <hr />
        <p style="font-size:8px">Domiciliation Bancaire : BNI ANGENCE 2 Plateaux N° compte CI 09201008 003205010004 31/ BANQUE DU TRESOR N°compte : CI 650 01001 010282040009 68 
        Siège : II Plateaux - Cél+225 07522642 / 0707923192 - 01 BP2568 Abidjan 01 / E-mail : <a href="mailto:guma1@aviso.ci">guma1@aviso.ci</a>cc : 8801972C-RC7320 Imposition:Réel Simplifié - Centre Adjame
        </p>
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
        margin-bottom: 5px;
    }

    .section-content {
        padding: 0;

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
        bottom: -30px;
        left: 0px;
        right: 0px;
        height: 60px;
        color: rgb(9, 9, 9);
        text-align: center;
        font-size: 10px;
        line-height: 20px;
    }
    .footer .company-name{
         font-weight: bold   
    }

    .content {
        margin-bottom: 2px;
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
