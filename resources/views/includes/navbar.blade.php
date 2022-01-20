<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}" data-toggle="tooltip">
                <img alt=""
                     style="height:65px"
                     class="navbar-brand-img"
                     src="{{ asset('local/logo.png') }}">
            </a>
            <div class=" ml-auto ">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('*home*')) ? 'active' : '' }}" href="{{route('home')}}">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Tableau de bord</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">RÉSERVATIONS</li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('*admin/calender*')) ? 'active' : '' }}"
                           href="{{route('admin.calender')}}">
                            <i class="fas fa-calendar-alt text-primary"></i>
                            <span class="nav-link-text">Planning Général</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.reservations')}}"
                           class="nav-link {{ (request()->is('*admin/reservations*')) ? 'active' : '' }}"><i
                                class="fas fa-calendar-alt text-primary"></i><span class="nav-link-text">Toutes Les Réservations</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('direct.reservation')}}"
                           class="nav-link {{ (request()->is('*direct/reservation*')) ? 'active' : '' }}"><i
                                class="fas fa-cart-plus text-primary"></i><span
                                class="nav-link-text">Vente Comptoir</span></a>
                    </li>
                    <li class="nav-small-cap">MA FLOTTE</li>
                    <li class="nav-item">
                        <a href="{{route('admin.marque')}}"
                           class="nav-link {{ (request()->is('*admin/marque*')) ? 'active' : '' }}"><i
                                class="fas text-primary fa-american-sign-language-interpreting"></i><span
                                class="nav-link-text">Marque</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.category')}}"
                           class="nav-link {{ (request()->is('*admin/category*')) ? 'active' : '' }}"><i
                                class="fas text-primary fa-stop-circle"></i><span
                                class="nav-link-text">Catégories</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.modal')}}"
                           class="nav-link {{ (request()->is('*admin/modal*')) ? 'active' : '' }}"><i
                                class="fas text-primary fa-stop-circle"></i><span
                                class="nav-link-text">Modèles</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('vehicle.create')}}"
                           class="nav-link {{ (request()->is('*vehicle/create')) ? 'active' : '' }}"><i
                                class="fas text-primary fa-plus-circle"></i><span class="nav-link-text">Ajouter un Véhicule</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.vehicles')}}"
                           class="nav-link {{ (request()->is('*admin/vehicles')) ? 'active' : '' }}"><i
                                class="fas text-primary fa-car"></i><span class="nav-link-text">Flotte Véhicules</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.options')}}"
                           class="nav-link {{ (request()->is('*admin/options')) ? 'active' : '' }}"><i
                                class="fas text-primary fa-asterisk"></i><span class="nav-link-text">Options</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.gurantee')}}"
                           class="nav-link {{ (request()->is('*admin/gurantee')) ? 'active' : '' }}"><i
                                class="fas text-primary fa-stop-circle"></i><span class="nav-link-text">Garanties</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('season.index')}}"
                           class="nav-link {{ (request()->is('*admin/season')) ? 'active' : '' }}"><i
                                class="far text-primary fa-money-bill-alt"></i><span class="nav-link-text">Saisons des Tarifs</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
