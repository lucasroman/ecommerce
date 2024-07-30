@viteReactRefresh
@vite(['resources/css/app.css', 'resources/js/component.jsx'])


<h1 class="text-3xl font-bold">Test React Component pass data</h1>

<div id="component" data-user={{ App\Models\User::first() }}></div>









