<x-layouts.main-layout>

    <x-dashboard.welcome-header
        :user="$user"
        :profileCompletion="$profileCompletion" />

    <x-dashboard.stats-grid
        :stats="$stats" />

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-lg">

        <div class="lg:col-span-2 space-y-lg">

            <x-dashboard.ai-insights
                :insights="$insights" />

            <x-dashboard.recent-activity
                :activities="$activities" />

        </div>

        <div class="space-y-lg flex flex-col items-start">


            <x-dashboard.featured-project
                :project="$featuredProject" />

        </div>

    </div>

</x-layouts.main-layout>
