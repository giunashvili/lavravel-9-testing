<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div class="min-h-full">
    <div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
        <div class="flex flex-col flex-grow bg-cyan-700 pt-5 pb-4 overflow-y-auto">
            <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
                <div class="px-2 space-y-1">
                    <a href="{{ route('company.index') }}" class="bg-cyan-800 text-white group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md" aria-current="page">
                        Companies
                    </a>

                    <a href="{{ route('logout') }}" class="text-cyan-100 hover:text-white hover:bg-cyan-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                        Logout
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <div class="lg:pl-64 flex flex-col flex-1">
        <main class="flex-1 pb-8">
            {{ $slot }}
        </main>
    </div>
</div>
{{ $script  }}}
</body>
</html>
