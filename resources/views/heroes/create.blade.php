@extends('layout')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3> Ajouter un héros</h3>
                            <!-- Formulaire -->
                            <form method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nom" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Genre</label>
                                    <input type="text" name="gender" class="form-control">
                                </div>
                                <div class="form-group">
                                    <select name="skill_id" class="custom-select" multiple>
                                        <option value=""> --Capacité-- </option>
                                        @foreach($skills as $skill)
                                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary  rounded-pill shadow-sm"> Ajouter un produit  </button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
