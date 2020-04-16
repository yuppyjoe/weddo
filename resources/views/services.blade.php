@extends ('main')
@section('title', 'Services')
@section('navbar','')
<div class="list">

  <ul>
    <li> <a href="{{ url('/photography') }}">Photgraphy</a> </li>
    <li> <a href="{{ url('/planning') }}">Planning</a> </li>
    <li> <a href="{{ url('/venue') }}">Venue</a> </li>
    <li> <a href="{{ url('/catering') }}">Catering</a> </li>
    <li> <a href="{{ url('/cars') }}">Cars</a> </li>
  </ul>



</div>
