
@php
echo '<?xml version="1.0" encoding="UTF-8"?>';
@endphp
<response start="eh">
<!response Pub-Status "This is a pre-release of the
 specification.">
    <editions>
        @foreach ($data['response']['section']['editions'] as $result)
            <edition>
               <title>{{ $result['webTitle'] }}</title>
               <link>{{ $result['webUrl'] }}</link>
               <code>{{$result['code']}}</code>
            </edition>
        @endforeach
        </editions>
<results>
    @foreach ($data['response']['results'] as $result)
        <result>
           <title>{{ $result['webTitle'] }}</title>
           <link>{{ $result['webUrl'] }}</link>
           <sectionName>{{$result['sectionName']}}</sectionName>
        </result>
    @endforeach
</results>
</response>