
<div class="row mt-30">
    @foreach ($coupons as $key=>$coupons)

    {{-- @if($coupons->ifExistInTheCity()) --}}

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 ">
               <div class="coupon-card">
                    @if($coupons->featured)
                    <div class="dlz-featured-ribbon cp-rbn"> {{ trans('index.featured')}}</div>
                    @endif
                    <div class="coupon-img">
                         <img class="img-responsive" src="{{$coupons->image}}" alt="">
                    </div> 
                    <div class="coupon-detail">
                            <p class="couponname  text-center">
                                <a class="blackColor" href="/{{session('locale')}}/coupon/{{$coupons->slug}}">{{$coupons->name}}</a>
                            </p>
                            <div class="ttgg d-inline-flex" >
                                    <div class="left-tgg">
                                         <input  type="text" id="referlink{{$key}}" value="{{$coupons->coupon_code}}">
                                    </div>
                                    <div class="right-tgg">
                                        <p class="coupon-btn" onclick="copyreferlink({{$key}})">{{ trans('index.copy_code') }}</p>
                                    </div>
                            </div>
                    </div>

               </div>

            </div>
   {{--  @endif --}}

    @endforeach

</div>
{{-- 
                    <div class="row catalogDetails">
                        <div class="col-sm-12">
                            <p class="catalogName  text-center">
                                <a class="blackColor" href="/{{session('locale')}}/catalog/{{$coupons->slug}}">{{$coupons->name}}</a>
                            </p>
                           
                        </div>
                    </div> --}}