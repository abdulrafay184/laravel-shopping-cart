 @extends('Admin.sidebar')
@section('admin')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <style>
                /* ===== VIP TABLE WRAPPER ===== */
.custom-table {
  width: 100%;
  max-width: 100%;
  margin: 25px auto;
  border-radius: 16px;
  overflow: hidden;
  background: linear-gradient(145deg, #ffffff, #eef6ff);
  box-shadow: 0 20px 45px rgba(0,123,255,0.25);
  animation: tableFade 0.8s ease forwards;
}

/* ===== TABLE HEADER ===== */
.custom-table thead {
  background: linear-gradient(135deg, #0d47a1, #1976d2);
  color: #ffffff;
}

.custom-table thead th {
  padding: 16px 14px;
  font-weight: 700;
  letter-spacing: 1px;
  font-size: 14px;
  border: none;
  white-space: nowrap;
}

/* ===== TABLE BODY ===== */
.custom-table tbody td {
  padding: 14px 12px;
  font-size: 13px;
  color: #0d47a1;
  vertical-align: middle;
  border-color: rgba(0,0,0,0.05);
}

/* ===== ROW HOVER VIP EFFECT ===== */
.custom-table tbody tr {
  transition: all 0.35s ease;
}

.custom-table tbody tr:hover {
  background: linear-gradient(135deg, #e3f2fd, #ffffff);
  transform: scale(1.01);
  box-shadow: inset 0 0 0 999px rgba(33,150,243,0.08);
}

/* ===== PAYMENT METHOD BADGE STYLE ===== */
.custom-table tbody td:nth-child(8) {
  font-weight: 600;
  color: #1976d2;
}

/* ===== NOTES COLUMN FIX ===== */
.custom-table tbody td:nth-child(9) {
  max-width: 200px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* ===== ANIMATION ===== */
@keyframes tableFade {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* ===== RESPONSIVE FIX ===== */
@media (max-width: 768px) {
  .custom-table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
  }

  .custom-table thead th,
  .custom-table tbody td {
    font-size: 12px;
    padding: 12px 10px;
  }
}

            </style>
            <table class="table table-striped table-hover table-bordered text-center custom-table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Postal_Code</th>
                        <th>Payment Method</th>
                        <th>Notes</th>
                        <th>Checkout Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allcheckouts as $checkout)
                        <tr>
                            <td>{{ $checkout->id }}</td>
                            <td>{{ $checkout->name }}</td>
                            <td>{{ $checkout->email }}</td>
                            <td>{{ $checkout->phone }}</td>
                            <td>{{ $checkout->address }}</td>
                            <td>{{ $checkout->city }}</td>
                            <td>{{ $checkout->postal_code }}</td>
                            <td>{{ $checkout->payment_method }}</td>
                            <td>{{ $checkout->notes }}</td>
                            <td>{{ $checkout->created_at }}</td>
                        </tr>

                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>

@endsection
