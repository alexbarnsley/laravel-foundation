<div class="flex-1 px-8 md:px-10">
    @if(Auth::check() && $notificationCount > 0)
        <div class="inline-block py-4 w-full md:py-4" dusk="navigation-notifications">
            @foreach($currentUser->notifications->take(4) as $notification)
                <div class="flex px-2 py-6 leading-5 {{ ! $loop->last ? 'border-b border-dashed border-theme-secondary-200' : '' }}" dusk="navigation-notification-{{$loop->index}}">
                    <x-hermes-notification-icon :notification="$notification" :type="$notification->data['type']" />

                    <div class="flex overflow-auto flex-col ml-5 space-y-1 w-full">
                        <div class="flex flex-row justify-between">
                            <span class="flex-grow font-semibold truncate text-theme-secondary-900">
                                {{ $notification->title() }}
                            </span>

                            <span class="hidden text-sm whitespace-nowrap md:block md:text-right text-theme-secondary-400">
                                {{ $notification->created_at_local->diffForHumans() }}
                            </span>
                        </div>

                        <div class="flex flex-col justify-between md:flex-row md:space-x-3">
                            <span class="notification-truncate">
                                {{ $notification->content() }}
                            </span>

                            <div class="flex flex-row space-x-4">
                                @if($notification->hasAction())
                                    <span class="mt-1 font-semibold whitespace-nowrap md:mt-0 link">
                                        <a href="{{ $notification->link() }}" class="focus-visible:rounded">{{ $notification->linkTitle() }}</a>
                                    </span>
                                @endif

                                <span class="block mt-1 text-sm md:hidden text-theme-secondary-400">
                                    {{ $notification->created_at_local->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="flex flex-row justify-center px-2 pb-6 mt-4 w-full">
                <a href="{{ route('user.notifications') }}" class="w-full cursor-pointer button-secondary">
                    {{ $notificationCount > 4 ? trans('ui::actions.show_all') : trans('ui::actions.open_notifications') }}
                </a>
            </div>
        </div>
    @else
        <div class="p-6 mt-8 text-center rounded-xl border-2 border-theme-secondary-200">
            <span>@lang('ui::menus.notifications.no_notifications')</span>
        </div>
        <div class="py-8 md:px-8">
            <img src="{{ asset('images/defaults/no-notifications.svg') }}" alt=""/>
        </div>
    @endif
</div>
