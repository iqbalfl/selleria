<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Konfirmasi Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                <img src="{{ asset('/images/selleria_logo.png') }}" alt="Konfirmasi Order">
              </div>
              <div class="panel-body">
                <p>Hi <strong>{{ session('order')->user->name }}</strong>,</p>
                <p></p>
                <p>Terima kasih telah berbelanja di {{ config('app.name', 'Selleria') }}. <br>
                  Untuk melakukan pembayaran dengan {{ config('bank-accounts')[session('order')->bank]['title'] }}: </p>
                <ol>
                  <li>Silahkan transfer ke rekening <strong>{{ config('bank-accounts')[session('order')->bank]['bank'] }} {{ config('bank-accounts')[session('order')->bank]['number'] }} An. {{ config('bank-accounts')[session('order')->bank]['name'] }}</strong>.</li>
                  <li>Ketika melakukan pembayaran sertakan nomor pesanan <strong>{{ session('order')->padded_id }}</strong>.</li>
                  <li>Total pembayaran <strong>Rp{{ number_format(session('order')->total_payment)}}</strong>.</li>
                </ol>
                <hr>
                <p>© 2017 - {{ config('app.name', 'Selleria') }} | Best Online Shopping</p>
              </div>
              <div class="panel-footer"><a href="{{ url('/home/orders') }}">Klik untuk melihat order</a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>