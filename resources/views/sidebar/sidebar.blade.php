<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu Principal</span>
                </li>
                @if (Session::get('role_name') === 'Directeur')
                <li class="{{set_active(['setting/page'])}}">
                    <a href="{{ route('setting/page') }}">
                        <i class="fas fa-cog"></i> 
                        <span> Paramétres</span>
                    </a>
                </li>
                @endif
                <li class="{{set_active(['home'])}}">
                    <a href="{{ route('home') }}">
                        <i class="feather-grid"></i> 
                        <span> Tableau De Bord</span>
                    </a>
                </li>
                @if (Session::get('role_name') === 'Directeur')
                <li class="submenu {{set_active(['user/list','user/add'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-shield-alt"></i>
                        <span>Utilisateurs</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('user/list') }}" class="{{set_active(['user/list'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">Liste des Utilisateurs</a></li>
                        <li><a href="{{ route('user/add') }}" class="{{set_active(['user/add'])}}">Ajouter des Utilisateurs</a></li>
                    </ul>
                </li>
                @endif

                <li class="submenu {{set_active(['student/list','student/add/page'])}} {{ (request()->is('student/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-graduation-cap"></i>
                        <span> Etudiants</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('student/list') }}"  class="{{set_active(['student/list'])}}">Liste des Etudiants</a></li>
                        @if (Session::get('role_name') === 'RH')
                        <li><a href="{{ route('student/add/page') }}" class="{{set_active(['student/add/page'])}}">Ajouter Etudiants</a></li>
                        @endif
                    </ul>
                </li>

                <li class="submenu  {{set_active(['teacher/add/page','teacher/list/page','teacher/edit'])}} {{ (request()->is('teacher/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i>
                        <span> Formateurs</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('teacher/list/page') }}" class="{{set_active(['teacher/list/page'])}}">Liste des Formateurs</a></li>
                        @if (Session::get('role_name') === 'RH')
                        <li><a href="{{ route('teacher/add/page') }}" class="{{set_active(['teacher/add/page'])}}">Ajouter Formateurs</a></li>
                        @endif
                    </ul>
                </li>
                
                @if (Session::get('role_name') === 'Directeur')
                <li class="submenu {{set_active(['batiment/list','batiment/add/page', 'batiment/edit'])}} {{ (request()->is('batiment/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-building"></i>
                        <span> Batiments</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('batiment/list') }}"  class="{{set_active(['batiment/list'])}}">Liste des Batiments</a></li>
                        <li><a href="{{ route('batiment/add/page') }}" class="{{set_active(['batiment/add/page'])}}">Ajouter Batiments</a></li>
                    </ul>
                </li>
                @endif
                @if (Session::get('role_name') === 'Directeur')
                <li class="submenu {{set_active(['formation/list','formation/add/page', 'formation/edit'])}} {{ (request()->is('formation/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-book-reader"></i>
                        <span> Formations</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('formation/list') }}"  class="{{set_active(['formation/list'])}}">Liste des Formations</a></li>
                        <li><a href="{{ route('formation/add/page') }}" class="{{set_active(['formation/add/page'])}}">Ajouter Formations</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>