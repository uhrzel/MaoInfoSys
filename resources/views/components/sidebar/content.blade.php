<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="Messenger" href="{{ route('messenger') }}" :active="request()->routeIs('messenger')" />

    <!-- Other Sidebar Links -->
    @if(Auth::user()->type == 'user')

    <x-sidebar.link title="Complains" href="{{ route('admin.reports') }}" :isActive="request()->routeIs(['admin.reportCreate', 'admin.reportShow', 'admin.reportEdit'])" />
    @endif

    @if(Auth::user()->type == 'admin')
    <x-sidebar.link title="Complains" href="{{ route('admin.reports') }}" :isActive="request()->routeIs(['admin.reports', 'admin.reportShow', 'admin.reportEdit', 'admin.reportCreate'])" />
    <x-sidebar.link title="Advertisements" href="{{ route('admin.advertisement') }}" :isActive="request()->routeIs(['admin.advertisement', 'admin.advertisementShow', 'admin.advertisementsEdit'])" />
    <x-sidebar.link title="Events" href="{{ route('admin.events') }}" :isActive="request()->routeIs(['admin.events', 'admin.eventsShow', 'admin.eventsEdit'])" />
    <x-sidebar.link title="News" href="{{ route('admin.news') }}" :isActive="request()->routeIs(['admin.news', 'admin.newsShow', 'admin.newsEdit'])" />
    <x-sidebar.link title="Statistics" href="{{ route('admin.statistics') }}" :isActive="request()->routeIs(['admin.statistics', 'admin.statisticsShow', 'admin.statisticsEdit'])" />
    <x-sidebar.link title="User Logs" href="{{ route('admin.logs') }}" :isActive="request()->routeIs(['admin.logs', 'admin.logsShow', 'admin.logsEdit'])" />
    @endif

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>
        <div class="mt-3 space-y-1">
            <x-sidebar.link title="Profile" href="{{ route('profile.edit') }}" />

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-sidebar.link title="Log Out" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" />
            </form>
        </div>
    </div>
</x-perfect-scrollbar>