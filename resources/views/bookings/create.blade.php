<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .booking-form {
            max-width: 800px;
            margin: auto;
        }
        .booking-form h1 {
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: bold;
        }
        .alert ul {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
<div class="container booking-form">
    <h1>Create Booking</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Service_date">{{ __('Service Date') }}</label>
                    <input id="Service_date" type="date" name="Service_date" class="form-control" value="{{ old('Service_date') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="Service_time">{{ __('Service Time') }}</label>
                    <input id="Service_time" type="time" name="Service_time" class="form-control" value="{{ old('Service_time') }}" required>
                </div>
                <div class="form-group">
                    <label for="service_provider_id">{{ __('Service Provider') }}</label>
                    <select id="service_provider_id" name="service_provider_id" class="form-control">
                        <option value="">{{ __('Select') }}</option>
                        @foreach(get_service_providers() as $service_provider)
                            <option value="{{ $service_provider->id }}">{{ ucfirst($service_provider->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">{{ __('Phone') }}</label>
                    <input id="phone" type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">{{ __('Address') }}</label>
                    <input id="address" type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                </div>
                <div class="form-group">
                    <label for="city">{{ __('City') }}</label>
                    <input id="city" type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                </div>
                <div class="form-group">
                    <label for="Service_description">{{ __('Service Description') }}</label>
                    <input id="Service_description" type="text" name="Service_description" class="form-control" value="{{ old('Service_description') }}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Create Booking') }}</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<!-- Footer -->
<footer class="bg-gray-900 text-white py-6 mt-5">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 ServiceHub. All rights reserved.</p>
        <p>Contact us: info@servicehub.com | +94123456789</p>
    </div>
</footer>
</html>
