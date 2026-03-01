<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Overzicht Allergenen
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">

        {{-- FILTER FORM --}}
        <form method="GET" class="mb-6 flex items-center gap-3">
            <label class="font-semibold">Allergeen:</label>

            <select name="allergeen_id" class="border rounded px-2 py-1">
                <option value="">-- Kies een allergeen --</option>
                @foreach($allergenen as $allergeen)
                    <option value="{{ $allergeen->Id }}" 
                        @selected($selectedAllergeenId == $allergeen->Id)>
                        {{ $allergeen->Naam }}
                    </option>
                @endforeach
            </select>

            <button class="bg-blue-600 text-white px-4 py-1 rounded">
                Maak selectie
            </button>
        </form>

        {{-- ALS ER EEN ALLERGEEN GEKOZEN IS --}}
        @if($selectedAllergeenId)

            {{-- ALS ER PRODUCTEN ZIJN --}}
            @if($producten->count() > 0)

                @foreach($producten->groupBy('ProductNaam') as $productNaam => $rows)

                    {{-- PRODUCT HEADER --}}
                    <div class="bg-gray-200 font-semibold px-4 py-2 rounded-t mt-6">
                        {{ $productNaam }}
                    </div>

                    <table class="w-full border border-gray-300 mb-4">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-2 py-1">Naam Allergeen</th>
                                <th class="border px-2 py-1">Omschrijving</th>
                                <th class="border px-2 py-1 text-right">Aantal Aanwezig</th>
                                <th class="border px-2 py-1 text-center">Info</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($rows as $row)
                                <tr>
                                    <td class="border px-2 py-1">{{ $row->AllergeenNaam }}</td>
                                    <td class="border px-2 py-1">{{ $row->Omschrijving }}</td>
                                    <td class="border px-2 py-1 text-right">
                                        {{ $row->AantalAanwezig ?? '-' }}
                                    </td>
                                    <td class="border px-2 py-1 text-center">
                                        <a href="{{ route('allergenen.leverancier', $row->ProductId) }}"
                                           class="text-blue-600 hover:text-blue-800">
                                            <i class="bi bi-info-circle-fill text-xl"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @endforeach

                {{-- PAGINATION --}}
                <div class="mt-4 flex gap-2">
                    @if($page > 1)
                        <a href="{{ request()->fullUrlWithQuery(['page' => $page - 1]) }}"
                           class="px-3 py-1 border rounded">
                            Vorige
                        </a>
                    @endif

                    @if($page < $lastPage)
                        <a href="{{ request()->fullUrlWithQuery(['page' => $page + 1]) }}"
                           class="px-3 py-1 border rounded">
                            Volgende
                        </a>
                    @endif
                </div>

            @else
                <p class="text-gray-600">Geen producten gevonden voor dit allergeen.</p>
            @endif

        @endif

    </div>
</x-app-layout>

    <!-- It is never too late to be what you might have been. - George Eliot -->

