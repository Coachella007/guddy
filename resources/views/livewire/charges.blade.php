<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div>
  <div class="pt-3">
    <label for="amountloaned">amount to be loaned</label>
    <input id="amountloaned" wire:model="amountloaned" type="number" class="form-control" name="amountloaned" aria-describedby="amount" required >
    <small id="emailHelp" class="form-text text-muted">enter the required amount to be loaned.</small>
  </div>
  {{ $amountloaned }}
    <div class="pt-3">
        <label for="amountloaned">charges</label>
        <input type="number" class="form-control" name="charges" aria-describedby="charges" value="{{ $amountloaned }}"required >
        <small id="charges" class="form-text text-muted">you will be charged 2% of the amount applied for.</small>
      </div>
      <p id="ok">

      </p>
    
</div>

<script>
  var bg = 5555;
  document. getElementById(ok).innerHTML = bg;  
</script>

</body>
</html>
