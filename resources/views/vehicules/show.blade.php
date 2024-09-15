<x-layout>
    <div class="main-contenair">
         <div class="contenant">
             <h1>BIENVENU AU GARAGE XYZ </h1>
             <h1>Home</h1>
         </div>
        <div class="card mt-5">
            <h2 class="card-header">Detail du  vehicule</h2>
            <div class="card-body">

              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a class="btn btn-primary btn-sm" href="{{ route('vehicules.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
              </div>

              <div class="detail-container">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="edit_image">
                        <img src="/images/{{ $vehicule->image }}" width="420px">
                    </div>
                </div>
                <div class="detail-contenu">

                        <div>
                            <p>
                                <strong>Marque:</strong> <br/>
                                {{ $vehicule->marque }}
                            </p>
                        </div>
                        <div>
                            <p>
                                <strong>Couleur:</strong> <br/>
                                    {{ $vehicule->couleur }}
                            </p>
                        </div>
                        <div>
                            <p>
                                <strong>Année:</strong> <br/>
                                {{ $vehicule->annee }}
                           </p>
                        </div>
                        <div>
                            <p>
                                <strong>Prix:</strong> <br/>
                                {{ $vehicule->prix }}
                            </p>
                        </div>
                    </div>
              </div>
            </div>
          </div>
    </div>
</x-layout>
