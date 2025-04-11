@extends(Theme::getThemeNamespace('layouts.default'))
@section('content')
    <div class="container py-5">
        <h2>Prendre rendez-vous</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('appointment.clientStore') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="date">Choisir une date :</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="time">Choisir une heure :</label>
                <select name="time" class="form-control" required>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <!-- Ajoute d'autres créneaux ici -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Valider le rendez-vous</button>
        </form>
    </div>
@endsection