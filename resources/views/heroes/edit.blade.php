@extends(('layout'))

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Editer un héros</h3>
                            <!-- Message d'information -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- Formulaire -->
                            <form method="POST" action="{{ route('heroes.update', ['hero' => $hero->id]) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="name" class="form-control" value="{{ $hero->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Genre</label>
                                    <input type="text" name="genre" class="form-control" value="{{ $hero->gender }}">
                                </div>
                                <div class="form-group">
                                    <label>Race</label>
                                    <input type="text" name="race" class="form-control" value="{{ $hero->race }}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" value="{{ $hero->description }}">
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select name="skill_id" class="custom-select" multiple>
                                            <option value=""> --Capacité-- </option>
                                            @foreach($skills as $skill)
                                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary  rounded-pill shadow-sm">Mettre à jour</button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
