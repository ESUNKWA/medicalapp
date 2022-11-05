<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Rocker</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">

                <li>
                    <a href="{{ url('index') }}">
                        <div class="parent-icon"><i class='bx bx-cookie'></i>
                        </div>
                        <div class="menu-title">Tableau de bord</div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('accueil') }}">
                        <div class="parent-icon"><i class='bx bx-cookie'></i>
                        </div>
                        <div class="menu-title">Accueil</div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Administration</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('app-emailbox') }}"><i class="bx bx-right-arrow-alt"></i>Email</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Personnel médical</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('/specialites') }}"><i class="bx bx-right-arrow-alt"></i>Spécialités</a>
                        </li>
                        <li> <a href="{{ url('/categories') }}"><i class="bx bx-right-arrow-alt"></i>Catégories</a>
                        </li>
                        <li> <a href="{{ url('/personnels') }}"><i class="bx bx-right-arrow-alt"></i>Personnel</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Prestations</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('/types_actes_medicaux') }}"><i class="bx bx-right-arrow-alt"></i>Types des actes</a>
                        </li>
                        <li> <a href="{{ url('/actesmedicaux') }}"><i class="bx bx-right-arrow-alt"></i>Actes médicaux</a>
                        </li>
                        <li> <a href="{{ url('/prestations') }}"><i class="bx bx-right-arrow-alt"></i>Prestations</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Clinique</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('app-emailbox') }}"><i class="bx bx-right-arrow-alt"></i>Infos clinique</a>
                        </li>
                        <li> <a href="{{ url('app-emailbox') }}"><i class="bx bx-right-arrow-alt"></i>Chambres patients</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i>
                        </div>
                        <div class="menu-title">Utilisateurs</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('/utilisateurs') }}"><i class="bx bx-right-arrow-alt"></i>Utilisateurs</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
