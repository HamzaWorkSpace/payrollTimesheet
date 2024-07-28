@php
    $userRole = auth()->user()->role; // Assuming the role is stored in the 'role' column of the user model
@endphp
    <!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            CANVAS<span>ICT</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            @if ($userRole === 'admin')
                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>

                {{-- My Business --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#business" role="button" aria-expanded="false" aria-controls="business">
                        <i class="link-icon" data-feather="clock"></i>
                        <span class="link-title">My Business</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="business">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('clients.index') }}" class="nav-link">Clients</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('employees.index') }}" class="nav-link">Employees</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/compose.html" class="nav-link">SubContractor</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.users.list') }}" class="nav-link">Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/compose.html" class="nav-link">Attachments</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Contracts --}}
                <li class="nav-item">
                    <a href="{{ route('contracts.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Contracts</span>
                    </a>
                </li>

                {{-- Timesheet --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#timesheet" role="button" aria-expanded="false" aria-controls="timesheet">
                        <i class="link-icon" data-feather="clock"></i>
                        <span class="link-title">Timesheet</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="timesheet">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('timesheets.index') }}" class="nav-link">View Timesheet</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/read.html" class="nav-link">Outstanding Timesheet</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/compose.html" class="nav-link">Bulk Create Timesheet</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Invoice --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#invoice" role="button" aria-expanded="false" aria-controls="invoice">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Invoice</span>
                    </a>
                </li>

                {{-- Reports --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#reports" role="button" aria-expanded="false" aria-controls="reports">
                        <i class="link-icon" data-feather="file"></i>
                        <span class="link-title">Reports</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="reports">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Report 1</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Report 2</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Report 3</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Documents --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#documents" role="button" aria-expanded="false" aria-controls="documents">
                        <i class="link-icon" data-feather="folder-minus"></i>
                        <span class="link-title">Documents</span>
                    </a>
                </li>

                {{-- Links --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#Links" role="button" aria-expanded="false" aria-controls="Links">
                        <i class="link-icon" data-feather="link-2"></i>
                        <span class="link-title">Links</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="Links">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Link 1</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Link 2</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Link 3</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            @if ($userRole === 'agent')
                <li class="nav-item">
                    <a href="{{ route('agent.dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
            @endif

            @if ($userRole === 'user')
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#timesheet" role="button" aria-expanded="false" aria-controls="timesheet">
                        <i class="link-icon" data-feather="clock"></i>
                        <span class="link-title">Timesheet</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="timesheet">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/email/inbox.html" class="nav-link">View Timesheet</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/read.html" class="nav-link">Outstanding Timesheet</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/compose.html" class="nav-link">Bulk Create Timesheet</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            @if ($userRole === 'manager')
                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>

                {{-- My Business --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#business" role="button" aria-expanded="false" aria-controls="business">
                        <i class="link-icon" data-feather="clock"></i>
                        <span class="link-title">My Business</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="business">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/email/inbox.html" class="nav-link">Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/read.html" class="nav-link">Clients</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/compose.html" class="nav-link">Employees</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/compose.html" class="nav-link">SubContractor</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/compose.html" class="nav-link">Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/compose.html" class="nav-link">Attachments</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Contracts --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#contracts" role="button" aria-expanded="false" aria-controls="contracts">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Contracts</span>
                    </a>
                </li>

                {{-- Timesheet --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#timesheet" role="button" aria-expanded="false" aria-controls="timesheet">
                        <i class="link-icon" data-feather="clock"></i>
                        <span class="link-title">Timesheet</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="timesheet">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/email/inbox.html" class="nav-link">View Timesheet</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/read.html" class="nav-link">Outstanding Timesheet</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/compose.html" class="nav-link">Bulk Create Timesheet</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Invoice --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#invoice" role="button" aria-expanded="false" aria-controls="invoice">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Invoice</span>
                    </a>
                </li>

                {{-- Reports --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#reports" role="button" aria-expanded="false" aria-controls="reports">
                        <i class="link-icon" data-feather="file"></i>
                        <span class="link-title">Reports</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="reports">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Report 1</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Report 2</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Report 3</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Documents --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#documents" role="button" aria-expanded="false" aria-controls="documents">
                        <i class="link-icon" data-feather="folder-minus"></i>
                        <span class="link-title">Documents</span>
                    </a>
                </li>

                {{-- Links --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#Links" role="button" aria-expanded="false" aria-controls="Links">
                        <i class="link-icon" data-feather="link-2"></i>
                        <span class="link-title">Links</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="Links">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Link 1</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Link 2</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Link 3</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>
