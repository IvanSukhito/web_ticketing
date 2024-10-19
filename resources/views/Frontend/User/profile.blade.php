@extends('layouts.frontend')

@section('head')
@parent

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Dashboard</title>
    <!-- Bootstrap 4 CSS -->
   
    <style>
      .card-body h2 {
        font-size: 2rem;
      }
  
      /* Ensure the table is responsive on smaller devices */
      @media (max-width: 767.98px) {
        .card-body table {
          font-size: 0.9rem;
        }
      }
  
      @media (max-width: 575.98px) {
        .card-body h2 {
          font-size: 1.5rem;
        }
      }
    </style>
 
@stop
@section('script-top')
@parent
<!-- Bootstrap 4 JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@stop
@section('content')

<body>
    <div class="container-fluid mt-5">
      <!-- Dashboard Header -->
      <h1 class="text-center mb-4">User Dashboard</h1>
  
      <!-- Tabs Navigation -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="summary-tab" data-toggle="tab" href="#summary" role="tab" aria-controls="summary" aria-selected="true">Transaction Summary</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Edit Profile</a>
        </li>
      </ul>
  
      <!-- Tab Content -->
      <div class="tab-content mt-4" id="myTabContent">
        <!-- Transaction Summary Tab -->
        <div class="tab-pane fade show active" id="summary" role="tabpanel" aria-labelledby="summary-tab">
          <div class="row text-center">
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card bg-primary text-white">
                <div class="card-body">
                  <h5 class="card-title">Total Transactions</h5>
                  <h2 class="card-text">1,234</h2>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card bg-warning text-white">
                <div class="card-body">
                  <h5 class="card-title">Pending Transactions</h5>
                  <h2 class="card-text">45</h2>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card bg-success text-white">
                <div class="card-body">
                  <h5 class="card-title">Successful Transactions</h5>
                  <h2 class="card-text">1,189</h2>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Recent Transactions Table -->
          <div class="card">
            <div class="card-header">
              Recent Transactions
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Transaction ID</th>
                      <th scope="col">Date</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>TXN12345</td>
                      <td>2024-10-01</td>
                      <td>$150.00</td>
                      <td><span class="badge badge-success">Success</span></td>
                    </tr>
                    <tr>
                      <td>TXN12346</td>
                      <td>2024-10-02</td>
                      <td>$85.50</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                    </tr>
                    <tr>
                      <td>TXN12347</td>
                      <td>2024-10-03</td>
                      <td>$200.75</td>
                      <td><span class="badge badge-danger">Failed</span></td>
                    </tr>
                    <tr>
                      <td>TXN12348</td>
                      <td>2024-10-04</td>
                      <td>$320.00</td>
                      <td><span class="badge badge-success">Success</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Edit Profile Tab -->
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="card">
            <div class="card-header">
              Edit Profile
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" value="JohnDoe">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" value="john.doe@example.com">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  
</body>

@endsection