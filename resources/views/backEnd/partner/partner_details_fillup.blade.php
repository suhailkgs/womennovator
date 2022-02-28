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
      <h1 class="text-center">Fillup the form [partners]</h1>
     
      <div class="col-md-7 m-auto">
        <form action="{{ url('we/partner_details_update') }}" class="bg-form p-4 my-5" enctype="multipart/form-data"
          method="post">
          @csrf
          <input type="hidden" name="temp_id" id="temp_id" value="{{ $temp_id }}">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number: *</label>
                <input type="text" class="form-control" id="mobile" name="mobile" required>
              </div>
              <p class="errors">
                @error('mobile')
                  {{ $message }}
                @enderror
              </p>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="logo" class="form-label">Logo: *</label>
                <input type="file" class="form-control" id="logo" name="logo" required>
              </div>
              <p class="errors">
                @error('logo')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="contribution" class="form-label">Contribution: *</label>
                <input type="text" class="form-control" id="contribution" name="contribution" required>
              </div>
              <p class="errors">
                @error('contribution')
                  {{ $message }}
                @enderror
              </p>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="partnership_agreement" class="form-label">Partnership Agreement:</label>
                <input type="text" class="form-control" id="partnership_agreement" name="partnership_agreement">
              </div>
              <p class="errors">
                @error('partnership_agreement')
                  {{ $message }}
                @enderror
              </p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="program_updates" class="form-label">Program Updates:</label>
                <input type="text" class="form-control" id="program_updates" name="program_updates">
              </div>
              <p class="errors">
                @error('program_updates')
                  {{ $message }}
                @enderror
              </p>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="social_handles" class="form-label">Social Handles:</label>
                <input type="text" class="form-control" id="social_handles" name="social_handles">
              </div>
              <p class="errors">
                @error('social_handles')
                  {{ $mestsage }}
                @enderror
              </p>
            </div>
          </div>


          <div class="row">
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
