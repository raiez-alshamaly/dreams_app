  <!-- Breadcrumb -->
  <div class="sticky top-0 inset-x-0 z-20  border-y border-[var(--color-neutral-700)] px-4 sm:px-6 lg:px-8 lg:hidden bg-[var(--color-neutral-800)]">
    <div class="flex items-center py-2">
      <!-- Navigation Toggle -->
      <button type="button" class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text--[var(--color-light-200)] hover:text--[var(--color-light-400)] rounded-lg focus:outline-hidden focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-200 dark:hover:text-[var(--color-neutral-500)] dark:focus:[var(--color-text-neutral-500)]" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
        <span class="sr-only">Toggle Navigation</span>
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect width="18" height="18" x="3" y="3" rx="2" />
          <path d="M15 3v18" />
          <path d="m8 9 3 3-3 3" />
        </svg>
      </button>
      <!-- End Navigation Toggle -->
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Sidebar -->
  <div id="hs-application-sidebar" class="hs-overlay  [--auto-close:lg]
    hs-overlay-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-65 h-full
    hidden
    fixed inset-y-0 start-0 z-60
   bg-[var(--color-neutral-800)] border-e border-[var(--color-neutral-700)]
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
    " role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
      <div class="px-6 pt-4 flex items-center">
        
      </div>

      <!-- Content -->
      <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-[var(--color-neutral-100)] [&::-webkit-scrollbar-thumb]:bg-[var(--color-neutral-300)]">
        <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
          <ul class="flex flex-col space-y-1">
            {{-- <x-layouts.sidebar-link-item  route="admin.index" label="Dashboard" /> --}}
            <x-layouts.sidebar-link-item  route="admin.dreams" label="Dreams" />
            <x-layouts.sidebar-link-item  route="admin.themes.index" label="Themes" />
            <x-layouts.sidebar-link-item  route="admin.loader.index" label="Loader" />
        
          
          </ul>
        </nav>
      </div>
      <!-- End Content -->
    </div>
  </div>
  <!-- End Sidebar -->