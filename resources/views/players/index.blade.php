<table>
  <tr>
    <th>Rank</th>
    <th>Name</th>
    <th>Address</th>
    <th>{{ env('ACCESS_TOKEN') }}</th>
    <th>{{ env('POINTS_TOKEN') }}</th>
  </tr>
  @foreach($balances as $balance)
  <tr>
    <th>{{ $loop->index + 1 }}</th>
    <th>{{ $balance->player->name }}</th>
    <th>{{ $balance->player->address }}</th>
    <th></th>
    <th>{{ $balance->quantity_normalized }} {{ env('POINTS_TOKEN') }}</th>
  </tr>
  @endforeach
</table>