import { defineConfig } from "vite";
import laravel, { refreshPaths } from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: [
                ...refreshPaths,
                "app/Http/Livewire/**/*", // Custom Livewire components
                "app/Filament/*", // Filament Resources
                "app/Filament/**/*", // Filament Resources
                "app/Providers/Filament/**",
                "app/Forms/Components/**",
                "app/Livewire/**",
                "app/Infolists/Components/**",
                "app/Tables/Columns/**",
                "app/Providers/**",
                "public/css/hasnayeen/themes/**",
            ],
        }),
    ],
    server: { host: "0.0.0.0", hmr: { host: "localhost" } },
});
