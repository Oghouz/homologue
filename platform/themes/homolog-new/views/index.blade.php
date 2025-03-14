@extends('theme.homolog-new::layouts.master')
@section('title', 'Accueil')
@section('content')
    <header class="text-center visible" id="main-header">
        <div class="row">
            <div class="col-4">
                <ul id="nav-left">
                    <li><a href="#">Couture</a></li>
                    <li><a href="#">Histoires</a></li>
                    <li><a href="#">Services</a></li>
                </ul>
            </div>
            <div class="col-4">
                <div class="menu-icon" onclick="toggleMenu()">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <h1>HOMOLOG</h1>
                <p>PARIS</p>
            </div>
            <div class="col-4">
                <ul id="nav-right">
                    <li><a href="#">Recherche</a></li>
                    <li><a href="#">Compte</a></li>
                    <li><a href="#">Ma Sélection</a></li>
                </ul>
            </div>
        </div>
    </header>

    <section class="collection-section first">
        <div class="collection-text">
            <h2>NOUVELLE COLLECTION</h2>
            <p>Automne-Hiver 2024</p>
        </div>
    </section>

    <footer class="p-4 bg-white text-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <p class="fw-bold">BESOIN D'AIDE</p>
                    <ul>
                        <li><a href="#">CONTACTEZ-NOUS</a></li>
                        <li><a href="#">SHIPPING POLICY</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
@endsection