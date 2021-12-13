@php
echo '<?xml version="1.0" encoding="UTF-8"@endphp';
?>
<response>
<editions>
        @foreach ($data['response']['section']['editions'] as $result)
            <edition>
                <title>{{ $result['webTitle'] }}</title>
                <link>{{ $result['webUrl'] }}</link>
                <code>{{ $result['code'] }}</code>
            </edition>
        @endforeach
    </editions>
    <results>
        @foreach ($data['response']['results'] as $result)
            <result>
                <title>{{ $result['webTitle'] }}</title>
                <link>{{ $result['webUrl'] }}</link>
                <section>{{ $result['sectionName'] }}</section>
                <publishedDate>{{ $result['webPublicationDate'] }}</publishedDate>
                <Hosted>{{ $result['isHosted'] }}</Hosted>
            </result>
        @endforeach
    </results>
</response>   