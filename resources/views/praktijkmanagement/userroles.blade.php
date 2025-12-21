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

                    {{-- Flash messages --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                        </div>
                        <meta http-equiv="refresh" content="3;url={{ route('praktijkmanagement.userroles') }}">
                    @elseif (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                        </div>
                        <meta http-equiv="refresh" content="3;url={{ route('praktijkmanagement.userroles') }}">
                    @endif

                    {{-- User roles table --}}
                    <div class="overflow-x-auto container d-flex justify-content-center">
                        <div class="col-md-8">
                            <table class="table table-striped table-bordered align-middle shadow-sm">
                                <thead class="table-light">
                                    <tr>
                                        <th>Naam</th>
                                        <th>Email</th>
                                        <th>Gebruikersrol</th>
                                        <th class="text-center">Verwijder</th>
                                        <th class="text-center">Wijzig</th>
                                        <th class="text-center">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->rolename }}</td>

                                            <td class="text-center">
                                                <form action="{{ route('praktijkmanagement.destroy', $user->Id ?? $user->id) }}" 
                                                      method="POST" 
                                                      onsubmit="return confirm('Weet je zeker dat je deze user wilt verwijderen?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                                                </form>
                                            </td>

                                            <td class="text-center">
                                                <form action="{{ route('praktijkmanagement.edit', $user->Id ?? $user->id) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Wijzig</button>
                                                </form>
                                            </td>

                                            <td class="text-center">
                                                <form action="{{ route('praktijkmanagement.show', $user->Id ?? $user->id) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-sm">Details</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Geen gebruikers beschikbaar</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>