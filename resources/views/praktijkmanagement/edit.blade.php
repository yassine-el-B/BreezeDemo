<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('praktijkmanagement.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Naam</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="rolename" class="form-label">Gebruikersrol</label>
                            <select name="rolename" id="rolename" class="form-select">
                                <option value="patient" {{ $user->rolename == 'patient' ? 'selected' : '' }}>Patient</option>
                                <option value="assistent" {{ $user->rolename == 'assistent' ? 'selected' : '' }}>Assistent</option>
                                <option value="mondhygienist" {{ $user->rolename == 'mondhygienist' ? 'selected' : '' }}>Mondhygienist</option>
                                <option value="tandarts" {{ $user->rolename == 'tandarts' ? 'selected' : '' }}>Tandarts</option>
                                <option value="praktijkmanagement" {{ $user->rolename == 'praktijkmanagement' ? 'selected' : '' }}>Praktijkmanagement</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Opslaan</button>
                        <a href="{{ route('praktijkmanagement.userroles') }}" class="btn btn-secondary">Annuleren</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
