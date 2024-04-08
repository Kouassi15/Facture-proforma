<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FACTURE</title>
</head>

<body class="bg-image">
    <div>
        <div class="header__section">
            <div style="text-align: center; color:rgba(1, 57, 136, 0.811); font-weight: bold;">
                <h1>{{$facture->editeur->nom}}</h1>
			  <h5 style="color: rgba( 0, 0, 0, 1); font-weight: bold; margin-top: -5px; text-align: center; font-size:10px">Siège: II Plateaux Tél:00225 22415280/ Cél:00225 07522642 / Email:gumalogistique@gmail.com<br/> FOURNITURES DE BUREAUX-MATERIEL ET INFORMATUQUE - ENTRETIEN ET REPARATION VEHICULES - TRAVAUX DE BATIMENT & DIVERS - MATERIEL AGRICOLE & ENGIENS - REPROFILAGE DES ROUTES - ETUDES ET FORMATION</h5> 
            </div>
            <hr>
		  {{-- <div style="margin-top: -55px">
                <img src="{{asset('assets/images/img.png')}}" style="width: 100px; height:100px;"
                    alt="">
		  </div>--}}
            
	  </div>
	  <div>
                <div >
				  <div class="section-content" >
					  {{-- <div style="float: right;margin-top : -5px; font-size:65%;">
                    <p>Abidjan. Le {{ date('d/m/Y') }}. </p>
					  </div>--}}
			     </div>
				  <h5 style="margin-bottom: 10px; font-size:16px;">GUMA LOGISTIQUE</h5>
				  <div style="border:solid;border-radius: 5px; padding-left: 10px; margin-left: 5px 10px;height: 80px; width: 200px;">
                    <h2 style="font-size:70%;">N°CC :2147689 A</h2>
					<p style="font-size:70%;">Regime d'imposition: TEE</p>
					<p style="font-size:70%;">Centre des Impôts: Cocody</p>
				  </div>
				  <p style="font-size:80%;">FACTURE N°22 314 Y0101 / <span style="font-size:12px; color: red;font-size:16px;"> {{$facture->code}}</span></p>
                </div>
        </div>
       <br />
      <div class="footer">
      <div class="section-align">
		       <div style="float: left;margin-left : 50px;">
		         <p>Visa Client </p>
		       </div>
             <div style="float: right;margin-right : 50px;">
		         <p>Souche </p>
             </div>
      </div>
        <hr />
         <p style="font-size:10px"> DOMICILIATION BANCAIRE : BIAO-CI-N° DE COMPTE0223 50252530 / TRESOR N° de compte : A 6500 01001 10267530008 / BNI AGENCE 2 PLATEAUX N° compte:003205010056 
         Siège : II Plateaux- Tél.+225 22415280-Cél+225 07522642 / 07-07-92-31-92 /01 BP2568 Abidjan / E-mail : <a href="mailto:guma1@aviso.ci">guma1@aviso.ci</a></p>
    </div>
</body>

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

    .section-align{
        position: relative;
        bottom: 30px;
         left: 0px;
        right: 0px;
        height: 60px;
        color: rgb(9, 9, 9); 
         text-align: center;
         font-size: 14px; 
         line-height: 30px;
    } 
</style>
