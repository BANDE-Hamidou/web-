<x-layout>
    <div class="main-contenair">
        {{-- <img src="{{'assets/image/fond.jpg'}}" alt=""> --}}
         <div class="contenant">
             <h1>BIENVENU AU GARAGE XYZ </h1>
             <h1>Home</h1>
         </div>
        <div class="card mt-5">
                    <h2 class="card-header">Voir l'annexe</h2>
                    <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-primary btn-sm" href="{{ route('annexes.index') }}"><i class="fa fa-arrow-left"></i> Retour</a>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nom:</strong> <br/>
                                <td>{{$annexe->nom }}</td>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Lieu:</strong> <br/>
                                <td>{{$annexe->localisation }}</td>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-layout>
