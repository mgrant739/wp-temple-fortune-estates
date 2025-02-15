











{{--
    ATTENTION
    =========
    /src/partials/map-window.scss

    This styles the info window on Google and LeafletJS
    property search maps.
--}}

@php
    $hasImages = is_array($property['images'] ?? '') && count($property['images']) > 0;
@endphp
<a href="{{ $property['permalink'] }}" target="_blank" 
style="position:relative; height: 200px; margin-bottom: 30px; background: #F2F2F2; border: solid 1px #CCC; display: block;">

@if ($property['availability'] == 'Available')
    <!-- EMPTY VALUE -->
    @else
    <div class="property-map__availability">
        <p>@if ($property['availability'] == 'SSTC') Sold STC @else {{ $property['availability'] }} @endif</p>
    </div>
    @endif

    @if(is_array($property['images'] ?? '') && count($property['images']) > 0)
    <img style="max-width: 200px;" src="{{ $property['images'][0]['media_url'] ?? '' }}" alt="">
    @endif
        <div class="property-map__meta">
        <div class="property-map__type">
        <h4>
            @if ($property['bedrooms'] == '0') Studio @else {{ $property['bedrooms'] }}  Bedroom {{ $property['property_type'] }} @endif 
            @if ($property['availability'] == 'Available') @if ($property['instruction_type'] == 'Letting') For Rent @else For Sale 
            @endif @else @if ($property['availability'] == 'SSTC') Sold STC @else {{ $property['availability'] }} @endif @endif </h4>
        </div>
        <div class="property-map__address">
            <h5>
                {{ $property['Address']['display_address'] ?? '' }}
            </h5>
        </div>        
        <div class="property-price-rooms-group">
            <div class="property-map__price">
                <h6>£{{ number_format($property['price']) }} {{ $property['instruction_type'] == 'Letting' ? ($property['rent_frequency'] == 'Weekly' ? 'PW' : 'PCM') : '' }}
                    <span>{{ ($property['price_qualifier'] != 'Default') ? ($property['price_qualifier'] == 'POA' ? 'POA' : $property['price_qualifier']) : '' }}</span></h6>
            </div>                       
        </div>
        <ul class="property__rooms">
            @if (!empty($property['bedrooms']))
            <li>
                <svg enable-background="new 0 0 22 16" viewBox="0 0 22 16" xmlns="http://www.w3.org/2000/svg" class="icon__bed"><path d="M21.1,7.3c-0.1,0-0.2-0.1-0.2-0.2V0.4c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0H1.5C1.3,0,1.1,0.2,1.1,0.4c0,0,0,0,0,0v6.7c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.4C0.2,7.3,0,7.4,0,7.6c0,0,0,0,0,0v5.8c0,0.2,0.2,0.4,0.4,0.4c0,0,0,0,0,0h0.5c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v1.6c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V14c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h18c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v1.6c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V14c0-0.1,0.1-0.2,0.2-0.2l0,0h0.5c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V7.6c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0L21.1,7.3z M1.8,0.9c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h18c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v6.2c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.4c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0h-7.3c-0.2,0-0.4,0.2-0.4,0.4c0,0,0,0,0,0v3.1c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.4c-0.1,0-0.2-0.1-0.2-0.2l0,0V4c0-0.2-0.2-0.4-0.4-0.4H2.9C2.7,3.6,2.6,3.8,2.6,4c0,0,0,0,0,0v3.1c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H2c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0L1.8,0.9z M18.5,4.4c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-6.2c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4.5c0-0.1,0.1-0.2,0.2-0.2l0,0H18.5z M9.7,4.4c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H3.5c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4.5c0-0.1,0.1-0.2,0.2-0.2l0,0H9.7z M21.3,12.9c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0v-1.1c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h20.2c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0V12.9z M21.3,10.7c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V8.2C0.7,8.1,0.8,8,0.9,8c0,0,0,0,0,0h20.2c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0V10.7z"></path></svg>
                {{ $property['bedrooms'] }} </li>
            @endif
            @if (!empty($property['reception_rooms']))
            <li>
                <svg enable-background="new 0 0 22 14" viewBox="0 0 22 14" xmlns="http://www.w3.org/2000/svg" class="icon__reception"><path d="M20.2,4.5h-0.4c-0.3,0-0.6,0.1-0.9,0.3c-0.1,0-0.2,0-0.2-0.1V1.9c0-1-0.8-1.9-1.8-1.9H5.1c-1,0-1.8,0.8-1.8,1.9v2.8c0,0.1-0.1,0.1-0.2,0.1C2.8,4.6,2.5,4.5,2.2,4.5H1.8C0.8,4.5,0,5.4,0,6.4v3.8c0,1,0.8,1.9,1.8,1.9h0.5c0.1,0,0.2,0.1,0.2,0.2l0,0v1.3c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0v-1.3c0-0.1,0.1-0.2,0.2-0.2l0,0h15c0.1,0,0.2,0.1,0.2,0.2l0,0v1.3c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0v-1.3c0-0.1,0.1-0.2,0.2-0.2l0,0h0.5c1,0,1.8-0.8,1.8-1.9V6.4C22,5.4,21.2,4.5,20.2,4.5z M4,1.9c0-0.6,0.5-1.1,1.1-1.1h11.7c0.6,0,1.1,0.5,1.1,1.1v5.3c0,0.2-0.2,0.4-0.4,0.4c0,0,0,0,0,0H4.4C4.2,7.6,4,7.4,4,7.2c0,0,0,0,0,0L4,1.9z M21.3,10.2c0,0.6-0.5,1.1-1.1,1.1H1.8c-0.6,0-1.1-0.5-1.1-1.1V6.4c0-0.6,0.5-1.1,1.1-1.1h0.4c0.6,0,1.1,0.5,1.1,1.1v0.8c0,0.6,0.5,1.1,1.1,1.1h13.2c0.6,0,1.1-0.5,1.1-1.1V6.4c0-0.6,0.5-1.1,1.1-1.1h0.4c0.6,0,1.1,0.5,1.1,1.1L21.3,10.2z"></path></svg>
                {{ $property['reception_rooms'] }}</li>
            @endif            
            @if (!empty($property['bathrooms']))
            <li>
                <svg enable-background="new 0 0 21 21" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg" class="icon__bath"><path d="M2.3,11.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V2.6c0-0.9,0.7-1.6,1.6-1.6c0.1,0,0.1,0,0.2,0C4,1.1,4,1.2,4,1.2c0,0,0,0,0,0.1C3.7,1.7,3.5,2.1,3.5,2.6c0,0.7,0.2,1.3,0.7,1.8c0.1,0.1,0.4,0.1,0.5,0l3.1-3.1c0.1-0.1,0.1-0.4,0-0.5c0,0,0,0,0,0C7.4,0.3,6.8,0,6.2,0c-0.5,0-1,0.2-1.4,0.5c-0.1,0.1-0.2,0.1-0.3,0C4.2,0.4,3.9,0.4,3.7,0.4c-1.2,0-2.2,0.9-2.3,2.1c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0v9.3c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.3c-0.2,0-0.3,0.2-0.3,0.4c0,0.2,0.2,0.3,0.3,0.3h0.9c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.6c0,1.4,0.7,2.6,1.9,3.3c0.1,0.1,0.2,0.2,0.2,0.3v1.6c0,0.2,0.1,0.4,0.3,0.4c0.2,0,0.4-0.1,0.4-0.3c0,0,0,0,0,0v-1.4c0-0.1,0.1-0.1,0.2-0.1c0,0,0,0,0,0c0.3,0.1,0.6,0.1,0.9,0.1h10.5c0.3,0,0.6,0,0.9-0.1c0.1,0,0.2,0,0.2,0.1c0,0,0,0,0,0v1.4c0,0.2,0.2,0.3,0.4,0.3s0.4-0.2,0.4-0.3l0,0V19c0-0.1,0.1-0.2,0.2-0.3c1.2-0.7,1.9-2,1.9-3.3v-2.6c0-0.1,0.1-0.2,0.2-0.2h0.9c0.2,0,0.3-0.2,0.3-0.4c0-0.2-0.2-0.3-0.3-0.3L2.3,11.9z M4.8,1.3C5.2,1,5.7,0.7,6.2,0.7c0.2,0,0.5,0.1,0.7,0.2C7,0.9,7,1,6.9,1.1c0,0,0,0,0,0L4.6,3.4c-0.1,0.1-0.1,0-0.2,0c0,0,0,0,0,0C4.2,3.1,4.2,2.9,4.2,2.6C4.2,2.1,4.5,1.7,4.8,1.3z M18.9,15.4c0,1.7-1.4,3.1-3.2,3.1H5.2c-1.7,0-3.1-1.4-3.2-3.1v-2.6c0-0.1,0.1-0.2,0.2-0.2h16.5c0.1,0,0.2,0.1,0.2,0.2L18.9,15.4z"></path></svg>
                {{ $property['bathrooms'] }} </li>
            @endif
        </ul>  
    </div>
</a>