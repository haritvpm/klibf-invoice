<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <span class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}  {{$active_bookfest?->title}}
        </span>
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

                    @can('constituency_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.constituencies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/constituencies") || request()->is("admin/constituencies/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marker-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.constituency.title') }}
                            </a>
                        </li>
                    @endcan
		     @can('mla_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.mlas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mlas") || request()->is("admin/mlas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.mla.title') }}
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
      

       @can('member_fund_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.member-funds.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/member-funds") || request()->is("admin/member-funds/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.memberFund.title') }}
                </a>
            </li>
        @endcan
        @can('publisher_access')
      
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.publishers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/publishers") || request()->is("admin/publishers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

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
  
  @can('account_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/sales*") ? "c-show" : "" }} {{ request()->is("admin/sale-items*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.account.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                 
                    @can('sale_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sales.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sales") || request()->is("admin/sales/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sale.title') }}
                            </a>
                        </li>
                    @endcan
                  <!--   @can('sale_item_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sale-items.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sale-items") || request()->is("admin/sale-items/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.saleItem.title') }}
                            </a>
                        </li>
                    @endcan -->
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
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