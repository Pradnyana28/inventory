@component('components/card')
    @slot('title')
        Profil
    @endslot

    <p class="mb-0">Username: {{ Auth::user()->nama_user }}</p>
    <p class="mb-0">Departemen: {{ Auth::user()->departemen }}</p>
@endcomponent