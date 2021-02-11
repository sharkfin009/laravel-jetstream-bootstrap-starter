# What's in

- Jetstream with Livewire
- Bootstrap instead of Tailwind
- Fortify auth (as part of Jetstream)
- Sanctum auth (token based auth, also part of Jetstream)
- Socialite with example GitHub flow

# Vue

- Laravel Jetstream Livewire targets creation of dynamic Blade components
- Laravel Jetstream Inertia targets creation of dynamic Vue components (not Vue component living in the Blade!)

To use Vue components in the Blade pages created with Livewire, a plugin is needed: https://github.com/livewire/vue.

This repo has "vue": "^3.0.5" and "livewire-vue": "^0.3.1" included to facilitate Vue component included in the Livewire Blade page.

If Vue is not to be used, these two libs can simply be npm remove-d, no other artefacts would be left behind..
