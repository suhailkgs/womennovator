<div class="row row-sm">
  <div class="col-4">
    <div class="form-group mg-b-0">
      <label class="form-label"> Name: <span class="tx-danger">*</span>
      </label>
      <input class="form-control" name="poc_name" placeholder="Enter Name" value="{{ $partner->poc_name ?? '' }}"
        type="text" required>
    </div>
  </div>

  <div class="col-4">
    <div class="form-group mg-b-0">
      <label class="form-label">Email: <span class="tx-danger">*</span></label>
      <input class="form-control" name="poc_email" value="{{ $partner->poc_email ?? '' }}" placeholder="Enter Email"
        type="text" required>
    </div>
  </div>
  <div class="col-4">
    <div class="form-group mg-b-0">
      <label class="form-label">Mobile Number: <span class="tx-danger">*</span></label>
      <input class="form-control" name="mobile" value="{{ $partner->mobile ?? '' }}"
        placeholder="Enter Mobile Number" type="text" required>
    </div>
  </div>
</div><br>
<div class="row row-sm">
  <div class="col-4">
    <div class="form-group mg-b-0">
      <label for="state" class="form-label">State: <span class="tx-danger">*</span></label>
      <select class="form-control" id="state" name="state" required>
        {{-- <option> --- Select a state --- </option> --}}
        {{-- @if ($states)
          @foreach ($states as $state)
            <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
          @endforeach
        @endif --}}
        <option value=""> ---Please Select One--- </option>
        @if ($states)
          @foreach ($states as $state)
            @if (isset($partner->state_id))
              @if ($partner->state_id == $state->state_id)
                <option value="{{ $state->state_id }}" selected>{{ $state->state_name }}</option>
              @else
                <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
              @endif
            @else
              <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
            @endif
          @endforeach
        @endif

      </select>
    </div>
  </div>

  <div class="col-4">
    <div class="form-group mg-b-0">
      <label for="city" class="form-label">City: <span class="tx-danger">*</span></label>
      <select class="form-control" id="city" name="city" required>
        <option> --- Select a state first --- </option>


        @if (isset($cities))
          @foreach ($cities as $city)
            @if (isset($partner->city_id))
              @if ($partner->city_id == $city->city_id)
                <option value="{{ $city->city_id }}" selected>{{ $city->city_name }} </option>
              @else
                <option value="{{ $city->city_id }}">{{ $city->city_name }} </option>
              @endif
            @else
              <option value="{{ $city->city_id }}">{{ $city->city_name }} </option>
            @endif
          @endforeach
        @endif

      </select>
    </div>
  </div>
  <div class="col-4">
    <div class="form-group mg-b-0">
      <label class="form-label">Business Name : <span class="tx-danger">*</span></label>
      <input class="form-control" name="business_name" value="{{ $partner->business_name ?? '' }}"
        placeholder="Enter Business name" type="text" required>
    </div>
  </div>

</div>
<br>
<div class="row row-sm">

  <div class="col-4">
    <div class="form-group mg-b-0">
      <label class="form-label"> Contribution:</label>
      <input class="form-control" name="contribution" value="{{ $partner->contribution ?? '' }}"
        placeholder="Enter Contribution" type="text">
    </div>
  </div>

  <div class="col-4">
    <div class="form-group mg-b-0">
      <label class="form-label">Logo: @if (isset($logo_required))
          <span class="tx-danger">*</span>
        @endif
      </label>
      <input class="form-control" name="logo" id="profile-img" placeholder="Enter Email" type="file">
    </div>
  </div>

  <div class="col-4">
    <div class="form-group">
      <img alt="Responsive image" class="img-thumbnail wd-100p wd-sm-100" id="profile-img-tag"
        @if (Request::is('admin/partner/*/edit')) src="{{ asset('we/partner/' . $partner->logo) ?? '' }}" @endif>
    </div>
  </div>

</div><br>
<div class="row row-sm">
  <div class="col-4">
    <div class="form-group mg-b-0">
      <label class="form-label"> Partnership Agreement : </label>
      <input class="form-control" name="partnership_agreement" value="{{ $partner->partnership_agreement ?? '' }}"
        placeholder="Enter Partnership Agreement" type="text">
    </div>
  </div>
  <div class="col-4">
    <div class="form-group mg-b-0">
      <label class="form-label"> Program Updates : </label>
      <input class="form-control" name="program_updates" value="{{ $partner->program_updates ?? '' }}"
        placeholder="Enter Program Updates" type="text">
    </div>
  </div>
  <div class="col-4">
    <div class="form-group mg-b-0">
      <label class="form-label"> Social Handles : </label>
      <input class="form-control" name="social_handles" value="{{ $partner->social_handles ?? '' }}"
        placeholder="Enter Social Handles" type="text">
    </div>
  </div>


</div><br>

<div class="row row-sm">
  <div class="d-flex pagination wd-100p">
    @if (Request::get('pending'))
      <a href="{{ url('admin/partner?pending=true') }}" class="btn btn-main-primary pd-x-20 mg-t-10">Back</a>
    @else
      <a href="{{ url('admin/partner') }}" class="btn btn-main-primary pd-x-20 mg-t-10">Back</a>
    @endif
    <button type="submit" class="ml-auto btn btn-main-primary pd-x-20 mg-t-10">Save</button>

  </div>
</div>
