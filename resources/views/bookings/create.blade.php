<!DOCTYPE html>
<html>
<head>
    <title>Create Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
            max-width: 600px;
        }
        .form-group label {
            font-weight: bold;
        }
        .alert-success, .alert-danger {
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mb-4">Create Booking</h1>

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
        <div class="form-group">
            <label for="Service_date">Service Date</label>
            <input type="date" name="Service_date" id="Service_date" class="form-control" value="{{ old('Service_date') }}" required>
        </div>

        <div class="mt-4" id="service-provider-category" style="display: none;">
            <x-label for="service_provider_id" value="{{ __('Service Provider') }}" />
            <select id="service_provider_id" name="service_provider_id" class="block mt-1 w-full">
                <option value="">Select Service Provider</option>
            </select>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>
        <div class="form-group">
            <label for="Status">Status</label>
            <select name="Status" id="Status" class="form-control" required>
                <option value="Pending" {{ old('Status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Confirmed" {{ old('Status') == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="Cancelled" {{ old('Status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                <option value="Completed" {{ old('Status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control" rows="4" required>{{ old('Description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Create Booking</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
