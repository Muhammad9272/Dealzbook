@if(Auth::guard('admin')->check())

    {{-- <option disabled="" selected="" value="">Select Branch</option> --}}
	@foreach($branches as $branch)
	<option  value="{{ $branch->id }}">{{ $branch->name }}</option>
	@endforeach

@endif 