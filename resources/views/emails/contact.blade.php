<x-mail::message>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 15px;">
                <h3 style="color: #333333;">Informations de l'Expéditeur</h3>
                <p><strong>Nom :</strong> {{ $details['firstname'] . ' ' . $details['lastname'] }}</p>
                <p><strong>Email :</strong> <a href="mailto:{{ $details['email'] }}">{{ $details['email'] }}</a></p>
                @if($details['phone'])
                    <p><strong>Téléphone :</strong> <a href="tel:{{ $details['phone'] }}">{{ $details['phone'] }}</a></p>
                @endif
            </td>
        </tr>
        <tr>
            <td style="padding: 15px;">
                <h3 style="color: #333333;">Message</h3>
                <p style="white-space: pre-line;">{{ $details['message'] }}</p>
            </td>
        </tr>
    </table>
</x-mail::message>
