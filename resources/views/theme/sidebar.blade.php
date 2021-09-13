 <div class="sidebar-wrapper sidebar-theme">

     <nav id="sidebar">

         <ul class="navbar-nav theme-brand flex-row  text-center">
             <li class="nav-item theme-text">
                 <a href="{{ route('home') }}" class="nav-link"> AM'U </a>
             </li>
             <li class="nav-item toggle-sidebar">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather sidebarCollapse feather-chevrons-left">
                     <polyline points="11 17 6 12 11 7"></polyline>
                     <polyline points="18 17 13 12 18 7"></polyline>
                 </svg>
             </li>
         </ul>
         <div class="shadow-bottom"></div>
         <ul class="list-unstyled menu-categories ps ps--active-y" id="accordionExample">
             <li class="menu {{ request()->is('home') ? 'active' : '' }}">
                 <a href="{{ route('home') }}" aria-expanded="{{ request()->is('home') ? 'true' : 'false' }}"
                     class="dropdown-toggle">
                     <div class="">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                         <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                         <polyline points="9 22 9 12 15 12 15 22"></polyline>
                         </svg>
                         <span>Dashboard</span>
                     </div>
                 </a>
             </li>

             <li class="menu menu-heading">
                 <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-circle">
                         <circle cx="12" cy="12" r="10"></circle>
                     </svg><span>MANTENEDOR</span></div>
             </li>

             <li class="menu {{ request()->is('users/*') ? 'active' : '' }}">
                <a href="#users" data-toggle="collapse"
                    aria-expanded="{{ request()->is('users/*') ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                     <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>Users</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu {{ request()->is('users/*') ? 'recent-submenu mini-recent-submenu show' : '' }} list-unstyled"
                    id="users" data-parent="#accordionExample">
                    <li class="{{ request()->is('users/list') ? 'active' : '' }}">
                        <a href="{{ route('usersList') }}"> Users </a>
                    </li>
                    <li class="{{ request()->is('users/roles') ? 'active' : '' }}">
                        <a href="{{ route('roles') }}"> Roles </a>
                    </li>
                    <li class="{{ request()->is('users/permisos') ? 'active' : '' }}">
                        <a href="{{ route('permisos') }}"> Permisos </a>
                    </li>
                </ul>
            </li>
             <li class="menu {{ request()->is('modules/*') ? 'active' : '' }}">
                 <a href="#elements" data-toggle="collapse"
                     aria-expanded="{{ request()->is('modules/*') ? 'true' : 'false' }}" class="dropdown-toggle">
                     <div class="">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap">
                         <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                         </svg>
                         <span>Módulos</span>
                     </div>
                     <div>
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                             <polyline points="9 18 15 12 9 6"></polyline>
                         </svg>
                     </div>
                 </a>
                 <ul class="collapse submenu {{ request()->is('modules/*') ? 'recent-submenu mini-recent-submenu show' : '' }} list-unstyled"
                     id="elements" data-parent="#accordionExample">
                     <li class="{{ request()->is('modules/categories') ? 'active' : '' }}">
                         <a href="{{ route('categories') }}"> Categorias </a>
                     </li>
                     <li class="{{ request()->is('modules/products') ? 'active' : '' }}">
                         <a href="{{ route('products') }}"> Productos </a>
                     </li>
                     <li class="{{ request()->is('modules/almacenes') ? 'active' : '' }}">
                         <a href="{{ route('almacenes') }}"> Almacenes </a>
                     </li>
                     <li class="{{ request()->is('modules/clientes') ? 'active' : '' }}">
                         <a href="{{ route('clientes') }}"> Clientes </a>
                     </li>
                     <li class="{{ request()->is('modules/zonas') ? 'active' : '' }}">
                         <a href="{{ route('zonas') }}"> Zonas </a>
                     </li>
                     <li class="{{ request()->is('modules/ciudadanos') ? 'active' : '' }}">
                         <a href="{{ route('ciudadanos') }}"> Ciudadanos </a>
                     </li>
                     <li class="{{ request()->is('modules/transporte') ? 'active' : '' }}">
                         <a href="{{ route('transporte') }}"> Transporte </a>
                     </li>
                 </ul>
             </li>
             

             <li class="menu menu-heading">
                 <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-circle">
                         <circle cx="12" cy="12" r="10"></circle>
                     </svg><span>PROCESOS</span></div>
             </li>

             <li class="menu {{ request()->is('pedidos/*') ? 'active' : '' }}">
                 <a href="#components" data-toggle="collapse"
                     aria-expanded="{{ request()->is('pedidos/*') ? 'true' : 'false' }}" class="dropdown-toggle">
                     <div class="">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                         <line x1="12" y1="1" x2="12" y2="23"></line>
                         <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                         <span>Pedidos</span>
                     </div>
                     <div>
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                             <polyline points="9 18 15 12 9 6"></polyline>
                         </svg>
                     </div>
                 </a>
                 <ul class="collapse submenu {{ request()->is('pedidos/*') ? 'recent-submenu mini-recent-submenu show' : '' }} list-unstyled"
                     id="components" data-parent="#accordionExample">
                     <li class="{{ request()->is('pedidos/list') ? 'active' : '' }}">
                         <a href="{{ route('listPedidos') }}"> Listado </a>
                     </li>
                     <li class="{{ request()->is('pedidos/create') ? 'active' : '' }}">
                         <a href="{{ route('createPedidos') }}"> Registrar </a>
                     </li>
                 </ul>
             </li>

             <li class="menu {{ request()->is('listPedidos/*') ? 'active' : '' }}">
                 <a href="#components" data-toggle="collapse"
                     aria-expanded="{{ request()->is('listPedidos/*') ? 'true' : 'false' }}" class="dropdown-toggle">
                     <div class="">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                         <line x1="12" y1="1" x2="12" y2="23"></line>
                         <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                         <span>Empaquetamiento</span>
                     </div>
                     <div>
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                             <polyline points="9 18 15 12 9 6"></polyline>
                         </svg>
                     </div>
                 </a>
                 <ul class="collapse submenu {{ request()->is('listPedidos/*') ? 'recent-submenu mini-recent-submenu show' : '' }} list-unstyled"
                     id="components" data-parent="#accordionExample">
                     <li class="{{ request()->is('listPedidos/list') ? 'active' : '' }}">
                         <a href="{{ route('listOrder') }}"> Listado </a>
                     </li>
                     <li class="{{ request()->is('listPedidos/create') ? 'active' : '' }}">
                         <a href="{{ route('createListOrder') }}"> Registrar </a>
                     </li>
                 </ul>
             </li>

             <li class="menu menu-heading">
                 <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-circle">
                         <circle cx="12" cy="12" r="10"></circle>
                     </svg><span>AJUSTES</span></div>
             </li>

             <li class="menu {{ request()->is('profile/*') ? 'active' : '' }}">
                 <a href="#authentication" data-toggle="collapse"
                     aria-expanded="{{ request()->is('profile/*') ? 'true' : 'false' }}" class="dropdown-toggle">
                     <div class="">
                       <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                         <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                         <path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                         <span>Perfil</span>
                     </div>
                     <div>
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                             <polyline points="9 18 15 12 9 6"></polyline>
                         </svg>
                     </div>
                 </a>
                 <ul class="collapse submenu {{ request()->is('profile/*') ? 'recent-submenu mini-recent-submenu show' : '' }} list-unstyled"
                     id="authentication" data-parent="#accordionExample">
                     <li class="{{ request()->is('profile/index') ? 'active' : '' }}">
                         <a href="{{ route('user_profile') }}"> Perfil </a>
                     </li>
                     <li class="{{ request()->is('profile/edit') ? 'active' : '' }}">
                         <a href="{{ route('edit_profile') }}"> Editar Perfil </a>
                     </li>
                 </ul>
             </li>



             <li class="menu menu-heading">
                 <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-circle">
                         <circle cx="12" cy="12" r="10"></circle>
                     </svg><span>REPORTES</span></div>
             </li>



             <li class="menu {{ request()->is('reportes/*') ? 'active' : '' }}">
                 <a href="#forms" data-toggle="collapse" aria-expanded="{{ request()->is('reportes/*') ? 'true' : 'false' }}" class="dropdown-toggle">
                     <div class="">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                         <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                         <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                         <span>Reportes</span>
                     </div>
                     <div>
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-chevron-right">
                             <polyline points="9 18 15 12 9 6"></polyline>
                         </svg>
                     </div>
                 </a>
                 <ul class="collapse submenu {{ request()->is('reportes/*') ? 'recent-submenu mini-recent-submenu show' : '' }} list-unstyled" id="forms" data-parent="#accordionExample">
                     <li class="{{ request()->is('reportes/pedidos') ? 'active' : '' }}">
                         <a href="{{ route('reportes') }}"> Pedidos </a>
                     </li>

                 </ul>
             </li>


             <li class="menu">
                 <a target="_blank" href="../../documentation/index.html" aria-expanded="false"
                     class="dropdown-toggle">
                     <div class="">
                        <svg xmlns=" http://www.w3.org/2000/svg" width="24"
                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
                         <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                         <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                         <span>Documentation</span>
                     </div>
                 </a>
             </li>

         </ul>

     </nav>

 </div>
