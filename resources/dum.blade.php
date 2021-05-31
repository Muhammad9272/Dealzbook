summernote1 nic
nic-simple form-control

{{$data->image?$data->image:'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'}}

value="{{$data->seoTags->title}}"
{!!$data->seoTags->description!!}

 {!! $data->about !!}
{!! $data->page->description !!}


 value="{{$data->getTranslation('name', 'ar')}}"

value="{{$data->seoTags->getTranslation('title', 'ar')}}"
{!! $data->seoTags->getTranslation('description', 'ar') !!}

  {!! $data->getTranslation('about', 'ar') !!}
  {!! $data->page->getTranslation('description', 'ar') !!}



		  //--- Validation Section
		$rules = [
		           'name' => 'required|unique:cities|max:255',
		            'arabic_name' => 'required',
		            'country_id' => 'required',
		            'description' => 'required',
		            'arabic_description' => 'required',
		        ];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
		  return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
		}

       $msg = 'Data Updated Successfully.';
        return response()->json($msg); 