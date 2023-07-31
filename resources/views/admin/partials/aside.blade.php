<aside class="bg-dark text-white">

<nav class="mt-4 me-1">
<ul>
    <li class="mb-3 dis-link">
      <a class="nav-link" target="_blank" href="{{ route('home') }}"><i class="fa-solid fa-house" style="color: #ffffff;"></i></a>
    </li>

    <li class="mb-3">
        <a href="{{route('admin.home')}}"><i class="fa-solid fa-gauge-high"></i><span class="dis-span">Dashboard</span></a>
    </li>

    <li class="mb-3">
      <a href="{{route('admin.restaurant.index')}}"><i class="fa-solid fa-building-user"></i><span class="dis-span">Il mio Ristorante</span></a>
  </li>

  <li class="mb-3">
    <a href="{{route('admin.dishes.index')}}"><i class="fa-solid fa-utensils"></i><span class="dis-span">Piatti</span></a>
    </li>

    <li class="mb-3">
        <a href="{{route('admin.orders.index')}}"><i class="fa-solid fa-chart-line"></i><span class="dis-span">Ordini</span></a>
    </li>
    <li class="mb-3">
        <a href="{{route('admin.statistics')}}"><i class="fa-solid fa-chart-column"></i><span class="dis-span">Statistiche</span></a>
    </li>


    <li class="mb-3 dis-link">
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
      <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
    </li>
</ul>
</nav>

</aside>
