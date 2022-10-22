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
                        <div class="menu-title">Utilisateurs</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('app-emailbox') }}"><i class="bx bx-right-arrow-alt"></i>Email</a>
                        </li>
                        <li> <a href="{{ url('app-chat-box') }}"><i class="bx bx-right-arrow-alt"></i>Chat Box</a>
                        </li>
                        <li> <a href="{{ url('app-file-manager') }}"><i class="bx bx-right-arrow-alt"></i>File Manager</a>
                        </li>
                        <li> <a href="{{ url('app-contact-list') }}"><i class="bx bx-right-arrow-alt"></i>Contatcs</a>
                        </li>
                        <li> <a href="{{ url('app-to-do') }}"><i class="bx bx-right-arrow-alt"></i>Todo List</a>
                        </li>
                        <li> <a href="{{ url('app-invoice') }}"><i class="bx bx-right-arrow-alt"></i>Invoice</a>
                        </li>
                        <li> <a href="{{ url('app-fullcalender') }}"><i class="bx bx-right-arrow-alt"></i>Calendar</a>
                        </li>
                    </ul>
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
                        <div class="menu-title">Clinique</div>
                    </a>
                    <ul>
                        <li> <a href="{{ url('app-emailbox') }}"><i class="bx bx-right-arrow-alt"></i>Email</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->