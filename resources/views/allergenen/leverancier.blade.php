<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Overzicht Leverancier gegevens
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Naam Leverancier</th>
                    <th>Contactpersoon</th>
                    <th>Mobiel</th>
                    <th>Stad</th>
                    <th>Straat</th>
                    <th>Huisnummer</th>
                </tr>
            </thead>

            <tbody>
                @if($leverancier)
                    <tr>
                        <td>{{ $leverancier->Naam }}</td>
                        <td>{{ $leverancier->ContactPersoon }}</td>
                        <td>{{ $leverancier->Mobiel }}</td>

                        @if($contact)
                            <td>{{ $contact->Stad }}</td>
                            <td>{{ $contact->Straat }}</td>
                            <td>{{ $contact->Huisnummer }}</td>
                        @else
                            <td colspan="3" class="text-center">
                                Er zijn geen adresgegevens bekend
                            </td>
                        @endif
                    </tr>
                @else
                    <tr>
                        <td colspan="6" class="text-center">
                            Geen leverancier gevonden.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>

    </div>
</x-app-layout>
<div>

    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
</div>
