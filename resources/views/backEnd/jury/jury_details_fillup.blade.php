<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Jury Details Fillup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .errors {
      font-size: 14px;
      font-weight: bold;
      color: red;
    }

    .bg-form {
      background-color: rgb(235, 235, 235);
    }

  </style>
</head>

<body>

  <div class="container">
    <div class="row mt-5">
      <h1 class="text-center">Fillup the form</h1>
     
      <div class="col-md-7 m-auto">
        <form action="{{ url('we/jury_details_update') }}" class="bg-form p-4 my-5" enctype="multipart/form-data"
          method="post">
          @csrf
          <input type="hidden" name="temp_id" id="temp_id" value="{{ $temp_id }}">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="mobile_number" class="form-label">Mobile Number: *</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
              </div>
              <p class="errors">
                @error('mobile_number')
                  {{ $message }}
                @enderror
              </p>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="photo" class="form-label">Photo: *</label>
                <input type="file" class="form-control" id="photo" name="photo" required>
              </div>
              <p class="errors">
                @error('photo')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="designation" class="form-label">Designation: *</label>
                <input type="text" class="form-control" id="designation" name="designation" required>
              </div>
              <p class="errors">
                @error('designation')
                  {{ $message }}
                @enderror
              </p>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="fblink" class="form-label">Facebook Link: *</label>
                <input type="text" class="form-control" id="fblink" name="fblink" required>
              </div>
              <p class="errors">
                @error('fblink')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="instagram" class="form-label">Instagram:</label>
                <input type="text" class="form-control" id="instagram" name="instagram">
              </div>
              <p class="errors">
                @error('instagram')
                  {{ $message }}
                @enderror
              </p>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="twitter" class="form-label">Twitter:</label>
                <input type="text" class="form-control" id="twitter" name="twitter">
              </div>
              <p class="errors">
                @error('twitter')
                  {{ $mestsage }}
                @enderror
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="company" class="form-label">Company: *</label>
                <input type="text" class="form-control" id="company" name="company" required>
              </div>
              <p class="errors">
                @error('company')
                  {{ $message }}
                @enderror
              </p>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="industry" class="form-label">Industry: *</label>
                <input type="text" class="form-control" id="industry" name="industry" required>
              </div>
              <p class="errors">
                @error('industry')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="sector" class="form-label">Sector: *</label>
                <select class="form-select" id="sector" name="sector">
                  <option> --- Select a sector --- </option>
                  @if ($sector)
                    @foreach ($sector as $sectorData)
                      <option value="{{ $sectorData->id }}">{{ $sectorData->sectorname }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <p class="errors">
                @error('sector')
                  {{ $message }}
                @enderror
              </p>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="state" class="form-label">State: *</label>
                <select class="form-select" id="state" name="state">
                  <option> --- Select a state --- </option>
                  @if ($states)
                    @foreach ($states as $state)
                      <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <p class="errors">
                @error('state')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="city" class="form-label">City: *</label>
                <select class="form-select" id="city" name="city">
                  <option> --- Select a state first --- </option>
                </select>
              </div>
              <p class="errors">
                @error('city')
                  {{ $message }}
                @enderror
              </p>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label for="description" class="form-label">Description: *</label>
                <textarea type="text" class="form-control" id="description" name="description" required></textarea>
              </div>
              <p class="errors">
                @error('description')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>

          <button type="submit" class="btn btn-success">Submit</button>

        </form>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script>
    $(document).ready(function() {
      $("#state").change(function(e) {
        e.preventDefault();
        console.log("yes");
        let state_id = $('#state').val();
        let _token = $('input[name=_token]').val();
        $.ajax({
          type: "post",
          url: "{{ url('/admin/get_cities') }}",
          data: {
            _token,
            state_id
          },
          success: function(result) {
            $('#city').html(result);
          }
        });
      });
    });
  </script>

</html>
