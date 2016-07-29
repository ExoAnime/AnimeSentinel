<div class="content-header">
  @if(!empty($link))
    <a href="{{ $details->details_url }}">Information</a>
  @else
    Information
  @endif
</div>
<div class="content-generic">
  <p><strong>Type:</strong> {{ ucwords($details->type) }}</p>
  <p>
    <strong>Genres:</strong>
    @foreach($details->genres as $index => $genre)
      {{ ucwords($genre) }}{{ $index === count($details->genres) -1 ? '' : ',' }}
    @endforeach
  </p>
  <p>
    <strong>Status:</strong>
    @if(!isset($details->latest_sub))
      Upcoming
    @elseif(!isset($details->episode_amount))
      Unknown
    @elseif($details->latest_sub >= $details->episode_amount)
      Completed
    @else
      Current
    @endif
  </p>
  <p><strong>Episodes:</strong> {{ $details->episode_amount or 'Unknown' }}</p>
  <p>
    <strong>Duration:</strong>
    @if(isset($details->episode_duration))
      {{ $details->episode_duration }} min. per ep.
    @else
      Unknown
    @endif
  </p>
  <p>
    <strong>Aired Since:</strong>
    @if(!empty($details->first_video))
      {{ $details->first_video->uploadtime->toFormattedDateString() }}
    @else
      Upcoming
    @endif
  </p>
  <div class="content-close"></div>
</div>
