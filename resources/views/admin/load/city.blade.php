@if(Auth::guard('admin')->check())

    <option disabled="" selected="" value="">Select City</option>
	@foreach($cities_m as $city)
	<option  value="{{ $city->id }}">{{ $city->name }}</option>
	@endforeach

@endif 