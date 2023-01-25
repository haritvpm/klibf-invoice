<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
   
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                                </i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
        @endif
                </ul>
            </li>
        @endcan
        @can('book_fest_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.book-fests.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/book-fests") || request()->is("admin/book-fests/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.bookFest.title') }}
                </a>
            </li>
        @endcan
      

        @can('member_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.members.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/members") || request()->is("admin/members/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.member.title') }}
                </a>
            </li>
        @endcan
        @can('financial_year_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.financial-years.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/financial-years") || request()->is("admin/financial-years/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.financialYear.title') }}
                </a>
            </li>
        @endcan
        @can('sanctioned_amount_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.sanctioned-amounts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sanctioned-amounts") || request()->is("admin/sanctioned-amounts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.sanctionedAmount.title') }}
                </a>
            </li>
        @endcan
        @can('publisher_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.publishers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/publishers") || request()->is("admin/publishers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.publisher.title') }}
                </a>
            </li>
        @endcan
        @can('invoice_list_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.invoice-lists.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/invoice-lists") || request()->is("admin/invoice-lists/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file-invoice-dollar c-sidebar-nav-icon">

                    </i>
                     <span style='color:lightgreen;'>   {{ trans('cruds.invoiceList.title') }} </span>
                </a>
            </li>
        @endcan
        @can('invoice_item_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.invoice-items.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/invoice-items") || request()->is("admin/invoice-items/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-dollar c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.invoiceItem.title') }}
                </a>
            </li>
        @endcan
    
        <li class="c-sidebar-nav-item">
                <a  href="{{ route("admin.backups.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/backups") || request()->is("admin/backups/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-archive c-sidebar-nav-icon">

                    </i>
                    Backups
                </a>
            </li>
       
     
    </ul>

</div>